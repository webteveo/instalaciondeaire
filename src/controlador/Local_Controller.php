<?php

use benjamin\plantillaweb\libs\Controlador;

require_once 'src/controlador/Local_Generadas.php';
require_once 'src/controlador/Zona_Texto.php';

/**
 * Base de las landings: paginas pilar de servicio (Landings_Controller), zonas (Zonas_Controller)
 * y Fase 2 servicio x zona (/{servicio}/{zona}, este mismo controlador).
 *
 *  - servicios(): lee data/servicios/{slug}.php (una pagina por archivo).
 *  - renderServicio(): arma canonical, schemas (Service + FAQPage + BreadcrumbList), CTA y carga la vista.
 *  - Fase 2: servicioZona($servicio, $zona) combina el archivo del servicio con los bloques de la zona (Zona_Texto).
 *    Apagada con Local_Datos::FASE2_ACTIVA = false: no se enruta, no va al sitemap ni se enlaza.
 */
class Local_Controller extends Controlador
{
    use Local_Generadas;

    private const DIR_SERVICIOS = 'data/servicios';
    private static array $cacheServicios = [];

    // ── DATOS DE SERVICIOS ────────────────────────────────────────────────────

    /** Datos de un servicio pilar desde data/servicios/{slug}.php, o null si no existe. */
    public static function servicio(string $slug): ?array
    {
        if (array_key_exists($slug, self::$cacheServicios)) return self::$cacheServicios[$slug];
        if (!preg_match('/^_?[a-z0-9-]+$/', $slug)) return self::$cacheServicios[$slug] = null;
        $file = self::DIR_SERVICIOS . '/' . $slug . '.php';
        if (!is_file($file)) return self::$cacheServicios[$slug] = null;
        global $url, $ruta;
        $s = include $file;
        if (!is_array($s)) return self::$cacheServicios[$slug] = null;
        $s['slug'] = $slug;
        return self::$cacheServicios[$slug] = $s;
    }

    /** Todos los servicios pilar declarados en Local_Datos::SERVICIOS que tienen archivo de datos: slug => nombre */
    public static function servicios(): array
    {
        $out = [];
        foreach (Local_Datos::SERVICIOS as $k => $s) {
            if (is_file(self::DIR_SERVICIOS . '/' . $k . '.php')) $out[$k] = $s['nombre'];
        }
        return $out;
    }

    // ── HELPERS ───────────────────────────────────────────────────────────────

    /** Arma la landing de servicio (pilar o Fase 2) y carga la vista. */
    protected function renderServicio(array $l): void
    {
        $l['path']         = $l['path'] ?? ('/' . $l['slug']);
        $l['canonical']    = SEO_CANONICAL_URL . $l['path'];
        $l['cta_label']    = $l['cta_label'] ?? CTA_WHATSAPP_LABEL;
        $l['cta_message']  = $l['cta_message'] ?? CONTACTO_WHATSAPP_MENSAJE;
        $l['cta_href']     = wsp_href($l['cta_message']);
        $l['track']        = $l['track'] ?? 'servicio';
        $l['track_zona']   = $l['track_zona'] ?? '';
        $l['areas']        = $l['areas'] ?? EMPRESA_ZONAS;
        $l['migas']        = $l['migas'] ?? [['href' => $GLOBALS['url'], 'label' => 'Inicio'], ['href' => $GLOBALS['url'] . 'servicios', 'label' => 'Servicios'], ['label' => $l['h1']]];
        $l['schema_blocks'] = [
            $this->buildServiceSchema($l),
            $this->buildFaqSchema($l['faq'] ?? []),
            $this->buildBreadcrumbSchema($l['migas']),
        ];
        $this->cargarVista($l['vista'] ?? 'local/servicio', ['landing' => $l]);
    }

    protected function buildServiceSchema(array $l): array
    {
        return [
            '@context'    => 'https://schema.org',
            '@type'       => 'Service',
            'name'        => $l['h1'],
            'provider'    => ['@id' => SEO_CANONICAL_URL . '/#hvacbusiness'],
            'areaServed'  => array_map(fn($a) => ['@type' => 'Place', 'name' => $a], (array)$l['areas']),
            'serviceType' => $l['service_type'] ?? $l['h1'],
            'url'         => $l['canonical'],
            'description' => $l['description'],
        ];
    }

    /** $migas: [['href' => ..., 'label' => ...], ..., ['label' => actual]] */
    protected function buildBreadcrumbSchema(array $migas): array
    {
        $items = [];
        foreach ($migas as $i => $m) {
            $item = ['@type' => 'ListItem', 'position' => $i + 1, 'name' => $m['label']];
            if (!empty($m['href'])) {
                // href absoluto local -> canonical del dominio
                $path = preg_replace('#^https?://[^/]+#', '', $m['href']);
                $path = '/' . ltrim(str_replace(rtrim(parse_url($GLOBALS['url'], PHP_URL_PATH) ?: '/', '/'), '', $path), '/');
                $item['item'] = rtrim(SEO_CANONICAL_URL . $path, '/') ?: SEO_CANONICAL_URL . '/';
            }
            $items[] = $item;
        }
        return ['@context' => 'https://schema.org', '@type' => 'BreadcrumbList', 'itemListElement' => $items];
    }

    protected function buildFaqSchema(array $faq): array
    {
        $items = [];
        foreach ($faq as $row) {
            $items[] = [
                '@type'          => 'Question',
                'name'           => $row['q'],
                'acceptedAnswer' => ['@type' => 'Answer', 'text' => strip_tags($row['a'])],
            ];
        }
        return ['@context' => 'https://schema.org', '@type' => 'FAQPage', 'mainEntity' => $items];
    }

    // ── SERVICIO x ZONA (/{servicio}/{zona}) ─────────────────────────────────

    /** URLs servicio x zona publicadas (para sitemap y links). */
    public static function fase2Urls(): array
    {
        if (!Local_Datos::FASE2_ACTIVA) return [];
        $out = [];
        foreach (array_keys(Local_Datos::FASE2_SERVICIOS) as $s) {
            foreach (array_keys(Local_Datos::zonasDeServicio($s)) as $z) $out[] = '/' . $s . '/' . $z;
        }
        return $out;
    }

    /**
     * Landing servicio x zona (/mantenimiento/pocitos). Todo el texto sale de data/zonas/{zona}.php['servicios'][servicio];
     * del archivo del servicio pilar se toman solo la lista de lo que incluye, el mensaje de WhatsApp y el nombre para el formulario.
     */
    public function servicioZona(string $servicio, string $zona): void
    {
        if (!Local_Datos::servicioZonaPublicado($servicio, $zona)) {
            \benjamin\plantillaweb\libs\App::error404();
        }
        $z    = Local_Datos::ZONAS[$zona];
        $Z    = $z['nombre'];
        $ZE   = Local_Datos::conArticulo($zona);
        $base = self::servicio($servicio) ?? [];
        $c    = Local_Datos::contenido($zona)['servicios'][$servicio];
        $S    = Local_Datos::FASE2_SERVICIOS[$servicio];

        $otros = [];
        foreach (Local_Datos::FASE2_SERVICIOS as $k => $n) {
            if ($k !== $servicio && Local_Datos::servicioZonaPublicado($k, $zona)) $otros[$k] = $n;
        }
        $vecinos = [];
        foreach (Local_Datos::linderas($zona) as $k => $n) {
            if (Local_Datos::servicioZonaPublicado($servicio, $k)) $vecinos[$k] = $n;
        }

        $l = [
            'slug'         => $servicio . '/' . $zona,
            'path'         => '/' . $servicio . '/' . $zona,
            'servicio'     => $servicio,
            'servicio_nombre' => $S,
            'h1'           => $c['h1'] ?? ($S . ' en ' . $ZE),
            'title'        => $c['title'],
            'description'  => $c['description'],
            'keywords'     => mb_strtolower($S) . ' ' . mb_strtolower($Z) . ', ' . mb_strtolower($S) . ' montevideo',
            'eyebrow'      => $S . ' · ' . $Z,
            'zona_en'      => $ZE,
            'zona_de'      => Local_Datos::deZona($zona),
            'subtitle'     => $c['subtitulo'] ?? '',
            'intro'        => $c['intro'] ?? '',
            'bloques'      => $c['bloques'] ?? [],
            'faq'          => $c['faq'] ?? [],
            'incluye'      => $base['incluye'] ?? null,
            'cta_label'    => $base['cta_label'] ?? CTA_WHATSAPP_LABEL,
            'cta_message'  => str_replace('[Zona]', $ZE, $base['cta_message_zona'] ?? ('Hola! Vengo de la web, necesito ' . mb_strtolower($S) . ' en [Zona].')),
            'form_servicio' => $base['form_servicio'] ?? $S,
            'track'        => 'servicio-zona',
            'track_zona'   => $zona,
            'areas'        => $z['areas'],
            'service_type' => $S,
            'zona'         => $zona,
            'zona_nombre'  => $Z,
            'zona_datos'   => $z,
            'otros'        => $otros,
            'vecinos'      => $vecinos,
            'actualizado'  => date('Y-m-d', (int)filemtime('data/zonas/' . $zona . '.php')),
            'migas'        => [
                ['href' => $GLOBALS['url'], 'label' => 'Inicio'],
                ['href' => $GLOBALS['url'] . $servicio, 'label' => $base['nombre_corto'] ?? Local_Datos::SERVICIOS[$servicio]['nombre']],
                ['href' => $GLOBALS['url'] . 'zonas/' . $zona, 'label' => $Z],
                ['label' => $S . ' en ' . $ZE],
            ],
            'vista'        => 'local/servicio-zona',
        ];
        $this->renderServicio($l);
    }
}

<?php

require_once 'src/controlador/Local_Controller.php';

/**
 * Zonas: /zonas (directorio) y /zonas/{slug} (pagina de zona, ruta dinamica en App::RUTAS_DINAMICAS).
 * Los datos salen de Local_Datos::ZONAS y el texto unico de Zona_Texto.
 */
class Zonas_Controller extends Local_Controller
{
    public function index()
    {
        $this->cargarVista('paginas/zonas');
    }

    /** Title 45-60 caracteres: keyword + zona al inicio y un gancho si entra. */
    private static function tituloZona(string $Z): string
    {
        $t = 'Instalación de aire acondicionado en ' . $Z;
        foreach ([' - Técnicos locales', ' - Presupuesto'] as $gancho) {
            if (mb_strlen($t . $gancho) <= 60) return $t . $gancho;
        }
        return $t;
    }

    public function ver(string $slug = '')
    {
        $z = Local_Datos::ZONAS[$slug] ?? null;
        if (!$z) \benjamin\plantillaweb\libs\App::error404();

        $Z     = $z['nombre'];
        $cerca = Local_Datos::cercaTexto($slug);
        $esBalneario = $z['tipo'] === 'balneario';

        $l = [
            'slug'        => 'zonas/' . $slug,
            'path'        => '/zonas/' . $slug,
            'zona'        => $slug,
            'zona_nombre' => $Z,
            'zona_datos'  => $z,
            'h1'          => 'Instalación de aire acondicionado en ' . $Z,
            'title'       => self::tituloZona($Z),
            'description' => Zona_Texto::metaDescription($slug),
            'keywords'    => 'instalación aire acondicionado ' . mb_strtolower($Z) . ', técnico aire acondicionado ' . mb_strtolower($Z) . ', service aire acondicionado ' . mb_strtolower($Z) . ', split inverter ' . mb_strtolower($Z),
            'eyebrow'     => 'Técnicos en ' . $Z . ($cerca ? ', ' . $cerca : ''),
            'subtitle'    => Zona_Texto::subtitulo($slug),
            'cta_label'   => CTA_WHATSAPP_LABEL,
            'cta_message' => 'Hola! Vengo de la web, quiero instalar un aire acondicionado en ' . $Z . '.',
            'track'       => 'zona',
            'track_zona'  => $slug,
            'areas'       => $z['areas'],
            'service_type' => 'Instalación de aire acondicionado',
            'bloques'     => Zona_Texto::bloques($slug),
            'faq'         => Zona_Texto::faq($slug),
            'linderas'    => Local_Datos::linderas($slug),
            'migas'       => [
                ['href' => $GLOBALS['url'], 'label' => 'Inicio'],
                ['href' => $GLOBALS['url'] . 'zonas', 'label' => 'Zonas'],
                ['label' => $Z],
            ],
            'vista'       => 'local/zona',
        ];
        $this->renderServicio($l);
    }
}

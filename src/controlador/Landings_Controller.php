<?php

require_once 'src/controlador/Local_Controller.php';

/**
 * Paginas de un solo segmento (/split-inverter, /apartamentos, /como-funciona, ...).
 * Cada metodo publico se sirve como /{nombre-del-metodo-con-guiones} (ver App::CONTROLADORES_RAIZ).
 *
 * Las paginas pilar de servicio NO tienen metodo: se generan desde data/servicios/{slug}.php
 * para cada slug declarado en Local_Datos::SERVICIOS (ver registro()).
 */
class Landings_Controller extends Local_Controller
{
    /** Servicios pilar: /{slug} -> servicioPilar($slug), uno por archivo en data/servicios/ */
    protected static function registro(): array
    {
        $r = [];
        foreach (array_keys(self::servicios()) as $slug) {
            $r[str_replace('-', '_', $slug)] = ['servicioPilar', [$slug]];
        }
        return $r;
    }

    protected function servicioPilar(string $slug): void
    {
        $l = self::servicio($slug);
        if (!$l) \benjamin\plantillaweb\libs\App::error404();
        $this->renderServicio($l);
    }

    // ── PAGINAS DE SOPORTE ──────────────────────────────────────────────────

    /** /servicios: indice de todos los servicios (alias en App::RUTAS; el nombre evita chocar con Local_Controller::servicios()) */
    public function indice_servicios()
    {
        $this->cargarVista('paginas/servicios');
    }

    /** /como-funciona: como trabajamos, del primer mensaje a la garantia */
    public function como_funciona()
    {
        $this->cargarVista('paginas/como-funciona');
    }

    /** /preguntas-frecuentes: FAQ generales consolidadas (con FAQPage) */
    public function preguntas_frecuentes()
    {
        $faq = require 'data/faq-general.php';
        $this->cargarVista('paginas/preguntas-frecuentes', [
            'faq'          => $faq,
            'faq_schema'   => $this->buildFaqSchema($faq),
            'migas_schema' => $this->buildBreadcrumbSchema([['href' => $GLOBALS['url'], 'label' => 'Inicio'], ['label' => 'Preguntas frecuentes']]),
        ]);
    }

    /** /privacidad */
    public function privacidad()
    {
        $this->cargarVista('paginas/privacidad');
    }

    /** /terminos */
    public function terminos()
    {
        $this->cargarVista('paginas/terminos');
    }
}

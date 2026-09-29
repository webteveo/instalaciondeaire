<?php

/**
 * Landings generadas por datos.
 *
 * No hay un metodo por URL: App.php consulta _generadas() cuando el metodo no existe y sitemap.php las enumera.
 *  - Landings_Controller::registro(): un slug por archivo en data/servicios/ (paginas pilar /{slug}).
 *  - Local_Controller: Fase 2 (servicio x zona, /{servicio}/{zona}) via fase2Urls(); se enruta desde App::esServicioZona().
 */
require_once 'src/controlador/Local_Datos.php';

trait Local_Generadas
{
    /** Registro de landings generadas de este controlador: nombre_de_metodo => [metodo generador, args]. Sobrescribir. */
    protected static function registro(): array
    {
        return [];
    }

    /** Usado por sitemap.php y App.php */
    public static function _generadas(): array
    {
        return static::registro();
    }

    /** Despacha una landing generada. Devuelve false si no existe. */
    public function _generada(string $metodo): bool
    {
        $r = static::registro();
        if (!isset($r[$metodo])) return false;
        [$fn, $args] = $r[$metodo];
        $this->{$fn}(...$args);
        return true;
    }
}

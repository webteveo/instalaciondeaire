<?php

/**
 * DATOS DEL SITIO: servicios, zonas y Fase 2 (servicio x zona).
 *
 *  - SERVICIOS: paginas pilar de un segmento (/split-inverter, /apartamentos, ...). El contenido de cada una vive en
 *    data/servicios/{slug}.php. Agregar un servicio = sumar una entrada aca + crear su archivo de datos.
 *  - ZONAS: paginas /zonas/{slug}. Agregar una zona = sumar una entrada aca (el texto se arma solo en Zona_Texto).
 *  - FASE 2: landings /{servicio}/{zona} (ej. /apartamentos/pocitos). Quedan preparadas pero apagadas con FASE2_ACTIVA.
 *
 * Va en una clase aparte porque las constantes no pueden vivir en un trait en PHP < 8.2.
 */
final class Local_Datos
{
    // ── SERVICIOS (paginas pilar) ────────────────────────────────────────────
    /**
     * slug => [nombre corto (menus, footer), label (frase para links "X en Pocitos"), icono remixicon]
     * La home (/) es el pilar "Instalación de aire acondicionado" y vive en Index_Controller.
     */
    public const SERVICIOS = [
        'split-inverter'       => ['nombre' => 'Split inverter',              'label' => 'Instalación de split inverter',              'icono' => 'ri-windy-line'],
        'apartamentos'         => ['nombre' => 'Apartamentos',                'label' => 'Instalación en apartamentos',                'icono' => 'ri-building-2-line'],
        'mantenimiento'        => ['nombre' => 'Service y mantenimiento',     'label' => 'Service de aire acondicionado',              'icono' => 'ri-tools-line'],
        'reparacion'           => ['nombre' => 'Reparación',                  'label' => 'Reparación de aire acondicionado',           'icono' => 'ri-settings-3-line'],
        'carga-de-gas'         => ['nombre' => 'Carga de gas',                'label' => 'Carga de gas para aire acondicionado',       'icono' => 'ri-drop-line'],
        'desinstalacion'       => ['nombre' => 'Desinstalación y traslado',   'label' => 'Desinstalación y reinstalación',             'icono' => 'ri-truck-line'],
        'comercial'            => ['nombre' => 'Oficinas y comercios',        'label' => 'Climatización de oficinas y comercios',      'icono' => 'ri-store-2-line'],
        'preinstalacion'       => ['nombre' => 'Preinstalación en obra',      'label' => 'Preinstalación de aire acondicionado en obra', 'icono' => 'ri-building-4-line'],
        'calefaccion'          => ['nombre' => 'Calefacción',                 'label' => 'Calefacción con aire acondicionado',         'icono' => 'ri-sun-line'],
        'calculadora-frigorias'=> ['nombre' => 'Calculadora de frigorías',    'label' => 'Calculadora de frigorías',                   'icono' => 'ri-calculator-line'],
    ];

    /** Slug de la home cuando se la trata como servicio (Fase 2 y links "Instalación en {zona}"). */
    public const SERVICIO_HOME = 'instalacion';
    public const SERVICIO_HOME_NOMBRE = 'Instalación de aire acondicionado';

    // ── ZONAS (/zonas/{slug}) ────────────────────────────────────────────────
    /**
     * Cada zona:
     *   nombre, depto, tipo ('barrio' | 'ciudad' | 'balneario'),
     *   vivienda: 'apartamentos' (condensadora en balcon o fachada) | 'casas' (mas libertad de ubicacion) | 'mixto'
     *   costera: true = salitre (condensadora con proteccion anticorrosiva, service mas seguido)
     *   antiguo: true = edificios antiguos (revisar instalacion electrica, linea dedicada)
     *   temporada: true = casas y apartamentos de temporada (puesta a punto antes de diciembre, service al cierre)
     *   cerca: slugs de zonas linderas con pagina propia (links internos). Si una no existe, se ignora.
     *   refs: referencias del lugar para el texto. areas: nombres para areaServed del schema.
     *   principal: true = entra en la Fase 2 (servicio x zona).
     */
    public const ZONAS = [
        // ── Montevideo, edificios ──
        'pocitos' => [
            'nombre' => 'Pocitos', 'depto' => 'Montevideo', 'tipo' => 'barrio', 'vivienda' => 'apartamentos',
            'costera' => true, 'antiguo' => false, 'temporada' => false, 'principal' => true,
            'cerca' => ['punta-carretas', 'buceo', 'parque-batlle', 'cordon'],
            'refs' => 'la rambla, Bulevar España y la avenida Brasil',
            'areas' => ['Pocitos', 'Pocitos Nuevo', 'Villa Biarritz'],
        ],
        'punta-carretas' => [
            'nombre' => 'Punta Carretas', 'depto' => 'Montevideo', 'tipo' => 'barrio', 'vivienda' => 'apartamentos',
            'costera' => true, 'antiguo' => false, 'temporada' => false, 'principal' => true,
            'cerca' => ['pocitos', 'parque-rodo', 'cordon'],
            'refs' => 'la rambla, el shopping y la zona del faro',
            'areas' => ['Punta Carretas', 'Villa Biarritz'],
        ],
        'cordon' => [
            'nombre' => 'Cordón', 'depto' => 'Montevideo', 'tipo' => 'barrio', 'vivienda' => 'apartamentos',
            'costera' => false, 'antiguo' => true, 'temporada' => false, 'principal' => true,
            'cerca' => ['centro', 'tres-cruces', 'parque-rodo', 'pocitos'],
            'refs' => '18 de Julio, la Universidad y Tristán Narvaja',
            'areas' => ['Cordón', 'Cordón Norte', 'Palermo'],
        ],
        'centro' => [
            'nombre' => 'Centro', 'depto' => 'Montevideo', 'tipo' => 'barrio', 'vivienda' => 'apartamentos',
            'costera' => false, 'antiguo' => true, 'temporada' => false, 'principal' => true,
            'cerca' => ['cordon', 'parque-rodo', 'tres-cruces'],
            'refs' => '18 de Julio, la plaza Independencia y la Ciudad Vieja',
            'areas' => ['Centro', 'Ciudad Vieja', 'Barrio Sur', 'Aguada'],
        ],
        'parque-rodo' => [
            'nombre' => 'Parque Rodó', 'depto' => 'Montevideo', 'tipo' => 'barrio', 'vivienda' => 'apartamentos',
            'costera' => true, 'antiguo' => true, 'temporada' => false, 'principal' => true,
            'cerca' => ['punta-carretas', 'cordon', 'centro'],
            'refs' => 'el parque, la playa Ramírez y la Facultad de Ingeniería',
            'areas' => ['Parque Rodó', 'Palermo', 'Barrio Sur'],
        ],
        'tres-cruces' => [
            'nombre' => 'Tres Cruces', 'depto' => 'Montevideo', 'tipo' => 'barrio', 'vivienda' => 'apartamentos',
            'costera' => false, 'antiguo' => false, 'temporada' => false, 'principal' => true,
            'cerca' => ['cordon', 'parque-batlle', 'la-blanqueada', 'centro'],
            'refs' => 'la terminal, Bulevar Artigas y 8 de Octubre',
            'areas' => ['Tres Cruces', 'La Comercial', 'Larrañaga'],
        ],
        'buceo' => [
            'nombre' => 'Buceo', 'depto' => 'Montevideo', 'tipo' => 'barrio', 'vivienda' => 'apartamentos',
            'costera' => true, 'antiguo' => false, 'temporada' => false, 'principal' => true,
            'cerca' => ['pocitos', 'malvin', 'parque-batlle'],
            'refs' => 'el Montevideo Shopping, el puerto del Buceo y la rambla Armenia',
            'areas' => ['Buceo', 'Pocitos Nuevo', 'Parque Batlle'],
        ],
        // ── Montevideo, casas ──
        'malvin' => [
            'nombre' => 'Malvín', 'depto' => 'Montevideo', 'tipo' => 'barrio', 'vivienda' => 'casas',
            'costera' => true, 'antiguo' => false, 'temporada' => false, 'principal' => true,
            'cerca' => ['buceo', 'punta-gorda', 'carrasco'],
            'refs' => 'la rambla O\'Higgins, la avenida Italia y Malvín Norte',
            'areas' => ['Malvín', 'Malvín Norte', 'Malvín Nuevo'],
        ],
        'carrasco' => [
            'nombre' => 'Carrasco', 'depto' => 'Montevideo', 'tipo' => 'barrio', 'vivienda' => 'casas',
            'costera' => true, 'antiguo' => false, 'temporada' => false, 'principal' => true,
            'cerca' => ['punta-gorda', 'malvin', 'ciudad-de-la-costa'],
            'refs' => 'la rambla, la avenida Arocena y Carrasco Norte',
            'areas' => ['Carrasco', 'Carrasco Norte', 'Barra de Carrasco'],
        ],
        'punta-gorda' => [
            'nombre' => 'Punta Gorda', 'depto' => 'Montevideo', 'tipo' => 'barrio', 'vivienda' => 'casas',
            'costera' => true, 'antiguo' => false, 'temporada' => false, 'principal' => true,
            'cerca' => ['carrasco', 'malvin'],
            'refs' => 'la plaza Virgilio, la rambla y la avenida Bolivia',
            'areas' => ['Punta Gorda', 'Malvín Nuevo'],
        ],
        'prado' => [
            'nombre' => 'Prado', 'depto' => 'Montevideo', 'tipo' => 'barrio', 'vivienda' => 'casas',
            'costera' => false, 'antiguo' => true, 'temporada' => false, 'principal' => false,
            'cerca' => ['la-blanqueada', 'centro', 'la-paz'],
            'refs' => 'el parque, la avenida Agraciada y el Jardín Botánico',
            'areas' => ['Prado', 'Atahualpa', 'Capurro', 'Bella Vista'],
        ],
        'parque-batlle' => [
            'nombre' => 'Parque Batlle', 'depto' => 'Montevideo', 'tipo' => 'barrio', 'vivienda' => 'casas',
            'costera' => false, 'antiguo' => false, 'temporada' => false, 'principal' => false,
            'cerca' => ['buceo', 'tres-cruces', 'la-blanqueada', 'pocitos'],
            'refs' => 'el Estadio Centenario, la avenida Italia y Bulevar Artigas',
            'areas' => ['Parque Batlle', 'Villa Dolores', 'La Blanqueada'],
        ],
        'la-blanqueada' => [
            'nombre' => 'La Blanqueada', 'depto' => 'Montevideo', 'tipo' => 'barrio', 'vivienda' => 'casas',
            'costera' => false, 'antiguo' => false, 'temporada' => false, 'principal' => false,
            'cerca' => ['parque-batlle', 'tres-cruces', 'prado'],
            'refs' => '8 de Octubre, la avenida Italia y Larrañaga',
            'areas' => ['La Blanqueada', 'Larrañaga', 'Unión'],
        ],
        // ── Canelones ──
        'ciudad-de-la-costa' => [
            'nombre' => 'Ciudad de la Costa', 'depto' => 'Canelones', 'tipo' => 'ciudad', 'vivienda' => 'casas',
            'costera' => true, 'antiguo' => false, 'temporada' => false, 'principal' => false,
            'cerca' => ['carrasco', 'punta-gorda', 'pando', 'atlantida'],
            'refs' => 'la avenida Giannattasio, Solymar, Lagomar y El Pinar',
            'areas' => ['Ciudad de la Costa', 'Solymar', 'Lagomar', 'El Pinar', 'Shangrilá'],
        ],
        'las-piedras' => [
            'nombre' => 'Las Piedras', 'depto' => 'Canelones', 'tipo' => 'ciudad', 'vivienda' => 'casas',
            'costera' => false, 'antiguo' => false, 'temporada' => false, 'principal' => false,
            'cerca' => ['la-paz', 'canelones', 'pando'],
            'refs' => 'la avenida Artigas, el Hipódromo de Las Piedras y la ruta 5',
            'areas' => ['Las Piedras', '18 de Mayo', 'Progreso'],
        ],
        'la-paz' => [
            'nombre' => 'La Paz', 'depto' => 'Canelones', 'tipo' => 'ciudad', 'vivienda' => 'casas',
            'costera' => false, 'antiguo' => false, 'temporada' => false, 'principal' => false,
            'cerca' => ['las-piedras', 'canelones', 'prado'],
            'refs' => 'la avenida César Mayo Gutiérrez, la avenida Batlle y Ordóñez y la plaza de La Paz',
            'areas' => ['La Paz', 'Villa Colón', 'Lezica'],
        ],
        'pando' => [
            'nombre' => 'Pando', 'depto' => 'Canelones', 'tipo' => 'ciudad', 'vivienda' => 'casas',
            'costera' => false, 'antiguo' => false, 'temporada' => false, 'principal' => false,
            'cerca' => ['ciudad-de-la-costa', 'atlantida', 'las-piedras'],
            'refs' => 'la ruta 8, la ruta 75 y el Polo Tecnológico de Pando',
            'areas' => ['Pando', 'Barros Blancos', 'Empalme Olmos'],
        ],
        'atlantida' => [
            'nombre' => 'Atlántida', 'depto' => 'Canelones', 'tipo' => 'balneario', 'vivienda' => 'casas',
            'costera' => true, 'antiguo' => false, 'temporada' => true, 'principal' => false,
            'cerca' => ['ciudad-de-la-costa', 'pando', 'piriapolis'],
            'refs' => 'la rambla de Atlántida, la Interbalnearia y el arroyo Solís Chico',
            'areas' => ['Atlántida', 'Villa Argentina', 'Las Toscas', 'Parque del Plata', 'La Floresta', 'Estación Atlántida'],
        ],
        'canelones' => [
            'nombre' => 'Canelones', 'depto' => 'Canelones', 'tipo' => 'ciudad', 'vivienda' => 'casas',
            'costera' => false, 'antiguo' => false, 'temporada' => false, 'principal' => false,
            'cerca' => ['las-piedras', 'la-paz'],
            'refs' => 'la plaza 18 de Julio, la Catedral de Guadalupe y la ruta 5',
            'areas' => ['Canelones', 'Santa Lucía', 'Los Cerrillos', 'Juanicó'],
        ],
        // ── Maldonado ──
        'punta-del-este' => [
            'nombre' => 'Punta del Este', 'depto' => 'Maldonado', 'tipo' => 'balneario', 'vivienda' => 'mixto',
            'costera' => true, 'antiguo' => false, 'temporada' => true, 'principal' => false,
            'cerca' => ['maldonado', 'san-carlos', 'piriapolis'],
            'refs' => 'la península, la Brava, la Mansa y Roosevelt',
            'areas' => ['Punta del Este', 'La Barra', 'Manantiales', 'Punta Ballena', 'San Rafael'],
        ],
        'maldonado' => [
            'nombre' => 'Maldonado', 'depto' => 'Maldonado', 'tipo' => 'ciudad', 'vivienda' => 'mixto',
            'costera' => false, 'antiguo' => false, 'temporada' => true, 'principal' => false,
            'cerca' => ['punta-del-este', 'san-carlos', 'piriapolis'],
            'refs' => 'el centro, Cerro Pelado, Pinares y la avenida Aiguá',
            'areas' => ['Maldonado', 'Pinares', 'Cerro Pelado', 'Maldonado Nuevo'],
        ],
        'piriapolis' => [
            'nombre' => 'Piriápolis', 'depto' => 'Maldonado', 'tipo' => 'balneario', 'vivienda' => 'mixto',
            'costera' => true, 'antiguo' => false, 'temporada' => true, 'principal' => false,
            'cerca' => ['maldonado', 'punta-del-este', 'san-carlos', 'atlantida'],
            'refs' => 'la Rambla de los Argentinos, el Argentino Hotel y el cerro San Antonio',
            'areas' => ['Piriápolis', 'Playa Hermosa', 'Playa Verde', 'Punta Colorada', 'Pan de Azúcar'],
        ],
        'san-carlos' => [
            'nombre' => 'San Carlos', 'depto' => 'Maldonado', 'tipo' => 'ciudad', 'vivienda' => 'casas',
            'costera' => false, 'antiguo' => false, 'temporada' => false, 'principal' => false,
            'cerca' => ['maldonado', 'punta-del-este', 'piriapolis'],
            'refs' => 'la plaza Artigas, la ruta 9 y la ruta 39',
            'areas' => ['San Carlos'],
        ],
    ];

    /** Nombre legible de cada departamento (para agrupar en /zonas y en el schema). */
    public const DEPARTAMENTOS = ['Montevideo' => 'Montevideo', 'Canelones' => 'Canelones', 'Maldonado' => 'Maldonado'];

    // ── FASE 2: servicio x zona (/{servicio}/{zona}) ─────────────────────────
    /** false = no se sirven, no van al sitemap ni se enlazan. Poner en true para publicarlas. */
    public const FASE2_ACTIVA = false;

    /** Servicios que tendran landing por zona. 'instalacion' es la home tratada como servicio. */
    public const FASE2_SERVICIOS = [
        'instalacion'  => 'Instalación de aire acondicionado',
        'apartamentos' => 'Instalación de aire acondicionado en apartamentos',
        'reparacion'   => 'Reparación de aire acondicionado',
    ];

    /** Zonas de la Fase 2: las marcadas con 'principal' => true en ZONAS (10 barrios de Montevideo). */
    public static function zonasFase2(): array
    {
        return array_filter(self::ZONAS, fn($z) => !empty($z['principal']));
    }

    // ── Helpers ──────────────────────────────────────────────────────────────

    /** Zonas agrupadas por departamento: ['Montevideo' => ['pocitos' => [...], ...], ...] */
    public static function zonasPorDepto(): array
    {
        $out = [];
        foreach (self::ZONAS as $k => $z) $out[$z['depto']][$k] = $z;
        return $out;
    }

    /** Zonas linderas con pagina propia: slug => nombre */
    public static function linderas(string $slug): array
    {
        $out = [];
        foreach (self::ZONAS[$slug]['cerca'] ?? [] as $c) {
            if (isset(self::ZONAS[$c])) $out[$c] = self::ZONAS[$c]['nombre'];
        }
        return $out;
    }

    /** "Punta Carretas, Buceo y Parque Batlle" a partir de las zonas linderas */
    public static function cercaTexto(string $slug): string
    {
        $n = array_values(self::linderas($slug));
        if (!$n) return '';
        if (count($n) === 1) return $n[0];
        $last = array_pop($n);
        return implode(', ', $n) . ' y ' . $last;
    }

    /** Nombres de todas las zonas de un departamento (para areaServed) */
    public static function nombresDepto(string $depto): array
    {
        $out = [];
        foreach (self::ZONAS as $z) if ($z['depto'] === $depto) $out[] = $z['nombre'];
        return $out;
    }
}

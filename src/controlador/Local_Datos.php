<?php

/**
 * DATOS DEL SITIO: servicios, zonas y Fase 2 (servicio x zona).
 *
 *  - SERVICIOS: paginas pilar de un segmento (/split-inverter, /apartamentos, ...). El contenido de cada una vive en
 *    data/servicios/{slug}.php. Agregar un servicio = sumar una entrada aca + crear su archivo de datos.
 *  - ZONAS: los 62 barrios de Montevideo + localidades de Canelones y Maldonado. Una zona tiene pagina (/zonas/{slug})
 *    cuando tiene su texto propio en data/zonas/{slug}.php (ver contenido()).
 *  - SERVICIO x ZONA: /{servicio}/{zona} (ej. /mantenimiento/pocitos) para los servicios de FASE2_SERVICIOS,
 *    solo si data/zonas/{zona}.php trae el texto de ese servicio.
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
     *   region: grupo para los indices (ver REGIONES). oficial: nombre oficial de la Intendencia si es distinto.
     */
    public const ZONAS = [
        // ════ MONTEVIDEO: los 62 barrios oficiales de la Intendencia ════
        // ── Centro y Ciudad Vieja ──
        'ciudad-vieja' => [
            'nombre' => 'Ciudad Vieja', 'depto' => 'Montevideo', 'region' => 'centro', 'tipo' => 'barrio', 'vivienda' => 'apartamentos',
            'costera' => true, 'antiguo' => true, 'temporada' => false,
            'cerca' => ['centro', 'barrio-sur', 'aguada'],
            'refs' => 'la peatonal Sarandí, la plaza Matriz y el puerto',
            'areas' => ['Ciudad Vieja'],
        ],
        'centro' => [
            'nombre' => 'Centro', 'depto' => 'Montevideo', 'region' => 'centro', 'tipo' => 'barrio', 'vivienda' => 'apartamentos',
            'costera' => false, 'antiguo' => true, 'temporada' => false,
            'cerca' => ['ciudad-vieja', 'cordon', 'barrio-sur', 'aguada'],
            'refs' => '18 de Julio, la plaza Independencia y la plaza Cagancha',
            'areas' => ['Centro'],
        ],
        'barrio-sur' => [
            'nombre' => 'Barrio Sur', 'depto' => 'Montevideo', 'region' => 'centro', 'tipo' => 'barrio', 'vivienda' => 'mixto',
            'costera' => true, 'antiguo' => true, 'temporada' => false,
            'cerca' => ['ciudad-vieja', 'centro', 'palermo'],
            'refs' => 'la rambla Gran Bretaña, la calle Durazno y el Cementerio Central',
            'areas' => ['Barrio Sur'],
        ],
        'palermo' => [
            'nombre' => 'Palermo', 'depto' => 'Montevideo', 'region' => 'centro', 'tipo' => 'barrio', 'vivienda' => 'mixto',
            'costera' => true, 'antiguo' => true, 'temporada' => false,
            'cerca' => ['barrio-sur', 'cordon', 'parque-rodo'],
            'refs' => 'la rambla, la calle Isla de Flores y la avenida Gonzalo Ramírez',
            'areas' => ['Palermo'],
        ],
        'cordon' => [
            'nombre' => 'Cordón', 'depto' => 'Montevideo', 'region' => 'centro', 'tipo' => 'barrio', 'vivienda' => 'apartamentos',
            'costera' => false, 'antiguo' => true, 'temporada' => false,
            'cerca' => ['centro', 'tres-cruces', 'parque-rodo', 'palermo', 'la-comercial'],
            'refs' => '18 de Julio, la Universidad y Tristán Narvaja',
            'areas' => ['Cordón', 'Cordón Norte'],
        ],
        'parque-rodo' => [
            'nombre' => 'Parque Rodó', 'depto' => 'Montevideo', 'region' => 'centro', 'tipo' => 'barrio', 'vivienda' => 'apartamentos',
            'costera' => true, 'antiguo' => true, 'temporada' => false,
            'cerca' => ['punta-carretas', 'palermo', 'cordon', 'pocitos'],
            'refs' => 'el parque, la playa Ramírez y la Facultad de Ingeniería',
            'areas' => ['Parque Rodó'],
        ],
        'aguada' => [
            'nombre' => 'Aguada', 'depto' => 'Montevideo', 'region' => 'centro', 'tipo' => 'barrio', 'vivienda' => 'mixto',
            'costera' => false, 'antiguo' => true, 'temporada' => false,
            'cerca' => ['centro', 'cordon', 'villa-munoz', 'reducto', 'capurro'],
            'refs' => 'el Palacio Legislativo, la avenida del Libertador y la Torre de las Telecomunicaciones',
            'areas' => ['Aguada', 'Arroyo Seco'],
        ],
        'tres-cruces' => [
            'nombre' => 'Tres Cruces', 'depto' => 'Montevideo', 'region' => 'centro', 'tipo' => 'barrio', 'vivienda' => 'apartamentos',
            'costera' => false, 'antiguo' => false, 'temporada' => false,
            'cerca' => ['cordon', 'la-comercial', 'larranaga', 'la-blanqueada', 'parque-batlle'],
            'refs' => 'la terminal, Bulevar Artigas y 8 de Octubre',
            'areas' => ['Tres Cruces'],
        ],
        'la-comercial' => [
            'nombre' => 'La Comercial', 'depto' => 'Montevideo', 'region' => 'centro', 'tipo' => 'barrio', 'vivienda' => 'mixto',
            'costera' => false, 'antiguo' => true, 'temporada' => false,
            'cerca' => ['cordon', 'tres-cruces', 'villa-munoz', 'la-figurita', 'larranaga'],
            'refs' => 'la avenida General Flores y Bulevar Artigas',
            'areas' => ['La Comercial'],
        ],
        'villa-munoz' => [
            'nombre' => 'Villa Muñoz', 'oficial' => 'Villa Muñoz–Retiro', 'depto' => 'Montevideo', 'region' => 'centro', 'tipo' => 'barrio', 'vivienda' => 'mixto',
            'costera' => false, 'antiguo' => true, 'temporada' => false,
            'cerca' => ['la-comercial', 'aguada', 'reducto', 'la-figurita'],
            'refs' => 'la zona de Goes y la avenida General Flores',
            'areas' => ['Villa Muñoz', 'Goes', 'Retiro'],
        ],
        // ── Costa este: de Punta Carretas a Carrasco ──
        'punta-carretas' => [
            'nombre' => 'Punta Carretas', 'depto' => 'Montevideo', 'region' => 'costa', 'tipo' => 'barrio', 'vivienda' => 'apartamentos',
            'costera' => true, 'antiguo' => false, 'temporada' => false,
            'cerca' => ['pocitos', 'parque-rodo', 'cordon'],
            'refs' => 'la rambla, el shopping y la zona del faro',
            'areas' => ['Punta Carretas', 'Villa Biarritz'],
        ],
        'pocitos' => [
            'nombre' => 'Pocitos', 'depto' => 'Montevideo', 'region' => 'costa', 'tipo' => 'barrio', 'vivienda' => 'apartamentos',
            'costera' => true, 'antiguo' => false, 'temporada' => false,
            'cerca' => ['punta-carretas', 'buceo', 'parque-batlle', 'parque-rodo'],
            'refs' => 'la rambla, Bulevar España y la avenida Brasil',
            'areas' => ['Pocitos', 'Pocitos Nuevo', 'Villa Biarritz'],
        ],
        'buceo' => [
            'nombre' => 'Buceo', 'depto' => 'Montevideo', 'region' => 'costa', 'tipo' => 'barrio', 'vivienda' => 'apartamentos',
            'costera' => true, 'antiguo' => false, 'temporada' => false,
            'cerca' => ['pocitos', 'malvin', 'parque-batlle', 'union'],
            'refs' => 'el Montevideo Shopping, el puerto del Buceo y la rambla Armenia',
            'areas' => ['Buceo', 'Pocitos Nuevo'],
        ],
        'parque-batlle' => [
            'nombre' => 'Parque Batlle', 'oficial' => 'Parque Batlle–Villa Dolores', 'depto' => 'Montevideo', 'region' => 'costa', 'tipo' => 'barrio', 'vivienda' => 'casas',
            'costera' => false, 'antiguo' => false, 'temporada' => false,
            'cerca' => ['buceo', 'tres-cruces', 'la-blanqueada', 'pocitos', 'union'],
            'refs' => 'el Estadio Centenario, la avenida Italia y Bulevar Artigas',
            'areas' => ['Parque Batlle', 'Villa Dolores'],
        ],
        'malvin' => [
            'nombre' => 'Malvín', 'depto' => 'Montevideo', 'region' => 'costa', 'tipo' => 'barrio', 'vivienda' => 'casas',
            'costera' => true, 'antiguo' => false, 'temporada' => false,
            'cerca' => ['buceo', 'punta-gorda', 'malvin-norte'],
            'refs' => 'la rambla O\'Higgins, la avenida Italia y la playa Malvín',
            'areas' => ['Malvín', 'Malvín Nuevo'],
        ],
        'malvin-norte' => [
            'nombre' => 'Malvín Norte', 'depto' => 'Montevideo', 'region' => 'costa', 'tipo' => 'barrio', 'vivienda' => 'mixto',
            'costera' => false, 'antiguo' => false, 'temporada' => false,
            'cerca' => ['malvin', 'las-canteras', 'union', 'buceo'],
            'refs' => 'la avenida Italia, la Facultad de Ciencias y los complejos de vivienda',
            'areas' => ['Malvín Norte'],
        ],
        'punta-gorda' => [
            'nombre' => 'Punta Gorda', 'depto' => 'Montevideo', 'region' => 'costa', 'tipo' => 'barrio', 'vivienda' => 'casas',
            'costera' => true, 'antiguo' => false, 'temporada' => false,
            'cerca' => ['malvin', 'carrasco', 'las-canteras'],
            'refs' => 'la plaza Virgilio, la rambla y la avenida Bolivia',
            'areas' => ['Punta Gorda'],
        ],
        'carrasco' => [
            'nombre' => 'Carrasco', 'depto' => 'Montevideo', 'region' => 'costa', 'tipo' => 'barrio', 'vivienda' => 'casas',
            'costera' => true, 'antiguo' => false, 'temporada' => false,
            'cerca' => ['punta-gorda', 'carrasco-norte', 'ciudad-de-la-costa'],
            'refs' => 'la rambla, la avenida Arocena y el Hotel Carrasco',
            'areas' => ['Carrasco', 'Barra de Carrasco'],
        ],
        'carrasco-norte' => [
            'nombre' => 'Carrasco Norte', 'depto' => 'Montevideo', 'region' => 'costa', 'tipo' => 'barrio', 'vivienda' => 'casas',
            'costera' => false, 'antiguo' => false, 'temporada' => false,
            'cerca' => ['carrasco', 'las-canteras', 'banados-de-carrasco', 'punta-gorda'],
            'refs' => 'la avenida Italia, Camino Carrasco y la avenida Bolivia',
            'areas' => ['Carrasco Norte'],
        ],
        // ── Este y noreste ──
        'la-blanqueada' => [
            'nombre' => 'La Blanqueada', 'depto' => 'Montevideo', 'region' => 'este', 'tipo' => 'barrio', 'vivienda' => 'casas',
            'costera' => false, 'antiguo' => false, 'temporada' => false,
            'cerca' => ['parque-batlle', 'tres-cruces', 'larranaga', 'union', 'mercado-modelo'],
            'refs' => '8 de Octubre, la avenida Italia y el Hospital Italiano',
            'areas' => ['La Blanqueada'],
        ],
        'union' => [
            'nombre' => 'Unión', 'depto' => 'Montevideo', 'region' => 'este', 'tipo' => 'barrio', 'vivienda' => 'mixto',
            'costera' => false, 'antiguo' => true, 'temporada' => false,
            'cerca' => ['la-blanqueada', 'villa-espanola', 'maronas', 'malvin-norte', 'buceo'],
            'refs' => 'la avenida 8 de Octubre, la plaza de la Villa de la Unión y el Hospital Pasteur',
            'areas' => ['Unión'],
        ],
        'villa-espanola' => [
            'nombre' => 'Villa Española', 'depto' => 'Montevideo', 'region' => 'este', 'tipo' => 'barrio', 'vivienda' => 'casas',
            'costera' => false, 'antiguo' => true, 'temporada' => false,
            'cerca' => ['union', 'mercado-modelo', 'castro-perez-castellanos', 'maronas'],
            'refs' => 'la avenida José Pedro Varela, el Antel Arena y la vieja fábrica de Funsa',
            'areas' => ['Villa Española'],
        ],
        'mercado-modelo' => [
            'nombre' => 'Mercado Modelo', 'oficial' => 'Mercado Modelo–Bolívar', 'depto' => 'Montevideo', 'region' => 'este', 'tipo' => 'barrio', 'vivienda' => 'mixto',
            'costera' => false, 'antiguo' => true, 'temporada' => false,
            'cerca' => ['la-blanqueada', 'villa-espanola', 'castro-perez-castellanos', 'larranaga', 'cerrito'],
            'refs' => 'el edificio del ex Mercado Modelo y la avenida José Pedro Varela',
            'areas' => ['Mercado Modelo', 'Bolívar'],
        ],
        'castro-perez-castellanos' => [
            'nombre' => 'Castro y Pérez Castellanos', 'oficial' => 'Castro–Pérez Castellanos', 'depto' => 'Montevideo', 'region' => 'este', 'tipo' => 'barrio', 'vivienda' => 'casas',
            'costera' => false, 'antiguo' => false, 'temporada' => false,
            'cerca' => ['mercado-modelo', 'cerrito', 'villa-espanola', 'ituzaingo'],
            'refs' => 'el tramo entre el Cerrito y Villa Española',
            'areas' => ['Castro', 'Pérez Castellanos'],
        ],
        'maronas' => [
            'nombre' => 'Maroñas', 'oficial' => 'Maroñas–Parque Guaraní', 'depto' => 'Montevideo', 'region' => 'este', 'tipo' => 'barrio', 'vivienda' => 'casas',
            'costera' => false, 'antiguo' => false, 'temporada' => false,
            'cerca' => ['flor-de-maronas', 'ituzaingo', 'union', 'villa-espanola', 'jardines-del-hipodromo'],
            'refs' => 'el Hipódromo de Maroñas y la avenida 8 de Octubre',
            'areas' => ['Maroñas', 'Parque Guaraní'],
        ],
        'flor-de-maronas' => [
            'nombre' => 'Flor de Maroñas', 'depto' => 'Montevideo', 'region' => 'este', 'tipo' => 'barrio', 'vivienda' => 'casas',
            'costera' => false, 'antiguo' => false, 'temporada' => false,
            'cerca' => ['maronas', 'jardines-del-hipodromo', 'las-canteras', 'punta-de-rieles'],
            'refs' => 'la zona al este del Hipódromo de Maroñas',
            'areas' => ['Flor de Maroñas'],
        ],
        'ituzaingo' => [
            'nombre' => 'Ituzaingó', 'depto' => 'Montevideo', 'region' => 'este', 'tipo' => 'barrio', 'vivienda' => 'casas',
            'costera' => false, 'antiguo' => false, 'temporada' => false,
            'cerca' => ['maronas', 'jardines-del-hipodromo', 'castro-perez-castellanos', 'villa-espanola'],
            'refs' => 'la zona al norte de Maroñas',
            'areas' => ['Ituzaingó'],
        ],
        'jardines-del-hipodromo' => [
            'nombre' => 'Jardines del Hipódromo', 'depto' => 'Montevideo', 'region' => 'este', 'tipo' => 'barrio', 'vivienda' => 'casas',
            'costera' => false, 'antiguo' => false, 'temporada' => false,
            'cerca' => ['maronas', 'ituzaingo', 'piedras-blancas', 'punta-de-rieles', 'flor-de-maronas'],
            'refs' => 'la zona al norte del Hipódromo de Maroñas',
            'areas' => ['Jardines del Hipódromo'],
        ],
        'las-canteras' => [
            'nombre' => 'Las Canteras', 'depto' => 'Montevideo', 'region' => 'este', 'tipo' => 'barrio', 'vivienda' => 'casas',
            'costera' => false, 'antiguo' => false, 'temporada' => false,
            'cerca' => ['malvin-norte', 'carrasco-norte', 'punta-gorda', 'flor-de-maronas', 'punta-de-rieles'],
            'refs' => 'Camino Carrasco y el Parque Rivera',
            'areas' => ['Las Canteras'],
        ],
        'punta-de-rieles' => [
            'nombre' => 'Punta de Rieles', 'oficial' => 'Punta de Rieles–Bella Italia', 'depto' => 'Montevideo', 'region' => 'este', 'tipo' => 'barrio', 'vivienda' => 'casas',
            'costera' => false, 'antiguo' => false, 'temporada' => false,
            'cerca' => ['jardines-del-hipodromo', 'flor-de-maronas', 'banados-de-carrasco', 'villa-garcia', 'las-canteras'],
            'refs' => 'Camino Maldonado y Bella Italia',
            'areas' => ['Punta de Rieles', 'Bella Italia'],
        ],
        'banados-de-carrasco' => [
            'nombre' => 'Bañados de Carrasco', 'depto' => 'Montevideo', 'region' => 'este', 'tipo' => 'barrio', 'vivienda' => 'casas',
            'costera' => false, 'antiguo' => false, 'temporada' => false,
            'cerca' => ['carrasco-norte', 'punta-de-rieles', 'las-canteras', 'villa-garcia'],
            'refs' => 'Camino Carrasco, el arroyo Carrasco y los humedales',
            'areas' => ['Bañados de Carrasco'],
        ],
        'villa-garcia' => [
            'nombre' => 'Villa García', 'oficial' => 'Villa García–Manga Rural', 'depto' => 'Montevideo', 'region' => 'este', 'tipo' => 'barrio', 'vivienda' => 'casas',
            'costera' => false, 'antiguo' => false, 'temporada' => false,
            'cerca' => ['punta-de-rieles', 'manga', 'banados-de-carrasco', 'piedras-blancas'],
            'refs' => 'la ruta 8 y Camino Maldonado',
            'areas' => ['Villa García', 'Manga Rural'],
        ],
        // ── Norte ──
        'larranaga' => [
            'nombre' => 'Larrañaga', 'depto' => 'Montevideo', 'region' => 'norte', 'tipo' => 'barrio', 'vivienda' => 'casas',
            'costera' => false, 'antiguo' => false, 'temporada' => false,
            'cerca' => ['tres-cruces', 'la-blanqueada', 'jacinto-vera', 'la-comercial', 'mercado-modelo'],
            'refs' => 'Bulevar Artigas y la avenida Luis Alberto de Herrera',
            'areas' => ['Larrañaga'],
        ],
        'la-figurita' => [
            'nombre' => 'La Figurita', 'depto' => 'Montevideo', 'region' => 'norte', 'tipo' => 'barrio', 'vivienda' => 'casas',
            'costera' => false, 'antiguo' => true, 'temporada' => false,
            'cerca' => ['villa-munoz', 'jacinto-vera', 'la-comercial', 'reducto'],
            'refs' => 'la avenida General Flores y la avenida Garibaldi',
            'areas' => ['La Figurita'],
        ],
        'jacinto-vera' => [
            'nombre' => 'Jacinto Vera', 'depto' => 'Montevideo', 'region' => 'norte', 'tipo' => 'barrio', 'vivienda' => 'casas',
            'costera' => false, 'antiguo' => true, 'temporada' => false,
            'cerca' => ['la-figurita', 'larranaga', 'brazo-oriental', 'cerrito'],
            'refs' => 'la avenida Garibaldi y la avenida General Flores',
            'areas' => ['Jacinto Vera'],
        ],
        'reducto' => [
            'nombre' => 'Reducto', 'depto' => 'Montevideo', 'region' => 'norte', 'tipo' => 'barrio', 'vivienda' => 'mixto',
            'costera' => false, 'antiguo' => true, 'temporada' => false,
            'cerca' => ['aguada', 'atahualpa', 'prado', 'villa-munoz', 'la-figurita'],
            'refs' => 'la avenida San Martín y la avenida Millán',
            'areas' => ['Reducto'],
        ],
        'brazo-oriental' => [
            'nombre' => 'Brazo Oriental', 'depto' => 'Montevideo', 'region' => 'norte', 'tipo' => 'barrio', 'vivienda' => 'casas',
            'costera' => false, 'antiguo' => true, 'temporada' => false,
            'cerca' => ['atahualpa', 'jacinto-vera', 'aires-puros', 'cerrito'],
            'refs' => 'la avenida San Martín y el brazo oriental del arroyo Miguelete',
            'areas' => ['Brazo Oriental'],
        ],
        'atahualpa' => [
            'nombre' => 'Atahualpa', 'depto' => 'Montevideo', 'region' => 'norte', 'tipo' => 'barrio', 'vivienda' => 'casas',
            'costera' => false, 'antiguo' => true, 'temporada' => false,
            'cerca' => ['prado', 'reducto', 'brazo-oriental', 'paso-de-las-duranas', 'aires-puros'],
            'refs' => 'la avenida Millán y el arroyo Miguelete',
            'areas' => ['Atahualpa'],
        ],
        'cerrito' => [
            'nombre' => 'Cerrito', 'depto' => 'Montevideo', 'region' => 'norte', 'tipo' => 'barrio', 'vivienda' => 'casas',
            'costera' => false, 'antiguo' => false, 'temporada' => false,
            'cerca' => ['castro-perez-castellanos', 'las-acacias', 'brazo-oriental', 'jacinto-vera', 'mercado-modelo'],
            'refs' => 'el Cerrito de la Victoria y la avenida General Flores',
            'areas' => ['Cerrito de la Victoria'],
        ],
        'aires-puros' => [
            'nombre' => 'Aires Puros', 'depto' => 'Montevideo', 'region' => 'norte', 'tipo' => 'barrio', 'vivienda' => 'casas',
            'costera' => false, 'antiguo' => false, 'temporada' => false,
            'cerca' => ['las-acacias', 'casavalle', 'paso-de-las-duranas', 'brazo-oriental', 'atahualpa'],
            'refs' => 'la zona entre la avenida San Martín y la avenida Millán',
            'areas' => ['Aires Puros'],
        ],
        'las-acacias' => [
            'nombre' => 'Las Acacias', 'depto' => 'Montevideo', 'region' => 'norte', 'tipo' => 'barrio', 'vivienda' => 'casas',
            'costera' => false, 'antiguo' => false, 'temporada' => false,
            'cerca' => ['casavalle', 'aires-puros', 'cerrito', 'piedras-blancas'],
            'refs' => 'la avenida San Martín y la zona de Burgues',
            'areas' => ['Las Acacias'],
        ],
        'casavalle' => [
            'nombre' => 'Casavalle', 'depto' => 'Montevideo', 'region' => 'norte', 'tipo' => 'barrio', 'vivienda' => 'mixto',
            'costera' => false, 'antiguo' => false, 'temporada' => false,
            'cerca' => ['las-acacias', 'aires-puros', 'piedras-blancas', 'manga-toledo-chico', 'penarol'],
            'refs' => 'la avenida San Martín, el Borro y los complejos de vivienda',
            'areas' => ['Casavalle', 'Borro'],
        ],
        'piedras-blancas' => [
            'nombre' => 'Piedras Blancas', 'depto' => 'Montevideo', 'region' => 'norte', 'tipo' => 'barrio', 'vivienda' => 'casas',
            'costera' => false, 'antiguo' => false, 'temporada' => false,
            'cerca' => ['casavalle', 'manga', 'jardines-del-hipodromo', 'las-acacias', 'villa-garcia'],
            'refs' => 'la avenida José Belloni y la avenida Don Pedro de Mendoza',
            'areas' => ['Piedras Blancas'],
        ],
        'manga' => [
            'nombre' => 'Manga', 'depto' => 'Montevideo', 'region' => 'norte', 'tipo' => 'barrio', 'vivienda' => 'casas',
            'costera' => false, 'antiguo' => false, 'temporada' => false,
            'cerca' => ['piedras-blancas', 'manga-toledo-chico', 'villa-garcia'],
            'refs' => 'la avenida José Belloni y las chacras del norte',
            'areas' => ['Manga'],
        ],
        'manga-toledo-chico' => [
            'nombre' => 'Toledo Chico', 'oficial' => 'Manga–Toledo Chico', 'depto' => 'Montevideo', 'region' => 'norte', 'tipo' => 'barrio', 'vivienda' => 'casas',
            'costera' => false, 'antiguo' => false, 'temporada' => false,
            'cerca' => ['manga', 'casavalle', 'piedras-blancas', 'abayuba'],
            'refs' => 'las chacras y quintas del límite con Canelones',
            'areas' => ['Toledo Chico', 'Manga'],
        ],
        'paso-de-las-duranas' => [
            'nombre' => 'Paso de las Duranas', 'depto' => 'Montevideo', 'region' => 'norte', 'tipo' => 'barrio', 'vivienda' => 'casas',
            'costera' => false, 'antiguo' => false, 'temporada' => false,
            'cerca' => ['atahualpa', 'aires-puros', 'penarol', 'sayago', 'prado'],
            'refs' => 'la avenida Millán y el arroyo Miguelete',
            'areas' => ['Paso de las Duranas'],
        ],
        'penarol' => [
            'nombre' => 'Peñarol', 'oficial' => 'Peñarol–Lavalleja', 'depto' => 'Montevideo', 'region' => 'norte', 'tipo' => 'barrio', 'vivienda' => 'casas',
            'costera' => false, 'antiguo' => true, 'temporada' => false,
            'cerca' => ['sayago', 'paso-de-las-duranas', 'colon', 'conciliacion', 'casavalle'],
            'refs' => 'los viejos talleres del ferrocarril y las casas del barrio histórico',
            'areas' => ['Peñarol', 'Lavalleja'],
        ],
        'colon' => [
            'nombre' => 'Colón', 'oficial' => 'Colón Centro y Noroeste', 'depto' => 'Montevideo', 'region' => 'norte', 'tipo' => 'barrio', 'vivienda' => 'casas',
            'costera' => false, 'antiguo' => false, 'temporada' => false,
            'cerca' => ['lezica', 'abayuba', 'penarol', 'la-paz', 'conciliacion'],
            'refs' => 'la avenida Garzón y la estación Colón',
            'areas' => ['Colón'],
        ],
        'abayuba' => [
            'nombre' => 'Abayubá', 'oficial' => 'Colón Sureste–Abayubá', 'depto' => 'Montevideo', 'region' => 'norte', 'tipo' => 'barrio', 'vivienda' => 'casas',
            'costera' => false, 'antiguo' => false, 'temporada' => false,
            'cerca' => ['colon', 'penarol', 'manga-toledo-chico', 'casavalle'],
            'refs' => 'Colón Sureste y Abayubá',
            'areas' => ['Abayubá', 'Colón Sureste'],
        ],
        'lezica' => [
            'nombre' => 'Lezica', 'oficial' => 'Lezica–Melilla', 'depto' => 'Montevideo', 'region' => 'norte', 'tipo' => 'barrio', 'vivienda' => 'casas',
            'costera' => false, 'antiguo' => false, 'temporada' => false,
            'cerca' => ['colon', 'paso-de-la-arena', 'la-paz'],
            'refs' => 'la avenida Lezica, Camino Melilla y el aeródromo de Melilla',
            'areas' => ['Lezica', 'Melilla'],
        ],
        // ── Oeste ──
        'prado' => [
            'nombre' => 'Prado', 'oficial' => 'Prado–Nueva Savona', 'depto' => 'Montevideo', 'region' => 'oeste', 'tipo' => 'barrio', 'vivienda' => 'casas',
            'costera' => false, 'antiguo' => true, 'temporada' => false,
            'cerca' => ['capurro', 'atahualpa', 'reducto', 'belvedere', 'paso-de-las-duranas'],
            'refs' => 'el parque, la avenida Agraciada y el Jardín Botánico',
            'areas' => ['Prado', 'Nueva Savona'],
        ],
        'capurro' => [
            'nombre' => 'Capurro', 'oficial' => 'Capurro–Bella Vista', 'depto' => 'Montevideo', 'region' => 'oeste', 'tipo' => 'barrio', 'vivienda' => 'mixto',
            'costera' => false, 'antiguo' => true, 'temporada' => false,
            'cerca' => ['prado', 'la-teja', 'aguada', 'belvedere'],
            'refs' => 'el parque Capurro, la bahía y Bella Vista',
            'areas' => ['Capurro', 'Bella Vista'],
        ],
        'la-teja' => [
            'nombre' => 'La Teja', 'depto' => 'Montevideo', 'region' => 'oeste', 'tipo' => 'barrio', 'vivienda' => 'casas',
            'costera' => false, 'antiguo' => true, 'temporada' => false,
            'cerca' => ['capurro', 'belvedere', 'tres-ombues', 'villa-del-cerro'],
            'refs' => 'la refinería de ANCAP y el arroyo Pantanoso',
            'areas' => ['La Teja'],
        ],
        'belvedere' => [
            'nombre' => 'Belvedere', 'depto' => 'Montevideo', 'region' => 'oeste', 'tipo' => 'barrio', 'vivienda' => 'casas',
            'costera' => false, 'antiguo' => true, 'temporada' => false,
            'cerca' => ['la-teja', 'nuevo-paris', 'prado', 'sayago', 'tres-ombues'],
            'refs' => 'la avenida Carlos María Ramírez',
            'areas' => ['Belvedere'],
        ],
        'nuevo-paris' => [
            'nombre' => 'Nuevo París', 'depto' => 'Montevideo', 'region' => 'oeste', 'tipo' => 'barrio', 'vivienda' => 'casas',
            'costera' => false, 'antiguo' => false, 'temporada' => false,
            'cerca' => ['belvedere', 'conciliacion', 'sayago', 'tres-ombues', 'paso-de-la-arena'],
            'refs' => 'la zona entre Belvedere y el arroyo Pantanoso',
            'areas' => ['Nuevo París'],
        ],
        'sayago' => [
            'nombre' => 'Sayago', 'depto' => 'Montevideo', 'region' => 'oeste', 'tipo' => 'barrio', 'vivienda' => 'casas',
            'costera' => false, 'antiguo' => false, 'temporada' => false,
            'cerca' => ['penarol', 'paso-de-las-duranas', 'conciliacion', 'belvedere', 'nuevo-paris'],
            'refs' => 'la estación Sayago y la avenida Millán',
            'areas' => ['Sayago'],
        ],
        'conciliacion' => [
            'nombre' => 'Conciliación', 'depto' => 'Montevideo', 'region' => 'oeste', 'tipo' => 'barrio', 'vivienda' => 'casas',
            'costera' => false, 'antiguo' => false, 'temporada' => false,
            'cerca' => ['sayago', 'penarol', 'nuevo-paris', 'colon'],
            'refs' => 'la zona entre Sayago y Nuevo París',
            'areas' => ['Conciliación'],
        ],
        'tres-ombues' => [
            'nombre' => 'Tres Ombúes', 'oficial' => 'Tres Ombúes–Victoria', 'depto' => 'Montevideo', 'region' => 'oeste', 'tipo' => 'barrio', 'vivienda' => 'casas',
            'costera' => false, 'antiguo' => false, 'temporada' => false,
            'cerca' => ['la-teja', 'belvedere', 'nuevo-paris', 'villa-del-cerro', 'la-paloma-tomkinson'],
            'refs' => 'Pueblo Victoria y el arroyo Pantanoso',
            'areas' => ['Tres Ombúes', 'Pueblo Victoria'],
        ],
        'villa-del-cerro' => [
            'nombre' => 'Cerro', 'oficial' => 'Villa del Cerro', 'depto' => 'Montevideo', 'region' => 'oeste', 'tipo' => 'barrio', 'vivienda' => 'casas',
            'costera' => true, 'antiguo' => true, 'temporada' => false,
            'cerca' => ['casabo', 'la-teja', 'tres-ombues', 'la-paloma-tomkinson'],
            'refs' => 'la Fortaleza del Cerro, la playa del Cerro y la avenida Carlos María Ramírez',
            'areas' => ['Villa del Cerro', 'Cerro'],
        ],
        'casabo' => [
            'nombre' => 'Casabó', 'oficial' => 'Casabó–Pajas Blancas', 'depto' => 'Montevideo', 'region' => 'oeste', 'tipo' => 'barrio', 'vivienda' => 'casas',
            'costera' => true, 'antiguo' => false, 'temporada' => false,
            'cerca' => ['villa-del-cerro', 'la-paloma-tomkinson', 'paso-de-la-arena'],
            'refs' => 'las playas de Pajas Blancas y la costa oeste',
            'areas' => ['Casabó', 'Pajas Blancas'],
        ],
        'la-paloma-tomkinson' => [
            'nombre' => 'La Paloma', 'oficial' => 'La Paloma–Tomkinson', 'depto' => 'Montevideo', 'region' => 'oeste', 'tipo' => 'barrio', 'vivienda' => 'casas',
            'costera' => false, 'antiguo' => false, 'temporada' => false,
            'cerca' => ['villa-del-cerro', 'casabo', 'paso-de-la-arena', 'tres-ombues'],
            'refs' => 'Camino Tomkinson',
            'areas' => ['La Paloma', 'Tomkinson'],
        ],
        'paso-de-la-arena' => [
            'nombre' => 'Paso de la Arena', 'depto' => 'Montevideo', 'region' => 'oeste', 'tipo' => 'barrio', 'vivienda' => 'casas',
            'costera' => false, 'antiguo' => false, 'temporada' => false,
            'cerca' => ['la-paloma-tomkinson', 'casabo', 'nuevo-paris', 'lezica'],
            'refs' => 'Santiago Vázquez, el Parque Lecocq y la ruta 1',
            'areas' => ['Paso de la Arena', 'Santiago Vázquez'],
        ],
        // ════ CANELONES ════
        'ciudad-de-la-costa' => [
            'nombre' => 'Ciudad de la Costa', 'depto' => 'Canelones', 'region' => 'canelones', 'tipo' => 'ciudad', 'vivienda' => 'casas',
            'costera' => true, 'antiguo' => false, 'temporada' => false,
            'cerca' => ['carrasco', 'punta-gorda', 'pando', 'atlantida'],
            'refs' => 'la avenida Giannattasio, Solymar, Lagomar y El Pinar',
            'areas' => ['Ciudad de la Costa', 'Solymar', 'Lagomar', 'El Pinar', 'Shangrilá'],
        ],
        'las-piedras' => [
            'nombre' => 'Las Piedras', 'depto' => 'Canelones', 'region' => 'canelones', 'tipo' => 'ciudad', 'vivienda' => 'casas',
            'costera' => false, 'antiguo' => false, 'temporada' => false,
            'cerca' => ['la-paz', 'canelones', 'pando'],
            'refs' => 'la avenida Artigas, el Hipódromo de Las Piedras y la ruta 5',
            'areas' => ['Las Piedras', '18 de Mayo', 'Progreso'],
        ],
        'la-paz' => [
            'nombre' => 'La Paz', 'depto' => 'Canelones', 'region' => 'canelones', 'tipo' => 'ciudad', 'vivienda' => 'casas',
            'costera' => false, 'antiguo' => false, 'temporada' => false,
            'cerca' => ['las-piedras', 'canelones', 'prado'],
            'refs' => 'la avenida César Mayo Gutiérrez, la avenida Batlle y Ordóñez y la plaza de La Paz',
            'areas' => ['La Paz', 'Villa Colón', 'Lezica'],
        ],
        'pando' => [
            'nombre' => 'Pando', 'depto' => 'Canelones', 'region' => 'canelones', 'tipo' => 'ciudad', 'vivienda' => 'casas',
            'costera' => false, 'antiguo' => false, 'temporada' => false,
            'cerca' => ['ciudad-de-la-costa', 'atlantida', 'las-piedras'],
            'refs' => 'la ruta 8, la ruta 75 y el Polo Tecnológico de Pando',
            'areas' => ['Pando', 'Barros Blancos', 'Empalme Olmos'],
        ],
        'atlantida' => [
            'nombre' => 'Atlántida', 'depto' => 'Canelones', 'region' => 'canelones', 'tipo' => 'balneario', 'vivienda' => 'casas',
            'costera' => true, 'antiguo' => false, 'temporada' => true,
            'cerca' => ['ciudad-de-la-costa', 'pando', 'piriapolis'],
            'refs' => 'la rambla de Atlántida, la Interbalnearia y el arroyo Solís Chico',
            'areas' => ['Atlántida', 'Villa Argentina', 'Las Toscas', 'Parque del Plata', 'La Floresta', 'Estación Atlántida'],
        ],
        'canelones' => [
            'nombre' => 'Canelones', 'depto' => 'Canelones', 'region' => 'canelones', 'tipo' => 'ciudad', 'vivienda' => 'casas',
            'costera' => false, 'antiguo' => false, 'temporada' => false,
            'cerca' => ['las-piedras', 'la-paz'],
            'refs' => 'la plaza 18 de Julio, la Catedral de Guadalupe y la ruta 5',
            'areas' => ['Canelones', 'Santa Lucía', 'Los Cerrillos', 'Juanicó'],
        ],
        // ════ MALDONADO ════
        'punta-del-este' => [
            'nombre' => 'Punta del Este', 'depto' => 'Maldonado', 'region' => 'maldonado', 'tipo' => 'balneario', 'vivienda' => 'mixto',
            'costera' => true, 'antiguo' => false, 'temporada' => true,
            'cerca' => ['maldonado', 'san-carlos', 'piriapolis'],
            'refs' => 'la península, la Brava, la Mansa y Roosevelt',
            'areas' => ['Punta del Este', 'La Barra', 'Manantiales', 'Punta Ballena', 'San Rafael'],
        ],
        'maldonado' => [
            'nombre' => 'Maldonado', 'depto' => 'Maldonado', 'region' => 'maldonado', 'tipo' => 'ciudad', 'vivienda' => 'mixto',
            'costera' => false, 'antiguo' => false, 'temporada' => true,
            'cerca' => ['punta-del-este', 'san-carlos', 'piriapolis'],
            'refs' => 'el centro, Cerro Pelado, Pinares y la avenida Aiguá',
            'areas' => ['Maldonado', 'Pinares', 'Cerro Pelado', 'Maldonado Nuevo'],
        ],
        'piriapolis' => [
            'nombre' => 'Piriápolis', 'depto' => 'Maldonado', 'region' => 'maldonado', 'tipo' => 'balneario', 'vivienda' => 'mixto',
            'costera' => true, 'antiguo' => false, 'temporada' => true,
            'cerca' => ['maldonado', 'punta-del-este', 'san-carlos', 'atlantida'],
            'refs' => 'la Rambla de los Argentinos, el Argentino Hotel y el cerro San Antonio',
            'areas' => ['Piriápolis', 'Playa Hermosa', 'Playa Verde', 'Punta Colorada', 'Pan de Azúcar'],
        ],
        'san-carlos' => [
            'nombre' => 'San Carlos', 'depto' => 'Maldonado', 'region' => 'maldonado', 'tipo' => 'ciudad', 'vivienda' => 'casas',
            'costera' => false, 'antiguo' => false, 'temporada' => false,
            'cerca' => ['maldonado', 'punta-del-este', 'piriapolis'],
            'refs' => 'la plaza Artigas, la ruta 9 y la ruta 39',
            'areas' => ['San Carlos'],
        ],
    ];

    /** Nombre legible de cada departamento (para agrupar en /zonas y en el schema). */
    public const DEPARTAMENTOS = ['Montevideo' => 'Montevideo', 'Canelones' => 'Canelones', 'Maldonado' => 'Maldonado'];

    /** Grupos para los indices de zonas (/zonas, paginas de servicio, home): region => titulo. */
    public const REGIONES = [
        'centro'    => 'Montevideo: Centro, Ciudad Vieja y alrededores',
        'costa'     => 'Montevideo: costa este, de Punta Carretas a Carrasco',
        'este'      => 'Montevideo: este y noreste',
        'norte'     => 'Montevideo: norte',
        'oeste'     => 'Montevideo: oeste y Cerro',
        'canelones' => 'Canelones',
        'maldonado' => 'Maldonado',
    ];

    // ── SERVICIO x ZONA (/{servicio}/{zona}) ────────────────────────────────
    /** false = no se sirven, no van al sitemap ni se enlazan. */
    public const FASE2_ACTIVA = true;

    /**
     * Servicios con pagina por zona: slug => nombre para H1/links.
     * La instalacion por zona es la propia /zonas/{slug}, por eso no esta aca.
     * Cada pagina se publica SOLO si data/zonas/{zona}.php trae su texto en 'servicios' => [slug => [...]].
     */
    public const FASE2_SERVICIOS = [
        'mantenimiento'  => 'Service de aire acondicionado',
        'reparacion'     => 'Reparación de aire acondicionado',
        'carga-de-gas'   => 'Carga de gas de aire acondicionado',
        'desinstalacion' => 'Desinstalación de aire acondicionado',
    ];

    // ── Contenido y publicacion ──────────────────────────────────────────────

    private static array $cacheContenido = [];

    /**
     * Texto propio de una zona: data/zonas/{slug}.php, o null si todavia no tiene archivo.
     * Formato: title, description, subtitulo, intro, bloques[['t','p'[]]], faq[['q','a']],
     *          servicios => [slug de FASE2_SERVICIOS => [title, description, subtitulo, intro, bloques, faq]]
     */
    public static function contenido(string $slug): ?array
    {
        if (array_key_exists($slug, self::$cacheContenido)) return self::$cacheContenido[$slug];
        if (!isset(self::ZONAS[$slug]) || !preg_match('/^[a-z0-9-]+$/', $slug)) return self::$cacheContenido[$slug] = null;
        $file = dirname(__DIR__, 2) . '/data/zonas/' . $slug . '.php';
        $c = is_file($file) ? include $file : null;
        if (!is_array($c)) return self::$cacheContenido[$slug] = null;
        // {url} en los textos = raiz del sitio (enlaces internos que funcionan en local y en produccion)
        $base = $GLOBALS['url'] ?? '/';
        array_walk_recursive($c, function (&$v) use ($base) { if (is_string($v)) $v = str_replace('{url}', $base, $v); });
        return self::$cacheContenido[$slug] = $c;
    }

    /** Una zona tiene pagina si tiene texto propio (data/zonas) o, mientras se migran, perfil escrito en Zona_Texto. */
    public static function publicada(string $slug): bool
    {
        if (!isset(self::ZONAS[$slug])) return false;
        if (self::contenido($slug)) return true;
        require_once __DIR__ . '/Zona_Texto.php';
        return isset(Zona_Texto::PERFIL[$slug]);
    }

    /** Zonas con pagina: slug => datos */
    public static function zonasPublicadas(): array
    {
        return array_filter(self::ZONAS, fn($k) => self::publicada($k), ARRAY_FILTER_USE_KEY);
    }

    /** La pagina /{servicio}/{zona} existe solo si la zona tiene texto propio para ese servicio. */
    public static function servicioZonaPublicado(string $servicio, string $zona): bool
    {
        return self::FASE2_ACTIVA && isset(self::FASE2_SERVICIOS[$servicio]) && !empty(self::contenido($zona)['servicios'][$servicio]);
    }

    /** Zonas publicadas que tienen pagina para un servicio: slug => datos */
    public static function zonasDeServicio(string $servicio): array
    {
        return array_filter(self::zonasPublicadas(), fn($k) => self::servicioZonaPublicado($servicio, $k), ARRAY_FILTER_USE_KEY);
    }

    /** Compatibilidad: la Fase 2 ya no depende de 'principal'. */
    public static function zonasFase2(): array
    {
        return self::zonasPublicadas();
    }

    // ── Helpers ──────────────────────────────────────────────────────────────

    /** Zonas publicadas agrupadas por departamento: ['Montevideo' => ['pocitos' => [...], ...], ...] */
    public static function zonasPorDepto(): array
    {
        $out = [];
        foreach (self::zonasPublicadas() as $k => $z) $out[$z['depto']][$k] = $z;
        return $out;
    }

    /** Zonas agrupadas por region (ver REGIONES). $zonas: subconjunto a agrupar (por defecto, las publicadas). */
    public static function zonasPorRegion(?array $zonas = null): array
    {
        $zonas = $zonas ?? self::zonasPublicadas();
        $out = [];
        foreach (array_keys(self::REGIONES) as $r) {
            foreach ($zonas as $k => $z) if (($z['region'] ?? '') === $r) $out[$r][$k] = $z;
        }
        return $out;
    }

    /** Zonas linderas con pagina propia: slug => nombre */
    public static function linderas(string $slug): array
    {
        $out = [];
        foreach (self::ZONAS[$slug]['cerca'] ?? [] as $c) {
            if (self::publicada($c)) $out[$c] = self::ZONAS[$c]['nombre'];
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

    /** Nombres de todas las zonas publicadas de un departamento (para areaServed) */
    public static function nombresDepto(string $depto): array
    {
        $out = [];
        foreach (self::zonasPublicadas() as $z) if ($z['depto'] === $depto) $out[] = $z['nombre'];
        return $out;
    }
}

<?php

require_once 'src/controlador/Local_Datos.php';

/**
 * Texto unico por zona para /zonas/{slug} y para la Fase 2 (servicio x zona).
 *
 * Cada zona tiene un parrafo PERFIL escrito a mano, y despues se suman bloques segun sus atributos en Local_Datos::ZONAS:
 *   vivienda (apartamentos / casas / mixto), costera (salitre), antiguo (electrica), temporada (Maldonado).
 * Las variantes se eligen con una semilla fija por zona, asi dos barrios con los mismos atributos no repiten el mismo texto.
 * Para sumar una zona alcanza con agregarla en Local_Datos::ZONAS y escribir su PERFIL aca.
 */
final class Zona_Texto
{
    /** Un parrafo propio por zona: como es el lugar y que tipo de vivienda predomina. */
    public const PERFIL = [
        'pocitos' => 'Pocitos es el barrio con más edificios de Montevideo: torres sobre la rambla y edificios de entre cinco y quince pisos hacia Bulevar España y la avenida Brasil. Casi todas las instalaciones son en apartamentos, con la condensadora en el balcón, en la fachada o en un patio de aire, y muchas veces con un equipo por ambiente.',
        'punta-carretas' => 'Punta Carretas mezcla edificios de categoría frente a la rambla con casas y edificios bajos cerca del shopping y del faro. En los edificios la condensadora suele ir en balcón o en la fachada; en las casas de las calles interiores hay más margen para ubicarla en un patio o sobre una medianera.',
        'cordon' => 'Cordón es un barrio denso y con mucha rotación de inquilinos, con edificios de apartamentos alrededor de 18 de Julio, la Universidad y Tristán Narvaja. Abundan los edificios de varias décadas con tableros chicos y balcones angostos, así que la ubicación de la condensadora y el estado de la eléctrica definen buena parte del presupuesto.',
        'centro' => 'El Centro tiene edificios de apartamentos y oficinas de distintas épocas sobre 18 de Julio y sus transversales, muchos sin balcón y con patios de aire interiores. Es habitual que la única salida para la condensadora sea la fachada o un patio interno, y que haya que revisar la instalación eléctrica antes de conectar el equipo.',
        'parque-rodo' => 'Parque Rodó combina edificios frente al parque y a la playa Ramírez con casas antiguas hacia Cordón y Palermo. Hay mucho apartamento de alquiler y casas recicladas en propiedad horizontal, donde la condensadora termina en el balcón, en una azotea compartida o en la fachada.',
        'tres-cruces' => 'Tres Cruces creció alrededor de la terminal, con edificios de apartamentos nuevos y de mediana edad, hoteles y oficinas sobre Bulevar Artigas y 8 de Octubre. Predominan los apartamentos de uno y dos dormitorios con balcón, donde lo normal es un split inverter para el living y otro más chico para el dormitorio.',
        'buceo' => 'Buceo es un barrio de edificios y torres recientes alrededor del Montevideo Shopping, el World Trade Center y el puerto deportivo. Muchos edificios nuevos ya vienen con preinstalación o con un lugar previsto para la condensadora, lo que simplifica el trabajo; en los más viejos la condensadora va al balcón o a la fachada.',
        'malvin' => 'Malvín tiene edificios altos sobre la rambla y, hacia la avenida Italia, casas de una y dos plantas con fondo. En las casas hay libertad para ubicar la condensadora en un patio, sobre una pared lateral o en el techo, y es común instalar dos o tres equipos en la misma visita.',
        'carrasco' => 'Carrasco es un barrio residencial de casas grandes con jardín, edificios bajos cerca de la rambla y barrios nuevos hacia Carrasco Norte. Se instalan muchos equipos por vivienda, a veces con multi-split o con equipos de piso-techo para livings amplios, y la condensadora se ubica donde menos se vea y menos ruido dé.',
        'punta-gorda' => 'Punta Gorda es un barrio tranquilo entre Malvín y Carrasco, con casas de jardín sobre calles arboladas y algunos edificios frente a la rambla. La mayoría de los trabajos son en casas, con recorridos de cañería más largos que en un apartamento y la condensadora en el fondo o sobre una medianera.',
        'prado' => 'El Prado es un barrio de casas grandes y quintas antiguas alrededor del parque y el Jardín Botánico, con techos altos, paredes gruesas y ambientes amplios. Eso cambia el cálculo de frigorías y suele requerir más metros de cañería y una revisión de la instalación eléctrica antes de instalar.',
        'parque-batlle' => 'Parque Batlle es un barrio residencial alrededor del Estadio Centenario, con casas de una y dos plantas con jardín y edificios de pocos pisos sobre la avenida Italia. En las casas la condensadora va al patio o al techo; en los edificios bajos, al balcón o a un patio común.',
        'la-blanqueada' => 'La Blanqueada es un barrio de casas bajas, edificios chicos y comercios entre 8 de Octubre y la avenida Italia. Se instalan aires en casas con fondo, en apartamentos de edificios de pocos pisos y en locales comerciales sobre las avenidas, con la condensadora en patios, azoteas o paredes laterales.',
        'ciudad-de-la-costa' => 'Ciudad de la Costa se extiende sobre la avenida Giannattasio, de Shangrilá a El Pinar, con casas de una planta con jardín, chalets de balneario y algunos edificios nuevos cerca de la playa. Casi todo es casa, con margen para ubicar la condensadora sin problemas de reglamento y con recorridos de cañería que dependen de dónde esté el ambiente a climatizar.',
        'las-piedras' => 'Las Piedras es la ciudad grande del corredor de la ruta 5, a unos 20 kilómetros de Montevideo, con un centro comercial sobre la avenida Artigas, barrios de casas bajas con fondo alrededor del Hipódromo y muchas cooperativas y complejos de vivienda más nuevos hacia las afueras. La mayoría de los trabajos son en casas de una planta, con la condensadora en el patio o sobre una pared lateral, y también en comercios y talleres que necesitan climatizar un salón o una oficina.',
        'la-paz' => 'La Paz es una ciudad chica de Canelones pegada a Colón, en el límite con Montevideo y a unos 17 kilómetros del centro, con casas de una planta con fondo, calles tranquilas y un centro comercial alrededor de la plaza y la avenida Batlle y Ordóñez. Casi todo es vivienda individual, muchas veces ampliada con el tiempo, así que es común que el ambiente a climatizar esté en una pieza agregada al fondo y la cañería tenga que recorrer un tramo por el patio.',
        'pando' => 'Pando es la ciudad industrial y comercial del este de Canelones, sobre la ruta 8 y a unos 32 kilómetros de Montevideo, con fábricas, el Polo Tecnológico y un centro con comercios alrededor de la plaza. Las viviendas son sobre todo casas de una planta con patio y barrios de cooperativas, y además de hogares se climatizan locales, oficinas y salas de empresas de la zona, donde el equipo trabaja muchas horas y conviene prever el mantenimiento desde la instalación.',
        'atlantida' => 'Atlántida es el balneario principal de la Costa de Oro, en el kilómetro 45 de la Interbalnearia, y esta página cubre también Las Toscas, Parque del Plata y La Floresta. Hay población estable todo el año y muchos chalets y casas de veraneo sobre calles arboladas, con algunos edificios bajos cerca de la rambla. Las casas cercanas al agua reciben salitre y viento, y las que se usan solo en verano necesitan una revisión antes de abrirlas en diciembre.',
        'canelones' => 'Canelones, la ciudad capital del departamento, está sobre la ruta 5 a unos 46 kilómetros de Montevideo, con la Intendencia, la Catedral de Guadalupe frente a la plaza 18 de Julio y un centro de casas antiguas de fachada continua. Hacia las afueras predominan las casas con fondo y los barrios de cooperativas. En las casas viejas del centro los ambientes son altos y el tablero suele ser chico, así que conviene revisar la eléctrica y el cálculo de frigorías antes de elegir el equipo.',
        'piriapolis' => 'Piriápolis es un balneario de Maldonado con vida todo el año, a unos 100 kilómetros de Montevideo, con edificios de apartamentos y hoteles sobre la Rambla de los Argentinos y casas que suben hacia el cerro San Antonio y siguen por Playa Hermosa y Playa Verde. En los edificios frente al mar la condensadora queda expuesta al salitre y al viento, y muchas unidades de alquiler de temporada necesitan puesta a punto antes del verano y un service al cerrarlas.',
        'san-carlos' => 'San Carlos es la segunda ciudad del departamento de Maldonado, unos 14 kilómetros al norte de la capital, sobre la ruta 39 y cerca del cruce con la ruta 9. Es una ciudad de población estable, con un centro histórico de casas bajas alrededor de la plaza Artigas y barrios de casas con fondo hacia las afueras. Al estar lejos de la costa, la condensadora no sufre el salitre de Punta del Este, y los equipos se usan tanto para el calor del verano como para calefaccionar en invierno.',
        'punta-del-este' => 'Punta del Este combina torres de apartamentos en la península y sobre las playas Brava y Mansa con casas de temporada en San Rafael, La Barra y Manantiales. Muchas viviendas se usan solo en verano, así que el trabajo se concentra en poner a punto los equipos antes de diciembre y en instalaciones que aguanten el salitre y los meses sin uso.',
        'maldonado' => 'Maldonado es la ciudad donde vive la mayor parte de la población estable del departamento, con casas en el centro, Cerro Pelado y Pinares, apartamentos nuevos hacia Punta del Este y comercios sobre las avenidas. Se instalan equipos para todo el año, con más demanda de service y reparación en los meses previos a la temporada.',
    ];

    /** Bloque por tipo de vivienda: variantes [titulo, parrafos]. {Z} zona, {refs} referencias, {cerca} linderos. */
    private const VIVIENDA = [
        'apartamentos' => [
            [
                't' => 'Condensadora en balcón o fachada: lo que hay que resolver en {Z}',
                'p' => [
                    'En los apartamentos de {Z} la unidad exterior va casi siempre al balcón o a la fachada. Antes de instalar conviene revisar el reglamento de copropiedad y consultar a la administración: algunos edificios definen dónde puede ir la condensadora, si se permite en la fachada y cómo debe hacerse el desagote para que no gotee al vecino de abajo.',
                    'El técnico evalúa el recorrido de la cañería de cobre desde el ambiente hasta el balcón, si hace falta canaleta para tapar el caño y si la condensadora se fija al piso del balcón o a la pared con ménsulas. Cuando hay que trabajar colgado por la fachada, se cotiza aparte como trabajo en altura.',
                ],
            ],
            [
                't' => 'Instalar un aire en un apartamento de {Z}',
                'p' => [
                    'La mayoría de los pedidos en {Z} son para apartamentos de uno a tres dormitorios: un split inverter en el living y, en muchos casos, otro más chico en el dormitorio principal. La condensadora se ubica en el balcón, en un patio de aire o en la fachada, según lo que permita el edificio.',
                    'Antes de coordinar, contanos el piso, si el ambiente tiene balcón y si el edificio ya tiene una posición prevista para la unidad exterior. Con eso el técnico sabe si va a necesitar canaleta, ménsulas o trabajo en altura, y te pasa un presupuesto más ajustado.',
                ],
            ],
            [
                't' => 'Reglas del edificio y ubicación de la unidad exterior en {Z}',
                'p' => [
                    'En edificios de {Z} es habitual que la administración pida que la condensadora quede dentro del balcón, que el desagote vaya a un desagüe y no a la calle, y que el soporte no perfore la fachada. Sugerimos consultar el reglamento antes de comprar el equipo, porque la ubicación posible define los metros de cañería y el precio final.',
                    'Si el apartamento no tiene balcón, las opciones son un patio de aire interior o la fachada con trabajo en altura. El técnico te dice qué es viable en tu caso y qué se cobra aparte.',
                ],
            ],
        ],
        'casas' => [
            [
                't' => 'Instalar un aire en una casa de {Z}: más libertad para ubicar la condensadora',
                'p' => [
                    'En las casas de {Z} no dependés del reglamento de un edificio: la unidad exterior puede ir a un patio, al fondo, sobre una pared lateral o en el techo. Lo que sí cambia es el recorrido de la cañería, que en una casa puede superar los metros incluidos en la instalación estándar.',
                    'El técnico busca la ubicación con menos metros de caño, buen desagote y poco ruido hacia los dormitorios o hacia el vecino. Si la casa tiene más de un ambiente a climatizar, conviene cotizar todos los equipos juntos y ver si un multi-split tiene sentido.',
                ],
            ],
            [
                't' => 'Casas de {Z}: qué mirar antes de instalar',
                'p' => [
                    'En {Z} predominan las casas de una y dos plantas con fondo o jardín, cerca de {refs}. Para el equipo de planta alta la condensadora suele ir al techo o a una pared exterior con ménsulas; para la planta baja, a un patio o al fondo. En ambos casos se revisa el desagote para que el agua de condensación no quede goteando sobre una vereda o una pared.',
                    'Si la casa es antigua o el tablero es chico, el técnico revisa si hace falta una línea eléctrica dedicada para el aire, que se cotiza aparte.',
                ],
            ],
            [
                't' => 'Dónde va la condensadora en una casa de {Z}',
                'p' => [
                    'Al instalar en una casa de {Z} el técnico define la ubicación de la unidad exterior junto con vos: a la sombra si es posible, con espacio libre alrededor para que ventile, lejos de ventanas de dormitorio y con un lugar donde desagotar el agua. Un buen lugar de la condensadora alarga la vida del compresor y baja el ruido.',
                    'Muchas casas de la zona necesitan más de un equipo. Instalar dos o tres en la misma visita suele ser más conveniente que hacerlo por separado, porque el traslado y la puesta en marcha se hacen una sola vez.',
                ],
            ],
        ],
        'mixto' => [
            [
                't' => 'Casas y apartamentos en {Z}: dos formas de instalar',
                'p' => [
                    'En {Z} conviven edificios de apartamentos y casas, y la instalación cambia bastante entre uno y otro. En un apartamento la condensadora va al balcón o a la fachada y hay que respetar el reglamento del edificio; en una casa se puede elegir el mejor lugar, aunque los recorridos de cañería suelen ser más largos.',
                    'Contanos si es casa o apartamento, en qué piso está y si el ambiente tiene salida al exterior. Con eso el técnico de la zona sabe qué necesita llevar y te pasa un presupuesto sin sorpresas.',
                ],
            ],
            [
                't' => 'Instalación en {Z} según el tipo de vivienda',
                'p' => [
                    'Los edificios de {Z}, sobre todo los más nuevos, suelen tener una posición prevista para la unidad exterior y a veces preinstalación de cañería, lo que acorta el trabajo. En casas y chalets la condensadora va a un patio, al techo o a una pared lateral, y se define en la visita.',
                    'En los dos casos la instalación incluye el soporte, la cañería hasta los metros indicados, el desagote, el vacío del circuito y la prueba de funcionamiento. Los metros extra, la canaleta y la línea eléctrica dedicada se cotizan aparte.',
                ],
            ],
        ],
    ];

    /** Bloque de zona costera (salitre). */
    private const COSTERA = [
        [
            't' => 'Salitre en {Z}: proteger la condensadora',
            'p' => [
                'A pocas cuadras de la costa, como en gran parte de {Z}, el aire con salitre corroe las aletas del condensador y las partes metálicas de la unidad exterior. Para equipos que van a quedar expuestos conviene elegir una condensadora con tratamiento anticorrosivo (varias marcas la ofrecen como versión para zonas costeras) o aplicar una protección al instalar.',
                'También cambia la frecuencia del service: en zona costera recomendamos una limpieza de la unidad exterior al menos una vez por temporada, para sacar el salitre acumulado antes de que dañe el serpentín.',
            ],
        ],
        [
            't' => 'Aire acondicionado cerca de la costa: qué cambia en {Z}',
            'p' => [
                'En {Z} la cercanía al agua acelera la corrosión de las condensadoras, sobre todo en las que quedan de cara al viento del sur. Si el equipo va a estar expuesto, pedile al técnico una condensadora con protección anticorrosiva o un tratamiento del serpentín, y ubicala en un lugar resguardado siempre que la ventilación lo permita.',
                'Un service más seguido, con limpieza del serpentín exterior y revisión de conexiones, es la forma más económica de evitar una carga de gas o un cambio de condensadora antes de tiempo.',
            ],
        ],
        [
            't' => 'Equipos que aguanten el salitre de {Z}',
            'p' => [
                'Si tu casa o apartamento en {Z} está cerca de la costa, el salitre es el principal enemigo de la unidad exterior. Al comprar el equipo fijate si la marca ofrece una versión con aletas protegidas o gabinete tratado, y al instalarlo dejá la condensadora en un lugar que se pueda limpiar con facilidad.',
                'En zona costera el mantenimiento anual no es opcional: una limpieza a fondo del condensador cada temporada evita pérdidas de rendimiento, consumo alto y fugas de gas por corrosión.',
            ],
        ],
    ];

    /** Bloque de edificios antiguos (instalacion electrica). */
    private const ANTIGUO = [
        [
            't' => 'Edificios antiguos en {Z}: revisar la eléctrica antes de instalar',
            'p' => [
                'Muchos edificios de {Z} tienen varias décadas y tableros pensados para otro consumo. Antes de conectar un aire, el técnico revisa el tablero, la sección de los cables y si hay una térmica libre en el tablero. En la mayoría de los casos hace falta una línea eléctrica dedicada desde el tablero hasta el equipo, con su térmica y su disyuntor, que se cotiza aparte de la instalación.',
                'Si el edificio tiene cableado viejo o el medidor de UTE está al límite, conviene resolverlo antes de la instalación para evitar cortes, calentamiento de cables o que el equipo trabaje mal.',
            ],
        ],
        [
            't' => 'Instalación eléctrica y aire acondicionado en {Z}',
            'p' => [
                'En apartamentos antiguos de {Z} es común encontrar un solo circuito para todo el apartamento. Un split inverter de 3.000 frigorías consume menos que un equipo on/off, pero igual necesita su propia línea con térmica y disyuntor para trabajar seguro. El técnico lo verifica en la visita y te dice si la línea dedicada está incluida o se agrega al presupuesto.',
                'También se revisan las salidas al exterior: en edificios viejos sin balcón, la condensadora puede ir a un patio de aire o a la fachada, siempre con acuerdo de la administración.',
            ],
        ],
    ];

    /** Bloque de temporada (balnearios y Maldonado). */
    private const TEMPORADA = [
        [
            't' => 'Puesta a punto antes de diciembre y service al cierre de temporada',
            'p' => [
                'En {Z} buena parte de las casas y apartamentos se usan sobre todo en verano. Lo ideal es agendar la revisión de los equipos entre octubre y noviembre: limpieza de filtros y serpentines, control de la carga de gas y prueba de funcionamiento, para no descubrir en enero que el aire no enfría.',
                'Al cierre de la temporada conviene un service corto que deje el equipo limpio y seco antes de los meses sin uso. Si administrás una propiedad de alquiler, podemos coordinar la puesta a punto de varios equipos en una misma visita.',
            ],
        ],
        [
            't' => 'Aires para casas de temporada en {Z}',
            'p' => [
                'Un equipo que pasa meses apagado en {Z} junta polvo, humedad y salitre. Antes de la temporada recomendamos una revisión completa, y antes de cerrar la casa, una limpieza que evite olores y hongos en el evaporador cuando lo vuelvas a prender.',
                'Si estás instalando un equipo nuevo para alquilar, pensá en un split inverter con condensadora protegida contra el salitre y en un lugar de fácil acceso para el service.',
            ],
        ],
    ];

    /** Bloque "que equipo conviene", segun vivienda. */
    private const EQUIPO = [
        'apartamentos' => [
            't' => 'Qué equipo conviene en un apartamento de {Z}',
            'p' => [
                'Para un dormitorio de 9 a 12 m² suele alcanzar con 2.250 frigorías (9.000 BTU); para un living de 18 a 25 m², entre 3.000 y 4.500 frigorías (12.000 a 18.000 BTU). Si el ambiente da al norte, tiene mucho vidrio o está en el último piso, conviene ir un escalón más arriba. Podés estimarlo con nuestra <a href="{url}calculadora-frigorias">calculadora de frigorías</a>.',
                'En apartamentos el split inverter es la opción más habitual: enfría y calefacciona, hace menos ruido y consume menos que un equipo on/off, algo que se nota en la factura de UTE si lo usás todo el año.',
            ],
        ],
        'casas' => [
            't' => 'Qué equipos conviene instalar en una casa de {Z}',
            'p' => [
                'En una casa de {Z} lo habitual es climatizar por ambientes: un split inverter de 3.000 a 4.500 frigorías para el living o el estar, y equipos de 2.250 frigorías para los dormitorios. Para livings integrados grandes o con techos altos se usan equipos de 5.500 o 6.000 frigorías, o un piso-techo. Estimá la capacidad con la <a href="{url}calculadora-frigorias">calculadora de frigorías</a>.',
                'Si vas a instalar tres o más equipos, un multi-split (una sola condensadora para varias unidades interiores) puede ahorrar espacio exterior, aunque no siempre es la opción más económica. El técnico te lo plantea si aplica a tu casa.',
            ],
        ],
        'mixto' => [
            't' => 'Qué capacidad elegir en {Z}',
            'p' => [
                'Como referencia, un dormitorio de hasta 12 m² necesita unas 2.250 frigorías, un living de 20 m² alrededor de 3.000 y un ambiente de 30 m² unas 4.500 frigorías. La orientación, el sol y el piso pueden subir esa cifra. Calculalo en un minuto con la <a href="{url}calculadora-frigorias">calculadora de frigorías</a>.',
                'Si el equipo va a calefaccionar en invierno, un split inverter con bomba de calor rinde bien en el clima de {Z} y suele ser más económico de usar que estufas eléctricas.',
            ],
        ],
    ];

    /** Variantes por servicio en la Fase 2: reemplaza el bloque EQUIPO. */
    private const EQUIPO_SERVICIO = [
        'reparacion' => [
            't' => 'Fallas frecuentes de aire acondicionado en {Z}',
            'p' => [
                'Los pedidos de reparación más comunes en {Z} son equipos que no enfrían o enfrían poco (filtros sucios, falta de gas, condensadora tapada), pérdidas de agua por el desagote obstruido, ruidos en la unidad exterior y equipos que no prenden o muestran un código de error.',
                'Contanos la marca, qué hace el equipo y en qué barrio o localidad estás; un técnico de la zona te dice si conviene visita, qué puede ser y desde cuánto arranca la revisión.',
            ],
        ],
        'apartamentos' => [
            't' => 'Trabajo en altura y canaleta en apartamentos de {Z}',
            'p' => [
                'Cuando la condensadora tiene que ir a la fachada de un edificio de {Z}, el técnico trabaja con arnés y equipo de altura, y ese trabajo se cotiza aparte. Si el caño de cobre recorre una pared a la vista, se tapa con canaleta plástica para que quede prolijo.',
                'Avisale al técnico el piso, si hay balcón y si la administración exige algún requisito; así el presupuesto llega completo desde el primer mensaje.',
            ],
        ],
    ];

    // ── API ──────────────────────────────────────────────────────────────────

    /** Bloques de contenido [['t' => H2, 'p' => [parrafos html]], ...] para una zona (y opcionalmente un servicio de Fase 2). */
    public static function bloques(string $slug, string $servicio = ''): array
    {
        $z = Local_Datos::ZONAS[$slug] ?? null;
        if (!$z) return [];
        $seed = crc32($slug);
        $pick = fn(array $arr, int $salt) => $arr[($seed + $salt) % count($arr)];
        $vars = self::vars($slug);

        $out = [];

        // 1. Perfil + tipo de vivienda
        $v = $pick(self::VIVIENDA[$z['vivienda']], 1);
        $out[] = ['t' => strtr($v['t'], $vars), 'p' => array_merge([self::PERFIL[$slug] ?? ''], array_map(fn($p) => strtr($p, $vars), $v['p']))];

        // 2. Atributos de la zona
        if (!empty($z['costera']))   { $b = $pick(self::COSTERA, 2);   $out[] = self::tr($b, $vars); }
        if (!empty($z['antiguo']))   { $b = $pick(self::ANTIGUO, 3);   $out[] = self::tr($b, $vars); }
        if (!empty($z['temporada'])) { $b = $pick(self::TEMPORADA, 4); $out[] = self::tr($b, $vars); }

        // 3. Que equipo conviene (o el bloque propio del servicio en Fase 2)
        $eq = self::EQUIPO_SERVICIO[$servicio] ?? self::EQUIPO[$z['vivienda']];
        $out[] = self::tr($eq, $vars);

        return array_values(array_filter($out, fn($b) => array_filter($b['p'])));
    }

    /** 2-3 FAQ propias de la zona. */
    public static function faq(string $slug, string $servicio = ''): array
    {
        $z = Local_Datos::ZONAS[$slug] ?? null;
        if (!$z) return [];
        $vars = self::vars($slug);
        $Z = $z['nombre'];
        $cerca = Local_Datos::cercaTexto($slug);
        $esBarrio = $z['tipo'] === 'barrio';
        $lugar = $esBarrio ? 'barrio' : 'barrio o localidad';
        $faq = [];

        if ($z['vivienda'] === 'apartamentos') {
            $faq[] = ['q' => "¿Pueden poner la condensadora en el balcón de mi apartamento en {$Z}?", 'a' => "Sí, es la ubicación más habitual en {$Z}. Se fija al piso o a la pared del balcón con ménsulas y se lleva el desagote a un desagüe. Antes conviene revisar el reglamento del edificio y consultar a la administración por si definen una posición o requisitos para la fachada."];
        } elseif ($z['vivienda'] === 'casas') {
            $faq[] = ['q' => "¿Dónde conviene ubicar la condensadora en una casa de {$Z}?", 'a' => "En un patio, el fondo, una pared lateral o el techo: donde quede a la sombra, ventile bien, tenga desagote y moleste poco con el ruido. El técnico lo define con vos en la visita buscando el recorrido de cañería más corto."];
        } else {
            $faq[] = ['q' => "¿Instalan tanto en casas como en apartamentos en {$Z}?", 'a' => "Sí. En apartamentos la condensadora va al balcón o a la fachada según el reglamento del edificio; en casas se elige el mejor lugar en la visita. Contanos cuál es tu caso y el piso para pasarte el presupuesto."];
        }
        if (!empty($z['costera'])) {
            $faq[] = ['q' => "¿El salitre de {$Z} afecta al aire acondicionado?", 'a' => "Sí, corroe las aletas y el gabinete de la unidad exterior. Cerca de la costa recomendamos una condensadora con tratamiento anticorrosivo y una limpieza de la unidad exterior al menos una vez por temporada."];
        }
        if (!empty($z['antiguo'])) {
            $faq[] = ['q' => "Mi edificio en {$Z} es antiguo, ¿la instalación eléctrica aguanta un aire?", 'a' => "Hay que revisarlo. El técnico mira el tablero, la sección de los cables y si hay una térmica libre. En la mayoría de los edificios antiguos se recomienda una línea eléctrica dedicada para el equipo, que se cotiza aparte de la instalación."];
        }
        if (!empty($z['temporada'])) {
            $faq[] = ['q' => "¿Hacen la puesta a punto de los equipos antes de la temporada en {$Z}?", 'a' => "Sí. Lo ideal es agendarla entre octubre y noviembre: limpieza de filtros y serpentines, control de gas y prueba de funcionamiento. También coordinamos el service al cierre de la temporada y varios equipos en una misma visita."];
        }
        if (count($faq) < 3) {
            $faq[] = ['q' => "¿Cuánto cuesta instalar un aire acondicionado en {$Z}?", 'a' => "Depende de la capacidad del equipo, los metros de cañería, si la condensadora va en balcón, fachada o patio, si hace falta trabajo en altura y si hay que hacer una línea eléctrica dedicada. Decinos tu {$lugar} y las frigorías y un técnico de {$Z}" . ($cerca ? " o de {$cerca}" : '') . " te pasa el presupuesto por WhatsApp."];
        }
        if (count($faq) < 3) {
            $faq[] = ['q' => "¿Atienden en " . ($esBarrio ? "los barrios cercanos" : "las localidades cercanas") . " a {$Z}?", 'a' => "Sí. El mismo técnico que atiende {$Z} cubre {$cerca}. Si tu {$lugar} no aparece en la lista, escribinos igual y te confirmamos."];
        }
        return array_slice($faq, 0, 3);
    }

    /** Bajada del hero. */
    public static function subtitulo(string $slug): string
    {
        $z = Local_Datos::ZONAS[$slug];
        $Z = $z['nombre'];
        $tipo = ['apartamentos' => 'apartamentos con la condensadora en balcón o fachada', 'casas' => 'casas con más libertad para ubicar la condensadora', 'mixto' => 'casas y apartamentos'][$z['vivienda']];
        $extra = !empty($z['costera']) ? ' Equipos preparados para el salitre.' : (!empty($z['antiguo']) ? ' Revisamos la eléctrica antes de conectar.' : (!empty($z['temporada']) ? ' Puesta a punto antes de la temporada.' : ''));
        return "Instalación de split inverter, service y reparación en {$Z}: {$tipo}. Te responde un técnico de la zona.{$extra}";
    }

    /** Meta description unica por zona. */
    public static function metaDescription(string $slug): string
    {
        $z = Local_Datos::ZONAS[$slug];
        $Z = $z['nombre'];
        $foco = ['apartamentos' => 'condensadora en balcón o fachada y reglas del edificio', 'casas' => 'casas con varios equipos y ubicación libre de la condensadora', 'mixto' => 'casas y apartamentos'][$z['vivienda']];
        $extra = !empty($z['temporada']) ? ' Puesta a punto antes de diciembre.' : (!empty($z['costera']) ? ' Protección contra el salitre.' : (!empty($z['antiguo']) ? ' Línea eléctrica dedicada si hace falta.' : ''));
        $donde = $Z === $z['depto'] ? "la ciudad de {$Z}" : "{$Z}, {$z['depto']}";
        // La propuesta y "por WhatsApp" van primero; las partes opcionales se suman solo si entran en 155 caracteres (sin cortar con "...")
        $d = "Instalación de aire acondicionado en {$donde} con presupuesto por WhatsApp.";
        foreach ([' ' . mb_strtoupper(mb_substr($foco, 0, 1)) . mb_substr($foco, 1) . '.', $extra, ' Service y reparación.'] as $parte) {
            if ($parte !== '' && mb_strlen($d . $parte) <= 155) $d .= $parte;
        }
        return $d;
    }

    private static function vars(string $slug): array
    {
        $z = Local_Datos::ZONAS[$slug];
        return ['{Z}' => $z['nombre'], '{refs}' => $z['refs'], '{cerca}' => Local_Datos::cercaTexto($slug) ?: ($z['tipo'] === 'barrio' ? 'los barrios cercanos' : 'las localidades cercanas'), '{url}' => $GLOBALS['url'] ?? '/'];
    }

    private static function tr(array $b, array $vars): array
    {
        return ['t' => strtr($b['t'], $vars), 'p' => array_map(fn($p) => strtr($p, $vars), $b['p'])];
    }
}

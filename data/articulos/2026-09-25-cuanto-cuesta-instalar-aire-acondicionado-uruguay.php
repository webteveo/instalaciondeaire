<?php
/**
 * Guía: cuánto cuesta instalar un aire en Uruguay. Excepción autorizada a la regla "sin precios":
 * SOLO precios publicados por terceros, con fuente y fecha de consulta. Nunca una tarifa propia.
 */
return [
    'slug'        => 'cuanto-cuesta-instalar-aire-acondicionado-uruguay',
    'titulo'      => 'Cuánto cuesta instalar un aire acondicionado en Uruguay (2026)',
    'title'       => 'Cuánto cuesta instalar un aire acondicionado en Uruguay (2026)',
    'description' => 'Qué incluye la instalación estándar de un split (3 m de cañería), qué se cobra aparte y precios de referencia publicados en Uruguay, con fuente y fecha.',
    'keywords'    => 'cuánto cuesta instalar aire acondicionado, precio instalación aire acondicionado uruguay, instalación split precio montevideo, qué incluye instalación aire acondicionado, instalación básica aire acondicionado',
    'categoria'   => 'Instalación',
    'tema'        => 'Costo de instalación de aire acondicionado en Uruguay',
    'fecha'       => '2026-09-25',
    'actualizado' => '2026-09-25',
    'autor'       => 'Equipo ' . EMPRESA_NOMBRE,
    'imagen'      => 'articulos/cuanto-cuesta-instalar-aire-acondicionado-uruguay.webp',
    'imagen_alt'  => 'Infografía: qué incluye la instalación estándar de un split (3 m de cañería, soporte, perforación, vacío y prueba) y qué se cobra aparte',
    'imagen_pie'  => '',
    'bajada'      => 'Qué entra en una instalación estándar, qué suma al precio y qué publican hoy las empresas del mercado. Sin letra chica.',

    'respuesta'   => 'En Uruguay, la mano de obra de una instalación estándar de split se publica, en septiembre de 2026, desde unos <strong>$3.800 a $4.300</strong> según la empresa. La instalación estándar incluye hasta <strong>3 m de cañería</strong>, soporte, perforación, vacío y prueba; el excedente de cañería, la altura y la instalación eléctrica se cobran aparte. Son precios de terceros: el presupuesto exacto depende de tu caso.',

    'puntos_clave' => [
        'La instalación estándar del mercado incluye hasta 3 m de cañería entre unidades.',
        'Metros extra, trabajo en altura, soportes especiales y la línea eléctrica se cobran aparte.',
        'Precios publicados en septiembre de 2026: desde $3.800 (Tiempo Hogar) y $4.300 IVA incluido (NNET).',
        'UTE bonifica $2.500 por aire clase A en frío y calor comprado del 1/9/2026 al 31/3/2027 (Plan Redondo).',
    ],

    'secciones' => [
        [
            'h2'       => '¿Qué incluye una instalación estándar de aire acondicionado?',
            'parrafos' => [
                'La instalación estándar, o básica, es la de un split en un lugar accesible, con las dos unidades cerca. El estándar del mercado es <strong>hasta 3 m de cañería</strong> entre la unidad interior y la exterior: Sodimac, por ejemplo, lo publica así, con hasta 2,5 m de altura. NNET cobra aparte la cañería extra y Tiempo Hogar ajusta el precio según la distancia entre unidades.',
            ],
            'lista' => [
                'Colocación de la unidad interior y de la condensadora con su soporte, en lugar accesible (Sodimac fija hasta 2,5 m de altura).',
                'Una perforación de pared para pasar la cañería, el cable de interconexión y el desagote.',
                'Hasta 3 m de cañería de cobre aislada, cable y caño de desagote con pendiente.',
                'Conexión entre unidades, vacío del circuito y prueba de fugas.',
                'Puesta en marcha y prueba de funcionamiento.',
            ],
            'nota' => 'El vacío no es opcional. Sin vacío queda aire y humedad en el circuito, el equipo rinde menos y el compresor sufre. Si un presupuesto no lo menciona, preguntalo.',
        ],
        [
            'h2'    => '¿Qué se cobra aparte?',
            'parrafos' => ['Todo lo que se sale del caso estándar suma al precio. Lo más habitual:'],
            'lista' => [
                '<strong>Metros de cañería extra</strong> por encima de los 3 m, con su cable y desagote.',
                '<strong>Trabajo en altura:</strong> condensadora en fachada, balcón sin acceso o por encima de la altura estándar, a veces con silleta o andamio.',
                '<strong>Soportes especiales</strong> o protecciones para la unidad exterior.',
                '<strong>Perforaciones complejas:</strong> vigas, hormigón o muros gruesos.',
                '<strong>Instalación eléctrica:</strong> línea exclusiva desde el tablero, llave térmica o tomacorriente nuevo.',
                '<strong>Terminaciones:</strong> canaleta para la cañería, reparación de revoque o azulejos.',
                '<strong>Desinstalación</strong> del equipo viejo, si hay que sacarlo antes.',
            ],
        ],
        [
            'h2'       => '¿Cuánto cobran hoy por instalar un split en Uruguay?',
            'parrafos' => [
                'Estos son <strong>precios publicados por terceros</strong> en sus sitios web, consultados por ' . EMPRESA_NOMBRE . ' en septiembre de 2026. No son una tarifa nuestra ni un presupuesto: sirven para que tengas una referencia del mercado.',
            ],
            'tabla' => [
                'cabecera' => ['Empresa (fuente)', 'Servicio publicado', 'Precio publicado', 'Fecha'],
                'filas'    => [
                    ['Tiempo Hogar', 'Instalación de split en Montevideo', 'Desde $3.800', 'Consultado sep. 2026'],
                    ['NNET', 'Instalación básica de split, Montevideo y área metropolitana', '$4.300 IVA incluido', 'Consultado sep. 2026'],
                    ['Home Solution', 'Mano de obra, split de menos de 3.000 frigorías', '$2.150 a $2.600', 'Referencia sin fecha'],
                    ['Home Solution', 'Mano de obra, split de 3.000 a 4.500 frigorías', '$2.600 a $3.100', 'Referencia sin fecha'],
                    ['Home Solution', 'Mano de obra, split de más de 4.500 frigorías', '$3.100 a $3.400', 'Referencia sin fecha'],
                    ['Home Solution', 'Instalación eléctrica para el equipo', '$900 a $1.300', 'Referencia sin fecha'],
                ],
            ],
            'nota' => 'Los rangos de Home Solution se publican sin fecha y son solo mano de obra, sin materiales; probablemente estén desactualizados. Tiempo Hogar aclara que el precio varía según la capacidad del equipo, la distancia entre unidades y la altura. Precios en pesos uruguayos.',
        ],
        [
            'h2'       => '¿De qué depende el precio de tu instalación?',
            'parrafos' => [
                'De cinco cosas: la capacidad del equipo, la distancia entre unidades, dónde va la condensadora, el estado de la instalación eléctrica y si hay un equipo viejo para sacar.',
                'Un split de 2.250 frigorías en un dormitorio con la condensadora en un balcón accesible es el caso más simple. Un equipo de 6.000 frigorías con 8 m de cañería y la condensadora colgada en la fachada de un piso alto es otro trabajo. En edificios, además, el reglamento puede fijar dónde va la condensadora y adónde se desagota; te lo explicamos en <a href="apartamentos">instalación en apartamentos</a>.',
                'La época también cuenta. Desde diciembre, con las primeras olas de calor, la demanda de instalaciones sube y los técnicos se llenan de trabajo. Instalar en primavera te da más fechas para elegir y un trabajo sin apuro, que es lo que evita fugas y desagotes mal hechos.',
                'Por eso el presupuesto exacto lo pedís por WhatsApp: mandanos fotos de la pared interior, del lugar de la condensadora y la etiqueta del equipo, y te respondemos con el precio de tu caso.',
            ],
        ],
        [
            'h2'       => '¿Qué otros costos conviene tener en cuenta?',
            'parrafos' => [
                'Tres más, que conviene prever desde el principio:',
            ],
            'lista' => [
                '<strong>Mantenimiento:</strong> un <a href="mantenimiento">service</a> anual antes del verano mantiene el consumo y evita reparaciones.',
                '<strong>Carga de gas:</strong> una instalación bien hecha no pierde gas. Si en algún momento falta, hay que buscar la fuga y hacer la <a href="carga-de-gas">carga de gas</a>.',
                '<strong>Mudanza:</strong> si te mudás, la <a href="desinstalacion">desinstalación</a> correcta recoge el gas en la condensadora para poder reinstalar el equipo.',
            ],
        ],
        [
            'h2'       => '¿Hay algún beneficio de UTE al comprar un aire?',
            'parrafos' => [
                'Sí. Con el <strong>Plan Redondo</strong>, UTE bonifica $2.500 (IVA incluido) en la factura por cada aire acondicionado de clase A en frío y en calor comprado entre el 1 de septiembre de 2026 y el 31 de marzo de 2027, hasta seis equipos por cliente. La compra se registra en UTE con la factura electrónica y el equipo tiene que quedar instalado en ese servicio.',
                'Si vas a comprar, un <a href="split-inverter">split inverter</a> clase A consume menos y además entra en el beneficio. Revisá las condiciones vigentes en la web de UTE antes de comprar.',
            ],
        ],
    ],

    'faq' => [
        ['q' => '¿Cuánto cuesta instalar un aire acondicionado en Montevideo?', 'a' => 'En septiembre de 2026, empresas del mercado publican la instalación estándar de split desde $3.800 (Tiempo Hogar) y a $4.300 IVA incluido (NNET). Son precios de terceros; tu presupuesto depende de metros de cañería, altura e instalación eléctrica.'],
        ['q' => '¿Cuántos metros de cañería incluye la instalación básica?', 'a' => 'El estándar del mercado es hasta 3 m entre la unidad interior y la exterior. Los metros de más se cobran aparte, con su cable y desagote.'],
        ['q' => '¿La instalación incluye la conexión eléctrica?', 'a' => 'Incluye conectar el equipo a un tomacorriente o línea existente adecuada. Si hace falta una línea nueva desde el tablero o una térmica, se cobra aparte.'],
        ['q' => '¿Instalan equipos comprados en otro lado o por internet?', 'a' => 'Sí. Trabajamos con equipos de todas las marcas (Midea, Samsung, LG, Hisense, etc.), los hayas comprado donde los hayas comprado.'],
        ['q' => '¿Cómo pido un presupuesto exacto?', 'a' => 'Por WhatsApp: mandá tu barrio, las frigorías del equipo, si es casa o apartamento y fotos del lugar de las dos unidades. Te responde un técnico de tu zona.'],
    ],

    'fuentes' => [
        ['label' => 'Instalación de aire acondicionado en Montevideo — Tiempo Hogar', 'url' => 'https://www.tiempohogar.uy/instalacion-aire-acondicionado-montevideo', 'nota' => 'instalaciones desde $3.800 y alcance de la instalación (consultado en septiembre de 2026)'],
        ['label' => 'Instalación de aire acondicionado en Uruguay — NNET', 'url' => 'https://www.nnet.com.uy/instalacion-de-aire-acondicionado-en-uruguay/', 'nota' => 'instalación básica $4.300 IVA incluido y qué se cobra aparte (consultado en septiembre de 2026)'],
        ['label' => 'Instalación de aire acondicionado — Sodimac Uruguay', 'url' => 'https://www.sodimac.com.uy/sodimac-uy/content/a680012', 'nota' => 'alcance estándar: hasta 3 m de cañería y 2,5 m de altura'],
        ['label' => 'Precios de referencia, técnico de aire — Home Solution', 'url' => 'https://homesolution.net/uy/about/preciosreferencia/tecnico-de-aire', 'nota' => 'rangos de mano de obra, publicados sin fecha'],
        ['label' => 'Plan Redondo — UTE', 'url' => 'https://www.ute.com.uy/clientes/soluciones-para-el-hogar/planredondo', 'nota' => 'bonificación por aire clase A (consultado en septiembre de 2026)'],
    ],

    'links' => [
        ['href' => 'split-inverter', 'label' => 'Instalación de split inverter'],
        ['href' => 'apartamentos',   'label' => 'Instalación en apartamentos'],
        ['href' => 'desinstalacion', 'label' => 'Desinstalación y mudanza'],
        ['href' => 'carga-de-gas',   'label' => 'Carga de gas'],
        ['href' => 'mantenimiento',  'label' => 'Service y mantenimiento'],
        ['href' => 'calculadora-frigorias', 'label' => 'Calculadora de frigorías'],
    ],

    'cta_titulo'  => 'Pedí el precio exacto de tu instalación',
    'cta_texto'   => 'Mandanos barrio, frigorías y fotos del lugar de las dos unidades. Te responde un técnico de tu zona con el presupuesto.',
    'cta_message' => 'Hola! Quiero presupuesto para instalar un aire. Barrio: ___ / Frigorías: ___ / Casa o apto: ___ / Metros aprox. entre unidades: ___',
];

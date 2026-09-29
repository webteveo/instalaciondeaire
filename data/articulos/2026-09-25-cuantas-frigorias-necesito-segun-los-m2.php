<?php
/** Guía: cuántas frigorías necesito según los m². Coherente con la calculadora (base 150 frig/m², mismos factores). */
return [
    'slug'        => 'cuantas-frigorias-necesito-segun-los-m2',
    'titulo'      => 'Cuántas frigorías necesito según los m²',
    'title'       => 'Cuántas frigorías necesito según los m² | Tabla y ejemplos',
    'description' => 'Tabla de frigorías y BTU por m², los factores que suben el cálculo (sol, techo, piso, personas) y ejemplos para dormitorio, living y oficina.',
    'keywords'    => 'cuántas frigorías necesito, frigorías por m2, frigorías dormitorio, frigorías living, btu por metro cuadrado',
    'categoria'   => 'Elegir el equipo',
    'tema'        => 'Capacidad del aire acondicionado',
    'fecha'       => '2026-09-25',
    'actualizado' => '2026-09-25',
    'autor'       => 'Equipo ' . EMPRESA_NOMBRE,
    'imagen'      => 'articulos/cuantas-frigorias-necesito-segun-los-m2.webp',
    'imagen_alt'  => 'Infografía: tabla de frigorías y BTU por m², de 2.250 frigorías para 15 m² a 6.000 frigorías para 40 m², con los ajustes por sol, techo y último piso',
    'imagen_pie'  => '',
    'bajada'      => 'Una regla rápida, una tabla y los ajustes que hacen la diferencia entre un equipo que enfría y uno que no llega.',

    'respuesta'   => 'Como regla, calculá unas <strong>150 frigorías por m²</strong> en un ambiente normal: 2.250 frigorías (9.000 BTU) hasta 15 m², 3.000 (12.000 BTU) hasta 20 m² y 4.500 (18.000 BTU) hasta 30 m². Mucho sol, techo alto, último piso, cocina o más de dos personas suben el cálculo; un dormitorio a la sombra lo baja un poco.',

    'puntos_clave' => [
        'Base: 150 frigorías por m² con techo de hasta 2,7 m, sol medio y piso intermedio.',
        '1 frigoría ≈ 3,97 BTU; en la práctica se redondea a 4: 3.000 frigorías = 12.000 BTU.',
        'Mucho sol, techo alto y último piso suman un 15 % cada uno; una cocina, un 20 %.',
        'Los split residenciales vienen en 2.250, 3.000, 4.500, 5.500 y 6.000 frigorías.',
    ],

    'secciones' => [
        [
            'h2'       => '¿De dónde sale la regla de 150 frigorías por m²?',
            'parrafos' => [
                'La regla de 150 frigorías por m² es un promedio para un ambiente residencial típico de Uruguay: techo de hasta 2,7 m, paredes de mampostería, ventanas comunes y sol moderado. Sirve para elegir rápido entre los tamaños comerciales, no para reemplazar un cálculo de carga térmica.',
                'La frigoría mide cuánto calor saca el equipo del ambiente en una hora. 1.000 frigorías por hora equivalen a unos 1,16 kW de capacidad de frío. Por eso la capacidad crece con la superficie: más metros, más aire y más paredes que absorben calor.',
                'La regla se queda corta en techos altos, techos de chapa o losa sin aislar bajo azotea, ambientes muy vidriados al norte, cocinas y oficinas con mucha gente o equipos encendidos. En esos casos conviene ajustar con los factores de abajo o pedir que un técnico vea el lugar.',
            ],
        ],
        [
            'h2'       => 'Tabla de frigorías y BTU según los m²',
            'parrafos' => [
                'La tabla vale para un ambiente normal (techo de hasta 2,7 m, sol medio, piso intermedio, hasta dos personas). Datos de referencia de ' . EMPRESA_NOMBRE . ', septiembre de 2026.',
            ],
            'tabla' => [
                'cabecera' => ['Superficie', 'Frigorías', 'BTU', 'Ambiente típico'],
                'filas'    => [
                    ['Hasta 15 m²', '2.250', '9.000', 'Dormitorio'],
                    ['16 a 20 m²', '3.000', '12.000', 'Dormitorio grande, living chico'],
                    ['21 a 30 m²', '4.500', '18.000', 'Living comedor'],
                    ['31 a 36 m²', '5.500', '22.000', 'Living integrado'],
                    ['37 a 40 m²', '6.000', '24.000', 'Ambientes grandes'],
                ],
            ],
            'nota'     => 'Si el ambiente queda justo entre dos filas y tiene algún factor que suma (sol, último piso, cocina integrada), elegí la fila de arriba. Si no tiene ninguno, la de abajo suele alcanzar.',
        ],
        [
            'h2'  => '¿Qué factores suben o bajan las frigorías?',
            'parrafos' => [
                'Son cinco: sol, altura del techo, piso, personas y uso del ambiente. Son los mismos que usa nuestra <a href="calculadora-frigorias">calculadora de frigorías</a>.',
            ],
            'h3s' => [
                ['h3' => '¿Cuánto influye la orientación y el sol?', 'parrafos' => [
                    'En Uruguay el sol pega del norte. Un living al norte con ventanal recibe sol directo buena parte del día y necesita cerca de un <strong>15 % más</strong>. Un ambiente al sur o en sombra puede bajar un 5 %. Cortinas gruesas o toldos ayudan, pero no reemplazan la capacidad que falta.',
                ]],
                ['h3' => '¿Qué pasa con los techos altos?', 'parrafos' => [
                    'Con más de 2,7 m de altura el equipo tiene que enfriar más volumen de aire. Sumá un <strong>15 %</strong>. En casas antiguas con techos de 3,5 m o más, lo correcto es calcular por volumen (m³) y consultarlo.',
                ]],
                ['h3' => '¿Importa el piso del apartamento?', 'parrafos' => [
                    'Sí. El último piso o una casa bajo azotea recibe el calor del techo todo el día: sumá un <strong>15 %</strong>. Un techo de chapa sin aislación puede pedir todavía más. Planta baja y pisos intermedios quedan en la base.',
                ]],
                ['h3' => '¿Cuánto suman las personas y el tipo de ambiente?', 'parrafos' => [
                    'Cada persona suma calor. La base contempla dos; desde la tercera, agregá unas <strong>100 frigorías por persona</strong>. Por el uso: dormitorio −5 %, oficina con computadoras +10 %, cocina o comedor diario +20 % por el calor de hornallas y horno.',
                ]],
            ],
        ],
        [
            'h2'       => '¿Cuántas frigorías para un dormitorio, un living y una oficina?',
            'parrafos' => [
                'Tres ejemplos reales de cálculo con la regla y los factores de arriba:',
            ],
            'lista'    => [
                '<strong>Dormitorio de 12 m² al sur, piso intermedio, dos personas:</strong> 12 × 150 = 1.800, menos 5 % por poco sol y 5 % por dormitorio ≈ 1.625 frigorías. El equipo más chico del mercado, <strong>2.250 frigorías (9.000 BTU)</strong>, sobra.',
                '<strong>Living de 24 m² al norte con ventanal, último piso:</strong> 24 × 150 = 3.600, más 15 % por sol y 15 % por último piso ≈ 4.760 frigorías. Corresponde un <strong>4.500 (18.000 BTU)</strong>; si además es integrado con la cocina, pasá a 5.500.',
                '<strong>Oficina de 30 m² con seis personas y computadoras:</strong> 30 × 150 = 4.500, más 10 % por oficina ≈ 4.950, más 400 por las cuatro personas extra ≈ 5.350 frigorías. Corresponde un <strong>5.500 (22.000 BTU)</strong>.',
            ],
        ],
        [
            'h2'       => '¿Qué pasa si elegís un equipo de más o de menos?',
            'parrafos' => [
                'Un equipo chico trabaja al máximo todo el tiempo y no llega a la temperatura en los días de más calor. Consume más de lo esperado, se desgasta antes y el ambiente nunca queda cómodo.',
                'Un equipo sobredimensionado enfría a golpes: llega rápido a la temperatura, corta y vuelve a arrancar. En ciclos tan cortos no saca bien la humedad, así que el ambiente queda frío pero pegajoso. Además cuesta más comprarlo. Elegir el tamaño justo es la mejor decisión de consumo que podés tomar, junto con un <a href="split-inverter">split inverter</a>.',
            ],
        ],
        [
            'h2'       => '¿Cómo lo calculo para mi casa en un minuto?',
            'parrafos' => [
                'Usá la <a href="calculadora-frigorias">calculadora de frigorías</a>: cargás los m², la altura del techo, el sol, el piso, las personas y el tipo de ambiente, y te devuelve el tamaño comercial más cercano. Con ese dato pedí presupuesto de instalación por WhatsApp.',
                'Si el ambiente es raro (integrado en L, techo de chapa, muy vidriado, más de 40 m²), pedí que el técnico lo vea antes de comprar. Para ambientes que superan los 6.000 frigorías suele convenir dividir en dos equipos o evaluar un piso-techo; lo vemos en <a href="comercial">instalaciones comerciales</a>. Si vivís en edificio, revisá también la guía de <a href="apartamentos">instalación en apartamentos</a>.',
            ],
        ],
    ],

    'faq' => [
        ['q' => '¿Cuántas frigorías necesito para un dormitorio?', 'a' => 'Para un dormitorio de hasta 15 m², 2.250 frigorías (9.000 BTU). Si tiene entre 16 y 20 m², o da al norte y está en último piso, 3.000 frigorías (12.000 BTU).'],
        ['q' => '¿Cuántas frigorías para un living de 25 m²?', 'a' => 'Alrededor de 4.500 frigorías (18.000 BTU) en condiciones normales. Si da al norte con ventanal, está en último piso o integra la cocina, conviene 5.500.'],
        ['q' => '¿Cuántos BTU son 3.000 frigorías?', 'a' => 'Unos 12.000 BTU. La equivalencia exacta es 1 frigoría ≈ 3,97 BTU, pero el mercado redondea a 4.'],
        ['q' => '¿Conviene elegir el equipo más grande por las dudas?', 'a' => 'No. Un equipo sobredimensionado enfría a golpes, deshumidifica mal y cuesta más. Solo subí un tamaño si el ambiente tiene factores que suman calor (sol, último piso, cocina, mucha gente).'],
        ['q' => '¿Las frigorías de frío sirven igual para calefaccionar?', 'a' => 'Como referencia sí: un equipo bien dimensionado para frío suele alcanzar para calefaccionar ese ambiente en el invierno uruguayo. Si el ambiente es muy frío o poco aislado, consultalo. Más en <a href="calefaccion">calefacción con aire acondicionado</a>.'],
    ],

    'fuentes' => [
        ['label' => 'Frigoría — Wikipedia', 'url' => 'https://es.wikipedia.org/wiki/Frigor%C3%ADa', 'nota' => 'definición de la unidad y equivalencia con BTU y kW'],
        ['label' => 'Programa de Normalización y Etiquetado de Eficiencia Energética — MIEM', 'url' => 'https://www.gub.uy/ministerio-industria-energia-mineria/politicas-y-gestion/programas/programa-normalizacion-etiquetado-eficiencia-energetica', 'nota' => 'etiqueta con capacidad y consumo declarados de los aires en Uruguay'],
        ['label' => '¿Qué hago si la temperatura del aire acondicionado no es tan fría? — Samsung Latinoamérica', 'url' => 'https://www.samsung.com/latin/support/home-appliances/what-to-do-if-my-air-conditioners-temperature-is-not-cool-enough/', 'nota' => 'un equipo chico para el ambiente tarda más en enfriar'],
    ],

    'links' => [
        ['href' => 'calculadora-frigorias', 'label' => 'Calculadora de frigorías'],
        ['href' => 'split-inverter',        'label' => 'Instalación de split inverter'],
        ['href' => 'apartamentos',          'label' => 'Instalación en apartamentos'],
        ['href' => 'comercial',             'label' => 'Aire acondicionado comercial'],
        ['href' => 'preguntas-frecuentes',  'label' => 'Preguntas frecuentes'],
    ],

    'cta_titulo'  => 'Ya sabés las frigorías: pedí presupuesto',
    'cta_texto'   => 'Mandanos el resultado, tu barrio y si es casa o apartamento. Te responde un técnico de tu zona.',
    'cta_message' => 'Hola! Leí la guía de frigorías y quiero presupuesto de instalación. Barrio: ___ / m²: ___ / Frigorías: ___',
];

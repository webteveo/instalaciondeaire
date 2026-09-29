<?php
/** Guía: el aire acondicionado no enfría. Causas, qué revisar, cuándo llamar. */
return [
    'slug'        => 'aire-acondicionado-no-enfria',
    'titulo'      => 'Mi aire acondicionado no enfría: causas y qué revisar',
    'title'       => 'Aire acondicionado no enfría: 6 causas y qué revisar vos',
    'description' => 'Por qué el aire prende pero no enfría: filtros, condensadora sucia, falta de gas, modo mal puesto, equipo chico o placa. Qué revisar antes de llamar.',
    'keywords'    => 'aire acondicionado no enfría, split no enfría, aire acondicionado enfría poco, aire prende pero no enfría, aire acondicionado tira aire caliente',
    'categoria'   => 'Problemas y service',
    'tema'        => 'Falla de enfriamiento del aire acondicionado',
    'fecha'       => '2026-09-25',
    'actualizado' => '2026-09-25',
    'autor'       => 'Equipo ' . EMPRESA_NOMBRE,
    'imagen'      => 'articulos/aire-acondicionado-no-enfria.webp',
    'imagen_alt'  => 'Infografía: checklist de seis pasos para revisar un aire acondicionado que no enfría, desde el modo y los filtros hasta la condensadora y el hielo en la cañería',
    'imagen_pie'  => '',
    'bajada'      => 'Seis causas, en orden de probabilidad, y cinco minutos de controles que podés hacer vos antes de pagar una visita.',

    'respuesta'   => 'Si el aire prende pero no enfría, en orden de probabilidad es: <strong>filtros sucios</strong>, condensadora tapada o sin ventilación, modo o temperatura mal puestos, <strong>falta de gas por una fuga</strong>, un equipo chico para el ambiente o una falla de sensor o placa. Las tres primeras las revisás vos en cinco minutos; las demás necesitan un técnico con manómetros.',

    'puntos_clave' => [
        'Primero revisá el modo (frío, no ventilación ni seco) y que la temperatura esté por debajo de la del ambiente.',
        'Filtros tapados es la causa más común y la más fácil de resolver: se lavan con agua.',
        'La condensadora necesita aire libre: sin plantas, cajas ni fundas alrededor.',
        'Hielo en el caño fino o aire tibio con la condensadora andando suele ser falta de gas: eso es fuga y es para técnico.',
    ],

    'secciones' => [
        [
            'h2'  => '¿Por qué mi aire acondicionado no enfría?',
            'parrafos' => ['Estas son las seis causas que más vemos en ' . EMPRESA_NOMBRE . ', de la más frecuente a la menos.'],
            'h3s' => [
                ['h3' => '1. ¿Los filtros están sucios?', 'parrafos' => [
                    'Con los filtros tapados entra poco aire a la unidad interior. El equipo enfría el poco aire que pasa, pero al ambiente llega un soplido débil. Si se tapan mucho, el serpentín se congela y deja de enfriar del todo. Samsung recomienda limpiarlos cada dos semanas en uso.',
                ]],
                ['h3' => '2. ¿La condensadora está sucia o encerrada?', 'parrafos' => [
                    'La unidad exterior es la que tira afuera el calor que sacó de adentro. Si el serpentín está lleno de pelusa, hojas o salitre, o si la tapaste con una funda, macetas o una caja, no puede disipar el calor y el equipo enfría cada vez menos, sobre todo en las horas de más sol.',
                ]],
                ['h3' => '3. ¿Está en el modo correcto?', 'parrafos' => [
                    'Parece obvio, pero pasa seguido: el control quedó en ventilación, en seco (deshumidificar), en automático o en calor desde el invierno. También puede estar programado un modo de ahorro o un temporizador. Revisá que el display o el control muestren el copo de nieve y una temperatura más baja que la del ambiente.',
                ]],
                ['h3' => '4. ¿Le falta gas?', 'parrafos' => [
                    'Un split bien instalado no consume gas: si falta, hay una fuga en una unión, una válvula o un serpentín. Los síntomas son aire apenas fresco, hielo en el caño fino o en la unidad interior, y una condensadora que funciona pero larga aire tibio. La solución es buscar la fuga, repararla, hacer vacío y recién ahí la <a href="carga-de-gas">carga de gas</a>. Cargar sin reparar es tirar la plata.',
                ]],
                ['h3' => '5. ¿El equipo es chico para el ambiente?', 'parrafos' => [
                    'Si nunca enfrió bien en los días de mucho calor, puede que las frigorías no alcancen: un living al norte en último piso con un equipo pensado para un dormitorio no llega. Calculalo con la guía de <a href="articulos/cuantas-frigorias-necesito-segun-los-m2">frigorías por m²</a>.',
                ]],
                ['h3' => '6. ¿Puede ser un sensor, el capacitor o la placa?', 'parrafos' => [
                    'Si el equipo corta solo al rato, no arranca la condensadora o muestra un código de error, puede ser un sensor de temperatura, el capacitor del compresor o del ventilador, o la placa electrónica. Anotá el código tal cual aparece: acorta mucho el diagnóstico.',
                ]],
            ],
        ],
        [
            'h2'    => '¿Qué podés revisar vos antes de llamar al técnico?',
            'parrafos' => ['Seis controles en este orden. Si alguno resuelve el problema, te ahorraste la visita.'],
            'lista' => [
                'Poné el control en <strong>modo frío</strong>, temperatura 23–24 °C y ventilador en alto. Cerrá puertas y ventanas.',
                'Sacá y <strong>lavá los filtros</strong> con agua tibia; dejalos secar antes de volver a ponerlos.',
                'Mirá la <strong>unidad exterior</strong>: que el ventilador gire y que no haya nada tapándola a menos de medio metro.',
                'Con el equipo andando 10 minutos, tocá los <strong>caños de cobre</strong> en la condensadora: el grueso tiene que estar frío. Si está tibio o hay hielo, apagá.',
                'Revisá la <strong>térmica</strong> del aire en el tablero y cambiá las pilas del control.',
                'Si aparece un <strong>código de error</strong> en el display, anotalo con la marca y el modelo.',
            ],
            'lista_ordenada' => true,
            'nota' => 'No abras la unidad ni toques la cañería con herramientas. El gas está a presión y los capacitores guardan carga eléctrica aunque el equipo esté apagado.',
        ],
        [
            'h2'       => '¿Cuándo es un trabajo para técnico?',
            'parrafos' => [
                'Llamá a un técnico si después de los controles sigue enfriando poco, si hay hielo en la cañería, si la condensadora no arranca, si hace ruidos nuevos o si aparece un código de error. También si el equipo enfría bien de noche pero no a la tarde: suele ser condensadora sucia o falta de gas que se nota con más calor.',
                'En la visita de <a href="reparacion">reparación</a> el técnico mide presiones, temperatura de salida y consumo eléctrico, prueba componentes y te da el presupuesto antes de arreglar. Si el problema es suciedad, se resuelve con un <a href="mantenimiento">service completo</a>.',
            ],
        ],
        [
            'h2'    => 'Síntoma y causa probable',
            'tabla' => [
                'cabecera' => ['Síntoma', 'Causa probable', 'Quién lo resuelve'],
                'filas'    => [
                    ['Sopla poco aire', 'Filtros tapados', 'Vos (lavar filtros)'],
                    ['Enfría bien de noche, mal a la tarde', 'Condensadora sucia o encerrada', 'Vos o service'],
                    ['Sopla aire a temperatura ambiente', 'Modo ventilación o seco', 'Vos (control)'],
                    ['Hielo en el caño fino, aire apenas fresco', 'Falta de gas por fuga', 'Técnico'],
                    ['Nunca llegó a enfriar en días de calor', 'Equipo chico para el ambiente', 'Técnico (evaluar equipo)'],
                    ['Corta solo o muestra código', 'Sensor, capacitor o placa', 'Técnico'],
                ],
            ],
            'parrafos' => ['Guía orientativa de ' . EMPRESA_NOMBRE . ', septiembre de 2026. El diagnóstico final siempre se hace midiendo.'],
        ],
        [
            'h2'       => '¿Cómo evitar que deje de enfriar en pleno verano?',
            'parrafos' => [
                'Con un service antes de la temporada. Octubre y noviembre son los mejores meses: el técnico limpia filtros, serpentines y condensadora, controla presiones y detecta una fuga chica antes de que el equipo se quede sin gas en enero, cuando la demanda de técnicos se dispara. Más detalle en <a href="articulos/cada-cuanto-hacer-service-aire-acondicionado">cada cuánto hacer el service</a>.',
            ],
        ],
    ],

    'faq' => [
        ['q' => 'Mi aire prende pero no enfría, ¿qué hago primero?', 'a' => 'Revisá que esté en modo frío con temperatura baja, lavá los filtros y fijate que la condensadora gire y no esté tapada. Si sigue igual, pedí un diagnóstico.'],
        ['q' => '¿Cómo sé si a mi aire le falta gas?', 'a' => 'Indicios: aire apenas fresco, hielo en el caño fino o en la unidad interior y condensadora andando sin sacar calor. Solo se confirma midiendo presiones con manómetro, y siempre implica una fuga.'],
        ['q' => '¿Se puede cargar gas sin buscar la fuga?', 'a' => 'Se puede, pero no conviene: el gas se vuelve a ir y pagás dos veces. Lo correcto es localizar la fuga, repararla, hacer vacío y cargar.'],
        ['q' => '¿Por qué el aire enfría de noche y de día no?', 'a' => 'Porque de día la condensadora tiene que tirar calor a un aire exterior más caliente. Si está sucia, al sol directo o le falta gas, es cuando más se nota.'],
        ['q' => '¿Cuánto cuesta arreglar un aire que no enfría?', 'a' => 'Depende de la causa: no es lo mismo una limpieza que una fuga o una placa. El técnico te da el presupuesto después del diagnóstico. Escribinos por WhatsApp con marca, síntoma y barrio.'],
    ],

    'fuentes' => [
        ['label' => '¿Qué hago si la temperatura del aire acondicionado no es tan fría? — Samsung Latinoamérica', 'url' => 'https://www.samsung.com/latin/support/home-appliances/what-to-do-if-my-air-conditioners-temperature-is-not-cool-enough/', 'nota' => 'modo, obstáculos, tamaño del ambiente y limpieza del filtro cada dos semanas'],
        ['label' => 'Maintenance Checklist — ENERGY STAR (en inglés)', 'url' => 'https://www.energystar.gov/saveathome/heating-cooling/maintenance-checklist', 'nota' => 'nivel de refrigerante, limpieza de filtros y revisión antes de la temporada'],
        ['label' => '¿Por qué gotea agua o se forma condensación en el aire acondicionado? — LG Argentina', 'url' => 'https://www.lg.com/ar/soporte/ayuda-producto/CT32005513-20155363577851', 'nota' => 'efecto del poco refrigerante en los serpentines'],
    ],

    'links' => [
        ['href' => 'reparacion',    'label' => 'Reparación de aire acondicionado'],
        ['href' => 'carga-de-gas',  'label' => 'Carga de gas y búsqueda de fugas'],
        ['href' => 'mantenimiento', 'label' => 'Service y mantenimiento'],
        ['href' => 'calculadora-frigorias', 'label' => 'Calculadora de frigorías'],
    ],

    'cta_titulo'  => '¿Tu aire sigue sin enfriar? Escribinos',
    'cta_texto'   => 'Contanos la marca, qué hace y tu barrio. Un técnico de tu zona te dice qué puede ser y coordina la visita.',
    'cta_message' => 'Hola, mi aire acondicionado prende pero no enfría. Ya limpié los filtros: sí / no. Marca: ___ / Barrio: ___',
];

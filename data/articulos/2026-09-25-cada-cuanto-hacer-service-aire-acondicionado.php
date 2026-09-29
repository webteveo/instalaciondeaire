<?php
/** Guía: cada cuánto hacer el service del aire acondicionado. */
return [
    'slug'        => 'cada-cuanto-hacer-service-aire-acondicionado',
    'titulo'      => 'Cada cuánto hacer el service del aire acondicionado',
    'title'       => 'Cada cuánto hacer service al aire acondicionado | Checklist',
    'description' => 'Filtros cada 2 a 4 semanas, service completo una vez al año antes del verano y más seguido en la costa. Qué incluye y checklist antes del calor.',
    'keywords'    => 'cada cuánto hacer service aire acondicionado, cada cuánto limpiar aire acondicionado, mantenimiento aire acondicionado frecuencia, service split antes del verano, limpiar filtros aire acondicionado',
    'categoria'   => 'Problemas y service',
    'tema'        => 'Mantenimiento del aire acondicionado',
    'fecha'       => '2026-09-25',
    'actualizado' => '2026-09-25',
    'autor'       => 'Equipo ' . EMPRESA_NOMBRE,
    'imagen'      => 'articulos/cada-cuanto-hacer-service-aire-acondicionado.webp',
    'imagen_alt'  => 'Infografía: calendario de mantenimiento del aire acondicionado con filtros cada 2 a 4 semanas, service anual en octubre o noviembre y doble service en zona costera',
    'imagen_pie'  => '',
    'bajada'      => 'Qué te toca a vos, qué le toca al técnico y cuándo conviene hacerlo para no quedarte sin aire en enero.',

    'respuesta'   => 'Los <strong>filtros</strong> se limpian cada dos a cuatro semanas mientras usás el equipo, y eso lo hacés vos. El <strong>service completo</strong> con técnico se hace una vez al año, idealmente en octubre o noviembre, antes del calor. En zona costera, si usás el aire todo el año (frío y calor) o en comercios, conviene dos veces al año.',

    'puntos_clave' => [
        'Filtros: cada 2 a 4 semanas de uso; se lavan con agua, sin herramientas.',
        'Service completo: una vez al año, antes del verano (octubre o noviembre).',
        'Dos services al año si estás en la costa, usás frío y calor o es un comercio.',
        'El service limpia serpentines, turbina, desagote y condensadora, y controla presiones y conexiones.',
    ],

    'secciones' => [
        [
            'h2'    => '¿Cada cuánto hay que hacer el service del aire acondicionado?',
            'parrafos' => [
                'Depende del uso y de dónde está el equipo. Esta es la frecuencia que recomendamos en ' . EMPRESA_NOMBRE . ' para Uruguay:',
            ],
            'tabla' => [
                'cabecera' => ['Tarea', 'Frecuencia', 'Quién la hace'],
                'filas'    => [
                    ['Limpiar filtros', 'Cada 2 a 4 semanas de uso', 'Vos'],
                    ['Revisar que la condensadora esté despejada', 'Al empezar cada temporada', 'Vos'],
                    ['Service completo, uso residencial normal', '1 vez al año, antes del verano', 'Técnico'],
                    ['Service en zona costera o uso frío y calor', '2 veces al año', 'Técnico'],
                    ['Service en comercios y oficinas', '2 veces al año o más', 'Técnico'],
                ],
            ],
            'nota' => 'Frecuencias de referencia de ' . EMPRESA_NOMBRE . ', septiembre de 2026. Samsung recomienda limpiar el filtro cada dos semanas; ENERGY STAR, revisarlo una vez al mes y hacer un chequeo anual con técnico antes de la temporada de uso.',
        ],
        [
            'h2'       => '¿Qué diferencia hay entre limpiar los filtros y hacer un service?',
            'parrafos' => [
                'Los filtros son la malla plástica que se saca levantando la tapa de la unidad interior. Atrapan el polvo antes de que llegue al serpentín. Se lavan con agua tibia, se dejan secar a la sombra y se vuelven a colocar. Es lo que más influye en el rendimiento día a día, y lo hacés vos en cinco minutos.',
                'El service completo va más adentro: limpia el serpentín, la turbina y la bandeja, destapa el desagote, limpia la condensadora y controla con instrumentos que el gas, las temperaturas y el consumo eléctrico estén bien. Eso necesita un técnico, herramientas y, a veces, acceso a la unidad exterior en altura.',
            ],
        ],
        [
            'h2'    => '¿Qué incluye un service completo?',
            'parrafos' => ['Un <a href="mantenimiento">service completo</a> bien hecho incluye:'],
            'lista' => [
                'Limpieza de filtros y carcasa de la unidad interior.',
                'Limpieza del serpentín (evaporador) y de la turbina interior.',
                'Destape y limpieza del desagote y de la bandeja de condensado.',
                'Limpieza del serpentín y del ventilador de la condensadora.',
                'Control de presiones de gas, temperatura de salida y consumo eléctrico.',
                'Revisión de conexiones eléctricas, soportes y aislación de la cañería.',
                'Prueba de funcionamiento en frío y, si corresponde, en calor.',
            ],
            'nota' => 'La carga de gas no forma parte del service. Si las presiones muestran que falta gas, hay una fuga: se cotiza aparte la búsqueda, la reparación y la carga.',
        ],
        [
            'h2'       => '¿Qué pasa si no hacés el service?',
            'parrafos' => [
                'El equipo sigue andando, pero cada vez peor. El polvo que no frena el filtro se pega al serpentín húmedo y forma una capa que aísla: el aire pasa, pero se enfría menos. La turbina se ensucia, sopla con menos fuerza y junta hongos que después largan olor a humedad al prender.',
                'Afuera pasa lo mismo con la condensadora: pelusa, hojas y, en la costa, sal. Con el intercambio de calor tapado, el compresor trabaja más horas y más caliente para lograr la misma temperatura. Eso se ve en la factura de UTE y en la vida útil del equipo.',
                'El final típico es una falla en la peor semana: el desagote tapado que rebalsa adentro, el serpentín congelado o una fuga chica que nadie detectó y dejó al equipo sin gas. Un service a tiempo detecta la mayoría de estos problemas cuando todavía son baratos de resolver.',
            ],
        ],
        [
            'h2'    => 'Checklist antes del verano',
            'parrafos' => ['Hacelo en octubre o noviembre, antes del primer día de calor fuerte:'],
            'lista' => [
                'Sacá y lavá los filtros; si están rotos o deformados, pedí repuesto.',
                'Mirá la condensadora: sin hojas, nidos, macetas ni fundas alrededor.',
                'Prendé el equipo en frío 30 minutos y fijate que el caño de desagote largue agua afuera.',
                'Controlá que el aire salga frío y sin olor a humedad.',
                'Escuchá ruidos nuevos: vibraciones, golpeteos o zumbidos en la unidad exterior.',
                'Si algo falla o el último service fue hace más de un año, agendá el service ahora.',
            ],
            'lista_ordenada' => true,
        ],
        [
            'h2'       => '¿Por qué en la costa hay que hacerlo más seguido?',
            'parrafos' => [
                'Por el salitre. En Pocitos, Malvín, Carrasco, Ciudad de la Costa, Atlántida o Punta del Este, la condensadora respira aire con sal. La sal se pega a las aletas de aluminio, las corroe y tapa el intercambio de calor. El equipo enfría menos, trabaja más horas y la corrosión acorta su vida útil.',
                'En esas zonas conviene un enjuague del serpentín exterior en cada service y dos visitas al año. En casas de temporada, lo práctico es una puesta a punto antes de diciembre y un cierre después del verano. Lo coordinamos en la <a href="zonas/punta-del-este">puesta a punto de temporada en Punta del Este</a> y en el resto de la costa.',
            ],
        ],
        [
            'h2'    => '¿Qué señales indican que el equipo necesita service ya?',
            'lista' => [
                'Enfría menos que antes o tarda mucho en llegar a la temperatura.',
                'Larga olor a humedad o a encerrado al prender.',
                'Gotea agua por la unidad interior.',
                'La unidad exterior hace más ruido o vibra.',
                'La factura de UTE subió sin que hayas cambiado el uso.',
            ],
            'parrafos' => [
                'Si aparece alguna, no esperes al service anual. Mirá también las guías de por qué el <a href="articulos/aire-acondicionado-no-enfria">aire no enfría</a> y por qué <a href="articulos/por-que-el-aire-acondicionado-pierde-agua">pierde agua</a>.',
            ],
        ],
    ],

    'faq' => [
        ['q' => '¿Cada cuánto hay que hacerle service al aire?', 'a' => 'Una vez al año antes del verano para uso residencial normal. Dos veces al año si estás en la costa, si lo usás para frío y calor o si es un comercio. Los filtros, cada dos a cuatro semanas de uso.'],
        ['q' => '¿Cuál es el mejor mes para el service?', 'a' => 'Octubre o noviembre. El equipo queda listo antes del calor y conseguís fecha más fácil: desde diciembre la demanda de técnicos se dispara.'],
        ['q' => '¿Puedo limpiar el aire acondicionado yo mismo?', 'a' => 'Los filtros y la carcasa sí. El serpentín, la turbina, el desagote y la condensadora conviene dejarlos al técnico: hay componentes eléctricos y aletas que se dañan fácil.'],
        ['q' => '¿El service incluye carga de gas?', 'a' => 'No. Si la instalación está bien hecha el gas no se consume. Si falta, hay una fuga y se cotiza aparte.'],
        ['q' => '¿Hacen service de varios equipos en una misma visita?', 'a' => 'Sí, y suele convenir. Decinos cuántos equipos son, las marcas y dónde están las condensadoras.'],
    ],

    'fuentes' => [
        ['label' => 'Maintenance Checklist — ENERGY STAR (en inglés)', 'url' => 'https://www.energystar.gov/saveathome/heating-cooling/maintenance-checklist', 'nota' => 'filtros una vez al mes y chequeo anual antes de la temporada'],
        ['label' => '¿Qué hago si la temperatura del aire acondicionado no es tan fría? — Samsung Latinoamérica', 'url' => 'https://www.samsung.com/latin/support/home-appliances/what-to-do-if-my-air-conditioners-temperature-is-not-cool-enough/', 'nota' => 'limpieza del filtro cada dos semanas'],
    ],

    'links' => [
        ['href' => 'mantenimiento',        'label' => 'Service y mantenimiento'],
        ['href' => 'zonas/punta-del-este', 'label' => 'Puesta a punto en Punta del Este'],
        ['href' => 'reparacion',           'label' => 'Reparación de aire acondicionado'],
        ['href' => 'carga-de-gas',         'label' => 'Carga de gas'],
    ],

    'cta_titulo'  => 'Agendá el service antes del verano',
    'cta_texto'   => 'Decinos tu barrio y cuántos equipos tenés. Te responde un técnico de tu zona con fechas disponibles.',
    'cta_message' => 'Hola! Quiero agendar el service de mi aire antes del verano. Barrio: ___ / Cantidad de equipos: ___ / Último service: ___',
];

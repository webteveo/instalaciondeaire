<?php
/** /multi-split — Instalación de multi-split: una unidad exterior para varios ambientes. */
return [
    'title'       => 'Instalación de multi split en Montevideo - Varios ambientes',
    'description' => 'Instalación de multi split por WhatsApp: una sola condensadora para dos a cinco ambientes, cuándo conviene y qué implica en casas y apartamentos.',
    'keywords'    => 'instalación multi split montevideo, multi split inverter, una condensadora varios equipos, aire acondicionado varios ambientes, multi split precio instalación',
    'eyebrow'     => 'Una unidad exterior, varios ambientes',
    'h1'          => 'Instalación de multi split en Montevideo',
    'subtitle'    => 'Varias unidades interiores conectadas a una sola condensadora: menos equipos en la fachada, más orden. Te decimos si conviene en tu casa y lo instalamos con vacío y prueba por circuito.',
    'cta_label'   => 'Obtené tu presupuesto',
    'cta_message' => 'Hola! Quiero presupuesto para un multi split. Barrio: ___ / Cantidad de ambientes: ___ / m² de cada uno: ___',
    'cta_message_zona' => 'Hola! Vengo de la web, quiero instalar un multi split en [Zona]. Ambientes: ___',
    'form_servicio' => 'Instalación de multi split',
    'faq_tema'    => 'el multi split',
    'zonas_tema'  => 'instalar multi split',

    'intro' => [
        ['t' => '¿Qué es un multi split y cuándo conviene?', 'p' => [
            'Un multi split es un sistema con <strong>una sola unidad exterior</strong> conectada a dos, tres, cuatro o cinco unidades interiores, cada una en un ambiente distinto y con su propio control. En lugar de tener una condensadora por cada split, hay una sola que alimenta a todas.',
            'Conviene cuando hay poco lugar afuera (un balcón chico, un patio donde no entran varias condensadoras, una fachada que el edificio no deja llenar de equipos) o cuando se quiere una instalación más ordenada en una casa con varios dormitorios. No siempre es la opción más barata: el equipo cuesta más que la suma de splits equivalentes en muchos casos, y la instalación tiene más cañería.',
        ]],
        ['t' => '¿Qué desventajas tiene frente a splits separados?', 'p' => [
            'La principal: si la unidad exterior falla, se quedan sin aire todos los ambientes conectados. Con splits independientes, una falla afecta a un solo ambiente. También hay que elegir desde el principio cuántas unidades interiores tendrá el sistema: sumar una más después no siempre es posible.',
            'Además, la condensadora de un multi split trabaja mejor cuando varios ambientes piden frío o calor a la vez. Si en la casa se usa un ambiente por vez, a veces rinde más tener splits separados.',
        ]],
    ],

    'incluye' => ['titulo' => 'Qué incluye la instalación de un multi split', 'items' => [
        'Soporte de la unidad exterior (ménsulas o base)',
        'Cañería de cobre aislada para cada unidad interior, hasta los metros acordados en el presupuesto',
        'Desagote de cada unidad interior',
        'Interconexión eléctrica de cada circuito',
        'Vacío de todos los circuitos con bomba y carga según el manual del fabricante',
        'Prueba de cada ambiente por separado y de todos funcionando a la vez',
    ]],
    'aparte' => ['titulo' => 'Qué se cobra aparte', 'items' => [
        'Metros de cañería por encima de lo acordado en cada circuito',
        'Canaleta para tapar los recorridos a la vista',
        'Trabajo en altura si la condensadora va en fachada',
        'Línea eléctrica dedicada desde el tablero',
        'Base o estructura especial para la unidad exterior',
    ]],

    'tabla_capacidad' => false,

    'secciones' => [
        ['t' => '¿Cómo se elige la capacidad de un multi split?', 'p' => [
            'Primero se calcula cada ambiente por separado (metros, sol, altura, personas) para elegir la capacidad de cada unidad interior. Después se elige una unidad exterior compatible con esa combinación: los fabricantes publican qué combinaciones de unidades interiores acepta cada condensadora.',
            'No se trata de sumar las frigorías de todos los ambientes: la condensadora puede tener menos capacidad que la suma, porque rara vez todos los ambientes están al máximo a la vez. El técnico te lo explica con la tabla del modelo que elijas.',
        ]],
        ['t' => '¿Dónde va la unidad exterior?', 'p' => [
            'Es más grande y pesada que la de un split común, así que necesita un lugar firme: una base en el piso del patio o del balcón, o ménsulas reforzadas en una pared. Desde ahí salen tantas cañerías como unidades interiores haya, así que conviene que quede en un punto central para acortar los recorridos.',
            'En apartamentos, consultá el reglamento del edificio: algunos permiten una sola unidad exterior por apartamento, y ahí el multi split es la única forma de climatizar varios ambientes.',
        ]],
        ['t' => '¿Se puede instalar en una casa ya terminada?', 'p' => [
            'Sí, pero los recorridos de cañería son más largos que en splits individuales, porque todas las líneas vuelven al mismo lugar. En una casa terminada suele hacer falta canaleta; en una obra o reforma se pueden dejar embutidas con una <a href="' . $url . 'preinstalacion">preinstalación</a>.',
        ]],
    ],

    'pasos_titulo' => 'Cómo es la instalación de un multi split',
    'pasos_lead'   => 'Se planifica todo el sistema antes de perforar la primera pared.',
    'pasos' => [
        ['icono' => 'ri-layout-4-line', 'titulo' => 'Ambientes y lugar afuera', 'desc' => 'Cuántos ambientes, sus metros y dónde podría ir una sola unidad exterior para todos.'],
        ['icono' => 'ri-git-branch-line', 'titulo' => 'Combinación del equipo', 'desc' => 'Elegimos unidades interiores y condensadora compatibles según la tabla del fabricante.'],
        ['icono' => 'ri-tools-line', 'titulo' => 'Circuitos', 'desc' => 'Cañería, desagote e interconexión de cada unidad hasta la condensadora común.'],
        ['icono' => 'ri-dashboard-3-line', 'titulo' => 'Vacío y prueba por circuito', 'desc' => 'Vacío de todo el sistema, carga según manual y prueba de cada ambiente y de todos juntos.'],
    ],

    'faq' => [
        ['q' => '¿Cuántos ambientes puede tener un multi split?', 'a' => 'Depende del modelo: los más comunes son de dos a cinco unidades interiores. La combinación exacta la define el fabricante.'],
        ['q' => '¿Cada ambiente tiene su control?', 'a' => 'Sí, cada unidad interior tiene su control y su temperatura. En la mayoría de los modelos, todas deben estar en el mismo modo (frío o calor) a la vez.'],
        ['q' => '¿Qué pasa si se rompe la unidad exterior?', 'a' => 'Se quedan sin aire todos los ambientes conectados hasta que se repare. Es la principal desventaja frente a splits independientes.'],
        ['q' => '¿Se puede agregar un ambiente después?', 'a' => 'Solo si la condensadora tiene salidas libres y la combinación lo permite. Conviene definirlo al comprar.'],
        ['q' => '¿Hacen service de multi split?', 'a' => 'Sí: limpieza de cada unidad interior, de la condensadora y revisión de todos los circuitos.'],
    ],

    'zonas' => true,
    'cta_final_titulo' => 'Pedí presupuesto para tu multi split',
    'cta_final_texto'  => 'Contanos cuántos ambientes querés climatizar, los metros de cada uno y dónde podría ir la unidad exterior.',
];

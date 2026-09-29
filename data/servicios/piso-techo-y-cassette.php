<?php
/** /piso-techo-y-cassette — Equipos piso-techo y cassette para ambientes grandes, locales y oficinas. */
return [
    'title'       => 'Aire acondicionado piso techo y cassette - Instalación',
    'description' => 'Instalación de equipos piso techo y cassette por WhatsApp: para livings grandes, locales, oficinas y salones donde un split de pared no alcanza.',
    'keywords'    => 'aire acondicionado piso techo, instalación piso techo montevideo, aire acondicionado cassette, cassette para oficina, equipo para ambientes grandes',
    'eyebrow'     => 'Para ambientes grandes',
    'h1'          => 'Instalación de equipos piso techo y cassette',
    'subtitle'    => 'Cuando un split de pared no alcanza o no reparte bien el aire: equipos piso-techo y cassette para livings grandes, locales, oficinas y salones.',
    'cta_label'   => 'Obtené tu presupuesto',
    'cta_message' => 'Hola! Quiero presupuesto para un equipo piso techo o cassette. Barrio: ___ / m² del ambiente: ___ / ¿Casa, local u oficina?: ___',
    'cta_message_zona' => 'Hola! Vengo de la web, quiero un equipo piso techo o cassette en [Zona]. m²: ___',
    'form_servicio' => 'Instalación de piso techo o cassette',
    'faq_tema'    => 'los equipos piso techo y cassette',
    'zonas_tema'  => 'instalar piso techo o cassette',

    'intro' => [
        ['t' => '¿Cuándo un split de pared no alcanza?', 'p' => [
            'En ambientes de más de 35 o 40 m², con techos altos, formas alargadas o mucha gente, un split de pared tiene dos límites: la capacidad (los modelos de pared más comunes llegan a 6.000 frigorías) y la forma en que reparte el aire, que sale de un solo punto de la pared y no llega bien al otro extremo.',
            'Ahí entran los equipos <strong>piso-techo</strong> y <strong>cassette</strong>: mueven más aire, llegan a capacidades mayores y lo distribuyen mejor en ambientes grandes. Son habituales en locales, oficinas, consultorios, salones de eventos y livings grandes de casas.',
        ]],
        ['t' => '¿Qué diferencia hay entre piso-techo y cassette?', 'p' => [
            'El <strong>piso-techo</strong> se cuelga del techo o se apoya en la parte baja de una pared, y larga el aire horizontalmente a lo largo del ambiente. Es ideal para ambientes alargados y no necesita cielorraso. El <strong>cassette</strong> se embute en un cielorraso y reparte el aire hacia los cuatro lados desde el centro: queda casi invisible, pero requiere un cielorraso con espacio arriba.',
            'En locales ya terminados sin cielorraso, el piso-techo suele ser la opción. En oficinas con cielorraso técnico, el cassette queda más prolijo.',
        ]],
    ],

    'incluye' => ['titulo' => 'Qué incluye la instalación', 'items' => [
        'Fijación de la unidad interior al techo o a la estructura del cielorraso',
        'Soporte o base de la unidad exterior',
        'Cañería de cobre aislada hasta los metros acordados en el presupuesto',
        'Desagote, con bomba de condensado si no hay caída natural',
        'Interconexión eléctrica entre unidades',
        'Vacío del circuito con bomba y prueba de funcionamiento',
    ]],
    'aparte' => ['titulo' => 'Qué se cobra aparte', 'items' => [
        'Línea eléctrica dedicada (muchos equipos grandes necesitan una sección de cable mayor)',
        'Metros de cañería adicionales',
        'Apertura o adaptación del cielorraso para un cassette',
        'Trabajo en altura o estructura especial para la condensadora',
        'Canaleta para tapar recorridos a la vista',
    ]],

    'tabla_capacidad' => false,

    'secciones' => [
        ['t' => '¿Cómo se calcula la capacidad en un ambiente grande?', 'p' => [
            'Además de los metros, pesan mucho la altura del techo, la gente que ocupa el ambiente, la iluminación, los equipos que generan calor y las vidrieras al sol. En un local comercial o un salón de eventos, la ocupación puede cambiar el cálculo más que los metros.',
            'Con los datos del ambiente, el técnico calcula la carga y te propone uno o más equipos. A veces conviene dividir: dos equipos más chicos reparten mejor y, si uno falla, el otro sigue funcionando.',
        ]],
        ['t' => '¿Qué hay que prever en la instalación eléctrica?', 'p' => [
            'Los equipos de alta capacidad consumen más y algunos modelos son trifásicos. Antes de comprar, conviene confirmar qué alimentación tiene el local o la casa y si el tablero admite una línea dedicada con la sección de cable necesaria. Si hace falta una ampliación de potencia con UTE, hay que gestionarla con tiempo.',
        ]],
        ['t' => '¿Cómo es el mantenimiento?', 'p' => [
            'Estos equipos mueven mucho aire y en locales trabajan muchas horas. Necesitan limpieza de filtros frecuente y un service completo al menos una vez al año, dos en uso comercial intensivo. En cassettes con bomba de condensado, la bomba se revisa en cada service. Más detalle en <a href="' . $url . 'mantenimiento">service de aire acondicionado</a>.',
        ]],
    ],

    'pasos_titulo' => 'Cómo es la instalación de un piso-techo o cassette',
    'pasos_lead'   => 'Primero el cálculo del ambiente, después el tipo de equipo.',
    'pasos' => [
        ['icono' => 'ri-ruler-2-line', 'titulo' => 'Ambiente y uso', 'desc' => 'Metros, altura, cielorraso, gente y horas de uso: con eso se define el tipo de equipo.'],
        ['icono' => 'ri-flashlight-line', 'titulo' => 'Eléctrica', 'desc' => 'Confirmamos alimentación y tablero antes de comprar, sobre todo en equipos grandes.'],
        ['icono' => 'ri-tools-line', 'titulo' => 'Instalación', 'desc' => 'Fijación firme de la unidad interior, cañería, desagote o bomba, y condensadora.'],
        ['icono' => 'ri-dashboard-3-line', 'titulo' => 'Prueba', 'desc' => 'Vacío, prueba de funcionamiento y ajuste de la dirección del aire en el ambiente.'],
    ],

    'faq' => [
        ['q' => '¿Qué conviene en un local sin cielorraso?', 'a' => 'En general un piso-techo, que se cuelga del techo o se apoya en la pared y no necesita cielorraso.'],
        ['q' => '¿El cassette necesita cielorraso?', 'a' => 'Sí, se embute en un cielorraso con espacio suficiente arriba para el cuerpo del equipo y las cañerías.'],
        ['q' => '¿Estos equipos hacen mucho ruido?', 'a' => 'Mueven más aire que un split de pared, así que se escuchan algo más. En oficinas y consultorios se eligen modelos y velocidades acordes.'],
        ['q' => '¿Se pueden usar en una casa?', 'a' => 'Sí, en livings grandes o con techos altos un piso-techo reparte mejor que un split de pared.'],
        ['q' => '¿Reparan y hacen service de piso-techo y cassette?', 'a' => 'Sí, además de instalarlos.'],
    ],

    'zonas' => true,
    'cta_final_titulo' => 'Pedí presupuesto para tu piso-techo o cassette',
    'cta_final_texto'  => 'Contanos los metros, la altura del techo, si hay cielorraso y para qué se usa el ambiente.',
];

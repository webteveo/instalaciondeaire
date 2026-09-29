<?php
/** /apartamentos — Instalación en apartamentos: condensadora en balcón o fachada, trabajo en altura, reglas del edificio. */
return [
    'title'       => 'Instalación de aire acondicionado en apartamentos',
    'description' => 'Aire en apartamentos por WhatsApp: condensadora en balcón, fachada o patio de aire, trabajo en altura y reglas del edificio en Montevideo.',
    'keywords'    => 'instalación aire acondicionado apartamento, condensadora en balcón, aire acondicionado en fachada edificio, instalar split apartamento montevideo, trabajo en altura aire acondicionado',
    'eyebrow'     => 'Edificios de Montevideo y la costa',
    'h1'          => 'Instalación de aire acondicionado en apartamentos',
    'subtitle'    => 'Condensadora en balcón, fachada o patio de aire, con las reglas del edificio en cuenta. Te responde un técnico de tu zona que trabaja todos los días en edificios.',
    'cta_label'   => 'Obtené tu presupuesto',
    'cta_message' => 'Hola! Quiero instalar un aire en mi apartamento. Barrio: ___ / Piso: ___',
    'cta_message_zona' => 'Hola! Quiero instalar un aire en mi apartamento en [Zona]. Piso: ___',
    'form_servicio' => 'Instalación en apartamentos',
    'faq_tema'    => 'instalar aire acondicionado en un apartamento',
    'zonas_tema'  => 'instalar en apartamentos',

    'intro' => [
        ['t' => '¿Dónde va la condensadora en un apartamento?', 'p' => [
            'Es la primera pregunta que hace el técnico, porque define casi todo el presupuesto. Las opciones habituales, de la más simple a la más compleja:',
        ], 'lista' => [
            '<strong>En el balcón</strong>, fijada al piso o a la pared con ménsulas: la más común, con cañería corta y sin trabajo en altura.',
            '<strong>En un patio de aire interior</strong>: típico en edificios del Centro y Cordón sin balcón; hay que ver que la unidad ventile y que se pueda acceder para el service.',
            '<strong>En la fachada</strong>, colgada con ménsulas: requiere trabajo en altura con arnés (se cotiza aparte) y, casi siempre, autorización del edificio.',
            '<strong>En la azotea</strong>: para últimos pisos o edificios que la habilitan; suele implicar más metros de cañería.',
        ]],
        ['t' => '¿Qué reglas del edificio hay que consultar?', 'p' => [
            'Cada edificio decide qué permite. Algunos reglamentos de copropiedad fijan dónde puede ir la unidad exterior, prohíben la fachada, exigen que el desagote vaya a un desagüe y no gotee a la calle, o piden una nota a la administración antes de perforar. No podemos decirte qué permite tu edificio: <strong>consultá el reglamento y a la administración</strong>, idealmente antes de comprar el equipo, para no encontrarte con que el único lugar habilitado necesita ocho metros de caño.',
            'Si tenés dudas, mandale al técnico una foto del balcón y de la fachada: con eso te orienta sobre qué es viable y qué va a necesitar autorización.',
        ]],
    ],

    'incluye' => ['titulo' => 'Qué incluye la instalación en apartamento', 'items' => [
        'Fijación de la unidad interior y desagote hacia un desagüe del balcón o a la bajada pluvial',
        'Soporte para la condensadora en piso o pared del balcón',
        'Cañería de cobre aislada en el tramo estándar (los metros incluidos se detallan en el presupuesto)',
        'Interconexión eléctrica entre unidades',
        'Vacío del circuito, prueba de funcionamiento y garantía de la mano de obra',
        'Limpieza del área de trabajo al terminar',
    ]],
    'aparte' => ['titulo' => 'Qué se cobra aparte', 'items' => [
        'Trabajo en altura con arnés para condensadora en fachada',
        'Metros de cañería adicionales (frecuente cuando la condensadora va a un patio o azotea)',
        'Canaleta plástica para tapar la cañería que recorre paredes a la vista',
        'Línea eléctrica dedicada desde el tablero del apartamento',
        'Bomba de condensado cuando el desagote por gravedad no es posible',
        'Perforación de paredes de hormigón o de mampostería gruesa',
    ]],

    'tabla_capacidad' => true,
    'tabla_titulo' => 'Capacidad para ambientes de apartamento',
    'tabla_lead'   => 'Los apartamentos suelen tener ambientes de 9 a 30 m². Referencia para techo normal y sol medio; si el ambiente da al norte o es un último piso bajo azotea, subí un escalón.',

    'secciones' => [
        ['t' => '¿Cuándo hace falta trabajo en altura?', 'p' => [
            'Cuando la condensadora tiene que ir colgada en la fachada, o el balcón no permite fijarla desde adentro, el técnico trabaja con arnés y línea de vida anclada dentro del apartamento, y a veces con un ayudante. Es un trabajo con riesgo y equipamiento propio, por eso se cotiza aparte. En pisos altos o fachadas complicadas puede requerir andamio colgante o coordinación con el edificio.',
        ]],
        ['t' => '¿Por qué el desagote genera problemas con los vecinos?', 'p' => [
            'La unidad interior produce agua de condensación todo el tiempo que enfría. Si el desagote termina goteando por la fachada o sobre el balcón de abajo, el reclamo llega enseguida. Lo correcto es llevarlo por gravedad a un desagüe del balcón o a una bajada pluvial, con la pendiente adecuada; si no hay forma, se instala una bomba de condensado. Confirmá con el técnico adónde va a ir el agua antes de empezar.',
        ]],
        ['t' => '¿Qué cambia entre un edificio antiguo y uno nuevo?', 'p' => [
            'En edificios de varias décadas (Centro, Cordón, Parque Rodó) es común que el tablero del apartamento sea chico y el cableado viejo: el técnico revisa si hace falta una línea dedicada con térmica y disyuntor. En edificios nuevos (Buceo, Pocitos Nuevo, Tres Cruces) muchas veces ya hay preinstalación o un lugar previsto para la condensadora y una toma dedicada, lo que simplifica y abarata el trabajo.',
        ]],
    ],

    'pasos_titulo' => 'Cómo es la instalación en un apartamento',
    'pasos_lead'   => 'Con el reglamento del edificio en la mano, sin sorpresas con la administración.',
    'pasos' => [
        ['icono' => 'ri-building-2-line', 'titulo' => 'Piso y reglamento', 'desc' => 'Contanos el piso, si hay balcón y qué permite el edificio para la unidad exterior.'],
        ['icono' => 'ri-file-list-3-line', 'titulo' => 'Presupuesto', 'desc' => 'Incluye si hace falta canaleta, ménsulas, trabajo en altura o línea eléctrica dedicada.'],
        ['icono' => 'ri-calendar-check-line', 'titulo' => 'Coordinación con el edificio', 'desc' => 'Día, horario y ascensor acordados con la administración si el edificio lo pide.'],
        ['icono' => 'ri-shield-check-line', 'titulo' => 'Instalación y desagote', 'desc' => 'Condensadora firme, desagote a un desagüe para que no gotee abajo, vacío y prueba.'],
    ],

    'faq' => [
        ['q' => '¿Pueden instalar la condensadora en la fachada del edificio?', 'a' => 'Técnicamente sí, con trabajo en altura que se cotiza aparte. Pero antes tenés que consultar el reglamento de copropiedad y a la administración: muchos edificios lo prohíben o lo condicionan. Si no está permitido, las alternativas son el balcón, un patio de aire o la azotea.'],
        ['q' => '¿Necesito permiso del edificio para instalar un aire?', 'a' => 'Depende del reglamento de cada edificio. Algunos no piden nada si la condensadora queda dentro del balcón; otros exigen autorización para cualquier perforación o para la fachada. Sugerimos leer el reglamento y avisar a la administración antes de la instalación.'],
        ['q' => 'Mi apartamento no tiene balcón, ¿se puede instalar igual?', 'a' => 'En general sí: la condensadora puede ir a un patio de aire interior, a la fachada con trabajo en altura o a la azotea si el edificio lo permite. Cada opción cambia los metros de cañería y el costo; el técnico te dice cuál es viable en tu caso.'],
        ['q' => '¿Qué pasa con el agua que larga el aire?', 'a' => 'Se lleva por un caño de desagote a un desagüe del balcón o a la bajada pluvial, con pendiente. Si no hay desagüe accesible se pone una bomba de condensado. Nunca debe quedar goteando a la calle o al balcón del vecino.'],
        ['q' => '¿Instalan en pisos altos?', 'a' => 'Sí. Si la condensadora queda dentro del balcón, el piso no cambia el trabajo. Si tiene que ir a la fachada, el técnico trabaja con arnés desde adentro del apartamento y el costo del trabajo en altura se suma al presupuesto.'],
        ['q' => '¿Cuánto cuesta instalar un aire en un apartamento?', 'a' => 'Depende de la ubicación de la condensadora, los metros de cañería, si hay trabajo en altura y si hace falta línea eléctrica o canaleta. Mandanos barrio, piso y una foto del balcón y te pasan el presupuesto por WhatsApp.'],
    ],

    'zonas' => true,
    'cta_final_titulo' => 'Cotizá la instalación en tu apartamento',
    'cta_final_texto'  => 'Decinos barrio, piso y dónde iría la condensadora. Te responde un técnico que trabaja en edificios de tu zona.',
];

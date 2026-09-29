<?php
/** /comercial — Aire acondicionado para oficinas y comercios: multi-split, cassette, piso-techo, facturación. */
return [
    'title'       => 'Aire acondicionado para oficinas y comercios',
    'description' => 'Aire para oficinas, locales y consultorios por WhatsApp: split, multi-split, cassette y piso-techo, con factura y service programado.',
    'keywords'    => 'aire acondicionado para oficinas montevideo, aire acondicionado comercial, instalación cassette, aire acondicionado piso techo, multi split oficina, climatización de locales comerciales',
    'eyebrow'     => 'Locales, oficinas, consultorios y gastronomía',
    'h1'          => 'Aire acondicionado para oficinas y comercios',
    'subtitle'    => 'Split, multi-split, cassette o piso-techo según el local. Instalación con factura, service programado y un técnico de tu zona que conoce los horarios y las exigencias de un comercio.',
    'cta_label'   => 'Obtené tu presupuesto',
    'cta_message' => 'Hola, escribo por un local/oficina en ___. Necesitamos presupuesto de climatización.',
    'cta_message_zona' => 'Hola, escribo por un local/oficina en [Zona]. Necesitamos presupuesto de climatización.',
    'form_servicio' => 'Climatización de oficinas y comercios',
    'faq_tema'    => 'la climatización comercial',
    'zonas_tema'  => 'climatizar locales y oficinas',

    'intro' => [
        ['t' => '¿Qué equipo conviene según el local?', 'p' => [
            'En un comercio la elección del equipo depende del tamaño del ambiente, de la altura del techo, de cuánta gente entra y de si hay cielorraso para esconder la instalación.',
        ], 'lista' => [
            '<strong>Split de pared</strong>: oficinas chicas, consultorios y locales de hasta unos 40 m² por ambiente. Lo más económico de instalar y mantener.',
            '<strong>Multi-split</strong>: varios ambientes (oficinas separadas, salas de reunión) con una sola condensadora afuera. Útil cuando hay poco lugar exterior o el edificio limita las unidades en fachada.',
            '<strong>Cassette</strong>: se empotra en el cielorraso y reparte el aire en cuatro direcciones. Ideal para locales, salones y oficinas abiertas con techo desmontable.',
            '<strong>Piso-techo</strong>: se cuelga del techo o se apoya en el piso, para salones con techos altos, gimnasios, depósitos y locales sin cielorraso.',
        ]],
        ['t' => '¿Cómo se calcula la capacidad en un comercio?', 'p' => [
            'La regla residencial de 150 frigorías por m² se queda corta en un local: hay que sumar el calor de la gente (unas 100 frigorías por persona), de las vidrieras al sol, de la iluminación y de los equipos (computadoras, heladeras, hornos). Una oficina de 40 m² con ocho personas y ventanales al norte puede necesitar el doble que un living del mismo tamaño. Usá la <a href="' . $url . 'calculadora-frigorias">calculadora de frigorías</a> como primera aproximación eligiendo "oficina", y después lo ajusta el técnico en la visita.',
        ]],
    ],

    'incluye' => ['titulo' => 'Qué incluye la instalación comercial', 'items' => [
        'Visita técnica previa para relevar el local, la eléctrica y el lugar de las condensadoras',
        'Presupuesto por escrito con detalle por equipo y factura',
        'Instalación de unidades interiores (pared, cassette o piso-techo) y condensadoras con sus soportes',
        'Cañería de cobre aislada por equipo (tramo estándar; los metros incluidos van en el presupuesto), desagote y vacío',
        'Prueba de funcionamiento y garantía escrita de la mano de obra',
        'Trabajo fuera del horario comercial cuando el local no puede cerrar',
    ]],
    'aparte' => ['titulo' => 'Qué se cobra aparte', 'items' => [
        'Tablero eléctrico o líneas dedicadas trifásicas o monofásicas para los equipos',
        'Metros de cañería adicionales y bandejas o canaletas',
        'Bombas de condensado cuando el desagote por gravedad no llega a un desagüe',
        'Modificaciones de cielorraso para cassettes y rejillas',
        'Trabajo en altura, andamios o plataformas',
        'Contrato de mantenimiento programado (se cotiza por cantidad de equipos y visitas)',
    ]],

    'tabla_capacidad' => true,
    'tabla_titulo' => 'Capacidad de referencia para locales y oficinas',
    'tabla_lead'   => 'Solo orientativa: en comercios hay que sumar personas, vidrieras, iluminación y equipos. La visita técnica define la capacidad real.',
    'tabla_filas'  => [
        ['Oficina o consultorio hasta 15 m²',  '2.250 a 3.000 frigorías', '9.000 a 12.000 BTU',  'Split de pared'],
        ['Oficina 15 a 30 m²',                 '3.000 a 4.500 frigorías', '12.000 a 18.000 BTU', 'Split o multi-split'],
        ['Local 30 a 45 m²',                   '4.500 a 6.000 frigorías', '18.000 a 24.000 BTU', 'Split grande o cassette'],
        ['Salón 45 a 80 m²',                   '9.000 a 12.000 frigorías', '36.000 a 48.000 BTU', 'Cassette o piso-techo, o dos equipos'],
        ['Más de 80 m² o techos altos',        'Cálculo a medida',          '—',                  'Varios equipos o piso-techo'],
    ],

    'secciones' => [
        ['t' => '¿Cómo es el mantenimiento programado?', 'p' => [
            'En un local el aire trabaja muchas más horas que en una casa y con más gente adentro. Un plan de service con dos visitas al año (antes del verano y antes del invierno), limpieza de filtros más seguida y revisión de desagotes evita paradas en plena temporada y mantiene el consumo bajo. Se cotiza por cantidad de equipos y se coordina fuera del horario de atención si hace falta. Ver <a href="' . $url . 'mantenimiento">service y mantenimiento</a>.',
        ]],
        ['t' => '¿Qué cambia entre oficina en edificio y local a la calle?', 'p' => [
            'En oficinas dentro de edificios rigen las mismas reglas que en los <a href="' . $url . 'apartamentos">apartamentos</a>: consultá al reglamento y a la administración dónde pueden ir las condensadoras. En locales a la calle la condensadora suele ir a una azotea, un patio trasero o la fachada con autorización; en galerías y centros comerciales, el administrador define el lugar y a veces la marquesina técnica.',
        ]],
        ['t' => '¿Qué conviene en obra nueva o reforma?', 'p' => [
            'Si el local está en obra, conviene dejar hecha la <a href="' . $url . 'preinstalacion">preinstalación</a>: cañerías empotradas, desagotes y líneas eléctricas antes de cerrar paredes y cielorrasos. Es más prolijo y bastante más barato que hacerlo después.',
        ]],
    ],

    'pasos_titulo' => 'Cómo trabajamos con comercios',
    'pasos_lead'   => 'Planificado para no frenar tu actividad.',
    'pasos' => [
        ['icono' => 'ri-store-2-line', 'titulo' => 'Relevamiento', 'desc' => 'Metros, altura, gente, vidrieras y equipos que suman calor en cada ambiente.'],
        ['icono' => 'ri-file-list-3-line', 'titulo' => 'Propuesta y factura', 'desc' => 'Tipo y cantidad de equipos, ubicación de condensadoras y presupuesto con factura.'],
        ['icono' => 'ri-time-line', 'titulo' => 'Instalación fuera de horario', 'desc' => 'Se coordina en el horario de menos actividad o con el local cerrado.'],
        ['icono' => 'ri-calendar-check-line', 'titulo' => 'Service programado', 'desc' => 'Plan de mantenimiento para que los equipos no fallen en temporada alta.'],
    ],

    'faq' => [
        ['q' => '¿Emiten factura?', 'a' => 'Sí. Si necesitás factura A a nombre de tu empresa, decilo en el primer mensaje para incluirla en el presupuesto.'],
        ['q' => '¿Qué conviene para una oficina con varias salas: varios split o un multi-split?', 'a' => 'Depende del espacio exterior disponible y de si las salas se usan a la vez. Varios split independientes son más simples y baratos de mantener; un multi-split ocupa una sola condensadora y es la salida cuando el edificio limita las unidades exteriores. El técnico lo plantea en la visita.'],
        ['q' => '¿Cuántas frigorías necesita un local comercial?', 'a' => 'Más que una casa del mismo tamaño: a los m² hay que sumar personas, vidrieras al sol, iluminación y equipos. Como primera aproximación usá la calculadora en modo "oficina"; la capacidad final la define la visita técnica.'],
        ['q' => '¿Pueden instalar fuera del horario comercial?', 'a' => 'Sí, se coordina con el técnico para no cerrar el local; si hay recargo por horario, figura en el presupuesto.'],
        ['q' => '¿Hacen contratos de mantenimiento para empresas?', 'a' => 'Sí. Se cotiza por cantidad de equipos y visitas al año, con limpieza completa, control de gas y revisión eléctrica en cada visita.'],
        ['q' => '¿Instalan cassette y piso-techo de cualquier marca?', 'a' => 'Sí. Trabajamos con equipos de todas las marcas (Midea, Samsung, LG, Hisense, etc.), incluidas sus líneas comerciales.'],
    ],

    'zonas' => true,
    'cta_final_titulo' => 'Cotizá la climatización de tu local u oficina',
    'cta_final_texto'  => 'Decinos dónde está el local, los m² y cuánta gente trabaja o entra. Un técnico de tu zona coordina la visita técnica.',
];

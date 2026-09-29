<?php
/** /preinstalacion — Preinstalación en obra: cañerías empotradas, para arquitectos y constructoras. */
return [
    'title'       => 'Preinstalación de aire acondicionado en obra',
    'description' => 'Preinstalación de aire en obra por WhatsApp: cañería de cobre empotrada, desagotes y eléctrica antes de cerrar paredes, para obras y reformas.',
    'keywords'    => 'preinstalación aire acondicionado, preinstalación split obra, cañería empotrada aire acondicionado, preinstalación aire acondicionado arquitectos, instalación aire acondicionado obra nueva montevideo',
    'eyebrow'     => 'Para arquitectos, constructoras y propietarios en obra',
    'h1'          => 'Preinstalación de aire acondicionado en obra',
    'subtitle'    => 'Dejá las cañerías, los desagotes y la eléctrica hechos antes de cerrar paredes y cielorrasos. Después, colgar el equipo lleva una hora y no se ve un solo caño.',
    'cta_label'   => 'Obtené tu presupuesto',
    'cta_message' => 'Hola! Tengo una obra en ___ y necesito presupuesto de preinstalación de aire acondicionado para ___ equipos.',
    'cta_message_zona' => 'Hola! Tengo una obra en [Zona] y necesito presupuesto de preinstalación de aire acondicionado para ___ equipos.',
    'form_servicio' => 'Preinstalación de aire acondicionado en obra',
    'faq_tema'    => 'la preinstalación en obra',
    'zonas_tema'  => 'preinstalación en obra',

    'intro' => [
        ['t' => '¿Qué es una preinstalación y por qué conviene en obra?', 'p' => [
            'La preinstalación deja todo lo que va adentro de la pared listo antes de revocar: la <strong>cañería de cobre aislada</strong> entre el punto de la unidad interior y el de la condensadora, el <strong>caño de desagote</strong> con pendiente hasta un desagüe, el <strong>cable de interconexión</strong> entre unidades y la <strong>línea eléctrica dedicada</strong> desde el tablero. Los extremos quedan tapados y señalizados, y el equipo se instala cuando la obra termina, o cuando el propietario lo compra.',
            'Hacerlo en obra es más barato y más prolijo que después: no hay que picar paredes terminadas, no quedan canaletas a la vista, la condensadora va donde el proyecto lo previó y la instalación eléctrica queda dimensionada desde el principio.',
        ]],
        ['t' => '¿Qué definir con el arquitecto antes de empezar?', 'p' => [], 'lista' => [
            '<strong>Capacidad por ambiente</strong>, para dimensionar el diámetro de la cañería (no es el mismo para 2.250 que para 6.000 frigorías). Referencia rápida en la <a href="' . $url . 'calculadora-frigorias">calculadora de frigorías</a>.',
            '<strong>Posición de cada unidad interior</strong>: altura, distancia al techo, lado de salida de la cañería.',
            '<strong>Ubicación de las condensadoras</strong>: balcón técnico, azotea, patio o fachada, con acceso para el service y ventilación libre.',
            '<strong>Recorrido y longitud de cada cañería</strong>: hay máximos de metros y de desnivel según el equipo.',
            '<strong>Desagotes</strong>: adónde va el agua de cada unidad interior, con pendiente por gravedad.',
            '<strong>Tablero eléctrico</strong>: una línea con térmica y disyuntor por equipo, y potencia total a contratar con UTE.',
        ]],
    ],

    'incluye' => ['titulo' => 'Qué incluye la preinstalación por equipo', 'items' => [
        'Cañería de cobre aislada, del diámetro que corresponde a la capacidad prevista, con el recorrido que se define en obra',
        'Caño de desagote con pendiente hasta el desagüe indicado',
        'Cable de interconexión entre unidad interior y condensadora',
        'Extremos tapados, presurizados con nitrógeno y señalizados',
        'Plano o croquis de lo que quedó empotrado, para el instalador final',
        'Coordinación con el electricista y el sanitario de la obra',
    ]],
    'aparte' => ['titulo' => 'Qué se cobra aparte', 'items' => [
        'Línea eléctrica dedicada desde el tablero (si no la hace el electricista de la obra)',
        'Metros de cañería por encima de los incluidos',
        'Bases, ménsulas o estructuras para condensadoras en azotea',
        'Bandejas o cañerías vistas cuando no se puede empotrar',
        'Instalación final del equipo, vacío y puesta en marcha (se cotiza cuando se compra el equipo)',
    ]],

    'tabla_capacidad' => true,
    'tabla_titulo' => 'Capacidad prevista por ambiente',
    'tabla_lead'   => 'Para dimensionar las cañerías hay que definir la capacidad de cada punto. Referencia para techo normal y sol medio; en obra conviene prever un escalón más si el ambiente da al norte o tiene grandes vidriados.',

    'secciones' => [
        ['t' => '¿Cambia en edificios y en casas?', 'p' => [
            'En edificios nuevos la preinstalación suele hacerse para todas las unidades a la vez, con las condensadoras en balcones técnicos o azotea y montantes de desagote previstos en el proyecto sanitario. En casas es más flexible: el recorrido más corto, la condensadora a la sombra y lejos de los dormitorios, y una previsión para agregar equipos más adelante.',
        ]],
        ['t' => '¿Cuándo vale la pena empotrar en una reforma?', 'p' => [
            'Si vas a revocar o cambiar cielorrasos de todos modos, empotrá la cañería aunque el equipo lo compres el año que viene: es la única oportunidad de que no quede nada a la vista. Si la reforma no toca las paredes, la instalación va vista con canaleta, y no hace falta preinstalar.',
        ]],
        ['t' => '¿Cómo es la instalación final cuando llega el equipo?', 'p' => [
            'Cuando el propietario compra el equipo, lo instalamos sobre la preinstalación: cuelga las unidades, conecta la cañería, hace el <strong>vacío</strong>, libera el gas y prueba. Como los recorridos ya están hechos, el trabajo es corto y no hay sorpresas de metros extra. Trabajamos con equipos de todas las marcas (Midea, Samsung, LG, Hisense, etc.).',
        ]],
    ],

    'pasos_titulo' => 'Cómo es una preinstalación',
    'pasos_lead'   => 'Coordinada con la obra, antes de revocar.',
    'pasos' => [
        ['icono' => 'ri-draft-line', 'titulo' => 'Plano y ubicaciones', 'desc' => 'Con el arquitecto o el constructor se marcan unidades interiores, exteriores y recorridos.'],
        ['icono' => 'ri-git-branch-line', 'titulo' => 'Cañería y desagote', 'desc' => 'Cobre aislado, desagote con pendiente y caño para la eléctrica, empotrados.'],
        ['icono' => 'ri-shield-check-line', 'titulo' => 'Prueba con nitrógeno', 'desc' => 'Antes de cerrar paredes, cada tramo se presuriza para confirmar que no pierde.'],
        ['icono' => 'ri-plug-line', 'titulo' => 'Conexión final', 'desc' => 'Cuando llegan los equipos, se conectan, se hace vacío y se prueban.'],
    ],

    'faq' => [
        ['q' => '¿Hay que saber la marca del equipo para preinstalar?', 'a' => 'No, pero sí la capacidad aproximada de cada punto (frigorías), porque define el diámetro de la cañería. Con eso la preinstalación sirve para equipos de cualquier marca.'],
        ['q' => '¿Cuántos metros de cañería puede tener una preinstalación?', 'a' => 'Cada equipo tiene una longitud máxima y un desnivel máximo entre unidades que fija el fabricante. En recorridos largos el técnico lo verifica con el proyecto y, si hace falta, sugiere otra ubicación para la condensadora.'],
        ['q' => '¿La preinstalación incluye la parte eléctrica?', 'a' => 'Incluye el cable de interconexión entre unidades. La línea dedicada desde el tablero la puede hacer el electricista de la obra con nuestras indicaciones, o la cotizamos aparte.'],
        ['q' => '¿Trabajan con arquitectos y constructoras?', 'a' => 'Sí. Coordinamos con la dirección de obra los puntos, recorridos y fechas, y entregamos un croquis de lo empotrado. Para varios apartamentos o varias casas, pedí presupuesto por cantidad.'],
        ['q' => '¿Cuánto cuesta una preinstalación?', 'a' => 'Se cotiza por punto (por equipo), según metros de cañería, diámetro y dificultad del recorrido. Decinos dónde está la obra, cuántos equipos y capacidades aproximadas, y un técnico de tu zona te pasa el presupuesto.'],
    ],

    'zonas' => true,
    'cta_final_titulo' => 'Cotizá la preinstalación de tu obra',
    'cta_final_texto'  => 'Decinos dónde está la obra, cuántos equipos y en qué etapa está. Un técnico coordina la visita con la dirección de obra.',
];

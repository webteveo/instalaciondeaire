<?php
/** /calculadora-frigorias — Herramienta interactiva (vista local/calculadora). */
return [
    'vista'       => 'local/calculadora',
    'title'       => 'Calculadora de frigorías y BTU - Qué aire necesito',
    'description' => 'Calculá cuántas frigorías y BTU necesita tu ambiente según m², techo, sol, piso, personas y uso. Resultado en equipo comercial y presupuesto de instalación por WhatsApp.',
    'keywords'    => 'calculadora de frigorías, cuántas frigorías necesito, calcular btu aire acondicionado, frigorías por m2, qué aire acondicionado necesito, 9000 12000 18000 btu',
    'eyebrow'     => 'Herramienta gratuita',
    'h1'          => 'Calculadora de frigorías',
    'subtitle'    => 'Decinos los m², la altura del techo, cuánto sol recibe, en qué piso está, cuántas personas lo usan y para qué es el ambiente. Te decimos qué equipo comercial conviene, en frigorías y BTU.',
    'cta_label'   => 'Obtené tu presupuesto',
    'cta_message' => 'Hola! Usé la calculadora de frigorías y quiero presupuesto de instalación. Barrio: ___ / m²: ___',
    'form_servicio' => 'Instalación de aire acondicionado',
    'faq_tema'    => 'frigorías y BTU',
    'service_type' => 'Cálculo de capacidad de aire acondicionado',

    'secciones' => [
        ['t' => 'Cómo calcula la herramienta', 'p' => [
            'Parte de una base de <strong>150 frigorías por m²</strong>, que es la referencia habitual para un ambiente residencial con techo de hasta 2,7 m, sol moderado y una o dos personas. Sobre esa base aplica ajustes: <strong>+15 %</strong> si el techo es alto, <strong>−5 %</strong> con poco sol y <strong>+15 %</strong> con mucho sol (orientación norte, ventanales), <strong>+15 %</strong> si es último piso o está bajo azotea, <strong>−5 %</strong> para dormitorios, <strong>+10 %</strong> para oficinas (equipos) y <strong>+20 %</strong> para cocinas, y suma <strong>100 frigorías por persona</strong> a partir de la tercera.',
            'El resultado se redondea al <strong>equipo comercial más cercano</strong>: 2.250, 3.000, 4.500, 5.500 o 6.000 frigorías, que equivalen a 9.000, 12.000, 18.000, 22.000 y 24.000 BTU (1 frigoría ≈ 4 BTU). Si el cálculo supera lo que da el split más grande, te sugerimos dividir en dos equipos o consultar por un piso-techo o cassette.',
        ]],
        ['t' => 'Frigorías, BTU y kW: cómo se convierten', 'p' => [
            'En Uruguay los equipos se venden en frigorías/hora, pero muchas etiquetas y comercios usan BTU/h. La conversión práctica es <strong>1 frigoría ≈ 4 BTU</strong> (exactamente 3,97). Así, 3.000 frigorías son 12.000 BTU y 4.500 frigorías, 18.000 BTU. En kilovatios de potencia frigorífica, 1 kW ≈ 860 frigorías: un equipo de 3.000 frigorías entrega unos 3,5 kW de frío. No confundir esa potencia con el consumo eléctrico, que en un inverter es bastante menor.',
        ]],
        ['t' => 'Cuándo el cálculo no alcanza y conviene una visita', 'p' => [
            'La calculadora es orientativa. Hay casos donde el técnico tiene que ver el lugar: ambientes integrados (living-comedor-cocina en un solo espacio), techos de chapa sin aislación, grandes superficies vidriadas, locales comerciales con mucha gente o equipos que generan calor, y casas de temporada que se abren de golpe después de meses cerradas. En esos casos, mandale el resultado y una foto: te ajusta la capacidad antes de que compres el equipo.',
        ]],
        ['t' => 'Elegir de más o de menos: qué pasa', 'p' => [
            'Un equipo <strong>chico</strong> trabaja al máximo todo el tiempo, tarda en enfriar, no llega a la temperatura en los días de más calor y consume más de lo que debería. Un equipo <strong>demasiado grande</strong> enfría a golpes, no deshumidifica bien (queda el ambiente frío pero pegajoso) y cuesta más de comprar e instalar. Con un inverter hay algo más de margen, porque regula la potencia, pero la capacidad correcta sigue siendo la mejor inversión.',
        ]],
    ],

    'faq' => [
        ['q' => '¿Cuántas frigorías necesito por metro cuadrado?', 'a' => 'Unas 150 frigorías por m² en un ambiente normal. Con techo alto, mucho sol o último piso, entre 170 y 200 por m². Para un dormitorio de 12 m² alcanza con 2.250 frigorías; para un living de 20 m², 3.000; para 30 m², 4.500.'],
        ['q' => '¿Cuántos BTU son 3.000 frigorías?', 'a' => '12.000 BTU. La conversión es 1 frigoría ≈ 4 BTU: 2.250 frigorías = 9.000 BTU, 3.000 = 12.000, 4.500 = 18.000, 5.500 = 22.000 y 6.000 = 24.000 BTU.'],
        ['q' => '¿Qué pasa si el ambiente da al norte?', 'a' => 'Recibe sol la mayor parte del día y se calienta más. La calculadora suma un 15 % en ese caso; si además tiene ventanales grandes sin cortinas, conviene ir un escalón más arriba del resultado.'],
        ['q' => '¿El último piso necesita más frigorías?', 'a' => 'Sí. El techo recibe sol directo y transmite calor al ambiente, sobre todo si es una azotea sin aislación. Por eso la calculadora agrega un 15 % para último piso o bajo azotea.'],
        ['q' => '¿Sirve la calculadora para un local comercial?', 'a' => 'Como primera aproximación, eligiendo "oficina" y cargando la cantidad de personas. En comercios con vidrieras, iluminación fuerte o equipos que generan calor, la capacidad real puede ser bastante mayor: pedí una visita técnica.'],
        ['q' => '¿Conviene elegir el equipo más grande por las dudas?', 'a' => 'No. Un equipo sobredimensionado enfría a golpes, deshumidifica mal y cuesta más. Elegí la capacidad que da el cálculo y, si estás entre dos, el técnico te ayuda a decidir viendo el ambiente.'],
    ],

    'zonas' => true,
];

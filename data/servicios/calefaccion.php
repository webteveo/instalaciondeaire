<?php
/** /calefaccion — Calefacción con aire acondicionado: bomba de calor, uso en invierno, consumo vs otras opciones. */
return [
    'title'       => 'Calefacción con aire acondicionado en Uruguay',
    'description' => 'Calefacción con aire frío-calor por WhatsApp: rendimiento de la bomba de calor, consumo frente a estufas y qué equipo elegir.',
    'keywords'    => 'calefacción con aire acondicionado, aire acondicionado frío calor consumo, bomba de calor uruguay, calefaccionar con split inverter, aire acondicionado para invierno, consumo aire acondicionado calor',
    'eyebrow'     => 'Frío-calor: el mismo equipo todo el año',
    'h1'          => 'Calefacción con aire acondicionado',
    'subtitle'    => 'Un split inverter frío-calor es hoy una de las formas más eficientes de calefaccionar una casa o un apartamento en Uruguay. Te contamos cómo rinde, cuánto consume frente a otras opciones y qué equipo elegir.',
    'cta_label'   => 'Obtené tu presupuesto',
    'cta_message' => 'Hola! Quiero instalar un aire acondicionado frío-calor para usar también en invierno. Barrio: ___ / m² del ambiente: ___',
    'cta_message_zona' => 'Hola! Quiero instalar un aire frío-calor en [Zona] para usar también en invierno. m² del ambiente: ___',
    'form_servicio' => 'Instalación de aire acondicionado',
    'faq_tema'    => 'calefaccionar con aire acondicionado',
    'zonas_tema'  => 'instalar equipos frío-calor',

    'intro' => [
        ['t' => '¿Cómo calefacciona un aire acondicionado?', 'p' => [
            'Un equipo frío-calor funciona como <strong>bomba de calor</strong>: en invierno invierte el ciclo y, en vez de sacar calor del ambiente hacia afuera, lo toma del aire exterior (incluso a pocos grados) y lo mete adentro. Como no genera calor quemando algo ni con una resistencia, sino que lo transporta, por cada kWh de electricidad que consume entrega varias veces esa energía en forma de calor.',
            'Eso es lo que lo hace más eficiente que una estufa eléctrica de cuarzo, halógena o un panel: esos convierten 1 kWh en, como máximo, 1 kWh de calor. La bomba de calor, en el clima de Montevideo, suele entregar bastante más que eso por el mismo consumo, aunque el rendimiento baja en las noches más frías y húmedas.',
        ]],
        ['t' => '¿Consume menos que otras estufas?', 'p' => [
            'Sin inventar cifras (dependen del equipo, la aislación y la tarifa de UTE del momento), el orden habitual de menor a mayor costo por hora para calefaccionar el mismo ambiente es: split inverter frío-calor, estufa a leña o pellets, calefactor a gas (supergás), y al final las estufas eléctricas de resistencia (cuarzo, halógenas, paneles, caloventores). La ventaja del split crece cuanto más horas por día lo uses y cuanto mejor aislado esté el ambiente.',
            'Si vas a comparar, mirá la <strong>etiqueta de eficiencia</strong> del equipo en modo calor y su consumo declarado, y recordá que un inverter mantiene la temperatura consumiendo mucho menos que en el arranque.',
        ]],
    ],

    'incluye' => ['titulo' => 'Qué incluye la instalación de un equipo frío-calor', 'items' => [
        'Todo lo de una instalación de split estándar: soporte, cañería en el tramo estándar, desagote, vacío y prueba',
        'Prueba de funcionamiento en modo calor además de frío',
        'Desagote de la condensadora, que en invierno genera agua al descongelar',
        'Orientación sobre la ubicación de la unidad exterior para que rinda bien en invierno',
        'Garantía escrita de la mano de obra',
    ]],
    'aparte' => ['titulo' => 'Qué se cobra aparte', 'items' => [
        'Metros extra de cañería, trabajo en altura, canaleta',
        'Línea eléctrica dedicada desde el tablero',
        'Base elevada para la condensadora cuando el desagote de descongelado puede acumular agua',
        'Retiro de estufas o calefactores existentes',
    ]],

    'tabla_capacidad' => true,
    'tabla_titulo' => 'Capacidad para frío y calor',
    'tabla_lead'   => 'Para calefaccionar se usa la misma capacidad que para enfriar. Si el ambiente pierde mucho calor (ventanas simples, techo sin aislación, planta alta), subí un escalón. Referencia:',

    'secciones' => [
        ['t' => '¿Cómo usarlo bien en invierno?', 'p' => [], 'lista' => [
            'Poné el termostato en 20 a 22 °C: cada grado de más sube el consumo de forma notoria.',
            'Dirigí las aletas hacia abajo: el aire caliente sube solo.',
            'Dejalo prendido a temperatura estable en vez de prenderlo y apagarlo a máxima: el inverter rinde mejor así.',
            'Limpiá los filtros cada dos a cuatro semanas; sucios, el equipo tira menos calor y consume más.',
            'Si la condensadora escarcha, es normal: el equipo hace ciclos de descongelado y por unos minutos no calefacciona.',
            'Cerrá puertas del ambiente y bajá cortinas de noche: la aislación es lo que más cambia el consumo.',
        ]],
        ['t' => '¿Qué equipo elegir si el foco es calefaccionar?', 'p' => [
            'Todos los <a href="' . $url . 'split-inverter">split inverter</a> actuales son frío-calor, pero no todos rinden igual con frío exterior. Fijate en la etiqueta de eficiencia en modo calor, en la potencia calorífica declarada (a veces algo mayor que la frigorífica) y, si el ambiente es muy exigente, en modelos que mantienen la capacidad a bajas temperaturas. La condensadora conviene ubicarla donde no reciba el viento del sur directo y donde el agua del descongelado pueda drenar.',
        ]],
        ['t' => '¿Qué cambia entre apartamento y casa?', 'p' => [
            'En un <a href="' . $url . 'apartamentos">apartamento</a> intermedio, rodeado de otros apartamentos calefaccionados, un equipo de 3.000 frigorías suele sobrar para el living. En una casa de planta alta con techo liviano, o en una casa de temporada en Maldonado que se abre en pleno invierno, hay que calcular con más margen y a veces conviene un equipo por ambiente en vez de uno grande central. Estimalo en la <a href="' . $url . 'calculadora-frigorias">calculadora de frigorías</a>.',
        ]],
    ],

    'pasos_titulo' => 'Cómo elegimos un equipo para calefaccionar',
    'pasos_lead'   => 'El cálculo de invierno no es el mismo que el de verano.',
    'pasos' => [
        ['icono' => 'ri-home-heart-line', 'titulo' => 'El ambiente en invierno', 'desc' => 'Metros, altura, ventanas, muros fríos y cómo calefaccionás hoy.'],
        ['icono' => 'ri-calculator-line', 'titulo' => 'Capacidad para el frío', 'desc' => 'Se calcula para los días fríos y húmedos, no solo para el verano.'],
        ['icono' => 'ri-layout-bottom-line', 'titulo' => 'Ubicación baja', 'desc' => 'La unidad interior se ubica para que el calor llegue abajo y no quede en el techo.'],
        ['icono' => 'ri-temp-hot-line', 'titulo' => 'Prueba en calor', 'desc' => 'Se prueba el modo calor y el descongelamiento antes de irnos.'],
    ],

    'faq' => [
        ['q' => '¿Conviene calefaccionar con aire acondicionado en Uruguay?', 'a' => 'En general sí: un split inverter frío-calor consume bastante menos que las estufas eléctricas de resistencia para el mismo calor, y el clima de Montevideo rara vez baja lo suficiente como para que la bomba de calor deje de rendir. La ventaja es mayor cuanto más horas lo uses.'],
        ['q' => '¿Cuánto consume un aire acondicionado en modo calor?', 'a' => 'Similar o algo menos que en frío para la misma capacidad, y mucho menos que una estufa eléctrica para el mismo calor entregado. El consumo real depende del equipo, la temperatura que pongas, la aislación y las horas de uso. La etiqueta de eficiencia energética del equipo indica el consumo declarado.'],
        ['q' => '¿Funciona cuando hace mucho frío afuera?', 'a' => 'Sí. Los equipos actuales calefaccionan con temperaturas exteriores bajo cero, aunque rinden menos y hacen ciclos de descongelado más seguidos. En Montevideo esas noches son pocas.'],
        ['q' => '¿Por qué la condensadora larga agua y humo en invierno?', 'a' => 'Es el descongelado: la escarcha que se forma en la unidad exterior se derrite cada tanto y sale como agua y vapor. Es normal; por eso conviene que la condensadora tenga adónde drenar y no quede sobre un piso que se congele o moleste al vecino.'],
        ['q' => '¿Un equipo solo alcanza para calefaccionar toda la casa?', 'a' => 'Rara vez. El aire caliente no circula bien entre ambientes cerrados. Lo habitual es un equipo por ambiente principal (living y dormitorios), o un multi-split. El técnico te lo plantea según la casa.'],
    ],

    'zonas' => true,
    'cta_final_titulo' => 'Cotizá un equipo frío-calor para todo el año',
    'cta_final_texto'  => 'Decinos tu barrio, los m² del ambiente y si es casa o apartamento. Te responde un técnico de tu zona.',
];

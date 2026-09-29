<?php
/** /carga-de-gas — Carga de gas R410A y R32, detección de fugas. */
return [
    'title'       => 'Carga de gas de aire acondicionado en Montevideo - R32',
    'description' => 'Carga de gas R32 y R410A por WhatsApp: búsqueda de la fuga, reparación, vacío y carga pesada con balanza en Montevideo y alrededores.',
    'keywords'    => 'carga de gas aire acondicionado montevideo, carga de gas r410a, carga de gas r32, aire acondicionado sin gas, fuga de gas aire acondicionado, recarga de gas split',
    'eyebrow'     => 'R410A y R32',
    'h1'          => 'Carga de gas de aire acondicionado en Montevideo',
    'subtitle'    => 'Si al aire le falta gas es porque hay una fuga. El técnico la busca, la repara y recién después carga con el gas correcto (R410A o R32), con vacío y control de presiones.',
    'cta_label'   => 'Obtené tu presupuesto',
    'cta_message' => 'Hola, necesito carga de gas para mi aire. Marca: ___ Barrio: ___',
    'cta_message_zona' => 'Hola, necesito carga de gas para mi aire en [Zona]. Marca: ___',
    'form_servicio' => 'Carga de gas para aire acondicionado',
    'faq_tema'    => 'la carga de gas',
    'zonas_tema'  => 'carga de gas',

    'intro' => [
        ['t' => '¿Por qué le falta gas a un aire acondicionado?', 'p' => [
            'El refrigerante circula en un circuito cerrado entre la unidad interior y la condensadora. En condiciones normales no se consume ni se evapora: un equipo bien instalado puede pasar toda su vida útil sin necesitar carga. Si las presiones están bajas, el gas salió por algún lado: una unión mal apretada o mal abocardada, una válvula que pierde, una cañería picada por corrosión (frecuente cerca de la costa) o una fisura en el serpentín.',
            'Por eso una "recarga" sin buscar la fuga es tirar el dinero: el gas nuevo se va por el mismo lugar en semanas o meses. El procedimiento correcto es detectar la fuga, repararla, hacer vacío y cargar la cantidad exacta que indica la etiqueta del equipo.',
        ]],
    ],

    'incluye' => ['titulo' => 'Qué incluye el trabajo de carga de gas', 'items' => [
        'Medición de presiones y temperaturas para confirmar que falta gas',
        'Detección de la fuga con detector electrónico, espuma o prueba de presión con nitrógeno',
        'Reparación de la fuga cuando es en una unión o abocardado',
        'Vacío del circuito con bomba antes de cargar',
        'Carga por peso o por presión según especificación del equipo, con el gas correcto (R410A o R32)',
        'Prueba de funcionamiento y garantía escrita sobre el trabajo',
    ]],
    'aparte' => ['titulo' => 'Qué se cobra aparte', 'items' => [
        'Soldadura de cañería o cambio de tramos picados',
        'Cambio de válvulas de servicio o del serpentín cuando la fuga es ahí',
        'Recuperación del gas que quedaba, si hay que vaciar el circuito para reparar',
        'Trabajo en altura para acceder a la condensadora',
        'Reparaciones de otros componentes detectadas en el diagnóstico',
    ]],

    'tabla_capacidad' => false,

    'secciones' => [
        ['t' => '¿Qué gas usa tu equipo: R410A o R32?', 'p' => [
            'La etiqueta lateral de la unidad interior o de la condensadora dice el tipo de gas y la carga en gramos. <strong>R410A</strong> es el gas más común en equipos de los últimos años; <strong>R32</strong> es el que traen la mayoría de los equipos nuevos: más eficiente, menor impacto ambiental y menos cantidad de gas por equipo. No se mezclan ni se sustituyen entre sí, y cada uno requiere sus herramientas y su procedimiento. Los equipos muy viejos pueden usar R22, que ya no se comercializa en Uruguay para equipos nuevos; en esos casos suele convenir cambiar el equipo.',
        ]],
        ['t' => '¿Qué señales indican que falta gas?', 'p' => [], 'lista' => [
            'Enfría poco o nada aunque el ventilador funcione',
            'Se forma hielo en la cañería fina o en el evaporador',
            'La unidad interior pierde agua después de un rato de funcionar',
            'El compresor arranca y se corta por protección',
            'Códigos de error de baja presión en el display',
        ]],
        ['t' => '¿Por qué hay más fugas en zona costera?', 'p' => [
            'En Pocitos, Buceo, Malvín, Carrasco, Ciudad de la Costa y Punta del Este, el salitre corroe las aletas y las cañerías de la condensadora. Es la causa más frecuente de fugas en equipos de más de algunos años en la costa. Un <a href="' . $url . 'mantenimiento">service anual</a> con limpieza del serpentín exterior y revisión de conexiones es la forma más económica de evitarlas.',
        ]],
    ],

    'pasos_titulo' => 'Cómo es una carga de gas bien hecha',
    'pasos_lead'   => 'Sin encontrar la fuga no se carga: el gas se volvería a perder.',
    'pasos' => [
        ['icono' => 'ri-dashboard-3-line', 'titulo' => 'Medición', 'desc' => 'Con manómetros se confirma que falta gas y que no es suciedad ni otra falla.'],
        ['icono' => 'ri-search-eye-line', 'titulo' => 'Búsqueda de la fuga', 'desc' => 'Detector electrónico, espuma o prueba con nitrógeno, según dónde esté la pérdida.'],
        ['icono' => 'ri-tools-line', 'titulo' => 'Reparación y vacío', 'desc' => 'Se repara la unión o el tramo y se hace vacío con bomba para sacar aire y humedad.'],
        ['icono' => 'ri-scales-3-line', 'titulo' => 'Carga por peso', 'desc' => 'Gas de la etiqueta pesado con balanza, ajustado a los metros de cañería, y prueba final.'],
    ],

    'faq' => [
        ['q' => '¿Cada cuánto hay que cargar gas al aire acondicionado?', 'a' => 'Nunca, si la instalación está bien hecha y no hay fugas. El gas no se consume. Si el equipo necesita carga, hay una pérdida que conviene encontrar y reparar antes de cargar.'],
        ['q' => '¿Pueden cargar gas sin buscar la fuga?', 'a' => 'Podemos, pero no lo recomendamos: el gas se va a volver a ir por el mismo lugar y vas a pagar dos veces. El técnico busca la fuga primero; si la reparación es muy costosa te lo dice y decidís vos.'],
        ['q' => '¿Cuánto cuesta la carga de gas?', 'a' => 'Depende del tipo de gas (R410A o R32), de la cantidad que lleve el equipo, de dónde está la fuga y de si hay que soldar o cambiar piezas. El técnico te pasa el presupuesto después de medir presiones y ubicar la fuga.'],
        ['q' => '¿Se puede cargar R32 en un equipo de R410A?', 'a' => 'No. Cada equipo está diseñado para un gas y trabaja a presiones distintas. Se carga siempre el gas que indica la etiqueta del equipo.'],
        ['q' => 'Mi aire hace hielo en el caño, ¿es falta de gas?', 'a' => 'Puede ser falta de gas, pero también filtros muy sucios o un ventilador interior que no mueve suficiente aire. El técnico mide presiones y temperaturas para confirmarlo antes de cargar.'],
    ],

    'zonas' => true,
    'cta_final_titulo' => 'Pedí la carga de gas con detección de fugas',
    'cta_final_texto'  => 'Decinos marca, síntoma y barrio. Un técnico de tu zona coordina la visita y te pasa el presupuesto después de medir.',
];

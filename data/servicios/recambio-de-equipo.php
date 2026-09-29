<?php
/** /recambio-de-equipo — Cambiar un aire viejo (on/off, R22, de ventana) por un split inverter. */
return [
    'title'       => 'Cambiar aire acondicionado viejo por inverter - Recambio',
    'description' => 'Recambio de aire acondicionado por WhatsApp: retiramos el equipo viejo (on/off, R22 o de ventana) e instalamos un split inverter nuevo.',
    'keywords'    => 'cambiar aire acondicionado viejo, recambio aire acondicionado, reemplazar aire acondicionado r22, cambiar aire de ventana por split, retiro aire viejo e instalación nuevo',
    'eyebrow'     => 'Del equipo viejo al inverter',
    'h1'          => 'Recambio de aire acondicionado por un inverter',
    'subtitle'    => 'Retiramos tu equipo viejo recuperando el gas e instalamos un split inverter nuevo, aprovechando lo que se pueda de la instalación anterior.',
    'cta_label'   => 'Obtené tu presupuesto',
    'cta_message' => 'Hola! Quiero cambiar mi aire viejo por un inverter. Barrio: ___ / Equipo actual (marca, años): ___ / ¿Ya compraste el nuevo?: ___',
    'cta_message_zona' => 'Hola! Vengo de la web, quiero cambiar mi aire viejo por uno nuevo en [Zona].',
    'form_servicio' => 'Recambio de equipo',
    'faq_tema'    => 'el recambio de aire acondicionado',
    'zonas_tema'  => 'cambiar el equipo',

    'intro' => [
        ['t' => '¿Cuándo conviene cambiar el aire en vez de repararlo?', 'p' => [
            'Cuando la reparación implica el compresor o la placa de un equipo con muchos años, cuando el equipo usa <strong>gas R22</strong> (ya no se fabrica y cada carga es más difícil) o cuando es un on/off o un aire de ventana que consume bastante más que un inverter actual. En esos casos, lo que se gasta en reparar se acerca a lo que cuesta un equipo nuevo que además consume menos.',
            'Si la falla es chica (un capacitor, un sensor, el desagote) y el equipo es inverter con gas actual, reparar suele valer la pena. En la <a href="' . $url . 'reparacion">reparación</a> te pasamos los dos números para que compares.',
        ]],
        ['t' => '¿Qué se puede reusar de la instalación vieja?', 'p' => [
            'Muchas veces el paso de la pared, el soporte de la condensadora y la línea eléctrica, si está en buen estado. La cañería de cobre se puede reusar solo si el diámetro sirve para el equipo nuevo, está limpia, sin corrosión y el gas es compatible: con equipos de R22 conviene cañería nueva, porque quedan restos de aceite incompatible.',
            'El técnico lo evalúa antes de desinstalar y te dice qué se aprovecha y qué se cambia.',
        ]],
    ],

    'incluye' => ['titulo' => 'Qué incluye el recambio', 'items' => [
        'Recupero del gas y desinstalación del equipo viejo',
        'Evaluación de soporte, paso de pared, cañería y línea eléctrica existentes',
        'Instalación del equipo nuevo con cañería nueva o la existente si sirve',
        'Vacío del circuito con bomba y prueba en frío y en calor',
        'Garantía escrita de la mano de obra',
    ]],
    'aparte' => ['titulo' => 'Qué se cobra aparte', 'items' => [
        'Retiro y desecho del equipo viejo',
        'Cierre del hueco de un aire de ventana (mampostería y revoque)',
        'Cañería nueva si la existente no sirve',
        'Línea eléctrica dedicada si la existente no alcanza',
        'Trabajo en altura si la condensadora está en fachada',
    ]],

    'tabla_capacidad' => false,

    'secciones' => [
        ['t' => '¿Qué pasa con un aire de ventana?', 'p' => [
            'Al retirar un aire de ventana queda un hueco rectangular en la pared. Se puede cerrar con mampostería y revoque, o aprovechar parte para pasar la cañería del split y cerrar el resto. El split deja el compresor afuera, así que el ambiente queda mucho más silencioso.',
        ]],
        ['t' => '¿Tengo que comprar un equipo de la misma capacidad?', 'p' => [
            'No necesariamente. Si el equipo viejo nunca alcanzó, es el momento de corregirlo; si sobraba, un inverter más chico puede alcanzar, porque regula mejor. Calculalo con la <a href="' . $url . 'calculadora-frigorias">calculadora de frigorías</a> o pasanos los datos del ambiente.',
        ]],
        ['t' => '¿Qué se hace con el equipo viejo?', 'p' => [
            'Si funciona, te lo dejamos desmontado con las conexiones tapadas para que lo uses en otro ambiente o lo vendas. Si no, se retira para desecho. En los dos casos el gas se recupera y no se libera al ambiente.',
        ]],
    ],

    'pasos_titulo' => 'Cómo es un recambio',
    'pasos_lead'   => 'Sacamos el viejo y dejamos el nuevo funcionando, en lo posible en la misma visita.',
    'pasos' => [
        ['icono' => 'ri-camera-line', 'titulo' => 'Fotos del equipo actual', 'desc' => 'Etiqueta de la unidad exterior, lugar de cada unidad y el equipo nuevo si ya lo compraste.'],
        ['icono' => 'ri-search-eye-line', 'titulo' => 'Qué se reusa', 'desc' => 'Evaluamos soporte, paso, cañería y eléctrica para decirte qué se aprovecha.'],
        ['icono' => 'ri-arrow-left-right-line', 'titulo' => 'Retiro e instalación', 'desc' => 'Recupero del gas, retiro del viejo e instalación del nuevo con vacío.'],
        ['icono' => 'ri-temp-hot-line', 'titulo' => 'Prueba en frío y calor', 'desc' => 'Prueba de funcionamiento y explicación del equipo nuevo.'],
    ],

    'faq' => [
        ['q' => '¿Hacen el recambio en una sola visita?', 'a' => 'En la mayoría de los casos sí, si el equipo nuevo está comprado y la ubicación es la misma.'],
        ['q' => '¿Puedo reusar la cañería del equipo viejo?', 'a' => 'Si el diámetro sirve, está sana y el gas es compatible, sí. Con equipos de R22 conviene cañería nueva.'],
        ['q' => '¿Qué hacen con el equipo viejo?', 'a' => 'Te lo dejamos desmontado o lo retiramos para desecho, siempre recuperando el gas.'],
        ['q' => '¿Cambian aires de ventana por split?', 'a' => 'Sí, retiramos el de ventana e instalamos el split; el cierre del hueco se cotiza aparte.'],
    ],

    'zonas' => true,
    'cta_final_titulo' => 'Pedí presupuesto para cambiar tu aire',
    'cta_final_texto'  => 'Mandanos una foto de la etiqueta del equipo actual y contanos qué equipo nuevo querés.',
];

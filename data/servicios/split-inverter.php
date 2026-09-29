<?php
/** /split-inverter — Instalación de split inverter. El equipo más vendido: eficiencia y consumo. */
return [
    'title'       => 'Instalación de split inverter en Montevideo - Qué incluye',
    'description' => 'Instalación de split inverter por WhatsApp: soporte, cañería, vacío y prueba en frío y calor. Qué incluye, qué se cobra aparte y frigorías.',
    'keywords'    => 'instalación split inverter montevideo, instalar aire acondicionado inverter, técnico instalador split inverter, split inverter consumo, cuánto cuesta instalar split inverter',
    'eyebrow'     => 'El equipo más instalado en Uruguay',
    'h1'          => 'Instalación de split inverter en Montevideo',
    'subtitle'    => 'Enfría, calefacciona y consume menos que un on/off. Lo instalamos con vacío, prueba y garantía, con un técnico en refrigeración de tu zona. Equipos de todas las marcas (Midea, Samsung, LG, Hisense, etc.).',
    'cta_label'   => 'Obtené tu presupuesto',
    'cta_message' => 'Hola! Quiero presupuesto para instalar un split inverter. Barrio: ___ / Frigorías o BTU: ___ / ¿Casa o apto?: ___',
    'cta_message_zona' => 'Hola! Vengo de la web, quiero instalar un split inverter en [Zona].',
    'form_servicio' => 'Instalación de split inverter',
    'faq_tema'    => 'la instalación de split inverter',
    'zonas_tema'  => 'instalar split inverter',

    'intro' => [
        ['t' => '¿Por qué conviene un split inverter?', 'p' => [
            'Un split inverter regula la velocidad del compresor en vez de prenderlo y apagarlo. Llega a la temperatura que le pediste y después trabaja a baja velocidad para mantenerla, sin los arranques a plena potencia de un equipo on/off. El resultado: temperatura más pareja, menos ruido en la unidad interior y exterior, y un consumo de UTE más bajo en el uso diario.',
            'La diferencia se nota más cuanto más lo usás. Si el equipo va a funcionar varias horas por día en verano y además lo vas a usar como calefacción en invierno (casi todos los inverter son frío-calor), el ahorro de consumo compensa la diferencia de precio de compra frente a un on/off. Para un uso muy esporádico la ventaja es menor.',
        ]],
        ['t' => '¿Qué mirar al comprar el equipo?', 'p' => [
            'Antes que la marca, la <strong>capacidad</strong>: elegir de menos hace que el equipo trabaje al máximo todo el tiempo y no llegue a la temperatura; elegir de más gasta más y enfría a golpes. Calculala con los m² del ambiente, la orientación, el piso y el uso en nuestra <a href="' . $url . 'calculadora-frigorias">calculadora de frigorías</a>.',
            'Después, la <strong>etiqueta de eficiencia energética</strong> (clase A o superior), el <strong>gas</strong> (R32 es el más nuevo y eficiente, R410A sigue siendo muy común) y, si vivís cerca de la costa, que la condensadora tenga <strong>tratamiento anticorrosivo</strong>. Instalamos equipos de todas las marcas (Midea, Samsung, LG, Hisense, etc.), comprados donde quieras.',
        ]],
    ],

    'incluye' => ['titulo' => 'Qué incluye la instalación de un split inverter', 'items' => [
        'Fijación de la unidad interior nivelada, con desagote por gravedad',
        'Soporte (ménsulas) para la condensadora y fijación al piso o a la pared',
        'Cañería de cobre aislada en el tramo estándar (los metros incluidos se detallan en el presupuesto)',
        'Interconexión eléctrica entre las dos unidades',
        'Vacío del circuito con bomba y manómetros antes de liberar el gas',
        'Prueba de funcionamiento en frío y en calor, y garantía escrita de la mano de obra',
    ]],
    'aparte' => ['titulo' => 'Qué se cobra aparte', 'items' => [
        'Metros de cañería de cobre adicionales',
        'Trabajo en altura para condensadora en fachada',
        'Canaleta plástica para tapar la cañería a la vista',
        'Línea eléctrica dedicada desde el tablero, con térmica y disyuntor',
        'Base antivibratoria o estructura especial para la condensadora',
        'Retiro y desecho del equipo viejo',
    ]],

    'tabla_capacidad' => true,
    'tabla_titulo' => '¿Qué capacidad de split inverter necesito?',

    'secciones' => [
        ['t' => '¿Por qué el vacío del circuito no es opcional?', 'p' => [
            'Antes de liberar el gas del equipo hacia la cañería, el técnico conecta una bomba de vacío para sacar todo el aire y la humedad del circuito. Si queda humedad adentro, se mezcla con el aceite del compresor, forma ácidos y acorta la vida del equipo; además el sistema rinde menos desde el primer día. Una instalación sin vacío es la causa más común de fallas prematuras en equipos nuevos.',
            'Pedile al técnico que te muestre el manómetro durante el vacío y que la prueba final la haga en frío y en calor. Es parte de lo que garantiza la instalación.',
        ]],
        ['t' => '¿Hace falta una línea eléctrica dedicada?', 'p' => [
            'Un split inverter de 3.000 frigorías consume menos que un on/off, pero igual conviene que tenga su propia línea desde el tablero, con térmica y disyuntor. En casas y edificios antiguos, o donde el tablero ya está al límite, el técnico lo va a recomendar; se cotiza aparte porque depende de los metros de cable y del estado del tablero. Si hace falta ampliar la potencia contratada, eso se gestiona con UTE.',
        ]],
        ['t' => '¿Cambia la instalación en casa o apartamento?', 'p' => [
            'En un <a href="' . $url . 'apartamentos">apartamento</a> la condensadora va al balcón o a la fachada y hay que respetar el reglamento del edificio. En una casa hay más libertad: patio, fondo, pared lateral o techo, buscando sombra, ventilación y poco ruido hacia los dormitorios. En los dos casos, cuanto más corta la cañería, mejor rinde el equipo y más barata la instalación.',
        ]],
    ],

    'pasos_titulo' => 'Cómo es una instalación de split inverter',
    'pasos_lead'   => 'Del primer mensaje al equipo andando en frío y en calor.',
    'pasos' => [
        ['icono' => 'ri-whatsapp-line', 'titulo' => 'Contanos el ambiente', 'desc' => 'Metros, piso, si es casa o apartamento y dónde podría ir la condensadora. Si ya compraste el equipo, mandanos la etiqueta.'],
        ['icono' => 'ri-ruler-line', 'titulo' => 'Presupuesto por escrito', 'desc' => 'Instalación estándar y extras posibles (metros de más, altura, línea eléctrica) antes de coordinar.'],
        ['icono' => 'ri-tools-line', 'titulo' => 'Instalación', 'desc' => 'Soporte, perforación, cañería de cobre aislada, desagote, interconexión y vacío del circuito con bomba.'],
        ['icono' => 'ri-temp-cold-line', 'titulo' => 'Prueba y garantía', 'desc' => 'Prueba en frío y en calor, explicación del control y garantía escrita de la mano de obra.'],
    ],

    'faq' => [
        ['q' => '¿Cuánto cuesta instalar un split inverter?', 'a' => 'Depende de la capacidad del equipo, los metros de cañería, dónde va la condensadora y si hace falta trabajo en altura, canaleta o línea eléctrica. Decinos tu barrio y las frigorías y un técnico de tu zona te pasa el presupuesto por WhatsApp con el detalle de lo que incluye.'],
        ['q' => '¿Qué diferencia hay entre inverter y on/off?', 'a' => 'El inverter regula la velocidad del compresor y mantiene la temperatura consumiendo poco; el on/off prende y apaga el compresor a plena potencia. El inverter es más silencioso, más estable y consume menos, sobre todo si lo usás muchas horas o también en invierno.'],
        ['q' => '¿Inverter consume menos de verdad?', 'a' => 'Sí, en uso normal. La mayor parte del tiempo funciona a baja velocidad manteniendo la temperatura, mientras que el on/off arranca a plena potencia una y otra vez. Cuánto menos depende de las horas de uso, la temperatura que pongas y la aislación del ambiente.'],
        ['q' => '¿Puedo comprar el equipo por mi cuenta y que ustedes lo instalen?', 'a' => 'Sí. Compralo donde te convenga y el técnico lo instala. Guardá la factura del equipo y pedí el comprobante de instalación: la garantía del fabricante suele pedir que la instalación la haga un técnico habilitado.'],
        ['q' => '¿R32 o R410A?', 'a' => 'Los dos funcionan bien. El R32 es más nuevo, más eficiente y con menor impacto ambiental, y ya es el estándar en la mayoría de los equipos nuevos. Si comprás un equipo R410A también se instala sin problema; lo importante es que el técnico use las herramientas y el procedimiento correctos para cada gas.'],
        ['q' => '¿Cuánto tarda la instalación?', 'a' => 'Una instalación estándar, con la condensadora cerca y sin trabajo en altura, se resuelve en una visita de pocas horas (en el mercado se habla de 2 a 3 horas para un split estándar). Si hay que hacer una línea eléctrica o colgarse por la fachada, puede llevar más; el técnico te lo anticipa.'],
    ],

    'zonas' => true,
    'cta_final_titulo' => 'Pedí presupuesto para instalar tu split inverter',
    'cta_final_texto'  => 'Decinos tu barrio, las frigorías y si es casa o apartamento. Te responde un técnico de tu zona.',
];

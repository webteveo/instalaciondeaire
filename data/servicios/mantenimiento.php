<?php
/** /mantenimiento — Service y mantenimiento: limpieza de filtros y serpentinas, revisión pre-temporada. */
return [
    'title'       => 'Service de aire acondicionado en Montevideo - Limpieza',
    'description' => 'Service y limpieza de aire acondicionado antes del verano: filtros, serpentines, desagote y presiones. Presupuesto por WhatsApp en Montevideo, Canelones y Maldonado.',
    'keywords'    => 'service aire acondicionado montevideo, mantenimiento aire acondicionado, limpieza de aire acondicionado, limpieza split, service split inverter, mantenimiento pre temporada aire',
    'eyebrow'     => 'Antes del verano, no en enero',
    'h1'          => 'Service y limpieza de aire acondicionado en Montevideo',
    'subtitle'    => 'Limpieza de filtros y serpentines, revisión del desagote, control de presiones y prueba de funcionamiento. Un service a tiempo evita que el aire no enfríe, pierda agua o gaste de más.',
    'cta_label'   => 'Obtené tu presupuesto',
    'cta_message' => 'Hola, quiero agendar un service de aire acondicionado. Barrio: ___ / Cantidad de equipos: ___',
    'cta_message_zona' => 'Hola, quiero agendar un service de aire acondicionado en [Zona]. Cantidad de equipos: ___',
    'form_servicio' => 'Service de aire acondicionado',
    'faq_tema'    => 'el service de aire acondicionado',
    'zonas_tema'  => 'hacer service',

    'intro' => [
        ['t' => 'Para qué sirve el service (y qué pasa si no lo hacés)', 'p' => [
            'El aire acondicionado mueve aire con polvo, humedad y, cerca de la costa, salitre. Con el tiempo el filtro y el serpentín interior se tapan, el desagote junta barro y la condensadora se llena de pelusa y hojas. El equipo enfría menos, trabaja más horas para lo mismo, consume más y termina perdiendo agua o congelándose.',
            'Un service anual, idealmente en octubre o noviembre, deja el equipo limpio y controlado antes de que lo necesites. Es la diferencia entre un verano tranquilo y una reparación en la semana de más calor, cuando todos los técnicos están ocupados.',
        ]],
    ],

    'incluye' => ['titulo' => 'Qué incluye el service completo', 'items' => [
        'Limpieza de filtros y de la carcasa de la unidad interior',
        'Limpieza del serpentín (evaporador) y de la turbina interior',
        'Limpieza del serpentín de la condensadora y del ventilador exterior',
        'Destape y limpieza del desagote y la bandeja de condensado',
        'Control de presiones de gas, temperatura de salida y consumo eléctrico',
        'Revisión de conexiones eléctricas, soportes y aislación de la cañería',
    ]],
    'aparte' => ['titulo' => 'Qué se cobra aparte', 'items' => [
        'Carga de gas, si las presiones indican falta (implica buscar la fuga)',
        'Limpieza profunda con desarme de turbina y bandeja cuando hay hongos u olor fuerte',
        'Repuestos: capacitor, sensor, placa, motor de ventilador',
        'Acceso con trabajo en altura a condensadoras en fachada',
        'Tratamiento anticorrosivo de la condensadora en zona costera',
    ]],

    'tabla_capacidad' => false,

    'secciones' => [
        ['t' => 'Cada cuánto hacer el service', 'p' => [
            'Los <strong>filtros</strong> los podés limpiar vos cada dos a cuatro semanas de uso: se sacan sin herramientas, se lavan con agua y se dejan secar. El <strong>service completo</strong> con técnico se recomienda una vez al año para uso residencial normal, y dos veces al año si el equipo trabaja todo el año (frío y calor), si está en zona costera con salitre o si es un local con mucho movimiento de gente.',
        ]],
        ['t' => 'Service en zona costera: el salitre', 'p' => [
            'En Pocitos, Punta Carretas, Buceo, Malvín, Carrasco, Ciudad de la Costa o Punta del Este, la condensadora respira aire con sal. El salitre corroe las aletas de aluminio y las conexiones, y baja el rendimiento del intercambio de calor. Además de la limpieza, en estas zonas conviene un enjuague más seguido del serpentín exterior y, si el equipo es nuevo, un tratamiento protector.',
        ]],
        ['t' => 'Puesta a punto pre-temporada y cierre de temporada', 'p' => [
            'Para casas y apartamentos de temporada en Maldonado, o para quien administra propiedades de alquiler, ofrecemos coordinar dos visitas: la puesta a punto antes de diciembre (service completo y prueba) y una revisión corta al cierre, para dejar el equipo limpio y seco antes de los meses sin uso. Varios equipos en una misma visita suelen cotizarse mejor.',
        ]],
        ['t' => 'Señales de que el equipo necesita service ya', 'p' => [], 'lista' => [
            'Enfría menos que antes o tarda mucho en llegar a la temperatura',
            'Larga olor a humedad o a encerrado al prender',
            'Gotea agua por la unidad interior',
            'La unidad exterior hace más ruido o vibra',
            'La factura de UTE subió sin que hayas cambiado el uso',
        ]],
    ],

    'faq' => [
        ['q' => '¿Cada cuánto hay que hacerle service al aire?', 'a' => 'Filtros: cada dos a cuatro semanas de uso, lo hacés vos. Service completo con técnico: una vez al año antes del verano; dos veces al año si lo usás todo el año, si estás en zona costera o si es un comercio.'],
        ['q' => '¿Qué diferencia hay entre limpiar los filtros y hacer un service?', 'a' => 'Los filtros son la malla que se saca de la unidad interior y se lava. El service limpia además el serpentín, la turbina, el desagote y la condensadora, y controla presiones de gas, temperaturas y conexiones eléctricas. Lo primero lo hacés vos; lo segundo necesita técnico y herramientas.'],
        ['q' => '¿El service incluye carga de gas?', 'a' => 'No. Si la instalación está bien hecha, el gas no se consume. Si en el service las presiones indican que falta, hay una fuga: se cotiza aparte la búsqueda de la fuga, la reparación y la carga.'],
        ['q' => '¿Cuánto tarda un service?', 'a' => 'Un service completo de un split residencial lleva alrededor de una hora por equipo, más si hay que desarmar la turbina por hongos o si la condensadora está en fachada.'],
        ['q' => '¿Hacen service de varios equipos en una visita?', 'a' => 'Sí, y suele convenir: el traslado se paga una vez. Decinos cuántos equipos son y dónde están las condensadoras.'],
        ['q' => '¿Hacen service de equipos de cualquier marca?', 'a' => 'Sí. Trabajamos con equipos de todas las marcas (Midea, Samsung, LG, Hisense, etc.), split, multi-split, cassette y piso-techo.'],
    ],

    'zonas' => true,
    'cta_final_titulo' => 'Agendá el service antes del verano',
    'cta_final_texto'  => 'Decinos tu barrio y cuántos equipos tenés. Te responde un técnico de tu zona con el presupuesto y las fechas disponibles.',
];

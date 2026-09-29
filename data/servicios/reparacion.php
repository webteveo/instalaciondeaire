<?php
/** /reparacion — Reparación: no enfría, pierde agua, hace ruido, no prende, códigos de error. */
return [
    'title'       => 'Reparación de aire acondicionado en Montevideo - No enfría',
    'description' => 'Reparación de aire acondicionado: no enfría, pierde agua, hace ruido, no prende o tira código de error. Diagnóstico y presupuesto con un técnico de tu zona por WhatsApp.',
    'keywords'    => 'reparación aire acondicionado montevideo, aire acondicionado no enfría, aire acondicionado pierde agua, aire acondicionado no prende, técnico aire acondicionado urgente, código de error aire acondicionado',
    'eyebrow'     => 'Diagnóstico y reparación',
    'h1'          => 'Reparación de aire acondicionado en Montevideo',
    'subtitle'    => 'No enfría, pierde agua, hace ruido, no prende o tira un código de error. Contanos la marca y el síntoma: un técnico de tu zona te dice qué puede ser y coordina la visita.',
    'cta_label'   => 'Obtené tu presupuesto',
    'cta_message' => 'Hola, mi aire acondicionado [no enfría / pierde agua / hace ruido]. Marca: ___ Barrio: ___',
    'cta_message_zona' => 'Hola, mi aire acondicionado en [Zona] [no enfría / pierde agua / hace ruido]. Marca: ___',
    'form_servicio' => 'Reparación de aire acondicionado',
    'faq_tema'    => 'la reparación de aire acondicionado',
    'zonas_tema'  => 'reparar tu aire',

    'intro' => [
        ['t' => 'Los síntomas más comunes y qué suelen significar', 'p' => [
            'Antes de escribir, fijate cuál de estos es tu caso. Ayuda al técnico a ir preparado y, en algunos, podés resolverlo vos.',
        ], 'lista' => [
            '<strong>No enfría o enfría poco:</strong> filtros o serpentín sucios, condensadora tapada o sin ventilación, falta de gas por una fuga, o falla del compresor o de la placa. Primero limpiá los filtros y revisá que nada obstruya la unidad exterior.',
            '<strong>Pierde agua por la unidad interior:</strong> casi siempre desagote obstruido; también evaporador congelado por filtros sucios o falta de gas, o unidad desnivelada.',
            '<strong>Hace ruido:</strong> ventilador exterior con hojas o desbalanceado, soportes flojos que vibran, turbina interior sucia, o compresor con problemas si el ruido es grave y metálico.',
            '<strong>No prende:</strong> control sin pilas o desconfigurado, térmica saltada, capacitor quemado, placa electrónica o sensor.',
            '<strong>Se prende y se apaga solo, o tira un código de error:</strong> sensor de temperatura, comunicación entre unidades, protección por sobrecarga o falta de gas. Anotá el código que muestra el display: acorta el diagnóstico.',
            '<strong>Olor a humedad o encerrado:</strong> hongos en el evaporador o la bandeja; se resuelve con una limpieza profunda.',
        ]],
    ],

    'incluye' => ['titulo' => 'Qué incluye la visita de reparación', 'items' => [
        'Diagnóstico en el lugar: presiones, temperaturas, consumo eléctrico y prueba de componentes',
        'Presupuesto de la reparación antes de hacerla',
        'Reparaciones habituales resueltas en la misma visita si hay repuesto: capacitor, desagote, limpieza, ajustes',
        'Prueba de funcionamiento al terminar',
        'Garantía escrita sobre el trabajo realizado',
    ]],
    'aparte' => ['titulo' => 'Qué se cobra aparte', 'items' => [
        'Repuestos: placa, sensores, motor de ventilador, válvulas, compresor',
        'Búsqueda de fugas y carga de gas (R410A o R32)',
        'Limpieza profunda con desarme de la unidad interior',
        'Segunda visita cuando hay que pedir un repuesto específico',
        'Trabajo en altura para acceder a la condensadora',
    ]],

    'tabla_capacidad' => false,

    'secciones' => [
        ['t' => '¿Reparar o cambiar el equipo?', 'p' => [
            'Depende de la edad del equipo, de qué se rompió y de cuánto cuesta el repuesto frente a un equipo nuevo. Un capacitor, un sensor o un desagote se arreglan siempre. Un compresor en un equipo on/off de muchos años, o una placa que ya no se consigue, suelen inclinar la balanza hacia cambiar por un <a href="' . $url . 'split-inverter">split inverter</a> nuevo, que además va a consumir menos. El técnico te da las dos opciones con números y decidís vos.',
        ]],
        ['t' => 'Qué mandar por WhatsApp para un diagnóstico más rápido', 'p' => [], 'lista' => [
            'Marca y modelo (está en la etiqueta lateral de la unidad interior)',
            'Qué hace exactamente: no enfría, gotea, ruido, no prende, código de error',
            'Desde cuándo pasa y si empezó de golpe o de a poco',
            'Una foto de la unidad interior y otra de la condensadora, si la ves',
            'Cuándo fue el último service',
        ]],
        ['t' => 'Equipos en garantía', 'p' => [
            'Si el equipo tiene menos tiempo del que cubre la garantía del fabricante y la falla es del equipo (no de la instalación), consultá primero con el comercio o el importador donde lo compraste: una intervención ajena puede anular la garantía. No somos servicio oficial de ninguna marca. Si el problema es de instalación (desagote, vacío mal hecho, fuga en una unión), eso lo cubre quien instaló.',
        ]],
    ],

    'faq' => [
        ['q' => 'Mi aire prende pero no enfría, ¿qué puede ser?', 'a' => 'En orden de probabilidad: filtros y serpentín sucios, condensadora tapada o sin ventilación, falta de gas por una fuga, o una falla en el compresor o la placa. Limpiá los filtros y revisá la unidad exterior; si sigue igual, el técnico lo diagnostica en la visita.'],
        ['q' => '¿Por qué mi aire acondicionado pierde agua?', 'a' => 'Casi siempre por el desagote obstruido: la bandeja se llena y el agua chorrea por la unidad interior. También puede ser el evaporador que se congela (filtros sucios o falta de gas) y descongela de golpe, o la unidad interior desnivelada. Se resuelve en un service.'],
        ['q' => '¿Cuánto cuesta la reparación?', 'a' => 'La visita incluye el diagnóstico y el presupuesto; el costo total depende de la falla y de los repuestos. El técnico te dice cuánto sale antes de reparar y vos decidís. Decinos marca, síntoma y barrio para coordinar.'],
        ['q' => '¿Atienden urgencias?', 'a' => 'Coordinamos lo antes posible según la disponibilidad del técnico de tu zona. En las semanas de más calor la demanda sube: cuanto antes escribas, mejor.'],
        ['q' => '¿Reparan equipos de cualquier marca?', 'a' => 'Sí. Trabajamos con equipos de todas las marcas (Midea, Samsung, LG, Hisense, etc.), split, multi-split, cassette y piso-techo. Para modelos muy viejos puede no conseguirse el repuesto; en ese caso el técnico te lo dice.'],
        ['q' => 'El display muestra un código de error, ¿qué hago?', 'a' => 'Anotalo tal cual aparece (letra y número) y mandalo junto con la marca y el modelo. Muchos códigos indican sensor, comunicación entre unidades o protección por falta de gas, y saberlo de antemano acorta la visita.'],
    ],

    'zonas' => true,
    'cta_final_titulo' => '¿Tu aire no enfría? Escribinos',
    'cta_final_texto'  => 'Marca, síntoma y barrio. Un técnico de tu zona te dice qué puede ser y coordina la visita.',
];

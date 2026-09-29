<?php
/**
 * Base de la Fase 2 para el servicio "instalacion" (/instalacion/{zona}). No genera URL propia (empieza con "_"):
 * la pagina pilar de instalacion es la home (/). Ver Local_Controller::servicioZona().
 */
return [
    'title'       => 'Instalación de aire acondicionado | ' . EMPRESA_NOMBRE,
    'description' => 'Instalación de aire acondicionado split inverter con soporte, cañería, desagote, vacío y prueba. Técnicos de la zona, equipos de todas las marcas, presupuesto por WhatsApp.',
    'description_zona' => 'Split inverter con soporte, cañería, desagote, vacío y prueba. Técnicos de la zona, equipos de todas las marcas, presupuesto por WhatsApp.',
    'keywords'    => 'instalación aire acondicionado, instalar split, técnico instalador aire acondicionado',
    'eyebrow'     => 'Técnicos en refrigeración',
    'h1'          => 'Instalación de aire acondicionado',
    'subtitle'    => 'Instalamos split inverter y hacemos service, reparación y carga de gas en casas, apartamentos y comercios. Te atiende un técnico de tu zona.',
    'cta_label'   => 'Obtené tu presupuesto',
    'cta_message' => CONTACTO_WHATSAPP_MENSAJE,
    'cta_message_zona' => 'Hola! Vengo de la web, quiero instalar un aire acondicionado en [Zona].',
    'form_servicio' => 'Instalación de aire acondicionado',
    'faq_tema'    => 'la instalación de aire acondicionado',
    'zonas_tema'  => 'instalar aire acondicionado',

    'incluye' => ['titulo' => 'Qué incluye la instalación estándar', 'items' => [
        'Soporte (ménsulas) para la condensadora',
        'Cañería de cobre aislada en el tramo estándar (los metros incluidos se detallan en el presupuesto)',
        'Desagote de la unidad interior',
        'Interconexión eléctrica entre unidades',
        'Vacío del circuito con bomba y prueba de funcionamiento',
        'Garantía escrita de la mano de obra',
    ]],
    'aparte' => ['titulo' => 'Qué se cobra aparte', 'items' => [
        'Metros de cañería adicionales',
        'Trabajo en altura (condensadora en fachada)',
        'Canaleta plástica para tapar la cañería',
        'Línea eléctrica dedicada desde el tablero, con térmica y disyuntor',
        'Retiro de equipo viejo',
    ]],
    'tabla_capacidad' => true,
    'secciones' => [],
    'faq' => [
        ['q' => '¿Instalan equipos comprados en otro lado?', 'a' => 'Sí. Compralo donde te convenga y el técnico lo instala. Trabajamos con equipos de todas las marcas (Midea, Samsung, LG, Hisense, etc.).'],
        ['q' => '¿Qué incluye la instalación estándar?', 'a' => 'Soporte para la condensadora, cañería de cobre hasta los metros indicados en el presupuesto, desagote, interconexión eléctrica, vacío del circuito y prueba de funcionamiento. Metros extra, trabajo en altura, canaleta y línea eléctrica dedicada se cotizan aparte.'],
        ['q' => '¿Inverter u on/off?', 'a' => 'Para uso habitual, inverter: mantiene la temperatura consumiendo menos, hace menos ruido y también calefacciona en invierno.'],
    ],
    'zonas' => true,
];

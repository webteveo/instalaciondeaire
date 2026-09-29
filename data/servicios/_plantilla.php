<?php
/**
 * PLANTILLA DE PAGINA DE SERVICIO. Copiar como data/servicios/{slug}.php, sumar el slug en Local_Datos::SERVICIOS y listo:
 * queda publicada en /{slug}, en el sitemap, en el footer, en /servicios y en el schema HVACBusiness.
 * Los archivos que empiezan con "_" no generan URL (esta plantilla y _instalacion.php, que usa la Fase 2).
 *
 * Reglas editoriales: español rioplatense con voseo, sin precios, sin cifras inventadas, sin "servicio oficial".
 * Variables disponibles: $url (base del sitio), $ruta (public/).
 */
return [
    'title'       => 'Title SEO unico (55-60 caracteres) | ' . EMPRESA_NOMBRE,
    'description' => 'Meta description unica de 140-155 caracteres.',
    'keywords'    => 'keyword principal, variante 1, variante 2',
    'eyebrow'     => 'Texto chico sobre el H1',
    'h1'          => 'H1 de la pagina',            // si contiene " en ", se parte en dos lineas
    'subtitle'    => 'Bajada del hero (1-2 oraciones).',
    'cta_label'   => 'Obtené tu presupuesto',
    'cta_message' => 'Mensaje precargado de WhatsApp. Barrio: ___',
    'cta_message_zona' => 'Mensaje para la Fase 2, con [Zona] como comodin.',
    'micro'       => CTA_WHATSAPP_MICROCOPY,
    'form_servicio' => 'Nombre del servicio preseleccionado en el formulario',
    'faq_tema'    => 'tema para el lead de la FAQ',
    'zonas_tema'  => 'tema para el titulo del bloque de zonas',

    // Bloques de texto antes de "que incluye" (opcional)
    'intro'       => [['t' => 'H2', 'p' => ['Parrafo html.', 'Parrafo html.']]],

    // Que incluye / que se cobra aparte (opcional; sin ellos no se muestra el bloque)
    'incluye'     => ['titulo' => 'Qué incluye', 'items' => ['...']],
    'aparte'      => ['titulo' => 'Qué se cobra aparte', 'items' => ['...']],

    // Tabla m2 -> frigorias (true = tabla por defecto; 'tabla_filas' para una propia)
    'tabla_capacidad' => true,

    // Mas bloques de texto (H2 + parrafos + lista opcional)
    'secciones'   => [['t' => 'H2', 'p' => ['...'], 'lista' => ['...'], 'nota' => '']],

    // 4 pasos propios (opcional; por defecto los generales)
    // 'pasos' => [['icono' => 'ri-whatsapp-line', 'titulo' => '...', 'desc' => '...'], ...],

    'faq'         => [['q' => '¿...?', 'a' => '...']],   // 4-6 preguntas, se emiten como FAQPage
    'zonas'       => true,                                // bloque de zonas con enlaces internos
    'cta_final_titulo' => 'Titulo del CTA final',
    'cta_final_texto'  => 'Texto del CTA final.',
];

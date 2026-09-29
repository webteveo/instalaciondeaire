<?php
require_once 'config/variables.php';
require_once 'src/controlador/Local_Controller.php';

cta_contexto('servicios');
$page_title = 'Servicios de aire acondicionado: instalación y service';
$page_description = 'Todos los servicios de aire acondicionado por WhatsApp: instalación, service, reparación, carga de gas y más, y cuál elegir según tu caso.';
$page_keywords = SEO_PALABRAS_CLAVE_POR_DEFECTO;
$page_canonical = SEO_CANONICAL_URL . '/servicios';
$page_cta_message = CONTACTO_WHATSAPP_MENSAJE;
$page_cta_label = CTA_WHATSAPP_LABEL;
$page_schema_blocks = [[
  '@context' => 'https://schema.org', '@type' => 'BreadcrumbList',
  'itemListElement' => [
    ['@type' => 'ListItem', 'position' => 1, 'name' => 'Inicio', 'item' => SEO_CANONICAL_URL . '/'],
    ['@type' => 'ListItem', 'position' => 2, 'name' => 'Servicios', 'item' => SEO_CANONICAL_URL . '/servicios'],
  ],
]];

// Todas las paginas pilar como tarjetas (incluida la home)
$svAlts = array (
  'split-inverter' => 'Split inverter de pared instalado en un ambiente interior',
  'apartamentos' => 'Fachada de un edificio de apartamentos con condensadoras de aire acondicionado en los balcones',
  'mantenimiento' => 'Técnico haciendo el service de la unidad exterior de un aire acondicionado',
  'reparacion' => 'Técnico reparando un equipo de aire acondicionado con herramientas',
  'carga-de-gas' => 'Técnico detectando fugas en el serpentín de un aire acondicionado antes de la carga de gas',
  'comercial' => 'Condensadora de aire acondicionado instalada en la pared de un edificio comercial',
  'instalacion' => 'Técnico en refrigeración instalando y midiendo la presión de un aire acondicionado',
  'desinstalacion' => 'Técnico desmontando la unidad exterior de un aire acondicionado en una azotea',
  'preinstalacion' => 'Unidad exterior de aire acondicionado con escalera durante una obra',
  'calefaccion' => 'Dormitorio calefaccionado con un aire acondicionado split frío-calor',
  'calculadora-frigorias' => 'Ambiente luminoso con un aire acondicionado split en la pared',
);
$servicios_home = [['titulo' => 'Instalación de aire acondicionado', 'img' => 'instalacion.webp', 'alt' => $svAlts['instalacion'], 'srv' => '', 'href' => $url, 'btn' => 'Obtené tu presupuesto', 'wa_text' => CONTACTO_WHATSAPP_MENSAJE]];
foreach (Local_Controller::servicios() as $svK => $svN) {
  $svD = Local_Controller::servicio($svK);
  $servicios_home[] = ['titulo' => Local_Datos::SERVICIOS[$svK]['label'], 'img' => $svK . '.webp', 'alt' => $svAlts[$svK] ?? null, 'srv' => $svK, 'btn' => $svD['cta_label'] ?? CTA_WHATSAPP_LABEL, 'wa_text' => $svD['cta_message'] ?? CONTACTO_WHATSAPP_MENSAJE];
}
// Guia para elegir el servicio: texto propio de esta pagina (no se repite en la home ni en los pilares)
$secciones = [
  ['t' => '¿Qué servicio necesito según lo que le pasa al equipo?', 'p' => [
    'Si todavía no tenés aire, lo que buscás es una <a href="' . $url . '">instalación</a>: si vivís en un edificio, mirá primero <a href="' . $url . 'apartamentos">instalación en apartamentos</a>, porque el reglamento define dónde va la condensadora. Si el equipo ya está y funciona, pero hace más de un año que nadie lo limpia, lo que corresponde es un <a href="' . $url . 'mantenimiento">service</a>.',
    'Si el equipo dejó de enfriar, gotea, hace un ruido nuevo o muestra un código, pedí una <a href="' . $url . 'reparacion">reparación</a>: el técnico diagnostica primero. La <a href="' . $url . 'carga-de-gas">carga de gas</a> solo tiene sentido cuando la medición confirma que falta gas, y siempre después de encontrar la fuga.',
  ]],
  ['t' => '¿Y si me mudo, reformo o estoy construyendo?', 'p' => [
    'Para llevarte el equipo a otra casa o moverlo de lugar, el servicio es <a href="' . $url . 'desinstalacion">desinstalación y traslado</a>, con el gas recuperado. Si la casa está en obra, lo que conviene es la <a href="' . $url . 'preinstalacion">preinstalación</a>: cañería, desagote y eléctrica empotrados antes de revocar, aunque el equipo se compre después.',
    'Para locales, oficinas y consultorios, el cálculo y el tipo de equipo cambian: está en <a href="' . $url . 'comercial">oficinas y comercios</a>. Y si lo que querés es dejar la estufa, mirá <a href="' . $url . 'calefaccion">calefacción con aire acondicionado</a>.',
  ]],
  ['t' => '¿Tienen página para mi barrio?', 'p' => [
    'Sí. Además de cada servicio, hay una página por barrio o localidad con lo que cambia ahí: tipo de vivienda, salitre, edificios antiguos o casas de temporada. El service, la reparación, la carga de gas y la desinstalación también tienen página propia en cada barrio de Montevideo y en las localidades de Canelones y Maldonado que cubrimos. Buscá el tuyo en <a href="' . $url . 'zonas">zonas</a>.',
  ]],
];
$servicios_titulo = 'Todos los <em>servicios</em>';
$servicios_lead   = 'Elegí el servicio para ver qué incluye, qué se cobra aparte, cómo es el proceso y las preguntas frecuentes de cada uno.';

require 'src/vista/partials/head.php';
?>
<body>
  <?php require 'src/vista/partials/header.php'; ?>

  <main id="main-content" class="section-page">
    <section class="page-intro">
      <div class="container page-intro__inner">
        <p class="page-intro__eyebrow">Servicios</p>
        <h1 class="page-intro__title">Servicios de aire acondicionado</h1>
        <p class="page-intro__desc">Instalación, service, reparación y carga de gas con técnicos en refrigeración de Montevideo, Canelones y Maldonado. Equipos de todas las marcas (Midea, Samsung, LG, Hisense, etc.).</p>
      </div>
    </section>

    <?php require 'src/vista/compact/servicios.php'; ?>
    <?php require 'src/vista/compact/secciones.php'; ?>
    <?php require 'src/vista/compact/precios.php'; ?>
    <?php require 'src/vista/compact/cta.php'; ?>
  </main>

  <?php require 'src/vista/partials/footer.php'; ?>
  <?php require 'src/vista/partials/end.php'; ?>

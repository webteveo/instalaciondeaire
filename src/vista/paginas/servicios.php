<?php
require_once 'config/variables.php';
require_once 'src/controlador/Local_Controller.php';

cta_contexto('servicios');
$page_title = 'Servicios de aire acondicionado: instalación y service';
$page_description = 'Split inverter, apartamentos, service, reparación, carga de gas, desinstalación, comercios, preinstalación y calefacción. Técnicos en Montevideo, Canelones y Maldonado.';
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
    <?php require 'src/vista/compact/tabla-capacidad.php'; ?>
    <?php require 'src/vista/compact/precios.php'; ?>
    <?php require 'src/vista/compact/pasos.php'; ?>
    <?php require 'src/vista/compact/zonas-home.php'; ?>
    <?php require 'src/vista/compact/cta.php'; ?>
  </main>

  <?php require 'src/vista/partials/footer.php'; ?>
  <?php require 'src/vista/partials/end.php'; ?>

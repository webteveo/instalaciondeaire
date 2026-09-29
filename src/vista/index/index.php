<?php
require_once 'config/variables.php';
require_once 'src/controlador/Local_Controller.php';

cta_contexto('home');
$page_title = SEO_TITULO_POR_DEFECTO;
$page_description = SEO_DESCRIPCION_POR_DEFECTO;
$page_keywords = SEO_PALABRAS_CLAVE_POR_DEFECTO;
$page_canonical = SEO_CANONICAL_URL;
$page_cta_message = CONTACTO_WHATSAPP_MENSAJE;
$page_cta_label = CTA_WHATSAPP_LABEL;

// Schema FAQPage a partir de las mismas preguntas que muestra compact/faq.php
$faq_items = require 'src/vista/compact/faq-data.php';
$page_schema_blocks = [];
if ($faq_items) {
  $page_schema_blocks[] = [
    '@context' => 'https://schema.org',
    '@type' => 'FAQPage',
    'mainEntity' => array_map(fn($f) => [
      '@type' => 'Question',
      'name' => $f['q'],
      'acceptedAnswer' => ['@type' => 'Answer', 'text' => strip_tags($f['a'])],
    ], $faq_items),
  ];
}
// Service principal de la home (la entidad HVACBusiness va en partials/head.php)
$page_schema_blocks[] = [
  '@context'    => 'https://schema.org',
  '@type'       => 'Service',
  'name'        => 'Instalación de aire acondicionado en Montevideo, Canelones y Maldonado',
  'serviceType' => 'Instalación de aire acondicionado',
  'provider'    => ['@id' => SEO_CANONICAL_URL . '/#hvacbusiness'],
  'areaServed'  => array_map(fn($z) => ['@type' => 'AdministrativeArea', 'name' => $z], EMPRESA_ZONAS),
  'url'         => SEO_CANONICAL_URL . '/',
  'description' => SEO_DESCRIPCION_POR_DEFECTO,
];
$page_schema_blocks[] = [
  '@context' => 'https://schema.org',
  '@type' => 'WebSite',
  '@id' => SEO_CANONICAL_URL . '/#website',
  'url' => SEO_CANONICAL_URL,
  'name' => EMPRESA_NOMBRE,
  'inLanguage' => 'es-UY',
  'publisher' => ['@id' => SEO_CANONICAL_URL . '/#hvacbusiness'],
];

// Subtitulos de la home en forma de pregunta (los componentes usan otros textos por defecto en el resto del sitio)
$pasos_titulo = '¿Cómo es instalar un aire con nosotros?';
$dif_titulo   = '¿Por qué pedir presupuesto acá?';
$tc_titulo    = '¿Cuántas frigorías necesito para mi ambiente?';

$page_preload_images = [['href' => $ruta . '/images/hero/hero-mobile-720.webp', 'media' => '(max-width: 600px)'], ['href' => $ruta . '/images/hero/hero-desktop.webp', 'media' => '(min-width: 601px)']];
require 'src/vista/partials/head.php';
?>
<body class="home-page">
  <?php require 'src/vista/partials/header.php'; ?>

  <main id="main-content">
    <?php require 'src/vista/compact/hero.php'; ?>
    <?php require 'src/vista/compact/testimonios.php'; ?>
    <?php require 'src/vista/compact/servicios.php'; ?>
    <?php require 'src/vista/compact/stats-strip.php'; ?>
    <?php require 'src/vista/compact/incluye.php'; ?>
    <?php require 'src/vista/compact/tabla-capacidad.php'; ?>
    <?php require 'src/vista/compact/pasos.php'; ?>
    <?php require 'src/vista/compact/quienes-somos.php'; ?>
    <?php require 'src/vista/compact/diferenciadores.php'; ?>
    <?php require 'src/vista/compact/zonas-home.php'; ?>
    <?php require 'src/vista/compact/faq.php'; ?>
    <?php require 'src/vista/compact/contacto-home.php'; ?>
  </main>

  <?php require 'src/vista/partials/footer.php'; ?>
  <?php require 'src/vista/partials/end.php'; ?>

<?php
require_once 'config/variables.php';

cta_contexto('blog');
$page_title       = 'Guías sobre aire acondicionado | ' . EMPRESA_NOMBRE;
$page_description = 'Guías de aire acondicionado en Uruguay escritas por técnicos: frigorías, inverter u on/off, costos, service, fallas y permisos en Montevideo.';
$page_keywords    = 'guías aire acondicionado, cuántas frigorías necesito, inverter vs on off, aire acondicionado pierde agua, ' . SEO_PALABRAS_CLAVE_POR_DEFECTO;
$page_canonical   = SEO_CANONICAL_URL . '/articulos';
$page_schema_blocks = [[
    '@context' => 'https://schema.org',
    '@type'    => 'CollectionPage',
    '@id'      => $page_canonical,
    'name'     => 'Artículos y guías de ' . EMPRESA_NOMBRE,
    'description' => $page_description,
    'inLanguage' => 'es-UY',
    'isPartOf' => ['@type' => 'WebSite', 'name' => EMPRESA_NOMBRE, 'url' => SEO_CANONICAL_URL],
    'mainEntity' => [
        '@type' => 'ItemList',
        'itemListElement' => array_values(array_map(fn($a, $i) => [
            '@type' => 'ListItem', 'position' => $i + 1, 'url' => SEO_CANONICAL_URL . '/articulos/' . $a['slug'], 'name' => $a['titulo'],
        ], array_values($articulos), array_keys(array_values($articulos)))),
    ],
]];

// Guia de lectura segun el problema (texto propio del indice; no repite las bajadas de las tarjetas)
$secciones = [
  ['t' => '¿Qué guía leer según tu caso?', 'p' => [
    'Si todavía no compraste el equipo, empezá por <a href="' . $url . 'articulos/cuantas-frigorias-necesito-segun-los-m2">cuántas frigorías necesitás</a> y seguí con <a href="' . $url . 'articulos/inverter-vs-on-off-cual-conviene">inverter u on/off</a>: son las dos decisiones que más pesan en el confort y en la factura de UTE. Si ya sabés qué equipo querés, la guía de <a href="' . $url . 'articulos/cuanto-cuesta-instalar-aire-acondicionado-uruguay">cuánto cuesta instalar</a> explica qué incluye la instalación estándar y qué se cobra aparte.',
    'Si vivís en un edificio de Montevideo, leé antes de comprar la de <a href="' . $url . 'articulos/permisos-para-instalar-aire-acondicionado-montevideo">permisos para instalar</a>. Si el equipo ya está instalado y falla, andá directo a <a href="' . $url . 'articulos/aire-acondicionado-no-enfria">no enfría</a> o <a href="' . $url . 'articulos/por-que-el-aire-acondicionado-pierde-agua">pierde agua</a>; y para que no falle, a <a href="' . $url . 'articulos/cada-cuanto-hacer-service-aire-acondicionado">cada cuánto hacer el service</a>.',
  ]],
];
$secciones_intro = '';

require 'src/vista/partials/head.php';
?>
<body>
  <?php require 'src/vista/partials/header.php'; ?>

  <main id="main-content" class="section-page">
    <section class="page-intro">
      <div class="container page-intro__inner">
        <p class="page-intro__eyebrow">Artículos</p>
        <h1 class="page-intro__title">Guías sobre aire acondicionado</h1>
        <p class="page-intro__desc">Respuestas concretas escritas por nuestros técnicos: cuántas frigorías necesitás, inverter u on/off, por qué el aire pierde agua, consumo y mantenimiento.</p>
      </div>
    </section>

    <section class="ar-list">
      <div class="container">
        <?php if (!empty($categorias) && count($categorias) > 1): ?>
        <div class="ar-list__cats" role="list" aria-label="Categorías">
          <?php foreach ($categorias as $c => $n): ?>
          <span role="listitem" class="ar-list__cat"><?= htmlspecialchars($c) ?> <small><?= $n ?></small></span>
          <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <?php if ($articulos): ?>
        <div class="ar-grid">
          <?php foreach ($articulos as $r): ?>
            <?php require 'src/vista/articulos/card.php'; ?>
          <?php endforeach; ?>
        </div>
        <?php else: ?>
        <p>Todavía no hay guías publicadas. Mientras tanto, mirá las <a href="<?= $url ?>preguntas-frecuentes">preguntas frecuentes</a> o usá la <a href="<?= $url ?>calculadora-frigorias">calculadora de frigorías</a>.</p>
        <?php endif; ?>

        <p class="ar-list__feed"><a href="<?= $url ?>articulos/feed"><i class="ri-rss-line" aria-hidden="true"></i> Suscribirse por RSS</a></p>
      </div>
    </section>
    <?php require 'src/vista/compact/secciones.php'; ?>

    <?php require 'src/vista/compact/cta.php'; ?>
  </main>

  <?php require 'src/vista/partials/footer.php'; ?>
  <?php require 'src/vista/partials/end.php'; ?>

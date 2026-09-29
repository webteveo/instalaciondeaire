<?php
require_once 'config/variables.php';
require_once 'src/controlador/Local_Controller.php';

cta_contexto('zonas');
$page_title = 'Técnicos de aire acondicionado por zona: Montevideo y más';
$page_description = 'Instalación de aire acondicionado por zona: barrios de Montevideo, Ciudad de la Costa, Las Piedras, Pando, Atlántida, Punta del Este, Piriápolis y más. Presupuesto por WhatsApp.';
$page_keywords = 'técnico aire acondicionado por barrio montevideo, instalación aire acondicionado pocitos, instalación aire acondicionado carrasco, aire acondicionado ciudad de la costa, aire acondicionado punta del este';
$page_canonical = SEO_CANONICAL_URL . '/zonas';
$page_cta_message = CONTACTO_WHATSAPP_MENSAJE;
$page_cta_label = CTA_WHATSAPP_LABEL;
$page_schema_blocks = [[
  '@context' => 'https://schema.org', '@type' => 'BreadcrumbList',
  'itemListElement' => [
    ['@type' => 'ListItem', 'position' => 1, 'name' => 'Inicio', 'item' => SEO_CANONICAL_URL . '/'],
    ['@type' => 'ListItem', 'position' => 2, 'name' => 'Zonas', 'item' => SEO_CANONICAL_URL . '/zonas'],
  ],
]];

$zDeptos = Local_Datos::zonasPorDepto();
$zTipo = ['apartamentos' => 'Edificios: condensadora en balcón o fachada', 'casas' => 'Casas: más libertad para ubicar la condensadora', 'mixto' => 'Casas y apartamentos'];

require 'src/vista/partials/head.php';
?>
<body>
  <?php require 'src/vista/partials/header.php'; ?>

  <main id="main-content" class="section-page">
    <section class="page-intro">
      <div class="container page-intro__inner">
        <p class="page-intro__eyebrow">Cobertura</p>
        <h1 class="page-intro__title">Zonas donde tenemos técnicos</h1>
        <p class="page-intro__desc">Cada zona tiene su página con lo que cambia en la instalación: tipo de vivienda, salitre, edificios antiguos o casas de temporada. Si tu barrio no está, escribinos igual y te confirmamos cobertura.</p>
      </div>
    </section>

    <section class="zonas-dir" aria-label="Directorio de zonas">
      <div class="container">
        <?php foreach ($zDeptos as $zDepto => $zZonas): ?>
        <div class="zonas-dir__depto">
          <h2 class="zonas-dir__title"><i class="ri-map-pin-2-fill" aria-hidden="true"></i> <?= htmlspecialchars($zDepto) ?></h2>
          <div class="zonas-dir__grid">
            <?php foreach ($zZonas as $zK => $zZ): ?>
            <a href="<?= $url ?>zonas/<?= $zK ?>" class="zonas-dir__card">
              <strong>Aire acondicionado en <?= htmlspecialchars($zZ['nombre']) ?></strong>
              <span><?= htmlspecialchars($zTipo[$zZ['vivienda']]) ?></span>
              <ul class="zonas-dir__tags" role="list">
                <?php if (!empty($zZ['costera'])): ?><li><i class="ri-water-flash-line" aria-hidden="true"></i> Zona costera</li><?php endif; ?>
                <?php if (!empty($zZ['antiguo'])): ?><li><i class="ri-flashlight-line" aria-hidden="true"></i> Edificios antiguos</li><?php endif; ?>
                <?php if (!empty($zZ['temporada'])): ?><li><i class="ri-sun-line" aria-hidden="true"></i> Temporada</li><?php endif; ?>
              </ul>
              <em>Ver zona <i class="ri-arrow-right-line" aria-hidden="true"></i></em>
            </a>
            <?php endforeach; ?>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </section>

    <?php require 'src/vista/compact/pasos.php'; ?>
    <?php require 'src/vista/compact/cta.php'; ?>
  </main>

  <?php require 'src/vista/partials/footer.php'; ?>
  <?php require 'src/vista/partials/end.php'; ?>

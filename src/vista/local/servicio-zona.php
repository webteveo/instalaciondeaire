<?php
/**
 * Pagina servicio x zona (/mantenimiento/pocitos). Recibe $landing de Local_Controller::servicioZona():
 *   servicio, servicio_nombre, zona, zona_nombre, zona_datos, h1, title, description, subtitle, intro, bloques[], faq[],
 *   incluye?, otros[slug => nombre], vecinos[slug => nombre], cta_*, form_servicio, migas[], schema_blocks, actualizado
 */
cta_contexto('servicio-zona', $landing['zona']);
$page_title         = $landing['title'];
$page_description   = $landing['description'];
$page_keywords      = $landing['keywords'];
$page_canonical     = $landing['canonical'];
$page_schema_blocks = $landing['schema_blocks'];
$page_cta_message   = $landing['cta_message'];
$page_cta_label     = $landing['cta_label'];

$Z   = $landing['zona_nombre'];
$S   = $landing['servicio_nombre'];
$srv = $landing['servicio'];

$sz_en = strrpos($landing['h1'], ' en ');
$hero_override = [
    'eyebrow'     => $landing['eyebrow'],
    'title_em'    => $sz_en !== false ? substr($landing['h1'], 0, $sz_en) : $landing['h1'],
    'title'       => $sz_en !== false ? substr($landing['h1'], $sz_en + 1) : '',
    'subtitle'    => $landing['subtitle'],
    'cta_label'   => $landing['cta_label'],
    'cta_message' => $landing['cta_message'],
    'micro'       => '',
];

$secciones       = $landing['bloques'];
$secciones_intro = $landing['intro'];
$secciones_fecha = $landing['actualizado'];
$faq_items = $landing['faq'];
$faq_lead  = 'Preguntas sobre ' . mb_strtolower($S) . ' en ' . $Z . '.';
$chTitulo  = $S . ' en ' . $Z . ': pedí presupuesto';
$chMicro   = '';
$chLead    = 'Escribinos por WhatsApp con la marca del equipo y qué necesitás. Te responde el técnico que atiende ' . $Z . '.';

$page_preload_images = [['href' => $ruta . '/images/hero/hero-mobile-720.webp', 'media' => '(max-width: 600px)'], ['href' => $ruta . '/images/hero/hero-desktop.webp', 'media' => '(min-width: 601px)']];
require 'src/vista/partials/head.php';
?>
<body class="home-page">
  <?php require 'src/vista/partials/header.php'; ?>

  <main id="main-content">
    <?php require 'src/vista/compact/hero.php'; ?>
    <nav class="migas" aria-label="Ubicación en el sitio">
      <ol class="container migas__list">
        <?php foreach ($landing['migas'] as $lp_m): ?>
        <li><?php if (isset($lp_m['href'])): ?><a href="<?= htmlspecialchars($lp_m['href']) ?>"><?= htmlspecialchars($lp_m['label']) ?></a><?php else: ?><span aria-current="page"><?= htmlspecialchars($lp_m['label']) ?></span><?php endif; ?></li>
        <?php endforeach; ?>
      </ol>
    </nav>
    <?php require 'src/vista/compact/secciones.php'; ?>


    <section class="zona-linderas" aria-label="Más servicios y zonas">
      <div class="container zona-servicios-links__grid">
        <div>
          <h2 class="zona-linderas__title">En <?= htmlspecialchars($Z) ?> también</h2>
          <ul class="zonas-home__chips" role="list">
            <li><a href="<?= $url . $srv ?>" class="zonas-home__chip"><i class="ri-list-check-2" aria-hidden="true"></i>Qué incluye y qué se cobra aparte</a></li>
            <li><a href="<?= $url ?>zonas/<?= $landing['zona'] ?>" class="zonas-home__chip"><i class="ri-windy-line" aria-hidden="true"></i>Instalación de aire acondicionado en <?= htmlspecialchars($Z) ?></a></li>
            <?php foreach ($landing['otros'] as $oK => $oN): ?>
            <li><a href="<?= $url . $oK ?>/<?= $landing['zona'] ?>" class="zonas-home__chip"><i class="<?= Local_Datos::SERVICIOS[$oK]['icono'] ?? 'ri-tools-line' ?>" aria-hidden="true"></i><?= htmlspecialchars($oN) ?> en <?= htmlspecialchars($Z) ?></a></li>
            <?php endforeach; ?>
          </ul>
        </div>
        <?php if ($landing['vecinos']): ?>
        <div>
          <h2 class="zona-linderas__title"><?= htmlspecialchars(Local_Datos::SERVICIOS[$srv]['nombre'] ?? $S) ?> cerca de <?= htmlspecialchars($Z) ?></h2>
          <ul class="zonas-home__chips" role="list">
            <?php foreach ($landing['vecinos'] as $vK => $vN): ?>
            <li><a href="<?= $url . $srv ?>/<?= $vK ?>" class="zonas-home__chip"><i class="ri-map-pin-2-line" aria-hidden="true"></i><?= htmlspecialchars($vN) ?></a></li>
            <?php endforeach; ?>
            <li><a href="<?= $url . $srv ?>#barrios" class="zonas-home__chip"><i class="ri-map-2-line" aria-hidden="true"></i>Todos los barrios</a></li>
          </ul>
        </div>
        <?php endif; ?>
      </div>
    </section>

    <?php require 'src/vista/compact/faq.php'; ?>
    <?php require 'src/vista/compact/contacto-home.php'; ?>
  </main>

  <?php require 'src/vista/partials/footer.php'; ?>
  <?php require 'src/vista/partials/end.php'; ?>

<?php
/**
 * Pagina de zona (/zonas/{slug}). Recibe $landing de Zonas_Controller::ver():
 *   zona, zona_nombre, zona_datos, h1, title, description, keywords, eyebrow, subtitle, cta_*, bloques[], faq[], linderas[], migas[], schema_blocks
 */
cta_contexto('zona', $landing['zona']);
$page_title         = $landing['title'];
$page_description   = $landing['description'];
$page_keywords      = $landing['keywords'];
$page_canonical     = $landing['canonical'];
$page_schema_blocks = $landing['schema_blocks'];
$page_cta_message   = $landing['cta_message'];
$page_cta_label     = $landing['cta_label'];

$Z  = $landing['zona_nombre'];
$zd = $landing['zona_datos'];

$hero_override = [
    'eyebrow'     => $landing['eyebrow'],
    'title_em'    => 'Instalación de aire acondicionado',
    'title'       => 'en ' . $Z,
    'subtitle'    => $landing['subtitle'],
    'cta_label'   => $landing['cta_label'],
    'cta_message' => $landing['cta_message'],
    'micro'       => CTA_WHATSAPP_MICROCOPY,
];

// Tarjetas de servicios con mensaje de WhatsApp que ya nombra la zona
$servicios_home = [
    ['titulo' => 'Instalación de split inverter en ' . $Z,  'img' => 'split-inverter.webp', 'alt' => 'Split inverter de pared instalado en un ambiente interior', 'srv' => 'split-inverter', 'btn' => 'Obtené tu presupuesto',   'wa_text' => "Hola! Vengo de la web, quiero instalar un aire acondicionado en {$Z}."],
    ['titulo' => ($zd['vivienda'] === 'apartamentos' ? 'Instalación en apartamentos de ' . $Z : 'Instalación en casas y apartamentos de ' . $Z), 'img' => 'apartamentos.webp', 'alt' => 'Fachada de un edificio de apartamentos con condensadoras de aire acondicionado en los balcones', 'srv' => 'apartamentos', 'btn' => 'Obtené tu presupuesto', 'wa_text' => "Hola! Quiero instalar un aire en mi apartamento. Barrio: {$Z} / Piso: ___"],
    ['titulo' => 'Service y mantenimiento en ' . $Z,         'img' => 'mantenimiento.webp', 'alt' => 'Técnico haciendo el service de la unidad exterior de un aire acondicionado',  'srv' => 'mantenimiento',  'btn' => 'Obtené tu presupuesto',   'wa_text' => "Hola, quiero agendar un service de aire acondicionado. Barrio: {$Z} / Cantidad de equipos: ___"],
    ['titulo' => 'Reparación de aire acondicionado en ' . $Z, 'img' => 'reparacion.webp', 'alt' => 'Técnico reparando un equipo de aire acondicionado con herramientas',    'srv' => 'reparacion',     'btn' => 'Obtené tu presupuesto',        'wa_text' => "Hola, mi aire acondicionado [no enfría / pierde agua / hace ruido]. Marca: ___ Barrio: {$Z}"],
];
$servicios_titulo = 'Servicios de aire acondicionado <em>en ' . htmlspecialchars($Z) . '</em>';
$servicios_lead   = 'Un técnico en refrigeración que trabaja en ' . htmlspecialchars($Z) . ' te responde por WhatsApp. Equipos de todas las marcas (Midea, Samsung, LG, Hisense, etc.).';

$secciones = $landing['bloques'];
$faq_items = $landing['faq'];
$faq_lead  = 'Lo que más se consulta sobre aire acondicionado en ' . $Z . '.';
$zhActual  = $landing['zona'];
$zhTitulo  = 'Otras zonas con técnicos';
$rlLinderas = $landing['linderas'];
$rlZonaActual = $landing['zona'];
$chTitulo = 'Pedí presupuesto en ' . $Z;
$chLead   = 'Escribinos por WhatsApp y te responde el técnico que atiende ' . $Z . '. Si preferís, dejá tus datos y te contactamos.';

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
    <?php require 'src/vista/compact/servicios.php'; ?>

    <?php if ($rlLinderas): ?>
    <section class="zona-linderas" aria-labelledby="linderas-titulo">
      <div class="container">
        <h2 class="zona-linderas__title" id="linderas-titulo"><?= ($landing['zona_datos']['tipo'] ?? 'barrio') === 'barrio' ? 'Barrios cercanos que también atendemos' : 'Localidades cercanas que también atendemos' ?></h2>
        <p class="zona-linderas__lead">El técnico que atiende <?= htmlspecialchars($Z) ?> también cubre estas zonas. Si estás en el límite, escribí igual: te confirmamos quién va.</p>
        <ul class="zonas-home__chips" role="list">
          <?php foreach ($rlLinderas as $rlK => $rlN): ?>
          <li><a href="<?= $url ?>zonas/<?= $rlK ?>" class="zonas-home__chip"><i class="ri-map-pin-2-line" aria-hidden="true"></i>Aire acondicionado en <?= htmlspecialchars($rlN) ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>
    </section>
    <?php endif; ?>

    <?php require 'src/vista/compact/tabla-capacidad.php'; ?>
    <?php require 'src/vista/compact/pasos.php'; ?>
    <?php require 'src/vista/compact/faq.php'; ?>
    <?php require 'src/vista/compact/zonas-home.php'; ?>
    <?php require 'src/vista/compact/relacionados.php'; ?>
    <?php require 'src/vista/compact/contacto-home.php'; ?>
  </main>

  <?php require 'src/vista/partials/footer.php'; ?>
  <?php require 'src/vista/partials/end.php'; ?>

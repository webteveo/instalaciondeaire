<?php
/**
 * Pagina pilar de servicio (/split-inverter, /reparacion, ...) y Fase 2 (servicio x zona).
 * Recibe $landing con: slug, path, canonical, title, description, keywords, schema_blocks, h1, eyebrow, subtitle,
 *   cta_label, cta_message, track, track_zona, intro?, secciones[], incluye?, aparte?, tabla_capacidad (bool), tabla_filas?,
 *   pasos?, faq[], migas[], zona?, zona_nombre?, zona_bloques?, form_servicio?
 */
cta_contexto($landing['track'], $landing['track_zona']);
$page_title         = $landing['title'];
$page_description   = $landing['description'];
$page_keywords      = $landing['keywords'] ?? SEO_PALABRAS_CLAVE_POR_DEFECTO;
$page_canonical     = $landing['canonical'];
$page_schema_blocks = $landing['schema_blocks'];
$page_cta_message   = $landing['cta_message'];
$page_cta_label     = $landing['cta_label'];

// H1 en dos lineas: primera parte en italica (hasta " en " si existe) + resto
$lp_en_pos   = strrpos($landing['h1'], ' en ');
$lp_title_em = $lp_en_pos !== false ? substr($landing['h1'], 0, $lp_en_pos) : $landing['h1'];
$lp_title    = $lp_en_pos !== false ? substr($landing['h1'], $lp_en_pos + 1) : '';

$hero_override = [
    'eyebrow'     => $landing['eyebrow'] ?? 'Técnicos en refrigeración de tu zona',
    'title_em'    => $lp_title_em,
    'title'       => $lp_title,
    'subtitle'    => $landing['subtitle'],
    'cta_label'   => $landing['cta_label'],
    'cta_message' => $landing['cta_message'],
    'micro'       => $landing['micro'] ?? CTA_WHATSAPP_MICROCOPY,
];
if (!empty($landing['hero_img'])) $hero_override['img'] = $landing['hero_img'];

// Bloques de texto: intro + secciones del servicio + (Fase 2) bloques de la zona
$secciones = array_merge($landing['intro'] ?? [], $landing['zona_bloques'] ?? [], $landing['secciones'] ?? []);
$incluye   = $landing['incluye'] ?? null;
$aparte    = $landing['aparte'] ?? null;
$pasos_items = $landing['pasos'] ?? null;
$faq_items = $landing['faq'] ?? null;
$faq_lead  = 'Lo que más se consulta sobre ' . mb_strtolower($landing['faq_tema'] ?? $landing['h1']) . '.';
$tc_filas  = $landing['tabla_filas'] ?? null;
$tc_titulo = $landing['tabla_titulo'] ?? null;
$tc_lead   = $landing['tabla_lead'] ?? null;
$zhActual  = $landing['zona'] ?? '';
$zhTitulo  = 'Zonas donde tenemos técnicos para ' . mb_strtolower($landing['zonas_tema'] ?? 'este servicio');

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
    <?php if (!empty($landing['intro'])): $secciones = $landing['intro']; require 'src/vista/compact/secciones.php'; endif; ?>
    <?php $incluye_figura = (bool)preg_match('#^(split-inverter|apartamentos|calefaccion|instalacion)(/|$)#', $landing['slug']); if ($incluye || $aparte): require 'src/vista/compact/incluye.php'; endif; ?>
    <?php if (!empty($landing['tabla_capacidad'])): require 'src/vista/compact/tabla-capacidad.php'; endif; ?>
    <?php $secciones = array_merge($landing['zona_bloques'] ?? [], $landing['secciones'] ?? []); if ($secciones) require 'src/vista/compact/secciones.php'; ?>
    <?php require 'src/vista/compact/pasos.php'; ?>
    <?php if (!empty($landing['testimonios'])) require 'src/vista/compact/testimonios.php'; ?>
    <?php if (!isset($landing['zonas']) || $landing['zonas']) require 'src/vista/compact/zonas-home.php'; ?>
    <?php require 'src/vista/compact/faq.php'; ?>
    <?php require 'src/vista/compact/relacionados.php'; ?>
    <?php
      $chTitulo = $landing['cta_final_titulo'] ?? ('Pedí presupuesto: ' . mb_strtolower($landing['h1']));
      $chLead   = $landing['cta_final_texto'] ?? 'Escribinos por WhatsApp y te responde un técnico de tu zona. Si preferís, dejá tus datos y te contactamos.';
      require 'src/vista/compact/contacto-home.php';
    ?>
  </main>

  <?php require 'src/vista/partials/footer.php'; ?>
  <?php require 'src/vista/partials/end.php'; ?>

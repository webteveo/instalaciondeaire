<!-- Hero Section -->
<?php
// ── Contenido del hero de la home. ──
// Las paginas de servicio y de zona pasan $hero_override (eyebrow, title_em, title, subtitle, cta_label, cta_message, micro) y reutilizan este mismo hero.
$hero_override    = $hero_override ?? [];
$hero_eyebrow     = $hero_override['eyebrow']   ?? 'Técnicos en refrigeración';
$hero_title_em    = $hero_override['title_em']  ?? 'Instalación de aire acondicionado';   // parte en italica
$hero_title       = $hero_override['title']     ?? 'en Montevideo y Canelones';        // resto del H1
$hero_subtitle    = $hero_override['subtitle']  ?? 'Instalamos split inverter y hacemos service, reparación y carga de gas en casas, apartamentos y comercios de Montevideo, Canelones y Maldonado. Te atiende un técnico de tu zona.';
$hero_cta_label   = $hero_override['cta_label'] ?? CTA_WHATSAPP_LABEL;
$hero_cta_message = $hero_override['cta_message'] ?? CONTACTO_WHATSAPP_MENSAJE;
$hero_micro       = $hero_override['micro'] ?? CTA_WHATSAPP_MICROCOPY;
$hero_cta_2       = CONTACTO_TELEFONO !== '' ? ['href' => 'tel:+' . CONTACTO_TELEFONO, 'label' => 'Llamar'] : ['href' => $url . 'calculadora-frigorias', 'label' => 'Calcular frigorías'];

// Imagen de fondo (relativa a public/images/). 'desktop' y/o 'mobile'; si falta una, esa vista queda con fondo degradado.
// Fotos: Pexels (licencia libre para uso comercial), ver creditos en README. Reemplazar por fotos propias cuando haya.
$hero_img = $hero_override['img'] ?? [
    'desktop'   => 'hero/hero-desktop.webp',
    'mobile'    => 'hero/hero-mobile-720.webp',
    'mobile_2x' => 'hero/hero-mobile.webp',
    'alt'       => 'Técnico en refrigeración midiendo la presión de gas de la condensadora de un aire acondicionado con manómetros',
];
// Slideshow de fondo solo mobile (rutas relativas a public/images/). Vacio = sin slideshow.
$hero_slides     = [];
// Numeros de la barra de stats. Vacio = no se muestra.
$hero_stats      = [];

$hero_slides_json = htmlspecialchars(json_encode(array_map(
    static fn($s) => $ruta . '/images/' . $s,
    $hero_slides
), JSON_UNESCAPED_SLASHES), ENT_QUOTES);
?>
<section class="hero" id="inicio" aria-label="<?= htmlspecialchars(EMPRESA_SLOGAN) ?>">

  <div class="hero__bg" <?= $hero_slides ? "data-slides='{$hero_slides_json}'" : '' ?>>
    <?php if (!empty($hero_img['desktop']) || !empty($hero_img['mobile'])): ?>
    <picture>
      <?php if (!empty($hero_img['mobile'])): ?>
      <source media="(max-width: 600px)"
              srcset="<?= $ruta ?>/images/<?= htmlspecialchars($hero_img['mobile']) ?><?= !empty($hero_img['mobile_2x']) ? ', ' . $ruta . '/images/' . htmlspecialchars($hero_img['mobile_2x']) . ' 2x' : '' ?>">
      <?php endif; ?>
      <?php if (!empty($hero_img['desktop'])): ?>
      <img src="<?= $ruta ?>/images/<?= htmlspecialchars($hero_img['desktop']) ?>"
           alt="<?= htmlspecialchars($hero_img['alt'] ?? '') ?>"
           class="hero__bg-img"
           loading="eager" fetchpriority="high" width="1700" height="956" decoding="async">
      <?php else: ?>
      <img src="<?= $ruta ?>/images/<?= htmlspecialchars($hero_img['mobile']) ?>"
           alt="<?= htmlspecialchars($hero_img['alt'] ?? '') ?>"
           class="hero__bg-img hero__bg-img--solo-mobile"
           loading="eager" fetchpriority="high" width="720" height="1279" decoding="async">
      <?php endif; ?>
    </picture>
    <?php endif; ?>
    <div class="hero__bg-overlay"></div>
  </div>

  <div class="container hero__layout">

    <div class="hero__content">

      <div class="hero__eyebrow">
        <span class="hero__eyebrow-line"></span>
        <?= htmlspecialchars($hero_eyebrow) ?>
      </div>

      <h1 class="hero__title">
        <em><?= htmlspecialchars($hero_title_em) ?></em><?php if ($hero_title !== ''): ?><br>
        <?= htmlspecialchars($hero_title) ?><?php endif; ?>
      </h1>

      <p class="hero__subtitle"><?= htmlspecialchars($hero_subtitle) ?></p>

      <div class="hero__actions">
        <?php if (!empty($hero_override['cta_href'])): // enlace interno (ej. ancla a la calculadora) en vez de WhatsApp ?>
        <a href="<?= htmlspecialchars($hero_override['cta_href']) ?>" class="hero__btn-primary"<?= cta_track() ?> data-track="hero_cta_interno">
        <?php else: ?>
        <a href="<?= htmlspecialchars(wsp_href($hero_cta_message)) ?>"
           class="hero__btn-primary"
           target="_blank" rel="noopener"<?= cta_track() ?> data-track="whatsapp_hero">
        <?php endif; ?>
          <i class="ri-whatsapp-line"></i>
          <?= htmlspecialchars($hero_cta_label) ?>
        </a>
        <a href="<?= htmlspecialchars($hero_cta_2['href']) ?>" class="hero__btn-secondary"<?= cta_track() ?> data-track="<?= CONTACTO_TELEFONO !== '' ? 'phone_hero' : 'hero_calculadora' ?>">
          <i class="<?= CONTACTO_TELEFONO !== '' ? 'ri-phone-line' : 'ri-calculator-line' ?>" aria-hidden="true"></i> <?= htmlspecialchars($hero_cta_2['label']) ?>
        </a>
      </div>
      <?php if ($hero_micro): ?>
      <p class="hero__micro"><?= htmlspecialchars($hero_micro) ?></p>
      <?php endif; ?>

    </div>

  </div>

  <?php if ($hero_stats): ?>
  <div class="hero__stats-bar">
    <div class="hero__stats-inner">
      <?php foreach ($hero_stats as $st): ?>
      <div class="hero__stat">
        <strong><?= htmlspecialchars($st['n']) ?><sup><?= htmlspecialchars($st['sup'] ?? '') ?></sup></strong>
        <span><?= htmlspecialchars($st['label']) ?></span>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
  <?php endif; ?>

</section>

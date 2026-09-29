<!-- Testimonios Section -->
<?php
/**
 * Las reseñas se cargan en compact/testimonios-data.php. Vacío = la sección no se muestra.
 * Sin schema Review/AggregateRating: las estrellas propias no son elegibles en Google y pueden generar una acción manual.
 */
$testimonios = require 'src/vista/compact/testimonios-data.php';
$tsPreview = false;
$tsColores = ['#0A5BD8', '#0B2545', '#22C3E6', '#1f7ae0', '#0d3a7a', '#12a3c4'];
?>
<?php if ($testimonios): ?>
<?php
?>
<section class="reviews-strip<?= $tsPreview ? ' reviews-strip--placeholder' : '' ?>" id="opiniones" aria-label="Opiniones de clientes" data-reviews>
  <div class="container">

    <div class="reviews-strip__track" id="reviews-track" tabindex="0" role="region" aria-label="Opiniones de clientes, desplazamiento horizontal" aria-roledescription="carrusel">
      <?php foreach (array_values($testimonios) as $tsIndex => $t): ?>
      <article class="review-card">
        <div class="review-card__author">
          <span class="review-card__avatar" style="background:<?= $tsColores[$tsIndex % count($tsColores)] ?>;color:#fff" aria-hidden="true"><?= htmlspecialchars(mb_strtoupper(mb_substr(ltrim($t['nombre'], '['), 0, 1))) ?></span>
          <div><h3><?= htmlspecialchars($t['nombre']) ?><?= !empty($t['barrio']) ? ' · ' . htmlspecialchars($t['barrio']) : '' ?></h3></div>
          <?php if (($t['fuente'] ?? '') === 'Google'): ?><span class="review-card__source">Google</span><?php endif; ?>
        </div>
        <div class="review-card__stars" aria-label="<?= (int)$t['estrellas'] ?> de 5 estrellas">
          <?php for ($i = 0; $i < 5; $i++): ?><svg class="<?= $i < (int)$t['estrellas'] ? 'is-on' : '' ?>" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 17.27 18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg><?php endfor; ?>
        </div>
        <p><?= htmlspecialchars($t['texto']) ?></p>
      </article>
      <?php endforeach; ?>
    </div>

  </div>
</section>
<?php endif; ?>

<!-- Quiénes Somos Section -->
<?php
$qs_img = 'hero/quienes-somos.webp'; // relativa a public/images/ (Pexels, ver creditos en README)
?>
<section class="quienes-somos" id="quienes-somos" aria-labelledby="quienes-somos-titulo">
  <div class="container quienes-somos__inner">

    <div class="quienes-somos__media">
      <img src="<?= $ruta ?>/images/<?= htmlspecialchars($qs_img) ?>"
           alt="Manos de un técnico en refrigeración con el manómetro de carga conectado a un aire acondicionado"
           class="quienes-somos__img"
           width="900" height="1100" loading="lazy" decoding="async">
    </div>

    <div class="quienes-somos__content">
      <h2 class="quienes-somos__title" id="quienes-somos-titulo">Quiénes somos</h2>

      <p class="quienes-somos__lead">
        Somos <strong><?= htmlspecialchars(EMPRESA_NOMBRE) ?></strong>, <a href="<?= $url ?>como-funciona">técnicos en refrigeración</a> que instalan, mantienen y reparan aire acondicionado en Montevideo, Canelones y Maldonado.
      </p>

      <p class="quienes-somos__text">
        Escribís una sola vez y te atiende el técnico nuestro que trabaja en <a href="<?= $url ?>zonas">tu zona</a>: te pasa el presupuesto, coordina la visita y hace el trabajo con vacío, prueba y garantía escrita.
        Instalamos equipos de todas las marcas (Midea, Samsung, LG, Hisense, etc.), comprados donde quieras.
      </p>

      <a href="<?= htmlspecialchars(wsp_href($page_cta_message ?? CONTACTO_WHATSAPP_MENSAJE)) ?>" class="quienes-somos__btn" target="_blank" rel="noopener"<?= cta_track() ?> data-track="whatsapp_quienes">
        <i class="ri-whatsapp-line" aria-hidden="true"></i>
        <?= htmlspecialchars($page_cta_label ?? CTA_WHATSAPP_LABEL) ?>
      </a>
    </div>

  </div>
</section>

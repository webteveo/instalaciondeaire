<!-- CTA Bottom Section (paginas de soporte, blog, /servicios, /zonas) -->
<?php
/** Tres motivos para consultar (panel derecho). */
$cta_panel = $cta_panel ?? [
    ['t' => 'Un técnico de tu zona',  'd' => 'Te responde el técnico que trabaja en tu barrio, sin vueltas.'],
    ['t' => 'Presupuesto claro',      'd' => 'Sabés qué incluye la instalación estándar y qué se cobra aparte antes de coordinar.'],
    ['t' => 'Todas las marcas',       'd' => 'Midea, Samsung, LG, Hisense y el resto. Compraste el equipo donde quisiste, lo instalamos igual.'],
];
$cta_titulo = $cta_titulo ?? 'Pedí presupuesto para tu aire acondicionado';
$cta_desc   = $cta_desc   ?? 'Contanos tu barrio, el ambiente y las frigorías (o los m²) y te responde un técnico de tu zona.';
$cta_msg    = $page_cta_message ?? CONTACTO_WHATSAPP_MENSAJE;
$cta_label  = $page_cta_label ?? CTA_WHATSAPP_LABEL;
?>
<section class="cta-bottom" id="contacto" aria-labelledby="cta-titulo">
  <div class="container">
    <div class="cta-bottom__inner">
      <div class="cta-bottom__content">
        <p class="cta-bottom__eyebrow">Presupuesto por WhatsApp</p>
        <h2 class="cta-bottom__title" id="cta-titulo"><?= htmlspecialchars($cta_titulo) ?></h2>
        <p class="cta-bottom__desc"><?= htmlspecialchars($cta_desc) ?></p>

        <div class="cta-bottom__trust">
          <span><i class="ri-map-pin-user-line" aria-hidden="true"></i> Técnico de tu zona</span>
          <span><i class="ri-checkbox-circle-line" aria-hidden="true"></i> Vacío, prueba y garantía</span>
          <span><i class="ri-whatsapp-line" aria-hidden="true"></i> Respuesta por WhatsApp</span>
        </div>

        <div class="cta-bottom__actions">
          <a href="<?= htmlspecialchars(wsp_href($cta_msg)) ?>"
             class="btn btn--whatsapp cta-bottom__btn"
             target="_blank" rel="noopener"<?= cta_track() ?> data-track="whatsapp_cta_bottom">
            <i class="ri-whatsapp-line" aria-hidden="true"></i>
            <?= htmlspecialchars($cta_label) ?>
          </a>

          <?php if (CONTACTO_TELEFONO): ?>
          <a href="tel:+<?= CONTACTO_TELEFONO ?>" class="cta-bottom__phone" aria-label="Llamar a <?= EMPRESA_NOMBRE ?>"<?= cta_track() ?>>
            <i class="ri-phone-line" aria-hidden="true"></i>
            <?= htmlspecialchars(CONTACTO_TELEFONO_VISIBLE) ?>
          </a>
          <?php endif; ?>
        </div>
        <p class="cta-bottom__micro"><?= htmlspecialchars(CTA_WHATSAPP_MICROCOPY) ?></p>
      </div>

      <aside class="cta-bottom__panel" aria-label="Motivos para consultar">
        <?php foreach ($cta_panel as $cp): ?>
        <div class="cta-bottom__panel-item">
          <strong><?= htmlspecialchars($cp['t']) ?></strong>
          <span><?= $cp['d'] ?></span>
        </div>
        <?php endforeach; ?>
      </aside>
    </div>
  </div>
</section>

<!-- Bloques de texto (H2 + parrafos + lista opcional). Requiere $secciones = [['t' => H2, 'p' => [html...], 'lista' => [...]?, 'nota' => ''?], ...]
     Opcional: $secciones_intro (parrafo de respuesta directa antes del primer H2) y $secciones_fecha (Y-m-d, "Actualizado: ...") -->
<?php $secciones = $secciones ?? []; $secciones_intro = $secciones_intro ?? ''; $secciones_fecha = $secciones_fecha ?? ''; ?>
<?php if ($secciones || $secciones_intro): ?>
<section class="zona-texto" aria-label="Información del servicio">
  <div class="container zona-texto__inner">
    <?php if ($secciones_intro): ?><p class="zona-texto__intro"><?= $secciones_intro ?></p><?php endif; ?>
<?php $secciones_intro = ''; $secciones_fecha = ''; ?>
    <?php if ($secciones_fecha): ?><p class="zona-texto__fecha"><i class="ri-calendar-check-line" aria-hidden="true"></i> Actualizado: <?= htmlspecialchars(mes_anio($secciones_fecha)) ?> · <?= htmlspecialchars(EMPRESA_NOMBRE) ?></p><?php endif; ?>
<?php $secciones_intro = ''; $secciones_fecha = ''; ?>
    <?php foreach ($secciones as $sIdx => $s): ?>
    <div class="zona-texto__bloque">
      <h2 class="zona-texto__title"><?= htmlspecialchars($s['t']) ?></h2>
      <?php foreach ($s['p'] ?? [] as $p): ?>
      <p><?= $p ?></p>
      <?php endforeach; ?>
      <?php if (!empty($s['lista'])): ?>
      <ul class="zona-texto__lista">
        <?php foreach ($s['lista'] as $li): ?><li><?= $li ?></li><?php endforeach; ?>
      </ul>
      <?php endif; ?>
<?php $secciones_intro = ''; $secciones_fecha = ''; ?>
      <?php if (!empty($s['nota'])): ?><p class="zona-texto__nota"><i class="ri-information-line" aria-hidden="true"></i> <?= $s['nota'] ?></p><?php endif; ?>
<?php $secciones_intro = ''; $secciones_fecha = ''; ?>
    </div>
    <?php endforeach; ?>
    <a href="<?= htmlspecialchars(wsp_href($page_cta_message ?? CONTACTO_WHATSAPP_MENSAJE)) ?>" class="zona-texto__link" target="_blank" rel="noopener"<?= cta_track() ?> data-track="whatsapp_texto">
      <i class="ri-whatsapp-line" aria-hidden="true"></i> <?= htmlspecialchars($page_cta_label ?? CTA_WHATSAPP_LABEL) ?>
    </a>
  </div>
</section>
<?php endif; ?>
<?php $secciones_intro = ''; $secciones_fecha = ''; ?>

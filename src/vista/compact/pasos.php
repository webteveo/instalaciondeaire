<!-- Pasos Section: 4 pasos, iguales en toda la web salvo que la pagina pase $pasos_items -->
<?php
$pasos_items = $pasos_items ?? [
    ['icono' => 'ri-whatsapp-line',            'titulo' => 'Nos escribís',                'desc' => 'Por WhatsApp o por el formulario. Decinos tu barrio, si es casa o apartamento, las frigorías o los m² del ambiente y si ya tenés el equipo.'],
    ['icono' => 'ri-money-dollar-circle-line', 'titulo' => 'Presupuesto',                 'desc' => 'Te responde un técnico de tu zona con el precio de la instalación estándar y lo que se cobra aparte, sin sorpresas.'],
    ['icono' => 'ri-calendar-check-line',      'titulo' => 'Coordinación',                'desc' => 'Acordás día y horario directamente con el técnico. Si hace falta, te pide fotos del lugar para ir preparado.'],
    ['icono' => 'ri-shield-check-line',        'titulo' => 'Instalación con garantía',    'desc' => 'Soporte, cañería, desagote, vacío del circuito y prueba de funcionamiento. La mano de obra queda con garantía escrita.'],
];
$pasos_titulo = $pasos_titulo ?? 'Cómo trabajamos';
$pasos_lead   = $pasos_lead   ?? 'Cuatro pasos, sin vueltas. Desde que escribís hasta que el aire queda funcionando.';
?>
<section class="pasos" aria-label="Como trabajamos">
  <div class="container">

    <div class="pasos__header">
      <h2 class="pasos__title"><?= htmlspecialchars($pasos_titulo) ?></h2>
      <p class="pasos__lead"><?= htmlspecialchars($pasos_lead) ?></p>
    </div>

    <ol class="pasos__list" role="list">
      <?php foreach ($pasos_items as $i => $paso): ?>
      <li class="pasos__item">
        <div class="pasos__icon">
          <i class="<?= htmlspecialchars($paso['icono']) ?>" aria-hidden="true"></i>
        </div>
        <div class="pasos__content">
          <h3 class="pasos__step-title"><?= htmlspecialchars($paso['titulo']) ?></h3>
          <p class="pasos__desc"><?= htmlspecialchars($paso['desc']) ?></p>
        </div>
      </li>
      <?php endforeach; ?>
    </ol>

    <div class="pasos__cta">
      <a href="<?= htmlspecialchars(wsp_href($page_cta_message ?? CONTACTO_WHATSAPP_MENSAJE)) ?>" class="pasos__cta-btn" target="_blank" rel="noopener"<?= cta_track() ?> data-track="whatsapp_pasos">
        <i class="ri-whatsapp-line" aria-hidden="true"></i>
        <?= htmlspecialchars($page_cta_label ?? CTA_WHATSAPP_LABEL) ?>
      </a>
      <p class="pasos__micro"><a href="<?= $url ?>como-funciona">Cómo trabajamos, paso a paso</a></p>
    </div>

  </div>
</section>

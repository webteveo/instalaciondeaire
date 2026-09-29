<!-- Stats Strip (debajo de servicios). Solo cifras que salen de los datos del sitio: nada inventado. -->
<?php
require_once 'src/controlador/Local_Controller.php';
$stats_strip = $stats_strip ?? [
    ['n' => count(EMPRESA_ZONAS),                       'sup' => '',  'label' => 'Departamentos con técnicos'],
    ['n' => count(Local_Datos::zonasPublicadas()),                  'sup' => '',  'label' => 'Zonas con página propia'],
    ['n' => count(Local_Controller::servicios()) + 1,   'sup' => '',  'label' => 'Servicios de aire acondicionado'],
];
?>
<section class="stats-strip" aria-label="<?= htmlspecialchars(EMPRESA_NOMBRE) ?> en cifras">
  <div class="container stats-strip__inner">
    <?php foreach ($stats_strip as $st): ?>
    <div class="stats-strip__item">
      <div class="stats-strip__num"><span data-count-to="<?= (int)$st['n'] ?>">0</span><?= htmlspecialchars($st['sup']) ?></div>
      <span class="stats-strip__label"><?= htmlspecialchars($st['label']) ?></span>
    </div>
    <?php endforeach; ?>
  </div>
</section>

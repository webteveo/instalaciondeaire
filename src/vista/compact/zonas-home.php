<!-- Zonas (bloque compacto): zonas con pagina propia, agrupadas por departamento -->
<?php
require_once 'src/controlador/Local_Controller.php';
$zhDeptos  = Local_Datos::zonasPorDepto();
$zhActual  = $zhActual ?? ($landing['zona'] ?? '');
$zhTitulo  = $zhTitulo ?? 'Zonas donde tenemos técnicos';
$zhLead    = $zhLead   ?? 'Elegí tu zona y escribile al técnico que la atiende. Si tu barrio no está, escribinos igual: te confirmamos cobertura.';
?>
<section class="zonas-home" id="zonas" aria-labelledby="zonas-home-title">
  <div class="container">
    <div class="zonas-home__header">
      <h2 class="zonas-home__title" id="zonas-home-title"><?= htmlspecialchars($zhTitulo) ?></h2>
      <p class="zonas-home__lead"><?= htmlspecialchars($zhLead) ?></p>
    </div>

    <?php foreach ($zhDeptos as $zhDepto => $zhZonas): ?>
    <h3 class="zonas-home__depto"><?= htmlspecialchars($zhDepto) ?></h3>
    <ul class="zonas-home__chips" role="list">
      <?php foreach ($zhZonas as $zhK => $zhZ): ?>
      <li><a href="<?= $url ?>zonas/<?= $zhK ?>" class="zonas-home__chip<?= $zhK === $zhActual ? ' is-active' : '' ?>"<?= $zhK === $zhActual ? ' aria-current="page"' : '' ?>><i class="ri-map-pin-2-line" aria-hidden="true"></i><?= htmlspecialchars($zhZ['nombre']) ?></a></li>
      <?php endforeach; ?>
    </ul>
    <?php endforeach; ?>

    <p class="zonas-home__otras"><a href="<?= $url ?>zonas">Ver todas las zonas</a></p>
  </div>
</section>

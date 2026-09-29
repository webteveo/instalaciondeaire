<!-- Indice de barrios de un servicio (paginas pilar de FASE2_SERVICIOS): enlaza cada /{servicio}/{zona} publicada, agrupada por region -->
<?php
require_once 'src/controlador/Local_Controller.php';
$sbServicio = $sbServicio ?? ($landing['slug'] ?? '');
$sbZonas    = Local_Datos::zonasDeServicio($sbServicio);
$sbNombre   = Local_Datos::FASE2_SERVICIOS[$sbServicio] ?? '';
?>
<?php if ($sbZonas): ?>
<section class="servicio-barrios" id="barrios" aria-labelledby="barrios-titulo">
  <div class="container">
    <h2 class="zona-linderas__title" id="barrios-titulo"><?= htmlspecialchars($sbNombre) ?> por barrio</h2>
    <p class="zona-linderas__lead">Cada barrio tiene su página con lo que cambia ahí: tipo de vivienda, salitre, edificios antiguos, patios o azoteas. Elegí el tuyo.</p>
    <?php foreach (Local_Datos::zonasPorRegion($sbZonas) as $sbR => $sbLista): ?>
    <h3 class="servicio-barrios__region"><?= htmlspecialchars(Local_Datos::REGIONES[$sbR]) ?></h3>
    <ul class="zonas-home__chips" role="list">
      <?php foreach ($sbLista as $sbK => $sbZ): ?>
      <li><a href="<?= $url . $sbServicio ?>/<?= $sbK ?>" class="zonas-home__chip"><i class="ri-map-pin-2-line" aria-hidden="true"></i><?= htmlspecialchars($sbZ['nombre']) ?></a></li>
      <?php endforeach; ?>
    </ul>
    <?php endforeach; ?>
  </div>
</section>
<?php endif; ?>

<!-- Qué incluye / qué se cobra aparte. Las paginas de servicio pasan $incluye y $aparte; la home usa la instalacion estandar. -->
<?php
$incluye = $incluye ?? [
    'titulo' => 'Qué incluye la instalación estándar',
    'items'  => [
        'Soporte (ménsulas) para la condensadora',
        'Cañería de cobre aislada en el tramo estándar (los metros incluidos se detallan en el presupuesto)',
        'Desagote de la unidad interior',
        'Interconexión eléctrica entre unidades',
        'Vacío del circuito con bomba y prueba de funcionamiento',
        'Garantía escrita de la mano de obra',
    ],
];
$aparte = $aparte ?? [
    'titulo' => 'Qué se cobra aparte',
    'items'  => [
        'Metros de cañería adicionales',
        'Trabajo en altura (condensadora en fachada)',
        'Canaleta plástica para tapar la cañería',
        'Línea eléctrica dedicada desde el tablero, con térmica y disyuntor',
        'Base o estructura especial para la condensadora',
        'Retiro de equipo viejo',
    ],
];
// Infografia propia (no es foto de un trabajo): esquema de una instalacion estandar. false = no se muestra.
$incluye_figura = $incluye_figura ?? true;
$incluye_nota = $incluye_nota ?? 'El presupuesto detalla por escrito qué incluye y qué no. Si algo no está claro, preguntalo antes de coordinar.';
?>
<section class="incluye" aria-labelledby="incluye-titulo">
  <div class="container">
    <div class="incluye__grid">
      <div class="incluye__col incluye__col--si">
        <h2 class="incluye__title" id="incluye-titulo"><i class="ri-checkbox-circle-line" aria-hidden="true"></i> <?= htmlspecialchars($incluye['titulo']) ?></h2>
        <ul class="incluye__list" role="list">
          <?php foreach ($incluye['items'] as $it): ?><li><i class="ri-check-line" aria-hidden="true"></i><?= $it ?></li><?php endforeach; ?>
        </ul>
      </div>
      <div class="incluye__col incluye__col--no">
        <h2 class="incluye__title"><i class="ri-add-circle-line" aria-hidden="true"></i> <?= htmlspecialchars($aparte['titulo']) ?></h2>
        <ul class="incluye__list" role="list">
          <?php foreach ($aparte['items'] as $it): ?><li><i class="ri-add-line" aria-hidden="true"></i><?= $it ?></li><?php endforeach; ?>
        </ul>
      </div>
    </div>
    <?php if ($incluye_figura): ?>
    <figure class="incluye__figura">
      <img src="<?= $ruta ?>/images/infografias/instalacion-split-que-incluye.webp"
           alt="Infografía de la instalación de un split: unidad interior, cañería de cobre aislada que atraviesa la pared, desagote con pendiente, condensadora sobre ménsulas y prueba con manómetro"
           width="1200" height="675" loading="lazy" decoding="async">
      <figcaption>Esquema de una instalación estándar de split: cada punto numerado es parte del trabajo.</figcaption>
    </figure>
    <?php endif; ?>
    <?php if ($incluye_nota): ?><p class="incluye__nota"><?= $incluye_nota ?></p><?php endif; ?>
  </div>
</section>

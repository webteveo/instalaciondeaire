<!-- Tabla de capacidad: m² -> frigorías / BTU, con enlace a la calculadora. Referencia ~150 frigorías/m² en ambiente normal. -->
<?php
$tc_titulo = $tc_titulo ?? '¿Cuántas frigorías necesito?';
$tc_lead   = $tc_lead   ?? 'Referencia rápida para un ambiente con techo normal, sol moderado y una o dos personas. Si da al norte, tiene mucho vidrio o está bajo azotea, subí un escalón. Los equipos comerciales vienen en estas capacidades:';
$tc_filas  = $tc_filas  ?? [
    ['Hasta 12 m²',   '2.250 frigorías', '9.000 BTU',  'Dormitorio, escritorio'],
    ['13 a 20 m²',    '3.000 frigorías', '12.000 BTU', 'Dormitorio grande, living chico'],
    ['21 a 30 m²',    '4.500 frigorías', '18.000 BTU', 'Living comedor, oficina'],
    ['31 a 37 m²',    '5.500 frigorías', '22.000 BTU', 'Living integrado, local chico'],
    ['38 a 42 m²',    '6.000 frigorías', '24.000 BTU', 'Ambientes grandes, locales'],
];
?>
<section class="capacidad" aria-labelledby="capacidad-titulo">
  <div class="container capacidad__inner">
    <div class="capacidad__text">
      <h2 class="capacidad__title" id="capacidad-titulo"><?= htmlspecialchars($tc_titulo) ?></h2>
      <p class="capacidad__lead"><?= $tc_lead ?></p>
      <a href="<?= $url ?>calculadora-frigorias" class="capacidad__link btn btn--primary" data-track="calculadora_link"<?= cta_track() ?>><i class="ri-calculator-line" aria-hidden="true"></i> Calcular con orientación, piso y personas</a>
    </div>
    <div class="ar-table-wrap capacidad__table">
      <table class="ar-table">
        <thead><tr><th>Superficie</th><th>Frigorías</th><th>BTU</th><th>Ambiente típico</th></tr></thead>
        <tbody>
          <?php foreach ($tc_filas as $f): ?>
          <tr><td data-label="Superficie"><?= htmlspecialchars($f[0]) ?></td><td data-label="Frigorías"><?= htmlspecialchars($f[1]) ?></td><td data-label="BTU"><?= htmlspecialchars($f[2]) ?></td><td data-label="Ambiente típico"><?= htmlspecialchars($f[3]) ?></td></tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</section>

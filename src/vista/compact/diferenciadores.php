<!-- Diferenciadores Section -->
<?php
$dif_items = $dif_items ?? [
    ['icono' => 'ri-map-pin-user-line',  'href' => 'zonas',                 't' => 'Un técnico de tu zona',        'd' => 'Te atiende un técnico nuestro que trabaja en tu barrio, en Montevideo, Canelones o Maldonado. Menos traslado, más rapidez para coordinar.'],
    ['icono' => 'ri-price-tag-3-line',   'href' => 'preguntas-frecuentes',  't' => 'Presupuesto claro',            'd' => 'Sabés qué incluye la instalación estándar y qué se cobra aparte (metros extra, altura, canaleta, línea eléctrica) antes de coordinar.'],
    ['icono' => 'ri-tools-line',         'href' => 'split-inverter',        't' => 'Todas las marcas',             'd' => 'Instalamos y reparamos equipos de todas las marcas (Midea, Samsung, LG, Hisense, etc.), los hayas comprado donde los hayas comprado.'],
    ['icono' => 'ri-shield-check-line',  'href' => 'como-funciona',         't' => 'Vacío, prueba y garantía',     'd' => 'Toda instalación termina con vacío del circuito, prueba de funcionamiento y garantía escrita de nuestra mano de obra.'],
];
$dif_titulo = $dif_titulo ?? 'Por qué pedir presupuesto acá';
$dif_lead   = $dif_lead   ?? 'Lo que te aseguramos en cada instalación, service o reparación.';
?>
<section class="diferenciadores" id="por-que-nosotros" aria-labelledby="dif-titulo">
  <div class="container">
    <div class="diferenciadores__header">
      <h2 class="diferenciadores__title" id="dif-titulo"><?= htmlspecialchars($dif_titulo) ?></h2>
      <p class="diferenciadores__lead"><?= htmlspecialchars($dif_lead) ?></p>
    </div>

    <div class="diferenciadores__grid">
      <?php foreach ($dif_items as $d): ?>
      <article class="dif-item">
        <div class="dif-item__icon" aria-hidden="true"><i class="<?= htmlspecialchars($d['icono']) ?>"></i></div>
        <h3 class="dif-item__title"><?php if (!empty($d['href'])): ?><a href="<?= $url . $d['href'] ?>"><?= htmlspecialchars($d['t']) ?></a><?php else: ?><?= htmlspecialchars($d['t']) ?><?php endif; ?></h3>
        <p class="dif-item__desc"><?= htmlspecialchars($d['d']) ?></p>
      </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

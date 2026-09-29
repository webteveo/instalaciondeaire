<?php
require_once 'config/variables.php';
require_once 'src/controlador/Local_Controller.php';
cta_contexto('404');
$page_title       = 'Página no encontrada | ' . EMPRESA_NOMBRE;
$page_description = 'Esta página no existe, pero los técnicos sí: instalación, service y reparación de aire acondicionado en Montevideo, Canelones y Maldonado. Escribinos por WhatsApp.';
$page_canonical   = SEO_CANONICAL_URL;
$page_robots      = 'noindex, follow';

$e404Servicios = Local_Controller::servicios();
$e404Zonas     = [];
foreach (Local_Datos::ZONAS as $e404K => $e404Z) $e404Zonas[$e404K] = $e404Z['nombre'];
asort($e404Zonas);

require 'src/vista/partials/head.php';
?>
<body class="home-page">
  <?php require 'src/vista/partials/header.php'; ?>
  <main id="main-content">

    <section class="e404">
      <div class="container e404__inner">
        <span class="e404__code" aria-hidden="true">404</span>
        <h1 class="e404__title">Esta página se quedó sin gas</h1>
        <p class="e404__lead">La página que buscás no existe o cambió de dirección. Si necesitás instalar, reparar o hacerle service a un aire acondicionado, escribinos y te responde un técnico de tu zona.</p>
        <a href="<?= htmlspecialchars(wsp_href(CONTACTO_WHATSAPP_MENSAJE)) ?>" class="e404__btn" target="_blank" rel="noopener"<?= cta_track() ?>>
          <i class="ri-whatsapp-line" aria-hidden="true"></i>
          <?= htmlspecialchars(CTA_WHATSAPP_LABEL) ?>
        </a>
      </div>
    </section>

    <section class="e404-links" aria-labelledby="e404-servicios">
      <div class="container">
        <h2 class="e404-links__title" id="e404-servicios">Servicios</h2>
        <ul class="zonas-home__chips" role="list">
          <li><a href="<?= $url ?>" class="zonas-home__chip"><i class="ri-windy-line" aria-hidden="true"></i>Instalación de aire acondicionado</a></li>
          <?php foreach ($e404Servicios as $e404K => $e404N): ?>
          <li><a href="<?= $url . $e404K ?>" class="zonas-home__chip"><i class="<?= htmlspecialchars(Local_Datos::SERVICIOS[$e404K]['icono']) ?>" aria-hidden="true"></i><?= htmlspecialchars($e404N) ?></a></li>
          <?php endforeach; ?>
        </ul>

        <h2 class="e404-links__title" id="e404-barrios">Buscá tu zona</h2>
        <input type="search" class="e404__search" id="e404-buscar" placeholder="Escribí tu barrio, por ejemplo Pocitos" aria-label="Buscar zona" autocomplete="off">
        <ul class="zonas-home__chips" id="e404-lista" role="list" aria-labelledby="e404-barrios">
          <?php foreach ($e404Zonas as $e404K => $e404N): ?>
          <li data-nombre="<?= htmlspecialchars(mb_strtolower($e404N)) ?>"><a href="<?= $url ?>zonas/<?= $e404K ?>" class="zonas-home__chip"><i class="ri-map-pin-2-line" aria-hidden="true"></i><?= htmlspecialchars($e404N) ?></a></li>
          <?php endforeach; ?>
        </ul>
        <p class="e404-links__otros">
          <a href="<?= $url ?>">Inicio</a> · <a href="<?= $url ?>servicios">Servicios</a> · <a href="<?= $url ?>zonas">Zonas</a> · <a href="<?= $url ?>calculadora-frigorias">Calculadora</a> · <a href="<?= $url ?>preguntas-frecuentes">Preguntas frecuentes</a> · <a href="<?= $url ?>articulos">Guías</a> · <a href="<?= $url ?>contacto">Contacto</a>
        </p>
      </div>
    </section>

  </main>
  <script>
    (function () {
      var q = document.getElementById('e404-buscar'), items = document.querySelectorAll('#e404-lista li');
      if (!q) return;
      var norm = function (s) { return s.normalize('NFD').replace(/[̀-ͯ]/g, '').toLowerCase(); };
      q.addEventListener('input', function () {
        var v = norm(q.value.trim());
        items.forEach(function (li) { li.hidden = v !== '' && norm(li.dataset.nombre).indexOf(v) === -1; });
      });
    })();
  </script>
  <?php require 'src/vista/partials/footer.php'; ?>
  <?php require 'src/vista/partials/end.php'; ?>

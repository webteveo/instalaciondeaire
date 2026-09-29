<?php
require_once 'config/variables.php';
require_once 'src/controlador/Local_Controller.php';

cta_contexto('zonas');
$page_title = 'Aire acondicionado por barrio en Montevideo y alrededores';
$page_description = 'Los 62 barrios de Montevideo y localidades de Canelones y Maldonado, cada uno con su página: instalación, service y reparación por WhatsApp.';
$page_keywords = 'técnico aire acondicionado por barrio montevideo, instalación aire acondicionado pocitos, instalación aire acondicionado carrasco, aire acondicionado ciudad de la costa, aire acondicionado punta del este';
$page_canonical = SEO_CANONICAL_URL . '/zonas';
$page_cta_message = CONTACTO_WHATSAPP_MENSAJE;
$page_cta_label = CTA_WHATSAPP_LABEL;
$page_schema_blocks = [[
  '@context' => 'https://schema.org', '@type' => 'BreadcrumbList',
  'itemListElement' => [
    ['@type' => 'ListItem', 'position' => 1, 'name' => 'Inicio', 'item' => SEO_CANONICAL_URL . '/'],
    ['@type' => 'ListItem', 'position' => 2, 'name' => 'Zonas', 'item' => SEO_CANONICAL_URL . '/zonas'],
  ],
]];

$zDeptos = [];
foreach (Local_Datos::zonasPorRegion() as $zR => $zL) $zDeptos[Local_Datos::REGIONES[$zR]] = $zL;
// Que cambia en cada region (texto propio de esta pagina)
$zRegionTexto = [
  'centro'    => 'Edificios de varias décadas, muchos sin balcón, patios de aire, oficinas y locales. La condensadora se resuelve con la administración y la eléctrica casi siempre necesita una línea propia.',
  'costa'     => 'Torres y edificios frente a la rambla, casas con jardín hacia Carrasco. Salitre en las primeras cuadras: equipos protegidos y service con lavado de la unidad exterior.',
  'este'      => 'Casas bajas, cooperativas, complejos y zonas semirrurales hacia Camino Maldonado. Techos de losa, chapa o bovedilla que piden calcular el equipo con margen.',
  'norte'     => 'Casas antiguas, talleres familiares, complejos de vivienda y chacras hacia el límite con Canelones. Recorridos largos, líneas eléctricas exigidas y polvo de caminos.',
  'oeste'     => 'Del Prado y sus casonas al Cerro y la costa oeste. Casas en pendiente, humedad de arroyos y de la bahía, arena y viento en Casabó y Pajas Blancas.',
  'canelones' => 'Ciudades del corredor de las rutas 5 y 8, Ciudad de la Costa y la Costa de Oro. Casas con fondo, empresas, y casas de temporada con salitre cerca del mar.',
  'maldonado' => 'Torres y casas de temporada en Punta del Este y Piriápolis, población estable en Maldonado y San Carlos. Puesta a punto antes de diciembre y equipos para la sal.',
];
$zTipo = ['apartamentos' => 'Edificios: condensadora en balcón o fachada', 'casas' => 'Casas: más libertad para ubicar la condensadora', 'mixto' => 'Casas y apartamentos'];

require 'src/vista/partials/head.php';
?>
<body>
  <?php require 'src/vista/partials/header.php'; ?>

  <main id="main-content" class="section-page">
    <section class="page-intro">
      <div class="container page-intro__inner">
        <p class="page-intro__eyebrow">Cobertura</p>
        <h1 class="page-intro__title">Aire acondicionado por barrio</h1>
        <p class="page-intro__desc">Trabajamos en los 62 barrios de Montevideo y en localidades de Canelones y Maldonado. Cada zona tiene su página con lo que cambia ahí: tipo de vivienda, salitre, edificios antiguos, patios, azoteas o casas de temporada, y páginas de service, reparación, carga de gas y desinstalación.</p>
      </div>
    </section>

    <section class="zonas-dir" aria-label="Directorio de zonas">
      <div class="container">
        <?php foreach ($zDeptos as $zDepto => $zZonas): ?>
        <div class="zonas-dir__depto">
          <h2 class="zonas-dir__title"><i class="ri-map-pin-2-fill" aria-hidden="true"></i> <?= htmlspecialchars($zDepto) ?></h2>
          <?php $zR = array_search($zDepto, Local_Datos::REGIONES, true); if ($zR && isset($zRegionTexto[$zR])): ?><p class="zona-linderas__lead"><?= htmlspecialchars($zRegionTexto[$zR]) ?></p><?php endif; ?>
          <div class="zonas-dir__grid">
            <?php foreach ($zZonas as $zK => $zZ): ?>
            <a href="<?= $url ?>zonas/<?= $zK ?>" class="zonas-dir__card">
              <strong>Aire acondicionado en <?= htmlspecialchars($zZ['nombre']) ?></strong>
              <span><?= htmlspecialchars($zTipo[$zZ['vivienda']]) ?></span>
              <ul class="zonas-dir__tags" role="list">
                <?php if (!empty($zZ['costera'])): ?><li><i class="ri-water-flash-line" aria-hidden="true"></i> Zona costera</li><?php endif; ?>
                <?php if (!empty($zZ['antiguo'])): ?><li><i class="ri-flashlight-line" aria-hidden="true"></i> Edificios antiguos</li><?php endif; ?>
                <?php if (!empty($zZ['temporada'])): ?><li><i class="ri-sun-line" aria-hidden="true"></i> Temporada</li><?php endif; ?>
              </ul>
              <em>Ver zona <i class="ri-arrow-right-line" aria-hidden="true"></i></em>
            </a>
            <?php endforeach; ?>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </section>

    <?php require 'src/vista/compact/cta.php'; ?>
  </main>

  <?php require 'src/vista/partials/footer.php'; ?>
  <?php require 'src/vista/partials/end.php'; ?>

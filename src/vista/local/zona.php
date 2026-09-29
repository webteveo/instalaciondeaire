<?php
/**
 * Pagina de zona (/zonas/{slug}). Recibe $landing de Zonas_Controller::ver():
 *   zona, zona_nombre, zona_datos, h1, title, description, keywords, eyebrow, subtitle, intro, cta_*, bloques[], faq[], linderas[], migas[], schema_blocks, actualizado
 * Sin bloques genericos (pasos, tabla de frigorias, directorio de zonas): cada zona se sostiene con su propio texto.
 */
cta_contexto('zona', $landing['zona']);
$page_title         = $landing['title'];
$page_description   = $landing['description'];
$page_keywords      = $landing['keywords'];
$page_canonical     = $landing['canonical'];
$page_schema_blocks = $landing['schema_blocks'];
$page_cta_message   = $landing['cta_message'];
$page_cta_label     = $landing['cta_label'];

$Z    = $landing['zona_nombre'];
$zd   = $landing['zona_datos'];
$slug = $landing['zona'];

$hero_override = [
    'eyebrow'     => $landing['eyebrow'],
    'title_em'    => 'Instalación de aire acondicionado',
    'title'       => 'en ' . $Z,
    'subtitle'    => $landing['subtitle'],
    'cta_label'   => $landing['cta_label'],
    'cta_message' => $landing['cta_message'],
    'micro'       => CTA_WHATSAPP_MICROCOPY,
];

// Tarjetas: los servicios de esta zona. Si la zona tiene pagina propia del servicio, la tarjeta va ahi.
$zsHref = fn(string $srv) => Local_Datos::servicioZonaPublicado($srv, $slug) ? $url . $srv . '/' . $slug : $url . $srv;
$servicios_home = [
    ['titulo' => 'Service de aire acondicionado en ' . $Z,      'img' => 'mantenimiento.webp', 'alt' => 'Técnico haciendo el service de la unidad exterior de un aire acondicionado', 'srv' => 'mantenimiento',  'href' => $zsHref('mantenimiento'),  'btn' => 'Agendá el service',  'wa_text' => "Hola, quiero agendar un service de aire acondicionado en {$Z}. Cantidad de equipos: ___"],
    ['titulo' => 'Reparación de aire acondicionado en ' . $Z,   'img' => 'reparacion.webp',    'alt' => 'Técnico reparando un equipo de aire acondicionado con herramientas',        'srv' => 'reparacion',     'href' => $zsHref('reparacion'),     'btn' => 'Contanos la falla',  'wa_text' => "Hola, mi aire acondicionado [no enfría / pierde agua / hace ruido]. Marca: ___ Barrio: {$Z}"],
    ['titulo' => 'Carga de gas en ' . $Z,                       'img' => 'carga-de-gas.webp',  'alt' => 'Técnico detectando fugas en el serpentín de un aire acondicionado',          'srv' => 'carga-de-gas',   'href' => $zsHref('carga-de-gas'),   'btn' => 'Pedí presupuesto',   'wa_text' => "Hola, necesito carga de gas para mi aire en {$Z}. Marca: ___"],
    ['titulo' => 'Desinstalación y traslado en ' . $Z,          'img' => 'desinstalacion.webp','alt' => 'Técnico desmontando la unidad exterior de un aire acondicionado',           'srv' => 'desinstalacion', 'href' => $zsHref('desinstalacion'), 'btn' => 'Pedí presupuesto',   'wa_text' => "Hola, necesito desinstalar un aire acondicionado en {$Z}. ¿Lo reinstalan en otro lugar?: ___"],
];
$servicios_titulo = 'Otros servicios <em>en ' . htmlspecialchars($Z) . '</em>';
$servicios_lead   = 'Además de instalar, hacemos service, reparación, carga de gas y desinstalación en ' . htmlspecialchars($Z) . '. Equipos de todas las marcas.';

$secciones       = $landing['bloques'];
$secciones_intro = $landing['intro'];
$secciones_fecha = $landing['actualizado'];
$faq_items = $landing['faq'];
$faq_lead  = 'Lo que más se consulta sobre aire acondicionado en ' . $Z . '.';
$rlLinderas = $landing['linderas'];
$rlZonaActual = $slug;
$chTitulo = 'Pedí presupuesto en ' . $Z;
$chLead   = 'Escribinos por WhatsApp y te responde el técnico que atiende ' . $Z . '. Si preferís, dejá tus datos y te contactamos.';

$page_preload_images = [['href' => $ruta . '/images/hero/hero-mobile-720.webp', 'media' => '(max-width: 600px)'], ['href' => $ruta . '/images/hero/hero-desktop.webp', 'media' => '(min-width: 601px)']];
require 'src/vista/partials/head.php';
?>
<body class="home-page">
  <?php require 'src/vista/partials/header.php'; ?>

  <main id="main-content">
    <?php require 'src/vista/compact/hero.php'; ?>
    <nav class="migas" aria-label="Ubicación en el sitio">
      <ol class="container migas__list">
        <?php foreach ($landing['migas'] as $lp_m): ?>
        <li><?php if (isset($lp_m['href'])): ?><a href="<?= htmlspecialchars($lp_m['href']) ?>"><?= htmlspecialchars($lp_m['label']) ?></a><?php else: ?><span aria-current="page"><?= htmlspecialchars($lp_m['label']) ?></span><?php endif; ?></li>
        <?php endforeach; ?>
      </ol>
    </nav>
    <?php require 'src/vista/compact/secciones.php'; ?>
    <?php require 'src/vista/compact/servicios.php'; ?>

    <?php if ($rlLinderas): ?>
    <section class="zona-linderas" aria-labelledby="linderas-titulo">
      <div class="container">
        <h2 class="zona-linderas__title" id="linderas-titulo"><?= ($zd['tipo'] ?? 'barrio') === 'barrio' ? 'Barrios vecinos de ' . htmlspecialchars($Z) : 'Localidades cerca de ' . htmlspecialchars($Z) ?></h2>
        <ul class="zonas-home__chips" role="list">
          <?php foreach ($rlLinderas as $rlK => $rlN): ?>
          <li><a href="<?= $url ?>zonas/<?= $rlK ?>" class="zonas-home__chip"><i class="ri-map-pin-2-line" aria-hidden="true"></i>Aire acondicionado en <?= htmlspecialchars($rlN) ?></a></li>
          <?php endforeach; ?>
          <li><a href="<?= $url ?>zonas" class="zonas-home__chip"><i class="ri-map-2-line" aria-hidden="true"></i>Todas las zonas</a></li>
        </ul>
      </div>
    </section>
    <?php endif; ?>

    <?php require 'src/vista/compact/faq.php'; ?>
    <?php require 'src/vista/compact/relacionados.php'; ?>
    <?php require 'src/vista/compact/contacto-home.php'; ?>
  </main>

  <?php require 'src/vista/partials/footer.php'; ?>
  <?php require 'src/vista/partials/end.php'; ?>

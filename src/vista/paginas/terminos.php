<?php
require_once 'config/variables.php';

cta_contexto('legal');
$page_title = 'Términos de uso | ' . EMPRESA_NOMBRE;
$page_description = 'Condiciones de uso del sitio: qué hacemos y qué no, quién realiza y garantiza los trabajos, y alcance de la información publicada sobre instalación de aire acondicionado.';
$page_keywords = 'términos de uso ' . mb_strtolower(EMPRESA_NOMBRE);
$page_canonical = SEO_CANONICAL_URL . '/terminos';
$page_robots = 'noindex, follow';

$secciones = [
  ['t' => 'Qué es este sitio', 'p' => [
    EMPRESA_NOMBRE . ' ofrece servicios de instalación, mantenimiento y reparación de aire acondicionado en Montevideo, Canelones y Maldonado, realizados por sus técnicos en refrigeración. A través del sitio podés consultar información y pedir presupuesto por WhatsApp, teléfono o formulario.',
  ]],
  ['t' => 'Presupuestos y garantía', 'p' => [
    'Todo trabajo se realiza sobre un presupuesto previo por escrito, que detalla lo incluido y lo que se cobra aparte. La mano de obra tiene garantía escrita; la garantía del equipo es la del fabricante o del comercio donde lo compraste. Los precios publicados en el presupuesto son los que valen; el sitio no publica cifras porque cada instalación es distinta.',
    'Si tenés un reclamo sobre un trabajo, escribinos a <a href="mailto:' . CONTACTO_EMAIL . '">' . CONTACTO_EMAIL . '</a> con el número o la fecha del presupuesto y lo resolvemos.',
  ]],
  ['t' => 'Marcas', 'p' => [
    'No somos servicio oficial ni autorizado de ninguna marca. Las marcas mencionadas (Midea, Samsung, LG, Hisense y otras) pertenecen a sus titulares y se citan únicamente para indicar que trabajamos con equipos de todas ellas.',
  ]],
  ['t' => 'Alcance de la información publicada', 'p' => [
    'Las tablas de capacidad, la calculadora de frigorías y las guías son orientativas y no reemplazan la evaluación de un técnico en el lugar. Sobre permisos, reglamentos de copropiedad e instalaciones eléctricas, la información es general: consultá el reglamento de tu edificio, a la administración y, si corresponde, a un electricista habilitado. No hacemos afirmaciones legales.',
  ]],
  ['t' => 'Uso del sitio', 'p' => [
    'Podés usar el sitio para consultar información y pedir presupuesto. No está permitido usarlo para enviar mensajes masivos, extraer datos de forma automatizada ni suplantar a terceros. Podemos modificar el sitio y estos términos en cualquier momento; la versión vigente es la publicada en esta página. Última actualización: 25 de setiembre de 2026.',
  ]],
];

require 'src/vista/partials/head.php';
?>
<body>
  <?php require 'src/vista/partials/header.php'; ?>
  <main id="main-content" class="section-page">
    <section class="page-intro">
      <div class="container page-intro__inner">
        <p class="page-intro__eyebrow">Legal</p>
        <h1 class="page-intro__title">Términos de uso</h1>
        <p class="page-intro__desc">Las condiciones para usar <?= htmlspecialchars(EMPRESA_NOMBRE) ?>, explicadas sin letra chica.</p>
      </div>
    </section>
    <?php require 'src/vista/compact/secciones.php'; ?>
  </main>
  <?php require 'src/vista/partials/footer.php'; ?>
  <?php require 'src/vista/partials/end.php'; ?>

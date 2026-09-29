<?php
require_once 'config/variables.php';

cta_contexto('como-funciona');
$page_title = 'Cómo trabajamos | ' . EMPRESA_NOMBRE;
$page_description = 'Del primer mensaje a la garantía: cómo cotizamos, qué incluye la instalación estándar, cómo coordinamos con el técnico de tu zona y qué pasa después de instalar. Sin letra chica.';
$page_keywords = 'cómo trabajamos instalación de aire uruguay, instalación aire acondicionado con garantía, técnico aire acondicionado de mi zona, presupuesto instalación aire acondicionado';
$page_canonical = SEO_CANONICAL_URL . '/como-funciona';
$page_cta_message = CONTACTO_WHATSAPP_MENSAJE;
$page_cta_label = CTA_WHATSAPP_LABEL;
$page_schema_blocks = [[
  '@context' => 'https://schema.org', '@type' => 'BreadcrumbList',
  'itemListElement' => [
    ['@type' => 'ListItem', 'position' => 1, 'name' => 'Inicio', 'item' => SEO_CANONICAL_URL . '/'],
    ['@type' => 'ListItem', 'position' => 2, 'name' => 'Cómo trabajamos', 'item' => SEO_CANONICAL_URL . '/como-funciona'],
  ],
]];

$secciones = [
  ['t' => 'Quiénes somos', 'p' => [
    '<strong>' . EMPRESA_NOMBRE . '</strong> es un equipo de técnicos en refrigeración que instala, mantiene y repara aire acondicionado en Montevideo, Canelones (Ciudad de la Costa) y Maldonado (Punta del Este y Maldonado). Cada técnico atiende los barrios donde trabaja habitualmente: por eso te pedimos el barrio en el primer mensaje, para que te responda el que llega más rápido a tu casa.',
    'No somos servicio oficial ni autorizado de ninguna marca: trabajamos con equipos de todas las marcas (Midea, Samsung, LG, Hisense, etc.), los hayas comprado donde los hayas comprado.',
  ]],
  ['t' => 'Qué pasa cuando escribís', 'p' => [
    'Tu mensaje de WhatsApp o del formulario lo lee el técnico que atiende tu zona. Te hace las preguntas que le falten (piso, balcón, marca del equipo, fotos del lugar) y te pasa el <strong>presupuesto por escrito</strong>, con el detalle de lo que incluye y lo que se cobra aparte. A partir de ahí coordinás con él día y horario.',
    'Si todavía no compraste el equipo, te orientamos sobre la capacidad con la <a href="' . $url . 'calculadora-frigorias">calculadora de frigorías</a> y con lo que veamos del ambiente. No vendemos equipos, así que la recomendación no tiene otro interés que el de que el aire funcione bien.',
  ]],
  ['t' => 'Qué incluye la instalación estándar y qué no', 'p' => [
    'Incluye el soporte de la condensadora, la cañería de cobre aislada en el tramo estándar (los metros incluidos se detallan en el presupuesto), el desagote, la interconexión eléctrica entre unidades, el <strong>vacío del circuito con bomba</strong> y la prueba de funcionamiento. Se cobran aparte los metros extra de cañería, el trabajo en altura para condensadoras en fachada, la canaleta, la línea eléctrica dedicada desde el tablero y el retiro del equipo viejo. Todo eso figura en el presupuesto antes de coordinar, para que no haya sorpresas al terminar.',
  ]],
  ['t' => 'Garantía y factura', 'p' => [
    'La mano de obra tiene <strong>garantía escrita</strong> (el plazo figura en el presupuesto). La garantía del equipo es la del fabricante o del comercio donde lo compraste; guardá la factura del equipo y nuestro comprobante de instalación, porque suelen pedir los dos.',
    'Emitimos factura por el trabajo. Si necesitás factura a nombre de una empresa, decilo en el primer mensaje.',
  ]],
  ['t' => 'Después de instalar', 'p' => [
    'Antes de irnos probamos el equipo en frío y en calor y te mostramos cómo limpiar los filtros. Recomendamos un <a href="' . $url . 'mantenimiento">service anual</a> antes del verano (dos al año en zona costera o con uso todo el año). Si algo no funciona como debería, escribinos al mismo WhatsApp: el reclamo lo atiende el técnico que hizo el trabajo y, si hace falta, lo escalamos nosotros.',
  ]],
  ['t' => 'Qué te recomendamos hacer antes de pedir presupuesto', 'p' => [
    'Si vivís en un edificio, consultá el reglamento de copropiedad y a la administración sobre dónde puede ir la condensadora, idealmente antes de comprar el equipo. Tené a mano los m² del ambiente o las frigorías del equipo, y si podés, sacá una foto del lugar donde iría la unidad interior y otra de donde iría la exterior. Con eso el presupuesto llega completo desde el primer mensaje.',
  ]],
];

require 'src/vista/partials/head.php';
?>
<body>
  <?php require 'src/vista/partials/header.php'; ?>

  <main id="main-content" class="section-page">
    <section class="page-intro">
      <div class="container page-intro__inner">
        <p class="page-intro__eyebrow">Sin letra chica</p>
        <h1 class="page-intro__title">Cómo trabajamos</h1>
        <p class="page-intro__desc">Escribís, te cotiza el técnico que atiende tu zona, coordinás la visita y el equipo queda instalado con vacío, prueba y garantía escrita. Así, paso a paso.</p>
      </div>
    </section>

    <?php require 'src/vista/compact/pasos.php'; ?>
    <?php require 'src/vista/compact/secciones.php'; ?>
    <?php require 'src/vista/compact/diferenciadores.php'; ?>
    <?php require 'src/vista/compact/cta.php'; ?>
  </main>

  <?php require 'src/vista/partials/footer.php'; ?>
  <?php require 'src/vista/partials/end.php'; ?>

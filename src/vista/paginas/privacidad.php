<?php
require_once 'config/variables.php';

cta_contexto('legal');
$page_title = 'Política de privacidad | ' . EMPRESA_NOMBRE;
$page_description = 'Qué datos recibimos cuando nos escribís, para qué los usamos, con quién los compartimos (el técnico de tu zona) y cómo pedir que los borremos.';
$page_keywords = 'política de privacidad ' . mb_strtolower(EMPRESA_NOMBRE);
$page_canonical = SEO_CANONICAL_URL . '/privacidad';
$page_robots = 'noindex, follow';

$secciones = [
  ['t' => 'Qué datos recibimos', 'p' => [
    'Cuando nos escribís por WhatsApp recibimos tu número y lo que nos cuentes (barrio, tipo de vivienda, equipo, fotos). Cuando usás el formulario recibimos los campos que completes: nombre, teléfono, barrio, casa o apartamento, piso, si ya tenés el equipo, frigorías, servicio y mensaje, y el email si lo cargás.',
    'El sitio también registra métricas de uso anónimas (páginas vistas, clics en los botones de WhatsApp y de llamada, tipo de dispositivo) para saber qué funciona y qué no. No usamos esas métricas para identificarte.',
  ]],
  ['t' => 'Para qué los usamos', 'p' => [
    'Para responder tu consulta, pasarte el presupuesto y coordinar la visita con el técnico que atiende tu zona. No te agregamos a listas de difusión ni te mandamos publicidad.',
  ]],
  ['t' => 'Con quién los compartimos', 'p' => [
    'Solo con el técnico de nuestro equipo que va a atenderte, que recibe tu nombre, tu teléfono, tu barrio y el detalle de la consulta para coordinar la visita. No vendemos ni cedemos tus datos a terceros.',
    'Los mensajes de WhatsApp viajan por la plataforma de Meta y los correos del formulario por el proveedor de correo del sitio, cada uno con sus propias políticas.',
  ]],
  ['t' => 'Cuánto tiempo los guardamos y cómo pedir que los borremos', 'p' => [
    'Conservamos las consultas el tiempo necesario para gestionarlas y para responder ante un reclamo posterior. Podés pedir acceso, corrección o eliminación de tus datos escribiendo a <a href="mailto:' . CONTACTO_EMAIL . '">' . CONTACTO_EMAIL . '</a>. Respondemos a la brevedad.',
  ]],
  ['t' => 'Responsable', 'p' => [
    EMPRESA_RAZON_SOCIAL . '. Contacto: <a href="mailto:' . CONTACTO_EMAIL . '">' . CONTACTO_EMAIL . '</a>.',
    'Esta política puede actualizarse; la fecha de la última versión figura al pie. Última actualización: 25 de setiembre de 2026.',
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
        <h1 class="page-intro__title">Política de privacidad</h1>
        <p class="page-intro__desc">Qué hacemos con tus datos cuando nos escribís. En corto: los usamos para responderte y coordinar el trabajo, y nada más.</p>
      </div>
    </section>
    <?php require 'src/vista/compact/secciones.php'; ?>
  </main>
  <?php require 'src/vista/partials/footer.php'; ?>
  <?php require 'src/vista/partials/end.php'; ?>

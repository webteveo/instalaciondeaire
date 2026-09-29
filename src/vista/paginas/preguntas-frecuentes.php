<?php
require_once 'config/variables.php';

cta_contexto('faq');
$page_title = 'Preguntas frecuentes sobre instalación de aire acondicionado';
$page_description = 'Cuánto cuesta instalar un aire en Montevideo, qué incluye, condensadora en fachada, cada cuánto hacer service, por qué pierde agua, inverter u on/off y consumo.';
$page_keywords = 'preguntas frecuentes aire acondicionado, cuánto cuesta instalar aire acondicionado montevideo, cada cuánto service aire acondicionado, aire acondicionado pierde agua, inverter u on off';
$page_canonical = SEO_CANONICAL_URL . '/preguntas-frecuentes';
$page_cta_message = CONTACTO_WHATSAPP_MENSAJE;
$page_cta_label = CTA_WHATSAPP_LABEL;
$page_schema_blocks = [$faq_schema, $migas_schema];

$temas = [];
foreach ($faq as $f) $temas[$f['tema']][] = $f;

require 'src/vista/partials/head.php';
?>
<body>
  <?php require 'src/vista/partials/header.php'; ?>

  <main id="main-content" class="section-page">
    <section class="page-intro">
      <div class="container page-intro__inner">
        <p class="page-intro__eyebrow">Preguntas frecuentes</p>
        <h1 class="page-intro__title">Preguntas frecuentes sobre aire acondicionado</h1>
        <p class="page-intro__desc">Respuestas directas sobre precio, instalación, capacidad, consumo y service. Si tu duda no está, escribinos por WhatsApp.</p>
        <nav class="faq-page__nav" aria-label="Temas">
          <?php foreach (array_keys($temas) as $tIdx => $tNombre): ?>
          <a href="#tema-<?= $tIdx + 1 ?>"><?= htmlspecialchars($tNombre) ?></a>
          <?php endforeach; ?>
        </nav>
      </div>
    </section>

    <?php foreach ($temas as $tIdx => $tItems): $tNombre = $tItems[0]['tema']; $tNum = array_search($tNombre, array_keys($temas), true) + 1; ?>
    <section class="faq faq--page" id="tema-<?= $tNum ?>" aria-labelledby="faq-titulo-<?= $tNum ?>">
      <div class="container">
        <div class="faq__header">
          <h2 class="faq__title" id="faq-titulo-<?= $tNum ?>"><?= htmlspecialchars($tNombre) ?></h2>
        </div>
        <div class="faq__list">
          <?php foreach ($tItems as $f): ?>
          <details class="faq__item">
            <summary>
              <span class="faq__q"><?= htmlspecialchars($f['q']) ?></span>
              <span class="faq__icon" aria-hidden="true"><i class="ri-add-line"></i></span>
            </summary>
            <div class="faq__a"><p><?= $f['a'] ?></p></div>
          </details>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
    <?php endforeach; ?>

    <?php require 'src/vista/compact/tabla-capacidad.php'; ?>
    <?php require 'src/vista/compact/relacionados.php'; ?>
    <?php $cta_titulo = '¿Tu pregunta no está? Escribinos'; require 'src/vista/compact/cta.php'; ?>
  </main>

  <?php require 'src/vista/partials/footer.php'; ?>
  <?php require 'src/vista/partials/end.php'; ?>

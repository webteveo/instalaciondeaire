<!-- Precios Section (SEO): de que depende el precio. Regla del sitio: no se publican cifras. -->
<?php
/**
 * Cada card: icono, titulo, desc, factores[], wa_text. Si 'cards' queda vacio, solo se muestra el texto general.
 */
$precios = $precios ?? [
    'titulo_em' => 'instalar un aire acondicionado',
    'lead' => 'El precio de la instalación depende del equipo, de dónde va la condensadora y de lo que haga falta agregar. Decinos tu barrio y las frigorías y <strong>un técnico de tu zona te pasa el presupuesto por WhatsApp</strong>.',
    'cards' => [
        [
            'icono' => 'ri-windy-line',
            'titulo' => 'Instalación de split',
            'desc' => 'La <strong>instalación estándar</strong> incluye soporte, cañería hasta los metros indicados, desagote, vacío y prueba. Lo demás se cotiza aparte.',
            'factores' => ['Capacidad del equipo (frigorías / BTU)', 'Metros de cañería de cobre', 'Ubicación de la condensadora: balcón, fachada, patio o techo', 'Trabajo en altura', 'Canaleta y línea eléctrica dedicada'],
            'wa_text' => 'Hola! Quiero presupuesto para instalar un aire acondicionado. Barrio: ___ / Frigorías o BTU: ___ / ¿Casa o apto?: ___',
        ],
        [
            'icono' => 'ri-tools-line',
            'titulo' => 'Service y mantenimiento',
            'desc' => 'El <strong>service</strong> se cotiza por equipo. Varios equipos en la misma visita suelen salir más convenientes.',
            'factores' => ['Cantidad de equipos', 'Tipo de equipo: split, cassette, piso-techo', 'Acceso a la condensadora', 'Limpieza profunda del evaporador', 'Zona costera (salitre)'],
            'wa_text' => 'Hola, quiero agendar un service de aire acondicionado. Barrio: ___ / Cantidad de equipos: ___',
        ],
        [
            'icono' => 'ri-settings-3-line',
            'titulo' => 'Reparación y carga de gas',
            'desc' => 'Una <strong>reparación</strong> arranca con un diagnóstico. El técnico te dice qué tiene el equipo y cuánto sale arreglarlo antes de tocar nada.',
            'factores' => ['Falla: no enfría, pierde agua, ruido, no prende', 'Tipo de gas: R410A o R32', 'Detección y reparación de fugas', 'Repuestos necesarios', 'Antigüedad del equipo'],
            'wa_text' => 'Hola, mi aire acondicionado [no enfría / pierde agua / hace ruido]. Marca: ___ Barrio: ___',
        ],
    ],
];
?>
<section class="precios" id="precios" aria-labelledby="precios-titulo">
  <div class="container">

    <div class="precios__header">
      <span class="precios__eyebrow">Presupuestos</span>
      <h2 class="precios__title" id="precios-titulo">
        ¿Cuánto cuesta <em><?= htmlspecialchars($precios['titulo_em']) ?></em>?
      </h2>
      <p class="precios__lead"><?= $precios['lead'] ?></p>
    </div>

    <?php if ($precios['cards']): ?>
    <div class="precios__grid">
      <?php foreach ($precios['cards'] as $i => $pc): ?>
      <article class="precio-card" aria-labelledby="precio-card-<?= $i ?>">
        <header class="precio-card__head">
          <span class="precio-card__icon" aria-hidden="true"><i class="<?= htmlspecialchars($pc['icono']) ?>"></i></span>
          <h3 class="precio-card__title" id="precio-card-<?= $i ?>"><?= htmlspecialchars($pc['titulo']) ?></h3>
        </header>
        <p class="precio-card__desc"><?= $pc['desc'] ?></p>
        <?php if (!empty($pc['factores'])): ?>
        <p class="precio-card__factors-label">Factores que definen el precio</p>
        <ul class="precio-card__factors" role="list">
          <?php foreach ($pc['factores'] as $f): ?><li><?= htmlspecialchars($f) ?></li><?php endforeach; ?>
        </ul>
        <?php endif; ?>
        <a href="<?= htmlspecialchars(wsp_href($pc['wa_text'] ?? CONTACTO_WHATSAPP_MENSAJE)) ?>"
           class="precio-card__cta" target="_blank" rel="noopener"<?= cta_track() ?>>
          Obtené tu presupuesto <i class="ri-arrow-right-line" aria-hidden="true"></i>
        </a>
      </article>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <div class="precios__info">
      <div class="precios__info-block">
        <h3 class="precios__info-title">¿Por qué no publicamos una lista de precios?</h3>
        <p>
          Porque instalar un split de 2.250 frigorías con la condensadora en el balcón, a dos metros de la unidad interior,
          no es lo mismo que colgarla en la fachada de un quinto piso con ocho metros de caño y una línea eléctrica nueva.
          Cotizamos cada trabajo con los datos de tu caso.
        </p>
      </div>
      <div class="precios__info-block">
        <h3 class="precios__info-title">Qué mandar para que te coticen rápido</h3>
        <p>
          Barrio, si es casa o apartamento y en qué piso, marca y capacidad del equipo (o los m² del ambiente si todavía no lo compraste),
          y si podés, una foto del lugar donde iría la unidad interior y otra de donde iría la condensadora.
          Con nuestra <a href="<?= $url ?>calculadora-frigorias">calculadora de frigorías</a> resolvés la capacidad en un minuto.
        </p>
      </div>
    </div>

    <div class="precios__cta">
      <a href="<?= htmlspecialchars(wsp_href($page_cta_message ?? CONTACTO_WHATSAPP_MENSAJE)) ?>"
         class="btn btn--whatsapp btn--lg" target="_blank" rel="noopener"<?= cta_track() ?>>
        <i class="ri-whatsapp-line" aria-hidden="true"></i>
        <?= htmlspecialchars($page_cta_label ?? CTA_WHATSAPP_LABEL) ?>
      </a>
      <p class="precios__cta-note"><?= htmlspecialchars(CTA_WHATSAPP_MICROCOPY) ?></p>
    </div>

  </div>
</section>

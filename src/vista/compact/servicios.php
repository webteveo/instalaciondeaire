<!-- Servicios Section -->
<?php
/**
 * Tarjetas de servicios de la home y de /servicios.
 * Cada item: titulo, img (relativa a public/images/servicios/), srv (slug de la pagina pilar), btn (texto del boton), wa_text (mensaje de WhatsApp).
 * Si falta la imagen se usa un fondo degradado. Fotos WebP 1200x675 (Pexels, ver creditos en README).
 */
$servicios_home = $servicios_home ?? [
    ['titulo' => 'Instalación de split inverter',          'img' => 'split-inverter.webp', 'alt' => 'Split inverter de pared instalado en un ambiente interior',  'srv' => 'split-inverter', 'btn' => 'Obtené tu presupuesto',   'wa_text' => 'Hola! Quiero presupuesto para instalar un split inverter. Barrio: ___ / Frigorías o BTU: ___ / ¿Casa o apto?: ___'],
    ['titulo' => 'Instalación en apartamentos',            'img' => 'apartamentos.webp', 'alt' => 'Fachada de un edificio de apartamentos con condensadoras de aire acondicionado en los balcones',    'srv' => 'apartamentos',   'btn' => 'Obtené tu presupuesto', 'wa_text' => 'Hola! Quiero instalar un aire en mi apartamento. Barrio: ___ / Piso: ___'],
    ['titulo' => 'Service y mantenimiento',                'img' => 'mantenimiento.webp', 'alt' => 'Técnico haciendo el service de la unidad exterior de un aire acondicionado',   'srv' => 'mantenimiento',  'btn' => 'Obtené tu presupuesto',   'wa_text' => 'Hola, quiero agendar un service de aire acondicionado. Barrio: ___ / Cantidad de equipos: ___'],
    ['titulo' => 'Reparación: no enfría, pierde agua, hace ruido', 'img' => 'reparacion.webp', 'alt' => 'Técnico reparando un equipo de aire acondicionado con herramientas', 'srv' => 'reparacion', 'btn' => 'Obtené tu presupuesto',        'wa_text' => 'Hola, mi aire acondicionado [no enfría / pierde agua / hace ruido]. Marca: ___ Barrio: ___'],
    ['titulo' => 'Carga de gas R410A y R32',               'img' => 'carga-de-gas.webp', 'alt' => 'Técnico detectando fugas en el serpentín de un aire acondicionado antes de la carga de gas',    'srv' => 'carga-de-gas',   'btn' => 'Obtené tu presupuesto',                 'wa_text' => 'Hola, necesito carga de gas para mi aire. Marca: ___ Barrio: ___'],
    ['titulo' => 'Oficinas y comercios',                   'img' => 'comercial.webp', 'alt' => 'Condensadora de aire acondicionado instalada en la pared de un edificio comercial',       'srv' => 'comercial',      'btn' => 'Obtené tu presupuesto',  'wa_text' => 'Hola, escribo por un local/oficina en ___. Necesitamos presupuesto de climatización.'],
];
$servicios_titulo = $servicios_titulo ?? 'Servicios de <em>aire acondicionado</em>';
$servicios_lead   = $servicios_lead   ?? 'Instalación, service y reparación con técnicos en refrigeración de tu zona. Trabajamos con equipos de todas las marcas (Midea, Samsung, LG, Hisense, etc.).';
?>
<?php if ($servicios_home): ?>
<section class="servicios" id="servicios" aria-labelledby="servicios-titulo">
  <div class="container">

    <div class="servicios__header">
      <h2 class="servicios__title" id="servicios-titulo"><?= $servicios_titulo ?></h2>
      <p class="servicios__lead"><?= $servicios_lead ?></p>
    </div>

    <div class="servicios__grid">
      <?php foreach ($servicios_home as $sv): ?>
      <?php $svImg = !empty($sv['img']) && is_file(__DIR__ . '/../../../public/images/servicios/' . $sv['img']) ? $ruta . '/images/servicios/' . $sv['img'] : ''; ?>
      <article class="servicio-card" aria-label="<?= htmlspecialchars($sv['titulo']) ?>">
        <?php if ($svImg): ?>
        <img src="<?= htmlspecialchars($svImg) ?>" alt="<?= htmlspecialchars($sv['alt'] ?? ($sv['titulo'] . ' - aire acondicionado en Uruguay')) ?>" class="servicio-card__bg" width="1200" height="675" loading="lazy" decoding="async">
        <?php endif; ?>
        <div class="servicio-card__body">
          <?php $svHref = !empty($sv['href']) ? $sv['href'] : (!empty($sv['srv']) ? $url . $sv['srv'] : ''); ?>
          <h3 class="servicio-card__title"><?php if ($svHref): ?><a href="<?= htmlspecialchars($svHref) ?>"><?= htmlspecialchars($sv['titulo']) ?></a><?php else: ?><?= htmlspecialchars($sv['titulo']) ?><?php endif; ?></h3>
          <a href="<?= htmlspecialchars(wsp_href($sv['wa_text'] ?? CONTACTO_WHATSAPP_MENSAJE)) ?>"
             class="servicio-card__btn" target="_blank" rel="noopener"<?= cta_track() ?> data-track="whatsapp_card_<?= htmlspecialchars($sv['srv'] ?? 'servicio') ?>">
            <i class="ri-whatsapp-line" aria-hidden="true"></i>
            <?= htmlspecialchars($sv['btn']) ?>
          </a>
        </div>
      </article>
      <?php endforeach; ?>
    </div>

    <div class="servicios__cta">
      <a href="<?= $url ?>servicios" class="servicios__cta-link">Ver todos los servicios <i class="ri-arrow-right-line" aria-hidden="true"></i></a>
      <a href="<?= htmlspecialchars(wsp_href($page_cta_message ?? CONTACTO_WHATSAPP_MENSAJE)) ?>" class="servicios__cta-btn" target="_blank" rel="noopener"<?= cta_track() ?>>
        <i class="ri-whatsapp-line" aria-hidden="true"></i>
        <?= htmlspecialchars($page_cta_label ?? CTA_WHATSAPP_LABEL) ?>
      </a>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- Footer -->
<?php
require_once 'src/controlador/Local_Controller.php';
$footerServicios = Local_Controller::servicios();
// Sin mega-footer: las zonas mas buscadas + el indice completo en /zonas
$footerZonas     = array_intersect_key(Local_Datos::zonasPublicadas(), array_flip(['pocitos', 'punta-carretas', 'cordon', 'centro', 'malvin', 'carrasco', 'prado', 'ciudad-de-la-costa', 'punta-del-este']));
$footerCta       = $page_cta_message ?? CONTACTO_WHATSAPP_MENSAJE;
$footerCtaLabel  = $page_cta_label ?? CTA_WHATSAPP_LABEL;
?>
<footer class="footer" role="contentinfo" aria-label="Pie de pagina">
  <div class="container">

    <div class="footer__top">

      <div class="footer__brand">
        <a href="<?= $url ?>" class="footer__logo" aria-label="<?= EMPRESA_NOMBRE ?> - Inicio">
          <img src="<?= $ruta ?>/<?= str_replace('public/', '', LOGO_HEADER_CLARO) ?>"
               alt="<?= EMPRESA_NOMBRE ?>"
               width="160" height="42" loading="lazy">
        </a>
        <p class="footer__tagline">Técnicos en refrigeración. Instalación, service y reparación de aire acondicionado en Montevideo, Canelones y Maldonado.</p>
        <a href="<?= htmlspecialchars(wsp_href($footerCta)) ?>" class="footer__wa" target="_blank" rel="noopener"<?= cta_track() ?> data-track="whatsapp_footer">
          <i class="ri-whatsapp-line" aria-hidden="true"></i>
          <?= htmlspecialchars($footerCtaLabel) ?>
        </a>
      </div>

      <div class="footer__col">
        <h3 class="footer__heading">Servicios</h3>
        <ul class="footer__list" role="list">
          <li><a href="<?= $url ?>">Instalación de aire acondicionado</a></li>
          <?php foreach ($footerServicios as $fsK => $fsN): ?>
          <li><a href="<?= $url . $fsK ?>"><?= htmlspecialchars(Local_Datos::SERVICIOS[$fsK]['label']) ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>

      <div class="footer__col">
        <h3 class="footer__heading">Zonas</h3>
        <ul class="footer__list" role="list">
          <?php foreach ($footerZonas as $fz => $fzD): ?>
          <li><a href="<?= $url ?>zonas/<?= $fz ?>">Aire acondicionado en <?= htmlspecialchars($fzD['nombre']) ?></a></li>
          <?php endforeach; ?>
          <li><a href="<?= $url ?>zonas">Todos los barrios y zonas</a></li>
        </ul>
      </div>

      <div class="footer__col">
        <h3 class="footer__heading">Sitio</h3>
        <ul class="footer__list" role="list">
          <li><a href="<?= $url ?>como-funciona">Cómo funciona</a></li>
          <li><a href="<?= $url ?>preguntas-frecuentes">Preguntas frecuentes</a></li>
          <li><a href="<?= $url ?>articulos">Guías</a></li>
          <li><a href="<?= $url ?>contacto">Contacto</a></li>
          <li><a href="<?= $url ?>privacidad">Privacidad</a></li>
          <li><a href="<?= $url ?>terminos">Términos</a></li>
        </ul>
        <h3 class="footer__heading">Contacto</h3>
        <ul class="footer__contact" role="list">
          <?php if (CONTACTO_TELEFONO): ?>
          <li><i class="ri-phone-line" aria-hidden="true"></i><a href="tel:+<?= CONTACTO_TELEFONO ?>"<?= cta_track() ?>><?= htmlspecialchars(CONTACTO_TELEFONO_VISIBLE) ?></a></li>
          <?php endif; ?>
          <li><i class="ri-mail-line" aria-hidden="true"></i><a href="mailto:<?= CONTACTO_EMAIL ?>"><?= CONTACTO_EMAIL ?></a></li>
          <li><i class="ri-map-pin-line" aria-hidden="true"></i><span><?= htmlspecialchars(DIRECCION_COMPLETA) ?></span></li>
          <li><i class="ri-time-line" aria-hidden="true"></i><span><?= htmlspecialchars(HORARIO_TEXTO) ?></span></li>
        </ul>
        <?php if (REDES_INSTAGRAM || REDES_FACEBOOK): ?>
        <div class="footer__social" aria-label="Redes sociales">
          <?php if (REDES_INSTAGRAM): ?><a href="<?= REDES_INSTAGRAM ?>" target="_blank" rel="noopener" aria-label="Instagram"><i class="ri-instagram-line" aria-hidden="true"></i></a><?php endif; ?>
          <?php if (REDES_FACEBOOK): ?><a href="<?= REDES_FACEBOOK ?>" target="_blank" rel="noopener" aria-label="Facebook"><i class="ri-facebook-circle-line" aria-hidden="true"></i></a><?php endif; ?>
        </div>
        <?php endif; ?>
      </div>

    </div>

    <div class="footer__bottom">
      <p class="footer__copy">&copy; <?= date('Y') ?> <?= EMPRESA_NOMBRE ?>. Empresa independiente: no somos servicio oficial ni autorizado de ninguna marca.</p>
    </div>

  </div>
</footer>

<!-- Botones flotantes: WhatsApp + llamada (el de llamada solo en celular) -->
<div class="float-ctas">
  <?php if (CONTACTO_TELEFONO): ?>
  <a href="tel:+<?= CONTACTO_TELEFONO ?>" class="phone-float" aria-label="Llamar ahora"<?= cta_track() ?> data-track="phone_float">
    <i class="ri-phone-fill" aria-hidden="true"></i>
  </a>
  <?php endif; ?>
  <a href="<?= htmlspecialchars(wsp_href($footerCta)) ?>"
     class="whatsapp-float"
     target="_blank" rel="noopener"
     aria-label="Escribinos por WhatsApp"<?= cta_track() ?> data-track="whatsapp_float">
    <i class="ri-whatsapp-line" aria-hidden="true"></i>
  </a>
</div>

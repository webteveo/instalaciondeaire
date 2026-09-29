<!-- Contacto Home Section: CTA de WhatsApp + formulario corto (mismos campos que /contacto) -->
<?php
require_once 'src/controlador/Local_Controller.php';
$chServicios = ['Instalación de aire acondicionado'];
foreach (Local_Controller::servicios() as $chK => $chN) if ($chK !== 'calculadora-frigorias') $chServicios[] = Local_Datos::SERVICIOS[$chK]['label'];
$chZonas     = Local_Datos::ZONAS;
$chTitulo    = $chTitulo ?? 'Pedí tu presupuesto';
$chLead      = $chLead   ?? 'Escribinos por WhatsApp y te responde el técnico de tu zona. Si preferís, dejá tus datos y te contactamos.';
$chCtaMsg    = $page_cta_message ?? CONTACTO_WHATSAPP_MENSAJE;
$chCtaLabel  = $page_cta_label ?? CTA_WHATSAPP_LABEL;
$chServicioPre = $chServicioPre ?? ($landing['form_servicio'] ?? '');
$chBarrioPre   = $chBarrioPre   ?? ($landing['zona_nombre'] ?? '');
?>
<section class="contacto-home" id="contacto" aria-labelledby="contacto-home-titulo">
  <div class="container">

    <?php if (!empty($_SESSION['error'])): ?>
      <div class="contacto-home__alert" role="alert">
        <i class="ri-error-warning-line" aria-hidden="true"></i>
        <?= htmlspecialchars($_SESSION['error']) ?>
      </div>
      <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <div class="contacto-home__layout">

      <div class="contacto-home__main">
        <h2 class="contacto-home__title" id="contacto-home-titulo"><?= htmlspecialchars($chTitulo) ?></h2>
        <p class="contacto-home__lead"><?= htmlspecialchars($chLead) ?></p>

        <a href="<?= htmlspecialchars(wsp_href($chCtaMsg)) ?>" class="contacto-home__wa" target="_blank" rel="noopener"<?= cta_track() ?> data-track="whatsapp_contacto_home">
          <i class="ri-whatsapp-line" aria-hidden="true"></i>
          <?= htmlspecialchars($chCtaLabel) ?>
        </a>
        <p class="contacto-home__micro"><?= htmlspecialchars(CTA_WHATSAPP_MICROCOPY) ?></p>

        <ul class="contacto-home__datos" role="list">
          <?php if (CONTACTO_TELEFONO): ?>
          <li><a href="tel:+<?= CONTACTO_TELEFONO ?>"<?= cta_track() ?>><i class="ri-phone-line" aria-hidden="true"></i><?= htmlspecialchars(CONTACTO_TELEFONO_VISIBLE) ?></a></li>
          <?php endif; ?>
          <li><a href="mailto:<?= CONTACTO_EMAIL ?>"><i class="ri-mail-line" aria-hidden="true"></i><?= CONTACTO_EMAIL ?></a></li>
          <li><span><i class="ri-map-pin-line" aria-hidden="true"></i><?= htmlspecialchars(DIRECCION_COMPLETA) ?></span></li>
          <li><span><i class="ri-time-line" aria-hidden="true"></i><?= htmlspecialchars(HORARIO_TEXTO) ?></span></li>
        </ul>
      </div>

      <form class="contacto-home__form" action="<?= $url ?>contacto/enviar" method="POST" novalidate>
        <p class="contacto-home__form-title">O dejanos tus datos</p>

        <div class="contacto-home__row">
          <input class="contacto-home__input" type="text" name="nombre" placeholder="Nombre" required autocomplete="name" aria-label="Nombre"
                 value="<?= htmlspecialchars($_POST['nombre'] ?? '') ?>">
          <input class="contacto-home__input" type="tel" name="telefono" placeholder="Teléfono / WhatsApp" autocomplete="tel" aria-label="Teléfono o WhatsApp"
                 value="<?= htmlspecialchars($_POST['telefono'] ?? '') ?>">
        </div>
        <div class="contacto-home__row">
          <input class="contacto-home__input" type="text" name="barrio" placeholder="Barrio" list="ch-barrios" aria-label="Barrio" autocomplete="address-level2"
                 value="<?= htmlspecialchars($_POST['barrio'] ?? $chBarrioPre) ?>">
          <datalist id="ch-barrios"><?php foreach ($chZonas as $chZ): ?><option value="<?= htmlspecialchars($chZ['nombre']) ?>"><?php endforeach; ?></datalist>
          <select class="contacto-home__input" name="vivienda" aria-label="Casa o apartamento">
            <option value="">¿Casa o apartamento?</option>
            <option value="Casa">Casa</option>
            <option value="Apartamento">Apartamento</option>
            <option value="Local u oficina">Local u oficina</option>
          </select>
        </div>
        <div class="contacto-home__row">
          <input class="contacto-home__input" type="text" name="piso" placeholder="Piso (si es apto)" aria-label="Piso" value="<?= htmlspecialchars($_POST['piso'] ?? '') ?>">
          <select class="contacto-home__input" name="tiene_equipo" aria-label="¿Ya tenés el equipo?">
            <option value="">¿Ya tenés el equipo?</option>
            <option value="Sí">Sí, ya lo tengo</option>
            <option value="No">No, todavía no</option>
          </select>
        </div>
        <div class="contacto-home__row">
          <input class="contacto-home__input" type="text" name="frigorias" placeholder="Frigorías o BTU (o m² del ambiente)" aria-label="Frigorías o BTU" value="<?= htmlspecialchars($_POST['frigorias'] ?? '') ?>">
          <select class="contacto-home__input" name="servicio" aria-label="Servicio">
            <option value="">Servicio</option>
            <?php foreach ($chServicios as $chS): ?>
            <option value="<?= htmlspecialchars($chS) ?>" <?= ($_POST['servicio'] ?? $chServicioPre) === $chS ? 'selected' : '' ?>><?= htmlspecialchars($chS) ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <input class="contacto-home__input" type="email" name="email" placeholder="Email" autocomplete="email" aria-label="Email"
               value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
        <textarea class="contacto-home__textarea" name="mensaje" rows="3" required aria-label="Mensaje"
                  placeholder="Contanos qué necesitás: ambiente, m², dónde iría la condensadora..."><?= htmlspecialchars($_POST['mensaje'] ?? $_GET['msg'] ?? '') ?></textarea>

        <button type="submit" class="contacto-home__submit" data-track="form_submit_home"<?= cta_track() ?>>Enviar consulta</button>
      </form>

    </div>
  </div>
</section>

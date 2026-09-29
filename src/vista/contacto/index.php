<?php
require_once 'config/variables.php';
require_once 'src/controlador/Local_Controller.php';

cta_contexto('contacto');
$page_title       = 'Presupuesto de aire acondicionado - Contacto';
$page_description = 'Escribinos por WhatsApp o dejá tus datos: barrio, casa o apartamento, piso, frigorías y servicio. Te responde un técnico de tu zona en Montevideo, Canelones o Maldonado.';
$page_keywords    = 'contacto ' . mb_strtolower(EMPRESA_NOMBRE) . ', presupuesto aire acondicionado montevideo, técnico aire acondicionado whatsapp';
$page_canonical   = SEO_CANONICAL_URL . '/contacto';
$page_cta_message = CONTACTO_WHATSAPP_MENSAJE;
$page_cta_label   = CTA_WHATSAPP_LABEL;

$ctServicios = ['Instalación de aire acondicionado'];
foreach (Local_Controller::servicios() as $ctK => $ctN) if ($ctK !== 'calculadora-frigorias') $ctServicios[] = Local_Datos::SERVICIOS[$ctK]['label'];
$ctServicios[] = 'Otro';
$ctZonas = Local_Datos::zonasPorDepto();

require 'src/vista/partials/head.php';
?>
<body>
  <?php require 'src/vista/partials/header.php'; ?>

  <main id="main-content" class="section-page">

    <section class="page-intro">
      <div class="container page-intro__inner">
        <p class="page-intro__eyebrow">Contacto</p>
        <h1 class="page-intro__title">Pedí presupuesto para tu aire acondicionado</h1>
        <p class="page-intro__desc">Lo más rápido es WhatsApp. Si preferís, completá el formulario y te contactamos.</p>
      </div>
    </section>

    <section class="contacto" aria-labelledby="contacto-form-title">
      <div class="container">

        <?php if (!empty($_SESSION['error'])): ?>
          <div class="contacto__alert contacto__alert--error" role="alert">
            <i class="ri-error-warning-line" aria-hidden="true"></i>
            <?= htmlspecialchars($_SESSION['error']) ?>
          </div>
          <?php unset($_SESSION['error']); ?>
        <?php endif; ?>

        <div class="contacto__layout">

          <!-- Formulario -->
          <div class="contacto__form-wrap">
            <h2 class="contacto__form-title" id="contacto-form-title">Dejanos tus datos</h2>
            <form class="contacto__form" action="<?= $url ?>contacto/enviar" method="POST" novalidate>
              <input type="hidden" name="origen" value="<?= htmlspecialchars($_GET['origen'] ?? 'contacto') ?>">

              <div class="contacto__row contacto__row--2">
                <div class="contacto__group">
                  <label class="contacto__label" for="nombre">Nombre <span aria-hidden="true">*</span></label>
                  <input class="contacto__input" type="text" id="nombre" name="nombre"
                         placeholder="Tu nombre" required autocomplete="name"
                         value="<?= htmlspecialchars($_POST['nombre'] ?? '') ?>">
                </div>
                <div class="contacto__group">
                  <label class="contacto__label" for="telefono">Teléfono / WhatsApp <span aria-hidden="true">*</span></label>
                  <input class="contacto__input" type="tel" id="telefono" name="telefono"
                         placeholder="09X XXX XXX" autocomplete="tel"
                         value="<?= htmlspecialchars($_POST['telefono'] ?? '') ?>">
                </div>
              </div>

              <div class="contacto__row contacto__row--2">
                <div class="contacto__group">
                  <label class="contacto__label" for="barrio">Barrio</label>
                  <input class="contacto__input" type="text" id="barrio" name="barrio" list="ct-barrios" placeholder="Ej.: Pocitos" autocomplete="address-level2"
                         value="<?= htmlspecialchars($_POST['barrio'] ?? '') ?>">
                  <datalist id="ct-barrios">
                    <?php foreach ($ctZonas as $ctD => $ctZs): foreach ($ctZs as $ctZ): ?><option value="<?= htmlspecialchars($ctZ['nombre']) ?>"><?= htmlspecialchars($ctD) ?></option><?php endforeach; endforeach; ?>
                  </datalist>
                </div>
                <div class="contacto__group">
                  <label class="contacto__label" for="vivienda">¿Casa o apartamento?</label>
                  <select class="contacto__select" id="vivienda" name="vivienda">
                    <option value="">Seleccioná</option>
                    <option value="Casa">Casa</option>
                    <option value="Apartamento">Apartamento</option>
                    <option value="Local u oficina">Local u oficina</option>
                    <option value="Obra">Obra / construcción</option>
                  </select>
                </div>
              </div>

              <div class="contacto__row contacto__row--2">
                <div class="contacto__group">
                  <label class="contacto__label" for="piso">Piso (si es apartamento)</label>
                  <input class="contacto__input" type="text" id="piso" name="piso" placeholder="Ej.: 4" value="<?= htmlspecialchars($_POST['piso'] ?? '') ?>">
                </div>
                <div class="contacto__group">
                  <label class="contacto__label" for="tiene_equipo">¿Ya tenés el equipo?</label>
                  <select class="contacto__select" id="tiene_equipo" name="tiene_equipo">
                    <option value="">Seleccioná</option>
                    <option value="Sí">Sí, ya lo tengo</option>
                    <option value="No">No, todavía no</option>
                  </select>
                </div>
              </div>

              <div class="contacto__row contacto__row--2">
                <div class="contacto__group">
                  <label class="contacto__label" for="frigorias">Frigorías o BTU</label>
                  <input class="contacto__input" type="text" id="frigorias" name="frigorias" placeholder="Ej.: 3.000 frigorías / 12.000 BTU, o los m²" value="<?= htmlspecialchars($_POST['frigorias'] ?? '') ?>">
                  <small class="contacto__hint">¿No sabés? Usá la <a href="<?= $url ?>calculadora-frigorias">calculadora de frigorías</a>.</small>
                </div>
                <div class="contacto__group">
                  <label class="contacto__label" for="servicio">Servicio</label>
                  <select class="contacto__select" id="servicio" name="servicio">
                    <option value="">Seleccioná un servicio</option>
                    <?php foreach ($ctServicios as $ctS): ?>
                    <option value="<?= htmlspecialchars($ctS) ?>" <?= ($_POST['servicio'] ?? '') === $ctS ? 'selected' : '' ?>><?= htmlspecialchars($ctS) ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>

              <div class="contacto__group">
                <label class="contacto__label" for="email">Email</label>
                <input class="contacto__input" type="email" id="email" name="email"
                       placeholder="tu@email.com" autocomplete="email"
                       value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
              </div>

              <div class="contacto__group">
                <label class="contacto__label" for="mensaje">Mensaje <span aria-hidden="true">*</span></label>
                <textarea class="contacto__textarea" id="mensaje" name="mensaje"
                          placeholder="Contanos el ambiente, los m², dónde iría la condensadora (balcón, patio, fachada) y cuándo necesitás el trabajo..."
                          rows="5" required><?= htmlspecialchars($_POST['mensaje'] ?? $_GET['msg'] ?? '') ?></textarea>
              </div>

              <button type="submit" class="btn btn--primary btn--lg contacto__submit" data-track="form_submit_contacto"<?= cta_track() ?>>
                <i class="ri-send-plane-line" aria-hidden="true"></i>
                Enviar consulta
              </button>
              <p class="contacto__privacy">Usamos tus datos solo para responder tu consulta y coordinar la visita. <a href="<?= $url ?>privacidad">Política de privacidad</a>.</p>
            </form>
          </div>

          <!-- Info lateral -->
          <aside class="contacto__info" aria-label="Información de contacto">

            <a href="<?= htmlspecialchars(wsp_href(CONTACTO_WHATSAPP_MENSAJE)) ?>"
               class="contacto__wa-card" target="_blank" rel="noopener"<?= cta_track() ?> data-track="whatsapp_contacto">
              <i class="ri-whatsapp-line" aria-hidden="true"></i>
              <div>
                <strong><?= htmlspecialchars(CTA_WHATSAPP_LABEL) ?></strong>
                <span><?= htmlspecialchars(CONTACTO_TELEFONO_VISIBLE ?: 'Respondemos a la brevedad') ?></span>
              </div>
              <i class="ri-arrow-right-line contacto__wa-arrow" aria-hidden="true"></i>
            </a>
            <p class="contacto__micro"><?= htmlspecialchars(CTA_WHATSAPP_MICROCOPY) ?></p>

            <?php if (CONTACTO_TELEFONO): ?>
            <a href="tel:+<?= CONTACTO_TELEFONO ?>" class="contacto__tel-card"<?= cta_track() ?> data-track="phone_contacto">
              <i class="ri-phone-line" aria-hidden="true"></i>
              <div><strong>Llamar</strong><span><?= htmlspecialchars(CONTACTO_TELEFONO_VISIBLE) ?></span></div>
            </a>
            <?php endif; ?>

            <div class="contacto__info-block">
              <h3 class="contacto__info-heading">
                <i class="ri-time-line" aria-hidden="true"></i> Horarios de atención
              </h3>
              <ul class="contacto__hours" role="list">
                <li><span>Lunes a viernes</span><span><?= htmlspecialchars(HORARIO_LUNES) ?></span></li>
                <li><span>Sábados</span><span><?= htmlspecialchars(HORARIO_SABADO) ?></span></li>
                <li><span>Domingos y feriados</span><span><?= htmlspecialchars(HORARIO_DOMINGO) ?></span></li>
              </ul>
              <p class="contacto__hours-note">Fuera de hora podés escribir igual: te respondemos al siguiente horario.</p>
            </div>

            <div class="contacto__info-block">
              <h3 class="contacto__info-heading">
                <i class="ri-map-pin-line" aria-hidden="true"></i> Zonas con técnicos
              </h3>
              <ul class="contacto__zones" role="list">
                <?php foreach ($ctZonas as $ctD => $ctZs): ?>
                <li><i class="ri-checkbox-circle-line" aria-hidden="true"></i> <strong><?= htmlspecialchars($ctD) ?>:</strong> <?= htmlspecialchars(implode(', ', array_column($ctZs, 'nombre'))) ?></li>
                <?php endforeach; ?>
              </ul>
              <a href="<?= $url ?>zonas" class="contacto__zones-link">Ver páginas por zona</a>
            </div>

            <div class="contacto__info-block">
              <h3 class="contacto__info-heading">
                <i class="ri-mail-line" aria-hidden="true"></i> Email
              </h3>
              <a href="mailto:<?= CONTACTO_EMAIL ?>" class="contacto__email-link">
                <?= CONTACTO_EMAIL ?>
              </a>
            </div>

          </aside>
        </div>
      </div>
    </section>

  </main>

  <?php require 'src/vista/partials/footer.php'; ?>
  <?php require 'src/vista/partials/end.php'; ?>

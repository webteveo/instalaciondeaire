<?php
/**
 * /calculadora-frigorias: herramienta en JS vanilla. Recibe $landing desde data/servicios/calculadora-frigorias.php.
 */
cta_contexto('calculadora');
$page_title         = $landing['title'];
$page_description   = $landing['description'];
$page_keywords      = $landing['keywords'];
$page_canonical     = $landing['canonical'];
$page_schema_blocks = $landing['schema_blocks'];
$page_cta_message   = $landing['cta_message'];
$page_cta_label     = $landing['cta_label'];

$hero_override = [
    'eyebrow'     => $landing['eyebrow'],
    'title_em'    => $landing['h1'],
    'title'       => '',
    'subtitle'    => $landing['subtitle'],
    'cta_label'   => 'Ir a la calculadora',
    'cta_href'    => '#calculadora',
    'cta_message' => $landing['cta_message'],
    'micro'       => 'Es una estimación orientativa: el técnico confirma la capacidad en la visita.',
];
$secciones = $landing['secciones'] ?? [];
$faq_items = $landing['faq'] ?? null;
$faq_lead  = 'Dudas frecuentes sobre frigorías, BTU y capacidad del equipo.';
$zhTitulo  = 'Zonas donde tenemos técnicos para instalar el equipo';

// Destino del CTA con resultado: wa.me con texto, o formulario de contacto si no hay numero
$calcWaMode = (CONTACTO_WHATSAPP !== '') ? 'wa' : 'form';
$calcWaBase = $calcWaMode === 'wa' ? 'https://wa.me/' . CONTACTO_WHATSAPP . '?text=' : $url . 'contacto?origen=whatsapp&msg=';

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

    <section class="calc" id="calculadora" aria-labelledby="calc-titulo">
      <div class="container calc__inner">
        <form class="calc__form" id="calc-form" novalidate>
          <h2 class="calc__title" id="calc-titulo">Calculá las frigorías de tu ambiente</h2>
          <p class="calc__lead">Completá los datos y te decimos qué equipo comercial conviene. Base: unas 150 frigorías por m², ajustadas por techo, sol, piso, personas y uso del ambiente.</p>

          <div class="calc__grid">
            <label class="calc__field calc__field--num">
              <span>Superficie del ambiente (m²)</span>
              <input type="number" id="calc-m2" name="m2" min="4" max="120" step="1" value="20" inputmode="numeric" required>
            </label>
            <label class="calc__field">
              <span>Altura del techo</span>
              <select id="calc-altura" name="altura">
                <option value="normal">Normal (hasta 2,7 m)</option>
                <option value="alta">Alta (más de 2,7 m)</option>
              </select>
            </label>
            <label class="calc__field">
              <span>Orientación y sol</span>
              <select id="calc-sol" name="sol">
                <option value="poco">Poco sol (sur, sombra)</option>
                <option value="medio" selected>Sol medio (este u oeste)</option>
                <option value="mucho">Mucho sol (norte, ventanales)</option>
              </select>
            </label>
            <label class="calc__field">
              <span>Piso</span>
              <select id="calc-piso" name="piso">
                <option value="pb">Planta baja</option>
                <option value="intermedio" selected>Piso intermedio</option>
                <option value="ultimo">Último piso o bajo azotea</option>
              </select>
            </label>
            <label class="calc__field calc__field--num">
              <span>Personas habituales</span>
              <input type="number" id="calc-personas" name="personas" min="1" max="30" step="1" value="2" inputmode="numeric">
            </label>
            <label class="calc__field">
              <span>Tipo de ambiente</span>
              <select id="calc-ambiente" name="ambiente">
                <option value="dormitorio">Dormitorio</option>
                <option value="living" selected>Living / comedor</option>
                <option value="oficina">Oficina</option>
                <option value="cocina">Cocina / comedor diario</option>
              </select>
            </label>
          </div>

          <button type="submit" class="btn btn--primary btn--lg calc__submit" data-track="calculadora_calcular"><i class="ri-calculator-line" aria-hidden="true"></i> Calcular frigorías</button>
        </form>

        <div class="calc__result" id="calc-result" aria-live="polite" hidden>
          <p class="calc__result-eyebrow">Equipo recomendado</p>
          <p class="calc__result-main"><strong id="calc-frig">—</strong> frigorías <span class="calc__result-btu">≈ <strong id="calc-btu">—</strong> BTU</span></p>
          <p class="calc__result-detail" id="calc-detail"></p>
          <ul class="calc__factors" id="calc-factors" role="list"></ul>
          <a href="#" id="calc-wa" class="btn btn--whatsapp btn--lg calc__wa" target="_blank" rel="noopener" data-track="whatsapp_calculadora"<?= cta_track() ?>>
            <i class="ri-whatsapp-line" aria-hidden="true"></i> Obtené tu presupuesto
          </a>
          <p class="calc__micro"><?= htmlspecialchars(CTA_WHATSAPP_MICROCOPY) ?></p>
          <p class="calc__note"><i class="ri-information-line" aria-hidden="true"></i> Estimación orientativa. Aislación, cantidad de vidrio, electrodomésticos y clima cambian el resultado: el técnico confirma la capacidad en la visita.</p>
        </div>
      </div>
    </section>

    <?php require 'src/vista/compact/tabla-capacidad.php'; ?>
    <?php require 'src/vista/compact/secciones.php'; ?>
    <?php require 'src/vista/compact/faq.php'; ?>
    <?php require 'src/vista/compact/zonas-home.php'; ?>
    <?php require 'src/vista/compact/relacionados.php'; ?>
    <?php $chTitulo = 'Ya sabés las frigorías: pedí presupuesto'; $chLead = 'Mandanos el resultado con tu barrio y si es casa o apartamento. Te responde un técnico de tu zona.'; require 'src/vista/compact/contacto-home.php'; ?>
  </main>

  <script>
  (function () {
    var form = document.getElementById('calc-form');
    if (!form) return;
    var WA_MODE = <?= json_encode($calcWaMode) ?>;
    var WA_BASE = <?= json_encode($calcWaBase) ?>;
    var BASE = 150;                      // frigorías por m² en ambiente normal
    var EQUIPOS = [2250, 3000, 4500, 5500, 6000]; // capacidades comerciales (frigorías) = 9.000/12.000/18.000/22.000/24.000 BTU
    var F = {
      altura:   { normal: 1.00, alta: 1.15 },
      sol:      { poco: 0.95, medio: 1.00, mucho: 1.15 },
      piso:     { pb: 1.00, intermedio: 1.00, ultimo: 1.15 },
      ambiente: { dormitorio: 0.95, living: 1.00, oficina: 1.10, cocina: 1.20 }
    };
    var LABEL = {
      altura:   { normal: 'techo normal', alta: 'techo alto (+15%)' },
      sol:      { poco: 'poco sol (−5%)', medio: 'sol medio', mucho: 'mucho sol (+15%)' },
      piso:     { pb: 'planta baja', intermedio: 'piso intermedio', ultimo: 'último piso o bajo azotea (+15%)' },
      ambiente: { dormitorio: 'dormitorio (−5%)', living: 'living', oficina: 'oficina (+10%)', cocina: 'cocina (+20%)' }
    };
    var PERSONA_EXTRA = 100; // frigorías por persona a partir de la tercera
    var fmt = function (n) { return n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.'); };
    var nearest = function (raw) {
      var best = EQUIPOS[0], diff = Infinity;
      EQUIPOS.forEach(function (e) { var d = Math.abs(e - raw); if (d < diff || (d === diff && e > best)) { diff = d; best = e; } });
      return best;
    };

    form.addEventListener('submit', function (ev) {
      ev.preventDefault();
      var m2 = parseFloat(document.getElementById('calc-m2').value);
      var personas = parseInt(document.getElementById('calc-personas').value, 10) || 1;
      var altura = document.getElementById('calc-altura').value;
      var sol = document.getElementById('calc-sol').value;
      var piso = document.getElementById('calc-piso').value;
      var ambiente = document.getElementById('calc-ambiente').value;
      if (!(m2 > 0)) { document.getElementById('calc-m2').focus(); return; }

      var raw = m2 * BASE * F.altura[altura] * F.sol[sol] * F.piso[piso] * F.ambiente[ambiente];
      var extraPersonas = Math.max(0, personas - 2) * PERSONA_EXTRA;
      raw += extraPersonas;
      raw = Math.round(raw);

      var over = raw > 6600; // supera el split comercial mas grande
      var eq = over ? Math.round(raw / 50) * 50 : nearest(raw);
      var btu = eq * 4;
      var detail;
      if (over) {
        detail = 'El cálculo da unas ' + fmt(eq) + ' frigorías, más que el split comercial más grande (6.000). Conviene dividir en dos equipos (por ejemplo dos de ' + fmt(nearest(eq / 2)) + ') o evaluar un piso-techo o cassette: ideal consultarlo con un técnico.';
      } else {
        detail = 'Cálculo: ' + fmt(raw) + ' frigorías para ' + m2 + ' m². Redondeado al equipo comercial más cercano: ' + fmt(eq) + ' frigorías (' + fmt(btu) + ' BTU).';
      }

      document.getElementById('calc-frig').textContent = fmt(eq);
      document.getElementById('calc-btu').textContent = fmt(btu);
      document.getElementById('calc-detail').textContent = detail;
      var factors = document.getElementById('calc-factors');
      factors.innerHTML = '';
      [LABEL.altura[altura], LABEL.sol[sol], LABEL.piso[piso], LABEL.ambiente[ambiente], personas + (personas === 1 ? ' persona' : ' personas') + (extraPersonas ? ' (+' + fmt(extraPersonas) + ' frigorías)' : '')].forEach(function (t) {
        var li = document.createElement('li'); li.textContent = t; factors.appendChild(li);
      });

      var msg = 'Hola! La calculadora me dio ' + fmt(eq) + ' frigorías (' + fmt(btu) + ' BTU) para ' + m2 + ' m²' + (over ? ' (más de un equipo)' : '') + '. Quiero presupuesto de instalación.';
      var wa = document.getElementById('calc-wa');
      wa.href = WA_BASE + encodeURIComponent(msg) + (WA_MODE === 'form' ? '#contacto-form-title' : '');
      if (WA_MODE === 'form') { wa.removeAttribute('target'); wa.removeAttribute('rel'); }

      // Sincroniza el campo de frigorías del formulario de contacto de la misma pagina
      var f = document.querySelector('input[name="frigorias"]');
      if (f && !f.value) f.value = fmt(eq) + ' frigorías (' + fmt(btu) + ' BTU) para ' + m2 + ' m²';

      var res = document.getElementById('calc-result');
      res.hidden = false;
      res.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    });
  })();
  </script>

  <?php require 'src/vista/partials/footer.php'; ?>
  <?php require 'src/vista/partials/end.php'; ?>

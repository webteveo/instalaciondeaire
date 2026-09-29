<!-- Enlaces relacionados: otros servicios, zonas cercanas, calculadora y FAQ (servicios <-> zonas <-> calculadora <-> FAQ) -->
<?php
/** Opcional: $rlServicioActual (slug), $rlZonaActual (slug), $rlLinderas (slug => nombre) */
require_once 'src/controlador/Local_Controller.php';
$rlServicioActual = $rlServicioActual ?? ($landing['slug'] ?? '');
$rlZonaActual     = $rlZonaActual ?? ($landing['zona'] ?? '');
$rlLinderas       = $rlLinderas ?? ($landing['linderas'] ?? []);

$rlServicios = [];
if ($rlServicioActual !== '' && $rlServicioActual !== 'home') $rlServicios[] = ['href' => $url, 'label' => 'Instalación de aire acondicionado'];
foreach (Local_Controller::servicios() as $rlK => $rlN) {
    if ($rlK === $rlServicioActual) continue;
    $rlServicios[] = ['href' => $url . $rlK, 'label' => Local_Datos::SERVICIOS[$rlK]['label']];
}

$rlZonas = [];
foreach ($rlLinderas as $rlK => $rlN) $rlZonas[] = ['href' => $url . 'zonas/' . $rlK, 'label' => 'Aire acondicionado en ' . $rlN];
if (!$rlZonas) {
    foreach (array_slice(Local_Datos::zonasFase2(), 0, 6, true) as $rlK => $rlZ) {
        if ($rlK !== $rlZonaActual) $rlZonas[] = ['href' => $url . 'zonas/' . $rlK, 'label' => 'Aire acondicionado en ' . $rlZ['nombre']];
    }
}
$rlZonas[] = ['href' => $url . 'zonas', 'label' => 'Todas las zonas'];

// Guias relacionadas por servicio (solo las publicadas)
require_once 'src/modelo/Articulos.php';
$rlGuiasPorServicio = [
    'split-inverter' => ['cuanto-cuesta-instalar-aire-acondicionado-uruguay', 'inverter-vs-on-off-cual-conviene'],
    'apartamentos'   => ['permisos-para-instalar-aire-acondicionado-montevideo', 'cuanto-cuesta-instalar-aire-acondicionado-uruguay'],
    'mantenimiento'  => ['cada-cuanto-hacer-service-aire-acondicionado', 'por-que-el-aire-acondicionado-pierde-agua'],
    'reparacion'     => ['aire-acondicionado-no-enfria', 'por-que-el-aire-acondicionado-pierde-agua'],
    'carga-de-gas'   => ['aire-acondicionado-no-enfria'],
    'comercial'      => ['permisos-para-instalar-aire-acondicionado-montevideo'],
    'calefaccion'    => ['inverter-vs-on-off-cual-conviene'],
    'calculadora-frigorias' => ['cuantas-frigorias-necesito-segun-los-m2'],
    'multi-split'    => ['cuantas-frigorias-necesito-segun-los-m2', 'inverter-vs-on-off-cual-conviene'],
    'piso-techo-y-cassette' => ['cuantas-frigorias-necesito-segun-los-m2'],
    'instalacion-en-altura' => ['permisos-para-instalar-aire-acondicionado-montevideo', 'cuanto-cuesta-instalar-aire-acondicionado-uruguay'],
    'recambio-de-equipo' => ['inverter-vs-on-off-cual-conviene', 'cuanto-cuesta-instalar-aire-acondicionado-uruguay'],
];
$rlGuias = $rlGuiasPorServicio[explode('/', $rlServicioActual)[0]] ?? ($rlZonaActual !== '' ? ['cuanto-cuesta-instalar-aire-acondicionado-uruguay', 'cada-cuanto-hacer-service-aire-acondicionado'] : []);
$rlUtiles = [];
foreach ($rlGuias as $rlG) {
    if ($rlA = Articulos::porSlug($rlG)) $rlUtiles[] = ['href' => $url . 'articulos/' . $rlG, 'label' => $rlA['titulo']];
}
$rlUtiles = array_merge($rlUtiles, [
    ['href' => $url . 'calculadora-frigorias', 'label' => 'Calculadora de frigorías'],
    ['href' => $url . 'preguntas-frecuentes',  'label' => 'Preguntas frecuentes'],
    ['href' => $url . 'como-funciona',         'label' => 'Cómo trabajamos'],
    ['href' => $url . 'articulos',             'label' => 'Guías sobre aire acondicionado'],
]);
?>
<section class="relacionados" aria-label="Enlaces relacionados">
  <div class="container relacionados__inner relacionados__inner--3">
    <div class="relacionados__col">
      <h2 class="relacionados__title">Otros servicios</h2>
      <ul class="relacionados__list" role="list">
        <?php foreach ($rlServicios as $rl): ?>
        <li><a href="<?= htmlspecialchars($rl['href']) ?>"><?= htmlspecialchars($rl['label']) ?></a></li>
        <?php endforeach; ?>
      </ul>
    </div>
    <div class="relacionados__col">
      <h2 class="relacionados__title"><?= $rlLinderas ? 'Zonas cercanas' : 'Zonas' ?></h2>
      <ul class="relacionados__list" role="list">
        <?php foreach ($rlZonas as $rl): ?>
        <li><a href="<?= htmlspecialchars($rl['href']) ?>"><?= htmlspecialchars($rl['label']) ?></a></li>
        <?php endforeach; ?>
      </ul>
    </div>
    <div class="relacionados__col">
      <h2 class="relacionados__title">Te puede servir</h2>
      <ul class="relacionados__list" role="list">
        <?php foreach ($rlUtiles as $rl): ?>
        <li><a href="<?= htmlspecialchars($rl['href']) ?>"><?= htmlspecialchars($rl['label']) ?></a></li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</section>

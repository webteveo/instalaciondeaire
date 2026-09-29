<?php
/**
 * /llms.txt — indice en texto plano para crawlers de IA (ChatGPT, Perplexity, Claude, Gemini).
 * Formato: https://llmstxt.org/
 * Se arma solo a partir de las constantes, los servicios (data/servicios), las zonas (Local_Datos) y los articulos publicados.
 */
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/config/variables.php';
require_once __DIR__ . '/src/libs/Controlador.php';
require_once __DIR__ . '/src/controlador/Local_Controller.php';
require_once __DIR__ . '/src/modelo/Articulos.php';

header('Content-Type: text/plain; charset=utf-8');
$base = SEO_CANONICAL_URL;
$tel  = (CONTACTO_TELEFONO && !str_contains(CONTACTO_TELEFONO, 'X')) ? " WhatsApp +" . CONTACTO_TELEFONO . "." : '';

echo "# " . EMPRESA_NOMBRE . " — " . EMPRESA_SLOGAN . "\n\n";
echo "> " . EMPRESA_DESCRIPCION . $tel . "\n\n";
echo "Idioma: español (Uruguay). Empresa independiente de técnicos en refrigeración: no es servicio oficial de ninguna marca. Los precios se cotizan por trabajo; no se publican cifras.\n\n";

echo "## Páginas principales\n\n";
$principales = [
    ['/', 'Inicio — ' . SEO_TITULO_POR_DEFECTO],
    ['/servicios', 'Todos los servicios'],
    ['/zonas', 'Zonas con técnicos'],
    ['/calculadora-frigorias', 'Calculadora de frigorías y BTU'],
    ['/como-funciona', 'Cómo trabajamos'],
    ['/preguntas-frecuentes', 'Preguntas frecuentes'],
    ['/contacto', 'Contacto'],
];
foreach ($principales as [$p, $t]) echo "- [{$t}]({$base}{$p})\n";

echo "\n## Servicios\n\n";
foreach (Local_Controller::servicios() as $k => $n) {
    if ($k === 'calculadora-frigorias') continue;
    $s = Local_Controller::servicio($k);
    echo "- [" . Local_Datos::SERVICIOS[$k]['label'] . "]({$base}/{$k}): " . ($s['description'] ?? '') . "\n";
}

echo "\n## Zonas\n\n";
echo "Cada zona tiene su página de instalación y, además, páginas propias de service, reparación, carga de gas y desinstalación con la forma {$base}/{servicio}/{zona} (por ejemplo {$base}/mantenimiento/pocitos).\n\n";
foreach (Local_Datos::zonasPorRegion() as $r => $zonas) {
    echo "### " . Local_Datos::REGIONES[$r] . "\n\n";
    foreach ($zonas as $k => $z) {
        $extra = [];
        foreach (Local_Datos::FASE2_SERVICIOS as $s => $sn) if (Local_Datos::servicioZonaPublicado($s, $k)) $extra[] = "[" . $sn . "]({$base}/{$s}/{$k})";
        echo "- [Instalación de aire acondicionado en {$z['nombre']}]({$base}/zonas/{$k})" . ($extra ? " · " . implode(' · ', $extra) : '') . "\n";
    }
    echo "\n";
}

$articulos = Articulos::todos();
if ($articulos) {
    echo "\n## Artículos y guías\n\n";
    foreach ($articulos as $a) {
        echo "- [" . $a['titulo'] . "]({$base}/articulos/" . $a['slug'] . "): " . ($a['description'] ?? '') . "\n";
    }
}

echo "\n## Optional\n\n";
echo "- [Sitemap XML]({$base}/sitemap.xml)\n";
echo "- [RSS de artículos]({$base}/articulos/feed)\n";

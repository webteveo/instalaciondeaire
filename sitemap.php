<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/config/variables.php';
require_once __DIR__ . '/src/libs/Controlador.php';
require_once __DIR__ . '/src/controlador/Local_Controller.php';

use benjamin\plantillaweb\libs\App;

header('Content-Type: application/xml; charset=utf-8');

// lastmod real: fecha de modificacion del archivo que define el contenido de cada URL (no la fecha de hoy)
$mod = function (array $files): string {
    $t = 0;
    foreach ($files as $file) $t = max($t, (int)@filemtime(__DIR__ . '/' . $file));
    return date('Y-m-d', $t ?: time());
};
$base = ['config/variables.php', 'src/vista/partials/head.php', 'src/vista/partials/header.php', 'src/vista/partials/footer.php'];
$lastmodDe = function (string $path) use ($mod, $base): string {
    $p = trim($path, '/');
    if ($p === '') return $mod(array_merge($base, ['src/vista/index/index.php'], array_map(fn($x) => 'src/vista/compact/' . basename($x), glob(__DIR__ . '/src/vista/compact/*.php') ?: [])));
    if (preg_match('#^(?:zonas|[a-z-]+)/([a-z0-9-]+)$#', $p, $zm) && is_file(__DIR__ . '/data/zonas/' . $zm[1] . '.php')) return $mod(array_merge($base, ['data/zonas/' . $zm[1] . '.php', 'src/vista/local/' . (str_starts_with($p, 'zonas/') ? 'zona' : 'servicio-zona') . '.php']));
    if (str_starts_with($p, 'zonas/') || $p === 'zonas') return $mod(array_merge($base, ['src/controlador/Local_Datos.php', 'src/controlador/Zona_Texto.php', 'src/vista/local/zona.php', 'src/vista/paginas/zonas.php']));
    if (is_file(__DIR__ . '/data/servicios/' . $p . '.php')) return $mod(array_merge($base, ['data/servicios/' . $p . '.php', 'src/vista/local/servicio.php']));
    $vistas = ['servicios' => 'paginas/servicios', 'como-funciona' => 'paginas/como-funciona', 'preguntas-frecuentes' => 'paginas/preguntas-frecuentes', 'contacto' => 'contacto/index'];
    if (isset($vistas[$p])) return $mod(array_merge($base, ['src/vista/' . $vistas[$p] . '.php'], $p === 'preguntas-frecuentes' ? ['data/faq-general.php'] : []));
    return $mod($base);
};
$urls = [];
$add = function (string $path, string $prio = '0.8', string $freq = 'weekly') use (&$urls, $lastmodDe) {
    $urls[] = ['loc' => SEO_CANONICAL_URL . $path, 'lastmod' => $lastmodDe($path), 'changefreq' => $freq, 'priority' => $prio];
};

// Home y paginas principales
$add('/', '1.0');
foreach (array_keys(App::RUTAS) as $alias) $add('/' . $alias, '0.8');       // /servicios
$add('/zonas', '0.8');
foreach (['/como-funciona', '/preguntas-frecuentes', '/contacto'] as $p) $add($p, '0.6', 'monthly');

// Articulos publicados (los borradores no entran)
require_once __DIR__ . '/src/modelo/Articulos.php';
$articulos = Articulos::todos();
if ($articulos) {
    $urls[] = ['loc' => SEO_CANONICAL_URL . '/articulos', 'lastmod' => reset($articulos)['actualizado'], 'changefreq' => 'weekly', 'priority' => '0.7'];
    foreach ($articulos as $ar) {
        $urls[] = ['loc' => SEO_CANONICAL_URL . '/articulos/' . $ar['slug'], 'lastmod' => $ar['actualizado'], 'changefreq' => 'monthly', 'priority' => '0.7'];
    }
}

// Paginas de un segmento: metodos publicos de los controladores raiz (menos los alias y las legales con noindex)
// + paginas pilar generadas desde data/servicios (ver Landings_Controller::registro)
$noSitemap = ['privacidad', 'terminos'];
foreach (App::CONTROLADORES_RAIZ as $c) {
    $cls = $c . '_Controller';
    require_once __DIR__ . '/src/controlador/' . $cls . '.php';
    $aliasTargets = array_column(App::RUTAS, 1);
    $ref = new ReflectionClass($cls);
    foreach ($ref->getMethods(ReflectionMethod::IS_PUBLIC) as $m) {
        $n = $m->getName();
        if ($m->getDeclaringClass()->getName() !== $cls || $m->isStatic() || str_starts_with($n, '_')) continue;
        if (in_array($n, $aliasTargets, true) || in_array($n, $noSitemap, true)) continue;
        $slug = str_replace('_', '-', $n);
        if (in_array($slug, ['como-funciona', 'preguntas-frecuentes'], true)) continue; // ya agregadas arriba
        $add('/' . $slug, '0.7');
    }
    if (method_exists($cls, '_generadas')) {
        foreach ($cls::_generadas() as $m => $_) {
            $add('/' . str_replace('_', '-', $m), '0.9');
        }
    }
}

// Zonas
foreach (array_keys(Local_Datos::zonasPublicadas()) as $z) $add('/zonas/' . $z, '0.8');

// Servicio x zona: solo las que tienen su texto en data/zonas/{zona}.php
foreach (Local_Controller::fase2Urls() as $p) $add($p, '0.7');

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
foreach ($urls as $u) {
    echo "  <url>\n";
    echo '    <loc>' . htmlspecialchars($u['loc']) . "</loc>\n";
    echo '    <lastmod>' . $u['lastmod'] . "</lastmod>\n";
    echo '    <changefreq>' . $u['changefreq'] . "</changefreq>\n";
    echo '    <priority>' . $u['priority'] . "</priority>\n";
    echo "  </url>\n";
}
echo "</urlset>\n";

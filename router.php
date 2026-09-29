<?php
/**
 * Router para el servidor embebido de PHP (php -S). Replica las reglas de .htaccess
 * para correr el sitio en local sin Apache/XAMPP, y agrega recarga automática del navegador
 * cuando cambia cualquier archivo del proyecto (solo en desarrollo).
 *
 *   php -S localhost:8000 router.php      (o ./dev.sh / dev.bat)
 *
 * Desactivar la recarga automática: LIVERELOAD=0 php -S localhost:8000 router.php
 */

if (PHP_SAPI !== 'cli-server') {
    http_response_code(404);
    exit;
}

$root = __DIR__;
chdir($root);
$path = rawurldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '/');
$liveReload = getenv('LIVERELOAD') !== '0';

// Detrás de un proxy https (GitHub Codespaces, túneles): que las URLs del sitio salgan con https y el host público
if (($_SERVER['HTTP_X_FORWARDED_PROTO'] ?? '') === 'https') {
    $_SERVER['HTTPS'] = 'on';
}
if (!empty($_SERVER['HTTP_X_FORWARDED_HOST'])) {
    $_SERVER['HTTP_HOST'] = $_SERVER['HTTP_X_FORWARDED_HOST'];
}

// ── Recarga automática: devuelve una huella de los archivos del sitio ──────────
if ($path === '/__livereload') {
    header('Content-Type: text/plain');
    header('Cache-Control: no-store');
    echo livereload_huella($root);
    return true;
}

// ── Reglas de .htaccess ───────────────────────────────────────────────────────
$reescrituras = [
    '/favicon.ico' => '/public/images/logo/favicon.ico',
    '/favicon.svg' => '/public/images/logo/favicon.svg',
    '/sitemap.xml' => '/sitemap.php',
    '/llms.txt'    => '/llms.php',
];
if (isset($reescrituras[$path])) {
    $path = $reescrituras[$path];
}

// Carpetas internas y archivos no públicos
if (preg_match('#^/(config|src|data|vendor|scripts|tests|\.devcontainer|\.git|\.github)(/|$)#', $path)
    || preg_match('#\.(md|lock|cjs)$#', $path)
    || preg_match('#^/(composer\.json|router\.php|dev\.sh|dev\.bat|\.htaccess|\.gitignore)$#', $path)) {
    http_response_code(403);
    echo 'Forbidden';
    return true;
}

$archivo = $root . $path;

// Archivo estático existente: lo sirve el servidor embebido
if ($path !== '/' && is_file($archivo) && !str_ends_with($path, '.php')) {
    if (isset($reescrituras[parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)])) {
        // Reescrito: hay que servirlo a mano porque la URL pedida no existe en disco
        $tipos = ['ico' => 'image/x-icon', 'svg' => 'image/svg+xml'];
        header('Content-Type: ' . ($tipos[pathinfo($archivo, PATHINFO_EXTENSION)] ?? mime_content_type($archivo)));
        readfile($archivo);
        return true;
    }
    return false;
}

// Script PHP existente (sitemap.php, llms.php...)
if ($path !== '/' && $path !== '/index.php' && is_file($archivo) && str_ends_with($path, '.php')) {
    $_SERVER['SCRIPT_NAME'] = $path;
    $_SERVER['SCRIPT_FILENAME'] = $archivo;
    require $archivo;
    return true;
}

// Regla general: todo lo demás va a index.php?url=...
$_GET['url'] = ltrim($path === '/index.php' ? '' : $path, '/');
if ($_GET['url'] === '') {
    unset($_GET['url']);
}
$_REQUEST = array_merge($_GET, $_POST);
$_SERVER['SCRIPT_NAME'] = '/index.php';
$_SERVER['SCRIPT_FILENAME'] = $root . '/index.php';
$_SERVER['PHP_SELF'] = '/index.php';

if ($liveReload) {
    ob_start(function (string $html): string {
        $esHtml = true;
        foreach (headers_list() as $h) {
            if (stripos($h, 'Content-Type:') === 0 && stripos($h, 'text/html') === false) {
                $esHtml = false;
            }
        }
        if (!$esHtml || stripos($html, '</body>') === false) {
            return $html;
        }
        $script = <<<'JS'
<script>
(function () {
  var huella = null;
  setInterval(function () {
    fetch('/__livereload', { cache: 'no-store' }).then(function (r) { return r.text(); }).then(function (h) {
      if (huella !== null && h !== huella) location.reload();
      huella = h;
    }).catch(function () {});
  }, 1000);
})();
</script>
JS;
        return str_ireplace('</body>', $script . '</body>', $html);
    });
}

require $root . '/index.php';
return true;

function livereload_huella(string $root): string
{
    $huella = '';
    $it = new RecursiveIteratorIterator(
        new RecursiveCallbackFilterIterator(
            new RecursiveDirectoryIterator($root, FilesystemIterator::SKIP_DOTS),
            function (SplFileInfo $f) {
                $n = $f->getFilename();
                // No mirar carpetas pesadas ni datos que cambian con cada visita
                return !in_array($n, ['.git', 'vendor', 'node_modules', 'metrics', 'leads'], true);
            }
        )
    );
    foreach ($it as $f) {
        if ($f->isFile()) {
            $huella .= $f->getPathname() . $f->getMTime() . $f->getSize();
        }
    }
    return md5($huella);
}

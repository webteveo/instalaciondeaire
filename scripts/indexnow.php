<?php
/**
 * Avisa a IndexNow (Bing, Yandex, Seznam, Naver) todas las URLs del sitemap publicado.
 * Uso, DESPUES de subir los cambios al hosting:  php scripts/indexnow.php
 * La clave vive en /f6056a743bf1c4996c6d11b398a24be6.txt en la raiz del sitio (tiene que estar publicada).
 * No usar la Indexing API de Google para paginas de servicio: para Google, Search Console -> sitemap + inspeccion de URL.
 */
$key  = 'f6056a743bf1c4996c6d11b398a24be6';
$host = 'instalaciondeaire.uy';
$xml  = @file_get_contents('https://' . $host . '/sitemap.xml');
if (!$xml) exit("No se pudo leer el sitemap publicado.\n");
preg_match_all('#<loc>([^<]+)</loc>#', $xml, $m);
$urls = array_values(array_unique($m[1]));
$body = json_encode(['host' => $host, 'key' => $key, 'keyLocation' => 'https://' . $host . '/' . $key . '.txt', 'urlList' => $urls]);
$ctx  = stream_context_create(['http' => ['method' => 'POST', 'header' => "Content-Type: application/json; charset=utf-8\r\n", 'content' => $body, 'ignore_errors' => true, 'timeout' => 30]]);
$res  = @file_get_contents('https://api.indexnow.org/indexnow', false, $ctx);
echo 'Enviadas ' . count($urls) . ' URLs. Respuesta: ' . ($http_response_header[0] ?? 'sin respuesta') . "\n" . $res . "\n";

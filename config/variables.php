<?php

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https://' : 'http://';
$host = $_SERVER['HTTP_HOST'] ?? 'localhost';
$basePath = rtrim(str_replace(DIRECTORY_SEPARATOR, '/', dirname($_SERVER['SCRIPT_NAME'] ?? '/index.php')), '/');

$ruta = $protocol . $host . $basePath . '/public';
$url = $protocol . $host . $basePath . '/';

// ── Empresa ──────────────────────────────────────────────────────────────────
define('EMPRESA_NOMBRE', 'Instalación de Aire Uruguay');
define('EMPRESA_SLOGAN', 'Técnicos en refrigeración en Montevideo, Canelones y Maldonado');
define('EMPRESA_DESCRIPCION', 'Técnicos en refrigeración en Uruguay. Instalamos split inverter y hacemos service, reparación y carga de gas de aire acondicionado en casas, apartamentos y comercios de Montevideo, Canelones y Maldonado. Presupuesto por WhatsApp.');
define('EMPRESA_NIT', '');
define('EMPRESA_RAZON_SOCIAL', 'Instalación de Aire Uruguay');

/** Zonas y servicios que se declaran en el schema HVACBusiness (head.php). */
define('EMPRESA_ZONAS', ['Montevideo', 'Canelones', 'Maldonado']);
define('EMPRESA_SERVICIOS_SCHEMA', [
    'Instalación de aire acondicionado',
    'Instalación de split inverter',
    'Service y mantenimiento de aire acondicionado',
    'Reparación de aire acondicionado',
    'Carga de gas para aire acondicionado',
    'Desinstalación y reinstalación de aire acondicionado',
    'Climatización de oficinas y comercios',
    'Preinstalación de aire acondicionado en obra',
]);

// ── Contacto ─────────────────────────────────────────────────────────────────
// [COMPLETAR] Unica variable con el numero de telefono y WhatsApp de todo el sitio.
// Formato internacional sin "+", ej. 59899123456. Mientras tenga X, los botones muestran el placeholder.
define('CONTACTO_NUMERO', '59894633956');
// Con el placeholder (o cualquier numero invalido) telefono y WhatsApp quedan vacios: los botones de WhatsApp llevan al
// formulario de contacto y los de "Llamar" no se muestran. Nunca se publica un wa.me/598XXXXXXXX roto.
define('CONTACTO_NUMERO_VALIDO', (bool)preg_match('/^598\d{8}$/', CONTACTO_NUMERO));
define('CONTACTO_TELEFONO', CONTACTO_NUMERO_VALIDO ? CONTACTO_NUMERO : '');
define('CONTACTO_TELEFONO_2', '');
define('CONTACTO_WHATSAPP', CONTACTO_NUMERO_VALIDO ? CONTACTO_NUMERO : '');
/** Mensaje de WhatsApp por defecto (home y paginas sin mensaje propio). Cada pagina pasa el suyo a wsp_href(). */
define('CONTACTO_WHATSAPP_MENSAJE', 'Hola! Quiero presupuesto para instalar un aire acondicionado. Barrio: ___ / Frigorías o BTU: ___ / ¿Casa o apto?: ___');
/** Texto por defecto de los botones de WhatsApp (home y zonas). Las paginas de servicio definen el suyo. */
define('CTA_WHATSAPP_LABEL', 'Obtené tu presupuesto');
/** Microcopy debajo del CTA principal */
define('CTA_WHATSAPP_MICROCOPY', 'Decinos tu barrio y las frigorías y te responde un técnico de tu zona.');
define('CONTACTO_EMAIL', 'contacto@instalaciondeaire.uy');
define('CONTACTO_EMAIL_CONTACTO', 'contacto@instalaciondeaire.uy');
define('CONTACTO_EMAIL_NOREPLY', 'contacto@instalaciondeaire.uy');

// Telefono legible (099 123 456) derivado de CONTACTO_TELEFONO. Vacio si no hay telefono.
$telefonoLocal = preg_replace('/[^0-9X]/', '', CONTACTO_TELEFONO);
if (str_starts_with($telefonoLocal, '598')) {
    $telefonoLocal = '0' . substr($telefonoLocal, 3);
}
define('CONTACTO_TELEFONO_VISIBLE', $telefonoLocal !== '' ? trim(chunk_split($telefonoLocal, 3, ' ')) : '');
unset($telefonoLocal);

/**
 * Destino de todos los botones de WhatsApp del sitio.
 * - Con CONTACTO_WHATSAPP cargado: abre el chat con el mensaje prellenado (URL-encoded).
 * - Sin numero: lleva al formulario de contacto con el mensaje precargado.
 *   La URL incluye "origen=whatsapp" para que el modulo de metricas siga contando estos clicks como clicks a WhatsApp.
 */
function wsp_href(string $mensaje = CONTACTO_WHATSAPP_MENSAJE): string
{
    if (CONTACTO_WHATSAPP !== '') {
        return 'https://wa.me/' . CONTACTO_WHATSAPP . '?text=' . rawurlencode($mensaje);
    }
    return $GLOBALS['url'] . 'contacto?origen=whatsapp&msg=' . urlencode($mensaje) . '#contacto-form-title';
}

/**
 * Atributos data-* para los eventos de analitica de los CTA (main.js los manda a /metricas y a gtag si existe).
 * $tipo: home | servicio | zona | calculadora | faq | contacto | blog ...   $zona: slug o nombre de la zona, vacio si no aplica.
 */
function cta_track(string $tipo = '', string $zona = ''): string
{
    $ctx  = cta_contexto();
    $tipo = $tipo !== '' ? $tipo : $ctx[0];
    $zona = $zona !== '' ? $zona : $ctx[1];
    return ' data-page-type="' . htmlspecialchars($tipo, ENT_QUOTES) . '"' . ($zona !== '' ? ' data-zona="' . htmlspecialchars($zona, ENT_QUOTES) . '"' : '');
}

/** Cada vista declara su tipo de pagina y zona al inicio: cta_contexto('zona', 'pocitos'). Sin argumentos, devuelve el actual. */
function cta_contexto(?string $tipo = null, string $zona = ''): array
{
    static $ctx = ['general', ''];
    if ($tipo !== null) $ctx = [$tipo, $zona];
    return $ctx;
}

// Negocio con area de servicio: sin direccion fisica publica.
define('DIRECCION_CALLE', '');
define('DIRECCION_NUMERO', '');
define('DIRECCION_CIUDAD', 'Montevideo');
define('DIRECCION_DEPARTAMENTO', 'Montevideo');
define('DIRECCION_PAIS', 'UY');
define('DIRECCION_COMPLETA', 'Montevideo, Canelones y Maldonado, Uruguay');
define('DIRECCION_ENLACE_GOOGLE_MAPS', '');
define('GEO_LAT', '-34.9011');
define('GEO_LNG', '-56.1645');

// [COMPLETAR] Horario de atencion por WhatsApp (HH:MM-HH:MM o 'Cerrado').
define('HORARIO_LUNES', '08:00-20:00');
define('HORARIO_MARTES', '08:00-20:00');
define('HORARIO_MIERCOLES', '08:00-20:00');
define('HORARIO_JUEVES', '08:00-20:00');
define('HORARIO_VIERNES', '08:00-20:00');
define('HORARIO_SABADO', '09:00-13:00');
define('HORARIO_DOMINGO', 'Cerrado');
define('HORARIO_FESTIVOS', 'Cerrado');
/** Texto legible del horario (footer, contacto). Mantener coherente con las constantes de arriba. */
define('HORARIO_TEXTO', 'Lunes a viernes de 8 a 20 h, sábados de 9 a 13 h');

define('REDES_FACEBOOK', '');
define('REDES_INSTAGRAM', '');
define('REDES_INSTAGRAM_USUARIO', '');
define('REDES_TWITTER', '');
define('REDES_LINKEDIN', '');
define('REDES_YOUTUBE', '');
define('REDES_TIKTOK', '');
define('REDES_WHATSAPP', CONTACTO_WHATSAPP ? 'https://wa.me/' . CONTACTO_WHATSAPP : '');

// ── SEO ──────────────────────────────────────────────────────────────────────
define('SEO_TITULO_POR_DEFECTO', 'Instalación de aire acondicionado en Montevideo y Canelones');
define('SEO_DESCRIPCION_POR_DEFECTO', 'Instalamos split inverter con soporte, cañería, vacío y prueba. Presupuesto por WhatsApp. Service, reparación y carga de gas en Montevideo, Canelones y Maldonado.');
define('SEO_PALABRAS_CLAVE_POR_DEFECTO', 'instalación de aire acondicionado montevideo, instalación split inverter, service aire acondicionado, reparación aire acondicionado montevideo, carga de gas aire acondicionado, técnico en refrigeración');
define('SEO_AUTOR', 'Instalación de Aire Uruguay');
define('SEO_CANONICAL_URL', 'https://instalaciondeaire.uy');
define('SEO_OG_IMAGEN', 'public/images/logo/og-image.png');
define('SEO_TWITTER_IMAGEN', 'public/images/logo/og-image.png');

// ── Logos [REEMPLAZAR]: placeholders con copo de nieve. Original vectorial: instalacion-de-aire.svg (ver scripts/generate-logos.cjs) ──
define('LOGO_PRINCIPAL', 'public/images/logo/logo.png');               // color, fondo transparente (schema, PNG de respaldo)
define('LOGO_HEADER_OSCURO', 'public/images/logo/logo-blanco.svg');    // todo blanco: para usar sobre fondos oscuros
define('LOGO_HEADER_CLARO', 'public/images/logo/logo.svg');            // color: header (siempre fondo blanco) y footer
define('LOGO_ICONO', 'public/images/logo/icono.svg');                  // símbolo de copo de nieve, cuadrado
define('LOGO_FAVICON', 'public/images/logo/favicon.svg');
define('LOGO_FAVICON_16', 'public/images/logo/favicon.svg');
define('LOGO_FAVICON_32', 'public/images/logo/favicon.svg');
define('LOGO_APPLE_TOUCH', 'public/images/logo/apple-touch-icon.png');

// Colores de marca [COMPLETAR si hay identidad propia]. Por defecto: azul #0A5BD8, azul oscuro #0B2545 y celeste #22C3E6
define('COLOR_PRIMARIO', '#0A5BD8');
define('COLOR_PRIMARIO_HOVER', '#0849AD');
define('COLOR_SECUNDARIO', '#0B2545');
define('COLOR_ACENTO', '#22C3E6');
define('COLOR_FONDO', '#ffffff');
define('COLOR_FONDO_SECUNDARIO', '#f3f6fb');
define('COLOR_TEXTO_PRIMARIO', '#141a24');
define('COLOR_TEXTO_SECUNDARIO', '#4f5966');
define('COLOR_BORDE', '#dde3ec');
define('COLOR_ERROR', '#ef4444');
define('COLOR_EXITO', '#22c55e');
define('COLOR_WHATSAPP', '#25d366');

define('GOOGLE_ANALYTICS_ID', '');
define('GOOGLE_TAG_MANAGER_ID', '');
define('GOOGLE_SITE_VERIFICATION', '');
define('GOOGLE_MAPS_API_KEY', '');
define('GOOGLE_RECAPTCHA_SITE_KEY', '');
define('GOOGLE_RECAPTCHA_SECRET_KEY', '');

define('FACEBOOK_PIXEL_ID', '');
define('FACEBOOK_APP_ID', '');
define('META_TWITTER_SITE', '');

define('CHAT_WIDGET_HABILITADO', false);
define('CHAT_WIDGET_TIPO', 'whatsapp');
define('CHAT_Tidio_HABILITADO', false);
define('CHAT_TIDIO_KEY', '');
define('CHAT_MESSENGER_HABILITADO', false);
define('CHAT_MESSENGER_PAGE_ID', '');

// ── Metricas (panel privado en /metricas). Generar hash nuevo: php -r "echo password_hash('clave', PASSWORD_BCRYPT);" ──
define('METRICAS_HABILITADAS', true);
define('METRICAS_PASSWORD_HASH', '$2y$10$zKGy3JUZA5OrmVMhVCgPTOc242csJsBoOr1ptSriQzCXLaj5htQ4q'); // [COMPLETAR] generar una clave nueva para este sitio
define('METRICAS_SESSION_KEY', 'instalaciondeaire_metricas_auth');
define('METRICAS_IGNORAR_LOCALHOST', false); // true para no registrar visitas hechas desde localhost/XAMPP
define('METRICAS_DATA_DIR', __DIR__ . '/../data/metrics');

// ── Email saliente (SMTP) [COMPLETAR con la cuenta de este sitio] ────────────
define('EMAIL_SMTP_HOST', 'smtp.gmail.com');
define('EMAIL_SMTP_USUARIO', '');
define('EMAIL_SMTP_PASSWORD', '');
define('EMAIL_SMTP_PUERTO', 587);
define('EMAIL_SMTP_SECURE', 'tls');
define('EMAIL_FROM_NOMBRE', 'Instalación de Aire Uruguay');
define('EMAIL_FROM_EMAIL', 'contacto@instalaciondeaire.uy');

define('WHATSAPP_BOT_HABILITADO', false);
define('WHATSAPP_BOT_TELEFONO', '');
define('WHATSAPP_BOT_API_URL', '');
define('WHATSAPP_BOT_API_KEY', '');

define('PAYPAL_CLIENT_ID', '');
define('PAYPAL_MODO', 'sandbox');
define('MERCADOPAGO_ACCESS_TOKEN', '');
define('MERCADOPAGO_PUBLIC_KEY', '');

define('MONEDA_SIMBOLO', '$U');
define('MONEDA_CODIGO', 'UYU');
define('MONEDA_DECIMALES', 0);

define('PAIS_DEFAULT', 'UY');
define('IDIOMA_DEFAULT', 'es');
define('ZONA_HORARIA', 'America/Montevideo');

define('CACHE_HABILITADO', false);
define('CACHE_DURACION', 3600);

define('MANTENIMIENTO_HABILITADO', false);
define('MANTENIMIENTO_MENSAJE', 'Estamos en mantenimiento. Volvemos pronto.');

define('URL_PRIVACIDAD', '/privacidad');
define('URL_TERMINOS', '/terminos');
define('URL_COOKIES', '/privacidad');
define('URL_CONTACTO', '/contacto');

define('RESENA_GOOGLE_PROFILE_URL', '');
define('RESENA_MENSAJE_POSITIVO', 'Gracias! Nos alegra saberlo. Podés dejarnos tu reseña en Google.');
define('RESENA_MENSAJE_NEGATIVO', 'Lamentamos que no hayas quedado conforme. Contanos qué podemos mejorar.');
define('RESENA_MENSAJE_FORMULARIO', 'Tu opinión nos importa. Contanos cómo fue la instalación o el service y nos ponemos en contacto.');

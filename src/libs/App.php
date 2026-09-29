<?php
namespace benjamin\plantillaweb\libs;

class App
{
  /**
   * Rutas "bonitas" de un solo segmento que NO coinciden con el nombre de un metodo.
   * clave = primer segmento de la URL, valor = [Controlador, metodo].
   * Normalmente no hace falta: cualquier metodo publico de un controlador de CONTROLADORES_RAIZ
   * ya se sirve como /{nombre-del-metodo-con-guiones}. Usar solo para alias.
   * Ejemplo: 'aire' => ['Landings', 'split_inverter'],
   * El metodo destino NO se sirve por su propio nombre (evita contenido duplicado).
   */
  public const RUTAS = [
    'servicios' => ['Landings', 'indice_servicios'],
  ];

  /** Controladores que atienden URLs de un solo segmento por nombre de metodo o por dato (/split-inverter -> Landings) */
  public const CONTROLADORES_RAIZ = ['Landings'];

  /**
   * Rutas de dos segmentos donde el 2do segmento es un parametro (/articulos/{slug} -> Articulos::ver($slug)).
   * clave = primer segmento, valor = [Controlador, metodo]. Solo aplica cuando seg1 no es un metodo publico del controlador.
   */
  private const RUTAS_DINAMICAS = [
    'articulos' => ['Articulos', 'ver'],
    'proyectos' => ['Proyectos', 'ver'],
    'zonas'     => ['Zonas', 'ver'],
  ];

  public static function iniciar()
  {
    // Lee la URL limpia tipo /blog/index
    $urlRaw = $_GET['url'] ?? 'index/index';
    $url = explode('/', trim($urlRaw, '/'));

    $seg0 = $url[0] ?? 'index';
    $seg1 = $url[1] ?? null;
    $param = null;

    if (isset(self::RUTAS[$seg0]) && $seg1 === null) {
      [$c, $m] = self::RUTAS[$seg0];
    } elseif ($seg1 === null && $seg0 !== '' && !file_exists('src/controlador/' . ucfirst(str_replace('-', '_', $seg0)) . '_Controller.php') && ($hit = self::resolverRaiz($seg0))) {
      [$c, $m] = $hit;
    } elseif (isset(self::RUTAS_DINAMICAS[$seg0]) && $seg1 !== null && !isset($url[2]) && preg_match('/^[a-z0-9-]+$/', $seg1) && !self::esMetodoPublico(self::RUTAS_DINAMICAS[$seg0][0], str_replace('-', '_', $seg1))) {
      [$c, $m] = self::RUTAS_DINAMICAS[$seg0];
      $param = $seg1;
    } elseif ($seg1 !== null && !isset($url[2]) && self::esServicioZona($seg0, $seg1)) {
      // Servicio x zona: /{servicio}/{zona} (ej. /mantenimiento/pocitos). Solo si la zona tiene el texto de ese servicio.
      [$c, $m] = ['Local', 'servicioZona'];
      $param = [$seg0, $seg1];
    } else {
      $c = str_replace('-', '_', $seg0 ?: 'index');
      $m = str_replace('-', '_', $seg1 ?? 'index');
      // Los controladores raiz solo se sirven como /{slug}; /landings/{slug} seria contenido duplicado
      if (in_array(ucfirst($c), self::CONTROLADORES_RAIZ, true)) {
        self::error404();
      }
    }

    // Armado de clase controladora
    $con            = ucfirst($c) . "_Controller";
    $controllerPath = 'src/controlador/' . $con . ".php";

    if (!preg_match('/^[A-Za-z0-9_]+$/', $c) || !preg_match('/^[A-Za-z0-9_]+$/', $m) || !file_exists($controllerPath)) {
      self::error404();
    }

    require_once $controllerPath;
    $controller = new $con();

    // Solo metodos publicos, no magicos y no heredados de la clase base
    if (str_starts_with($m, '_')) {
      self::error404();
    }
    if (!method_exists($controller, $m)) {
      // Landings generadas por datos (servicios pilar, servicio x zona): ver Local_Generadas
      if (method_exists($controller, '_generada') && $controller->_generada($m)) return;
      self::error404();
    }
    $ref = new \ReflectionMethod($controller, $m);
    if (!$ref->isPublic() || $ref->isStatic() || $ref->getDeclaringClass()->getName() === Controlador::class) {
      self::error404();
    }

    if ($param === null) {
      $controller->{$m}();
    } else {
      $controller->{$m}(...(array)$param);
    }
  }

  private static function esMetodoPublico(string $c, string $m): bool
  {
    $path = 'src/controlador/' . $c . '_Controller.php';
    if (!file_exists($path) || !preg_match('/^[a-z0-9_]+$/', $m) || str_starts_with($m, '_')) return false;
    require_once $path;
    $cls = $c . '_Controller';
    if (!method_exists($cls, $m)) return false;
    $ref = new \ReflectionMethod($cls, $m);
    return $ref->isPublic() && !$ref->isStatic() && $ref->getDeclaringClass()->getName() === $cls;
  }

  private static function resolverRaiz(string $seg): ?array
  {
    $m = str_replace('-', '_', $seg);
    if (!preg_match('/^[a-z0-9_]+$/', $m) || str_starts_with($m, '_')) return null;
    foreach (self::RUTAS as $alias) { if ($alias[1] === $m) return null; }
    foreach (self::CONTROLADORES_RAIZ as $c) {
      $path = 'src/controlador/' . $c . '_Controller.php';
      if (!file_exists($path)) continue;
      require_once $path;
      $cls = $c . '_Controller';
      if (method_exists($cls, $m)) {
        $ref = new \ReflectionMethod($cls, $m);
        if ($ref->isPublic() && !$ref->isStatic() && $ref->getDeclaringClass()->getName() === $cls) return [$c, $m];
      } elseif (method_exists($cls, '_generadas') && isset($cls::_generadas()[$m])) {
        return [$c, $m];
      }
    }
    return null;
  }

  /** Fase 2: true si /{seg0}/{seg1} es un servicio x zona publicado (ver Local_Datos). */
  private static function esServicioZona(string $seg0, string $seg1): bool
  {
    if (!preg_match('/^[a-z0-9-]+$/', $seg0) || !preg_match('/^[a-z0-9-]+$/', $seg1)) return false;
    require_once 'src/controlador/Local_Datos.php';
    return \Local_Datos::servicioZonaPublicado($seg0, $seg1);
  }

  public static function error404(): void
  {
    http_response_code(404);
    global $ruta, $url;
    require 'src/vista/errores/404.php';
    exit;
  }
}

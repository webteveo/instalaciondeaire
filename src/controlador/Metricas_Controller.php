<?php

use benjamin\plantillaweb\libs\Controlador;
use benjamin\plantillaweb\libs\Metrics;

class Metricas_Controller extends Controlador
{
    private const RANGOS_PERMITIDOS = [7, 14, 30, 90, 180, 365];

    public function index()
    {
        if (!Metrics::isEnabled()) {
            http_response_code(404);
            echo 'Modulo de metricas deshabilitado.';
            return;
        }

        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $password = $_POST['password'] ?? '';

            if (!Metrics::authenticate($password)) {
                $error = 'Contrasena incorrecta.';
            } else {
                header('Location: ?url=metricas/index');
                exit;
            }
        }

        if (!Metrics::isAuthenticated()) {
            $this->cargarVista('metricas/index', [
                'isAuthenticated' => false,
                'error' => $error,
                'summary' => null,
            ]);
            return;
        }

        $days = $this->resolverRango();
        $summary = Metrics::summarize($days);

        $this->cargarVista('metricas/index', [
            'isAuthenticated' => true,
            'error' => null,
            'summary' => $summary,
            'days' => $days,
        ]);
    }

    /** /metricas/leads: consultas del formulario guardadas en data/leads (respaldo por si el mail no llega). */
    public function leads()
    {
        if (!Metrics::isEnabled() || !Metrics::isAuthenticated()) {
            header('Location: ' . ($GLOBALS['url'] ?? '/') . 'metricas');
            exit;
        }
        $leads = [];
        foreach (glob(__DIR__ . '/../../data/leads/*.ndjson') ?: [] as $file) {
            foreach (file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) ?: [] as $line) {
                $row = json_decode($line, true);
                if (is_array($row)) $leads[] = $row;
            }
        }
        usort($leads, fn($a, $b) => strcmp($b['fecha'] ?? '', $a['fecha'] ?? ''));
        $cols = ['fecha', 'nombre', 'telefono', 'email', 'barrio', 'servicio', 'vivienda', 'piso', 'tiene_equipo', 'frigorias', 'mensaje', 'origen'];
        header('Content-Type: text/html; charset=utf-8');
        header('X-Robots-Tag: noindex, nofollow');
        echo '<!doctype html><html lang="es"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><meta name="robots" content="noindex"><title>Leads</title>';
        echo '<style>body{font-family:system-ui,sans-serif;margin:16px;color:#141a24}table{border-collapse:collapse;width:100%;font-size:14px}th,td{border:1px solid #dde3ec;padding:6px 8px;text-align:left;vertical-align:top}th{background:#f3f6fb}.wrap{overflow-x:auto}</style></head><body>';
        echo '<h1>Leads del formulario (' . count($leads) . ')</h1><p><a href="' . htmlspecialchars(($GLOBALS['url'] ?? '/') . 'metricas') . '">Volver a métricas</a></p><div class="wrap"><table><tr>';
        foreach ($cols as $c) echo '<th>' . htmlspecialchars($c) . '</th>';
        echo '</tr>';
        foreach ($leads as $l) {
            echo '<tr>';
            foreach ($cols as $c) echo '<td>' . nl2br(htmlspecialchars((string)($l[$c] ?? ''))) . '</td>';
            echo '</tr>';
        }
        echo '</table></div></body></html>';
    }

    public function collect()
    {
        if (!Metrics::isEnabled()) {
            http_response_code(404);
            echo json_encode(['ok' => false]);
            return;
        }

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(Metrics::collectFromRequest(), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }

    public function export()
    {
        if (!Metrics::isEnabled() || !Metrics::isAuthenticated()) {
            http_response_code(403);
            echo 'Acceso denegado.';
            return;
        }

        $days = $this->resolverRango();
        $summary = Metrics::summarize($days);

        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename="metricas-' . $days . 'dias.csv"');

        $out = fopen('php://output', 'w');
        // BOM para que Excel abra el CSV con acentos correctos
        fwrite($out, "\xEF\xBB\xBF");

        fputcsv($out, ['Dia', 'Vistas', 'Visitantes unicos', 'Clicks', 'Clicks WhatsApp', 'Clicks telefono'], ';');

        foreach ($summary['daily'] as $day => $row) {
            fputcsv($out, [
                $day,
                (int)($row['pageviews'] ?? 0),
                (int)($row['unique_visitors'] ?? 0),
                (int)($row['clicks'] ?? 0),
                (int)($row['whatsapp_clicks'] ?? 0),
                (int)($row['phone_clicks'] ?? 0),
            ], ';');
        }

        fputcsv($out, [], ';');
        fputcsv($out, ['Paginas mas vistas', 'Vistas', 'Visitantes'], ';');
        foreach ($summary['pages'] as $path => $row) {
            fputcsv($out, [$path, (int)$row['views'], (int)$row['visitors']], ';');
        }

        fputcsv($out, [], ';');
        fputcsv($out, ['Fuente de trafico', 'Vistas'], ';');
        foreach ($summary['referrers'] as $label => $count) {
            fputcsv($out, [$label, (int)$count], ';');
        }

        fclose($out);
        exit;
    }

    public function logout()
    {
        Metrics::logout();
        header('Location: ?url=metricas/index');
        exit;
    }

    private function resolverRango(): int
    {
        $days = (int)($_GET['days'] ?? 30);
        return in_array($days, self::RANGOS_PERMITIDOS, true) ? $days : 30;
    }
}

<?php

use benjamin\plantillaweb\libs\Controlador;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

class Contacto_Controller extends Controlador
{
    public function index()
    {
        $this->cargarVista('contacto/index');
    }

    public function enviar()
    {
        $base = $GLOBALS['url'] ?? '/';

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . $base . 'contacto');
            exit;
        }

        $nombre   = trim($_POST['nombre']   ?? '');
        $email    = trim($_POST['email']    ?? '');
        $telefono = trim($_POST['telefono'] ?? '');
        $servicio = trim($_POST['servicio'] ?? '');
        $mensaje  = trim($_POST['mensaje']  ?? '');
        // Campos propios del formulario de aire acondicionado
        $extra = [
            'Barrio'              => trim($_POST['barrio'] ?? ''),
            'Casa o apartamento'  => trim($_POST['vivienda'] ?? ''),
            'Piso'                => trim($_POST['piso'] ?? ''),
            '¿Ya tiene el equipo?' => trim($_POST['tiene_equipo'] ?? ''),
            'Frigorías o BTU'     => trim($_POST['frigorias'] ?? ''),
        ];
        $origen = trim($_POST['origen'] ?? '');

        // Nombre, mensaje y al menos un medio de contacto (telefono o email)
        if (empty($nombre) || empty($mensaje) || (empty($email) && empty($telefono))) {
            $_SESSION['error'] = 'Por favor completá nombre, mensaje y un teléfono o email para responderte.';
            header('Location: ' . $base . 'contacto');
            exit;
        }

        if ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = 'El email ingresado no es válido.';
            header('Location: ' . $base . 'contacto');
            exit;
        }

        // El lead se guarda en disco ANTES del mail: si el SMTP falla o no esta configurado, la consulta no se pierde.
        // Se ve en /metricas/leads (misma clave que el panel de metricas). data/ esta bloqueado por .htaccess.
        $leadGuardado = self::guardarLead([
            'nombre' => $nombre, 'email' => $email, 'telefono' => $telefono, 'servicio' => $servicio,
            'mensaje' => $mensaje, 'origen' => $origen,
        ] + array_combine(['barrio', 'vivienda', 'piso', 'tiene_equipo', 'frigorias'], array_values($extra)));

        if (EMAIL_SMTP_USUARIO === '' || EMAIL_SMTP_PASSWORD === '') {
            if ($leadGuardado) {
                $_SESSION['exito'] = 'Consulta enviada. Un técnico de tu zona te contacta a la brevedad.';
                header('Location: ' . $base . 'contacto/gracias');
            } else {
                $_SESSION['error'] = 'No se pudo enviar el mensaje. Escribinos por correo a ' . CONTACTO_EMAIL . '.';
                header('Location: ' . $base . 'contacto');
            }
            exit;
        }

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host       = EMAIL_SMTP_HOST;
            $mail->SMTPAuth   = true;
            $mail->Username   = EMAIL_SMTP_USUARIO;
            $mail->Password   = EMAIL_SMTP_PASSWORD;
            $mail->SMTPSecure = EMAIL_SMTP_SECURE;
            $mail->Port       = EMAIL_SMTP_PUERTO;

            $mail->setFrom(EMAIL_SMTP_USUARIO, EMPRESA_NOMBRE);
            $mail->addAddress(CONTACTO_EMAIL_CONTACTO);
            if ($email !== '') $mail->addReplyTo($email, $nombre);

            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';
            $mail->Subject = "Nuevo contacto - $nombre" . ($servicio ? " ($servicio)" : '') . ($extra['Barrio'] ? " - " . $extra['Barrio'] : '');

            $servicioHtml = $servicio ? "<p><strong>Servicio:</strong> " . htmlspecialchars($servicio) . "</p>" : '';
            $extraTxt = '';
            foreach ($extra as $k => $v) {
                if ($v === '') continue;
                $servicioHtml .= "<p><strong>" . htmlspecialchars($k) . ":</strong> " . htmlspecialchars($v) . "</p>";
                $extraTxt .= "\n$k: $v";
            }
            if ($origen) { $servicioHtml .= "<p><strong>Página de origen:</strong> " . htmlspecialchars($origen) . "</p>"; $extraTxt .= "\nOrigen: $origen"; }

            $mail->Body = "
                <h2>Nuevo mensaje de contacto</h2>
                <hr>
                <p><strong>Nombre:</strong> " . htmlspecialchars($nombre) . "</p>
                <p><strong>Email:</strong> " . ($email ? htmlspecialchars($email) : 'No proporcionado') . "</p>
                <p><strong>Teléfono:</strong> " . ($telefono ? htmlspecialchars($telefono) : 'No proporcionado') . "</p>
                $servicioHtml
                <hr>
                <p><strong>Mensaje:</strong></p>
                <p>" . nl2br(htmlspecialchars($mensaje)) . "</p>
                <hr>
                <p><em>Enviado el " . date('d/m/Y H:i') . "</em></p>
            ";

            $mail->AltBody = "Nuevo contacto\n\nNombre: $nombre\nEmail: $email\nTeléfono: " . ($telefono ?: 'No proporcionado') . ($servicio ? "\nServicio: $servicio" : '') . "\n\nMensaje:\n$mensaje";

            $mail->send();
            $_SESSION['exito'] = 'Consulta enviada. Un técnico de tu zona te contacta a la brevedad.';
            header('Location: ' . $base . 'contacto/gracias');
            exit;
        } catch (Exception $e) {
            if ($leadGuardado) {
                $_SESSION['exito'] = 'Consulta enviada. Un técnico de tu zona te contacta a la brevedad.';
                header('Location: ' . $base . 'contacto/gracias');
                exit;
            }
            $_SESSION['error'] = 'No se pudo enviar el mensaje. Escribinos por WhatsApp o por correo.';
            header('Location: ' . $base . 'contacto');
            exit;
        }
    }

    /** Agrega el lead a data/leads/YYYY-MM.ndjson. Devuelve false si no se pudo escribir. */
    private static function guardarLead(array $lead): bool
    {
        $dir = __DIR__ . '/../../data/leads';
        if (!is_dir($dir) && !@mkdir($dir, 0755, true)) return false;
        $ahora = new DateTime('now', new DateTimeZone(ZONA_HORARIA));
        $lead = ['fecha' => $ahora->format('Y-m-d H:i')] + $lead + ['ip_hash' => hash('sha256', ($_SERVER['REMOTE_ADDR'] ?? '') . METRICAS_SESSION_KEY)];
        $linea = json_encode($lead, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . "\n";
        return @file_put_contents($dir . '/' . $ahora->format('Y-m') . '.ndjson', $linea, FILE_APPEND | LOCK_EX) !== false;
    }

    public function gracias()
    {
        $this->cargarVista('contacto/gracias');
    }
}

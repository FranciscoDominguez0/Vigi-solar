<?php
declare(strict_types=1);

require_once __DIR__ . '/../config.php'; // Importar credenciales de forma segura

/**
 * --- FUNCIONES AUXILIARES ---
 */

/**
 * Envía una respuesta en formato JSON de forma segura y finaliza la ejecución.
 */
function enviarRespuestaJSON(bool $exito, string $mensaje = ''): void {
    // Prevenir que advertencias o espacios en blanco rompan la respuesta JSON
    if (ob_get_length()) {
        ob_clean();
    }
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(['success' => $exito, 'message' => $mensaje]);
    exit;
}

/**
 * Obtiene y limpia un dato proveniente de $_POST para evitar inyecciones XSS.
 */
function limpiarDato(string $clave): string {
    if (!isset($_POST[$clave])) {
        return '';
    }
    return trim(htmlspecialchars($_POST[$clave], ENT_QUOTES, 'UTF-8'));
}

/**
 * Verifica el token de reCAPTCHA contra la API de Google.
 */
function verificarRecaptcha(string $respuestaRecaptcha, string $claveSecreta): bool {
    if (empty($respuestaRecaptcha) || empty($claveSecreta)) {
        return false;
    }

    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $datos = ['secret' => $claveSecreta, 'response' => $respuestaRecaptcha];

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($datos));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    $respuesta = curl_exec($ch);
    
    // Si cURL falla al conectar, asumimos verificación fallida
    if (curl_errno($ch)) {
        return false;
    }

    $datosRespuesta = json_decode($respuesta, true);
    return isset($datosRespuesta['success']) && $datosRespuesta['success'] === true;
}

/**
 * Envía un correo electrónico utilizando la API de Resend.
 */
function enviarCorreoResend(string $apiKey, string $destinatario, string $responderA, string $asunto, string $htmlMensaje): bool {
    $url = 'https://api.resend.com/emails';
    
    $datos = [
        // En producción, cambiar por un dominio propio verificado (ej. no-reply@vigitecpanama.com)
        'from' => 'onboarding@resend.dev', 
        'to' => $destinatario,
        'reply_to' => $responderA,
        'subject' => $asunto,
        'html' => $htmlMensaje
    ];

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Authorization: Bearer ' . $apiKey,
        'Content-Type: application/json'
    ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($datos));
    
    curl_exec($ch);
    $codigoHttp = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    
    return ($codigoHttp >= 200 && $codigoHttp < 300);
}


/**
 * --- FLUJO PRINCIPAL ---
 */

// Iniciar buffer para evitar salida accidental de texto
ob_start();

try {
    // 1. Validar configuración crítica del servidor
    $resendApiKey = getenv('RESEND_API_KEY');
    if (empty($resendApiKey)) {
        enviarRespuestaJSON(false, 'Error de configuración del servidor de correos.');
    }

    $claveSecretaRecaptcha = defined('RECAPTCHA_SECRET_KEY') ? RECAPTCHA_SECRET_KEY : '';
    
    // 2. Obtener y sanitizar datos del formulario
    $nombre    = limpiarDato('Nombre');
    $cedula    = limpiarDato('Cédula');
    $telefono  = limpiarDato('Teléfono');
    $email     = limpiarDato('Email');
    $direccion = limpiarDato('Dirección');
    $servicio  = limpiarDato('Servicio');
    $anos      = (int)limpiarDato('Anos');
    $recaptchaResponse = limpiarDato('g-recaptcha-response');

    // 3. Verificaciones de seguridad (reCAPTCHA)
    if (empty($recaptchaResponse)) {
        enviarRespuestaJSON(false, 'Por favor, marque la casilla de "No soy un robot".');
    }

    if (!verificarRecaptcha($recaptchaResponse, $claveSecretaRecaptcha)) {
        enviarRespuestaJSON(false, 'Verificación de seguridad fallida. Inténtelo de nuevo.');
    }

    // 4. Cálculos Matemáticos de Cotización
    $preciosKits = [
        'Kit 1 (4.96 kWp)' => 4607.28,
        'Kit 2 (7.44 kWp)' => 6100.09,
        'Kit 3 (9.92 kWp)' => 7684.59,
        'Kit 4 (12.40 kWp)' => 9745.60,
        'Kit 5 (14.88 kWp)' => 11174.65
    ];
    
    $monto = isset($preciosKits[$servicio]) ? $preciosKits[$servicio] : 0;
    
    if ($monto > 0 && $anos > 0) {
        $abono = $monto * 0.20;
        $restante = $monto - $abono;
        $porcentaje_recargo = 10 * $anos; 
        $recargo = $restante * ($porcentaje_recargo / 100);
        $total = $restante + $recargo;
        
        $meses = $anos * 12;
        $quincenas = $anos * 24;
        
        $cuota_mensual = $total / $meses;
        $cuota_quincenal = $total / $quincenas;
        
        $detalleFinancieroHTML = "
            <h2>Detalle del Proyecto</h2>
            <table>
                <tr><th>Kit Solar Elegido:</th><td>{$servicio}</td></tr>
                <tr><th>Monto Total del Proyecto:</th><td>$" . number_format($monto, 2, '.', ',') . "</td></tr>
                <tr><th>Plazo de Financiamiento:</th><td>{$anos} año(s)</td></tr>
                <tr><th>Abono Inicial (20%):</th><td>$" . number_format($abono, 2, '.', ',') . "</td></tr>
                <tr><th>Saldo a Financiar:</th><td>$" . number_format($restante, 2, '.', ',') . "</td></tr>
                <tr><th>Recargo ($porcentaje_recargo%):</th><td>$" . number_format($recargo, 2, '.', ',') . "</td></tr>
                <tr class='total-row'><th>Total a Pagar en Cuotas:</th><td>$" . number_format($total, 2, '.', ',') . "</td></tr>
            </table>

            <div class='options-box'>
                <h3 style='margin-top:0; color:#2d3748;'>Opciones de Pago</h3>
                <table>
                    <tr><th>Mensual ($meses cuotas):</th><td>$" . number_format($cuota_mensual, 2, '.', ',') . " / mes</td></tr>
                    <tr><th>Quincenal ($quincenas cuotas):</th><td>$" . number_format($cuota_quincenal, 2, '.', ',') . " / quincena</td></tr>
                </table>
            </div>
        ";
    } else {
        $detalleFinancieroHTML = "
            <h2>Detalle del Proyecto</h2>
            <table>
                <tr><th>Servicio Elegido:</th><td>{$servicio}</td></tr>
            </table>
            <p>No aplica para cálculo de financiamiento automático (Servicio personalizado o años no válidos).</p>
        ";
    }

    // 5. Preparar el contenido del correo en HTML
    $asunto = 'NUEVA SOLICITUD DE COTIZACIÓN - Vigi-Solar';
    $htmlMensaje = "
    <!DOCTYPE html>
    <html lang='es'>
    <head>
        <meta charset='UTF-8'>
        <style>
            body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: #333; margin: 0; padding: 20px; background-color: #f4f7f6; }
            .container { max-width: 800px; margin: auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
            h1, h2 { color: #1a365d; text-align: center; }
            .header-logo { text-align: center; margin-bottom: 20px; border-bottom: 2px solid #e63946; padding-bottom: 10px; }
            table { width: 100%; border-collapse: collapse; margin-top: 10px; margin-bottom: 20px; }
            th, td { padding: 12px; text-align: left; border-bottom: 1px solid #eee; }
            th { color: #555; width: 40%; }
            .total-row th, .total-row td { font-weight: bold; color: #000; font-size: 16px; background-color: #f8f9fa; border-top: 2px solid #e63946; }
            .options-box { background-color: #f8f9fa; padding: 15px; border-radius: 5px; border-left: 4px solid #e63946; margin-top: 20px; }
        </style>
    </head>
    <body>
    <div class='container'>
        <div class='header-logo'>
            <h1>Vigi-Solar</h1>
            <p>Nueva Solicitud de Cotización Web</p>
        </div>

        <h2>Datos del Cliente</h2>
        <table>
            <tr><th>Nombre:</th><td>{$nombre}</td></tr>
            <tr><th>Cédula:</th><td>{$cedula}</td></tr>
            <tr><th>Dirección:</th><td>{$direccion}</td></tr>
            <tr><th>Teléfono:</th><td>{$telefono}</td></tr>
            <tr><th>Correo:</th><td>{$email}</td></tr>
        </table>
        
        {$detalleFinancieroHTML}
    </div>
    </body>
    </html>
    ";

    $correoDestino = getenv('SMTP_DESTINATION') ?: 'info@vigisolar.com';

    // 5. Enviar el correo final
    $envioExitoso = enviarCorreoResend($resendApiKey, $correoDestino, $email, $asunto, $htmlMensaje);

    // 6. Evaluar el resultado y responder al cliente
    if ($envioExitoso) {
        enviarRespuestaJSON(true);
    } else {
        enviarRespuestaJSON(false, 'Error al enviar a través de Resend. Inténtelo más tarde.');
    }

} catch (Exception $e) {
    // Capturar cualquier error no previsto de forma silenciosa para el usuario
    enviarRespuestaJSON(false, 'Ha ocurrido un error inesperado. Inténtelo más tarde.');
}

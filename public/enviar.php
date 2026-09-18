<?php
declare(strict_types=1);

require_once __DIR__ . '/../config.php';

/**
 * --- FUNCIONES DE RESPUESTA Y UTILIDAD ---
 */

function enviarRespuestaJSON(bool $exito, string $mensaje = ''): void {
    if (ob_get_length()) {
        ob_clean();
    }
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(['success' => $exito, 'message' => $mensaje]);
    exit;
}

function limpiarDato(string $clave): string {
    return isset($_POST[$clave]) ? trim(htmlspecialchars($_POST[$clave], ENT_QUOTES, 'UTF-8')) : '';
}

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
    if (curl_errno($ch)) {
        return false;
    }
    
    $datosRespuesta = json_decode($respuesta, true);
    return isset($datosRespuesta['success']) && $datosRespuesta['success'] === true;
}

function enviarCorreoResend(string $apiKey, string $destinatario, string $responderA, string $asunto, string $htmlMensaje): bool {
    $url = 'https://api.resend.com/emails';
    $datos = [
        'from' => 'onboarding@resend.dev', 
        'to' => $destinatario,
        'subject' => $asunto,
        'html' => $htmlMensaje
    ];
    if (!empty($responderA)) {
        $datos['reply_to'] = $responderA;
    }
    
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
 * --- LÓGICA DE NEGOCIO ---
 */

function calcularFinanciamiento(string $servicio, int $anos): ?array {
    $preciosKits = [
        'Kit 1 (4.96 kWp)' => 4607.28,
        'Kit 2 (7.44 kWp)' => 6100.09,
        'Kit 3 (9.92 kWp)' => 7684.59,
        'Kit 4 (12.40 kWp)' => 9745.60,
        'Kit 5 (14.88 kWp)' => 11174.65
    ];
    
    $monto = $preciosKits[$servicio] ?? 0;
    
    if ($monto <= 0 || $anos <= 0) {
        return null;
    }
    
    $abono = $monto * 0.20;
    $restante = $monto - $abono;
    $porcentaje_recargo = 10 * $anos; 
    $recargo = $restante * ($porcentaje_recargo / 100);
    $total = $restante + $recargo;
    
    return [
        'monto' => $monto,
        'anos' => $anos,
        'abono' => $abono,
        'restante' => $restante,
        'porcentaje_recargo' => $porcentaje_recargo,
        'recargo' => $recargo,
        'total' => $total,
        'meses' => $anos * 12,
        'quincenas' => $anos * 24,
        'cuota_mensual' => $total / ($anos * 12),
        'cuota_quincenal' => $total / ($anos * 24)
    ];
}

function generarTemplateCorreo(array $cliente, string $servicio, ?array $finanzas): string {
    if ($finanzas) {
        $monto = number_format($finanzas['monto'], 2);
        $abono = number_format($finanzas['abono'], 2);
        $restante = number_format($finanzas['restante'], 2);
        $recargo = number_format($finanzas['recargo'], 2);
        $total = number_format($finanzas['total'], 2);
        $cuota_mensual = number_format($finanzas['cuota_mensual'], 2);
        $cuota_quincenal = number_format($finanzas['cuota_quincenal'], 2);
        
        $detalleFinancieroHTML = "
            <h2>Detalle del Proyecto</h2>
            <table>
                <tr><th>Kit Solar Elegido:</th><td>{$servicio}</td></tr>
                <tr><th>Monto Total del Proyecto:</th><td>\${$monto}</td></tr>
                <tr><th>Plazo de Financiamiento:</th><td>{$finanzas['anos']} año(s)</td></tr>
                <tr><th>Abono Inicial (20%):</th><td>\${$abono}</td></tr>
                <tr><th>Saldo a Financiar:</th><td>\${$restante}</td></tr>
                <tr><th>Recargo ({$finanzas['porcentaje_recargo']}%):</th><td>\${$recargo}</td></tr>
                <tr class='total-row'><th>Total a Pagar en Cuotas:</th><td>\${$total}</td></tr>
            </table>

            <div class='options-box'>
                <h3 style='margin-top:0; color:#2d3748;'>Opciones de Pago</h3>
                <table>
                    <tr><th>Mensual ({$finanzas['meses']} cuotas):</th><td>\${$cuota_mensual} / mes</td></tr>
                    <tr><th>Quincenal ({$finanzas['quincenas']} cuotas):</th><td>\${$cuota_quincenal} / quincena</td></tr>
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

    return "
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
            <tr><th>Nombre:</th><td>{$cliente['nombre']}</td></tr>
            <tr><th>Cédula:</th><td>{$cliente['cedula']}</td></tr>
            <tr><th>Dirección:</th><td>{$cliente['direccion']}</td></tr>
            <tr><th>Teléfono:</th><td>{$cliente['telefono']}</td></tr>

        </table>
        
        {$detalleFinancieroHTML}
    </div>
    </body>
    </html>
    ";
}

/**
 * --- FLUJO PRINCIPAL ---
 */

ob_start();

try {
    $resendApiKey = getenv('RESEND_API_KEY');
    if (empty($resendApiKey)) {
        enviarRespuestaJSON(false, 'Error de configuración del servidor de correos.');
    }

    $claveSecretaRecaptcha = defined('RECAPTCHA_SECRET_KEY') ? RECAPTCHA_SECRET_KEY : '';
    
    $cliente = [
        'nombre'    => limpiarDato('Nombre'),
        'cedula'    => limpiarDato('Cédula'),
        'telefono'  => limpiarDato('Teléfono'),
        'direccion' => limpiarDato('Dirección'),
    ];
    
    $servicio = limpiarDato('Servicio');
    $anos = (int)limpiarDato('Anos');
    $recaptchaResponse = limpiarDato('g-recaptcha-response');

    if (empty($recaptchaResponse)) {
        enviarRespuestaJSON(false, 'Por favor, marque la casilla de "No soy un robot".');
    }

    if (!verificarRecaptcha($recaptchaResponse, $claveSecretaRecaptcha)) {
        enviarRespuestaJSON(false, 'Verificación de seguridad fallida. Inténtelo de nuevo.');
    }

    $finanzas = calcularFinanciamiento($servicio, $anos);
    $htmlMensaje = generarTemplateCorreo($cliente, $servicio, $finanzas);

    $correoDestino = getenv('SMTP_DESTINATION') ?: 'info@vigitecpanama.com';
    $asunto = 'NUEVA SOLICITUD DE COTIZACIÓN - Vigi-Solar';
    
    if (enviarCorreoResend($resendApiKey, $correoDestino, '', $asunto, $htmlMensaje)) {
        enviarRespuestaJSON(true);
    } else {
        enviarRespuestaJSON(false, 'Error al enviar a través de Resend. Inténtelo más tarde.');
    }

} catch (Exception $e) {
    enviarRespuestaJSON(false, 'Ha ocurrido un error inesperado. Inténtelo más tarde.');
}

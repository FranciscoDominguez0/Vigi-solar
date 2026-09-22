import { NextResponse } from 'next/server';
import { Resend } from 'resend';

// Lógica de Financiamiento
function calcularFinanciamiento(servicio: string, anos: number) {
  const preciosKits: Record<string, number> = {
      'Kit 1 (4.96 kWp)': 4607.28,
      'Kit 2 (7.44 kWp)': 6100.09,
      'Kit 3 (9.92 kWp)': 7684.59,
      'Kit 4 (12.40 kWp)': 9745.60,
      'Kit 5 (14.88 kWp)': 11174.65
  };
  
  const monto = preciosKits[servicio] || 0;
  
  if (monto <= 0 || anos <= 0) {
      return null;
  }
  
  const abono = monto * 0.20;
  const restante = monto - abono;
  const porcentaje_recargo = 10 * anos; 
  const recargo = restante * (porcentaje_recargo / 100);
  const total = restante + recargo;
  
  return {
      monto,
      anos,
      abono,
      restante,
      porcentaje_recargo,
      recargo,
      total,
      meses: anos * 12,
      quincenas: anos * 24,
      cuota_mensual: total / (anos * 12),
      cuota_quincenal: total / (anos * 24)
  };
}

// eslint-disable-next-line @typescript-eslint/no-explicit-any
function generarTemplateCorreo(cliente: any, servicio: string, finanzas: any) {
  let detalleFinancieroHTML = '';

  if (finanzas) {
      const formatNum = (num: number) => Number(num).toFixed(2);
      
      detalleFinancieroHTML = `
          <h2>Detalle del Proyecto</h2>
          <table>
              <tr><th>Kit Solar Elegido:</th><td>${servicio}</td></tr>
              <tr><th>Monto Total del Proyecto:</th><td>$${formatNum(finanzas.monto)}</td></tr>
              <tr><th>Plazo de Financiamiento:</th><td>${finanzas.anos} año(s)</td></tr>
              <tr><th>Abono Inicial (20%):</th><td>$${formatNum(finanzas.abono)}</td></tr>
              <tr><th>Saldo a Financiar:</th><td>$${formatNum(finanzas.restante)}</td></tr>
              <tr><th>Recargo (${finanzas.porcentaje_recargo}%):</th><td>$${formatNum(finanzas.recargo)}</td></tr>
              <tr class='total-row'><th>Total a Pagar en Cuotas:</th><td>$${formatNum(finanzas.total)}</td></tr>
          </table>

          <div class='options-box'>
              <h3 style='margin-top:0; color:#2d3748;'>Opciones de Pago</h3>
              <table>
                  <tr><th>Mensual (${finanzas.meses} cuotas):</th><td>$${formatNum(finanzas.cuota_mensual)} / mes</td></tr>
                  <tr><th>Quincenal (${finanzas.quincenas} cuotas):</th><td>$${formatNum(finanzas.cuota_quincenal)} / quincena</td></tr>
              </table>
          </div>
      `;
  } else {
      detalleFinancieroHTML = `
          <h2>Detalle del Proyecto</h2>
          <table>
              <tr><th>Servicio Elegido:</th><td>${servicio}</td></tr>
          </table>
          <p>No aplica para cálculo de financiamiento automático (Servicio personalizado o años no válidos).</p>
      `;
  }

  return `
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
          <tr><th>Nombre:</th><td>${cliente.nombre}</td></tr>
          <tr><th>Cédula:</th><td>${cliente.cedula}</td></tr>
          <tr><th>Dirección:</th><td>${cliente.direccion}</td></tr>
          <tr><th>Teléfono:</th><td>${cliente.telefono}</td></tr>
      </table>
      
      ${detalleFinancieroHTML}
  </div>
  </body>
  </html>
  `;
}

export async function POST(req: Request) {
  try {
    const resendApiKey = process.env.RESEND_API_KEY;
    if (!resendApiKey) {
      return NextResponse.json({ success: false, message: 'Error de configuración del servidor de correos.' });
    }

    const resend = new Resend(resendApiKey);
    const recaptchaSecretKey = process.env.RECAPTCHA_SECRET_KEY || '';
    
    const body = await req.json();

    const cliente = {
      nombre: (body.Nombre || '').trim(),
      cedula: (body['Cédula'] || '').trim(),
      telefono: (body['Teléfono'] || '').trim(),
      direccion: (body['Dirección'] || '').trim()
    };
    
    const servicio = (body.Servicio || '').trim();
    const anos = parseInt(body.Anos || '0', 10);
    const recaptchaResponse = body['g-recaptcha-response'] || '';

    if (!recaptchaResponse) {
      return NextResponse.json({ success: false, message: 'Por favor, marque la casilla de "No soy un robot".' });
    }

    // Verificar reCAPTCHA
    if (recaptchaSecretKey) {
      const verifyUrl = 'https://www.google.com/recaptcha/api/siteverify';
      const verifyResponse = await fetch(verifyUrl, {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: new URLSearchParams({
          secret: recaptchaSecretKey,
          response: recaptchaResponse
        })
      });
      const verifyData = await verifyResponse.json();
      if (!verifyData.success) {
        return NextResponse.json({ success: false, message: 'Verificación de seguridad fallida. Inténtelo de nuevo.' });
      }
    }

    const finanzas = calcularFinanciamiento(servicio, anos);
    const htmlMensaje = generarTemplateCorreo(cliente, servicio, finanzas);
    
    const correoDestino = process.env.SMTP_DESTINATION || 'info@vigitecpanama.com';
    const asunto = 'NUEVA SOLICITUD DE COTIZACIÓN - Vigi-Solar';

    const result = await resend.emails.send({
      from: 'onboarding@resend.dev',
      to: correoDestino,
      subject: asunto,
      html: htmlMensaje
    });

    if (result.error) {
      console.error(result.error);
      return NextResponse.json({ success: false, message: 'Error al enviar a través de Resend. Inténtelo más tarde.' });
    }

    return NextResponse.json({ success: true, message: '' });
  } catch (error) {
    console.error(error);
    return NextResponse.json({ success: false, message: 'Ha ocurrido un error inesperado. Inténtelo más tarde.' });
  }
}

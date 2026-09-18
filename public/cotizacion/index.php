<?php
require_once __DIR__ . '/../../config.php';
$current_page = 'cotizacion';
$page_title = 'Solicitar Cotización - Vigi-Solar';
$page_description = 'Solicita una cotización sin compromiso de tu kit de energía solar. Comienza a ahorrar con Vigi-Solar hoy mismo.';
$page_keywords = 'cotización paneles solares, precio kit solar, instalación solar panamá';
$page_url = 'https://vigisolar.com/cotizacion/';

$kit_seleccionado = isset($_GET['kit']) ? $_GET['kit'] : '';
$kit_opciones = [
  'Kit-4.96kWp' => 'Kit 1 (4.96 kWp)',
  'Kit-7.44kWp' => 'Kit 2 (7.44 kWp)',
  'Kit-9.92kWp' => 'Kit 3 (9.92 kWp)',
  'Kit-12.40kWp' => 'Kit 4 (12.40 kWp)',
  'Kit-14.88kWp' => 'Kit 5 (14.88 kWp)'
];
$opcion_preseleccionada = isset($kit_opciones[$kit_seleccionado]) ? $kit_opciones[$kit_seleccionado] : '';
?>
<!DOCTYPE html>
<html lang="es" class="scroll-smooth" style="background-color: #0a0a0a; color: #ffffff;">
<head>
  <?php include '../includes/head.php'; ?>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body class="bg-light text-gray-800 font-sans antialiased selection:bg-accent selection:text-white">

  <?php include '../includes/header.php'; ?>

  <section class="py-10 relative overflow-hidden bg-[url('/assets/img/hero/servicios_bg.png')] bg-cover bg-center bg-no-repeat bg-fixed">
    <!-- Destello rojo decorativo sutil -->
    <div class="absolute top-1/2 right-1/4 w-96 h-96 bg-accent/20 rounded-full blur-[100px] pointer-events-none hidden lg:block"></div>

    <div class="container mx-auto px-4 max-w-6xl relative z-10">
      <div class="flex flex-col lg:flex-row items-center gap-10 lg:gap-12">
        
        <!-- Lado Izquierdo: Contenido de Texto -->
        <div class="lg:w-1/2 text-center lg:text-left">
          <h2 class="text-4xl lg:text-5xl font-extrabold text-white uppercase tracking-widest font-display mb-6 leading-tight">
            Protegemos <span class="text-accent">lo que más importa</span>
          </h2>
          <p class="text-gray-300 text-xl font-medium mb-4">
            Solicita tu cotización rellenando el formulario que ves aquí.
          </p>
          <p class="text-gray-400 text-base leading-relaxed max-w-lg mx-auto lg:mx-0 mb-6">
            Nuestros servicios de monitoreo le permite vivir más tranquilo su día a día sabiendo que cuidamos de usted y su familia en todo momento. 
          </p>
          <div class="hidden lg:block w-20 h-1 bg-accent rounded-full"></div>
        </div>

        <!-- Lado Derecho: Formulario de Cotización -->
        <div class="lg:w-1/2 w-full">
          <div id="form-container" class="bg-[#1A1A1A]/95 backdrop-blur-md p-6 lg:p-8 shadow-[0_20px_50px_rgba(0,0,0,0.7)] rounded-lg border border-gray-700/50 relative">
            
            <!-- Alerta Personalizada de Error (Toast) -->
            <div id="custom-error-toast" class="absolute top-4 left-1/2 transform -translate-x-1/2 bg-accent text-white px-5 py-3 rounded-md shadow-red-glow font-medium text-sm flex items-center z-50 transition-all duration-300 opacity-0 pointer-events-none translate-y-[-10px] w-11/12 md:w-auto md:max-w-md text-center">
              <svg class="w-5 h-5 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
              <span id="custom-error-message"></span>
            </div>

            <!-- Alerta Personalizada de Éxito (Toast) -->
            <div id="custom-success-toast" class="absolute top-4 left-1/2 transform -translate-x-1/2 bg-[#111111] border border-accent text-white px-6 py-4 rounded-lg shadow-red-glow font-medium text-sm flex items-center z-50 transition-all duration-300 opacity-0 pointer-events-none translate-y-[-10px] w-11/12 md:w-auto md:max-w-md text-center">
              <div class="bg-accent/20 p-2 rounded-full mr-3">
                <svg class="w-5 h-5 flex-shrink-0 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
              </div>
              <div class="text-left">
                <span id="custom-success-message" class="text-[15px] font-semibold tracking-wide">¡Cotización enviada exitosamente!</span>
              </div>
            </div>

            <form id="cotizacion-form" class="space-y-5 transition-opacity duration-300" action="/enviar.php" method="POST">
              
              <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                  <input type="text" name="Nombre" class="w-full p-4 bg-[#111111] border border-gray-700 text-white focus:outline-none focus:border-accent focus:ring-1 focus:ring-accent transition-all shadow-inner placeholder-gray-500 font-medium rounded" placeholder="Nombre Completo*" required>
                </div>
                <div>
                  <input type="text" name="Cédula" class="w-full p-4 bg-[#111111] border border-gray-700 text-white focus:outline-none focus:border-accent focus:ring-1 focus:ring-accent transition-all shadow-inner placeholder-gray-500 font-medium rounded" placeholder="Cédula*" required>
                </div>
              </div>
              
              <div class="w-full">
                <input type="tel" name="Teléfono" class="w-full p-4 bg-[#111111] border border-gray-700 text-white focus:outline-none focus:border-accent focus:ring-1 focus:ring-accent transition-all shadow-inner placeholder-gray-500 font-medium rounded" placeholder="Teléfono*" required>
              </div>

              <div>
                <input type="text" name="Dirección" class="w-full p-4 bg-[#111111] border border-gray-700 text-white focus:outline-none focus:border-accent focus:ring-1 focus:ring-accent transition-all shadow-inner placeholder-gray-500 font-medium rounded" placeholder="Dirección Exacta*" required>
              </div>
              
              <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                  <select id="servicio-select" name="Servicio" class="w-full p-4 bg-[#111111] border border-gray-700 text-white focus:outline-none focus:border-accent focus:ring-1 focus:ring-accent transition-all shadow-inner appearance-none cursor-pointer text-gray-500 focus:text-white font-medium rounded" required onchange="this.classList.remove('text-gray-500'); this.classList.add('text-white');">
                    <option value="" disabled <?= empty($opcion_preseleccionada) ? 'selected' : '' ?>>Kit Elegido*</option>
                    <option value="Kit 1 (4.96 kWp)" class="text-white" <?= $opcion_preseleccionada === 'Kit 1 (4.96 kWp)' ? 'selected' : '' ?>>Kit 1 (4.96 kWp)</option>
                    <option value="Kit 2 (7.44 kWp)" class="text-white" <?= $opcion_preseleccionada === 'Kit 2 (7.44 kWp)' ? 'selected' : '' ?>>Kit 2 (7.44 kWp)</option>
                    <option value="Kit 3 (9.92 kWp)" class="text-white" <?= $opcion_preseleccionada === 'Kit 3 (9.92 kWp)' ? 'selected' : '' ?>>Kit 3 (9.92 kWp)</option>
                    <option value="Kit 4 (12.40 kWp)" class="text-white" <?= $opcion_preseleccionada === 'Kit 4 (12.40 kWp)' ? 'selected' : '' ?>>Kit 4 (12.40 kWp)</option>
                    <option value="Kit 5 (14.88 kWp)" class="text-white" <?= $opcion_preseleccionada === 'Kit 5 (14.88 kWp)' ? 'selected' : '' ?>>Kit 5 (14.88 kWp)</option>
                  </select>
                  <?php if (!empty($opcion_preseleccionada)): ?>
                  <script>
                    document.getElementById('servicio-select').classList.remove('text-gray-500');
                    document.getElementById('servicio-select').classList.add('text-white');
                  </script>
                  <?php endif; ?>
                </div>
                <div>
                  <select name="Anos" class="w-full p-4 bg-[#111111] border border-gray-700 text-white focus:outline-none focus:border-accent focus:ring-1 focus:ring-accent transition-all shadow-inner placeholder-gray-500 font-medium rounded appearance-none" required>
                    <option value="" disabled selected>Años a Financiar*</option>
                    <option value="1">1 Año</option>
                    <option value="2">2 Años</option>
                  </select>
                </div>
              </div>
              
              <!-- reCAPTCHA Oficial de Google -->
              <div class="flex items-center justify-center pt-2">
                <div class="g-recaptcha" data-sitekey="<?= htmlspecialchars(RECAPTCHA_SITE_KEY) ?>" data-theme="dark"></div>
              </div>

              <div class="pt-2">
                <button id="submit-btn" type="submit" class="w-full px-6 py-4 bg-white text-primary font-bold tracking-wider uppercase hover:bg-accent hover:text-white transition-colors duration-300 shadow-[0_0_20px_rgba(255,255,255,0.1)] hover:shadow-[0_0_30px_rgba(230,57,70,0.4)] flex items-center justify-center group relative overflow-hidden rounded">
                  <span id="btn-text">Solicitar Cotización</span>
                  <svg id="btn-icon" class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                  <!-- Spinner de Carga (Oculto por defecto) -->
                  <svg id="btn-spinner" class="hidden animate-spin ml-3 h-5 w-5 text-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                </button>
              </div>
              
            </form>
            
            <!-- Lógica de Envio de Formulario extraída a /assets/js/cotizacion.js -->
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <?php include '../includes/footer.php'; ?>
  <?php include '../includes/whatsapp.php'; ?>

  <script src="/assets/js/main.js"></script>
  <script src="/assets/js/cotizacion.js"></script>
</body>
</html>

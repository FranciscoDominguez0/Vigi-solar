<?php
$current_page = 'inicio';
$page_title = 'Vigi-Solar - Kits de Energía Solar';
$page_description = 'Vigi-Solar - Especialistas en energía solar. Kits de paneles solares, instalación y cotizaciones rápidas sin compromiso.';
$page_keywords = 'paneles solares, energía solar, kits solares panamá, cotización paneles solares';
$page_url = 'https://vigisolar.com/';
?>
<!DOCTYPE html>
<html lang="es" class="scroll-smooth" style="background-color: #0a0a0a; color: #ffffff;">
<head>
  <?php include 'includes/head.php'; ?>
</head>
<body class="bg-white text-gray-800 font-sans antialiased selection:bg-accent selection:text-white">

  <?php include 'includes/header.php'; ?>

  <!-- ==================== SECCIÓN PRINCIPAL (HERO) ==================== -->
  <section class="relative overflow-hidden pt-16 pb-24 lg:pt-24 lg:pb-32 bg-[#0a0a0a] bg-cover bg-center bg-no-repeat" style="background-image: url('/assets/img/hero/servicios_bg.png');">
    <!-- Fondo Decorativo Abstracto -->
    <div class="absolute top-0 right-0 w-1/2 h-full bg-accent rounded-l-[100px] opacity-10 hidden lg:block"></div>
    
    <div class="container mx-auto px-4 max-w-7xl relative z-10 flex flex-col lg:flex-row items-center">
      
      <!-- Contenido Izquierdo (Texto y Botones) -->
      <div class="w-full lg:w-1/2 lg:pr-12 text-center lg:text-left mb-16 lg:mb-0">
        <h1 class="text-5xl lg:text-7xl font-extrabold font-display leading-tight mb-6 tracking-tight text-white">
          Energía Limpia, <br/><span class="text-accent relative inline-block">Ahorro Inteligente</span>
          <span class="sr-only"> con Kits de Paneles Solares</span>
        </h1>
        
        <p class="text-gray-400 text-lg lg:text-xl font-light max-w-lg mx-auto lg:mx-0 mb-10 leading-relaxed">
          Sistemas de paneles solares diseñados para tu hogar o negocio. Comienza a ahorrar hoy mismo con nuestros kits listos para instalar.
        </p>
        
        <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start space-y-4 sm:space-y-0 sm:space-x-4">
          <a href="#kits" class="w-full sm:w-auto bg-accent text-white px-8 py-4 rounded-full font-semibold hover:bg-accentHover transition-all duration-300 flex items-center justify-center shadow-red-glow">
            Ver Kits Solares
          </a>
        </div>
      </div>
      
      <!-- Contenido Derecho (Imagen Decorativa) -->
      <div class="w-full lg:w-1/2 relative mt-16 lg:mt-0">
        <div class="relative w-full max-w-xl mx-auto lg:-mr-10">
          
          <!-- Cuadros Decorativos (Líneas y acentos) -->
          <div class="absolute -top-6 -left-6 w-32 h-32 border-4 border-accent rounded-3xl opacity-50 z-0 hidden lg:block"></div>
          <div class="absolute -bottom-8 -right-8 w-40 h-40 bg-accent rounded-full z-0 opacity-20"></div>

          <!-- Imagen Principal de la Casa en Caja -->
          <div class="relative z-10 w-full overflow-hidden rounded-[2rem] shadow-2xl border-4 border-gray-800 bg-gray-900 flex items-center justify-center aspect-square">
             <img src="/assets/img/hero/hero_house.jpg?v=2" alt="Casa con Paneles Solares" class="w-full h-full object-cover">
          </div>

        </div>
      </div>
      </div>
      
    </div>
  </section>

  <!-- ==================== KITS SOLARES ==================== -->
  <section id="kits" class="py-24 bg-[#111111]">
    <div class="container mx-auto px-4 max-w-6xl">
      
      <div class="text-center mb-20">
        <h4 class="text-accent font-bold tracking-widest uppercase text-sm mb-4">Nuestras Soluciones</h4>
        <h2 class="text-3xl lg:text-4xl font-display font-bold text-white mb-6 tracking-tight">Kits de Paneles Solares</h2>
        <div class="w-16 h-1 bg-gray-800 mx-auto rounded-full relative overflow-hidden">
          <div class="absolute top-0 left-0 w-8 h-full bg-accent"></div>
        </div>
        <p class="text-gray-400 mt-6 max-w-2xl mx-auto">Encuentra el sistema ideal para tus necesidades energéticas. Ofrecemos kits completos con instalación profesional incluida.</p>
      </div>

      <!-- Cuadrícula de Kits -->
      <div class="grid grid-cols-1 gap-12">
        
        <!-- Kit 1: 4.96 kWp -->
        <div class="bg-[#1a1a1a] border border-gray-800 rounded-2xl overflow-hidden hover:border-accent transition-colors duration-500 group flex flex-col md:flex-row h-full items-stretch">
          <div class="w-full md:w-2/5">
            <img src="/assets/img/hero/kit_1.jpeg" alt="Kit 1 (4.96 kWp)" class="w-full h-auto md:h-full object-cover">
          </div>
          <div class="p-8 flex flex-col w-full md:w-3/5">
            <div class="mb-6">
              <h3 class="text-2xl font-bold text-white font-display mb-2">Kit 1 <span class="text-xl font-medium text-gray-500 ml-2">4.96 kWp</span></h3>
              <p class="text-accent font-semibold text-lg">Ahorro hasta $140.00 / mes (627 kWh)</p>
            </div>
            <p class="text-gray-400 mb-6 text-sm">El sistema es "todo incluido" y conectado a la red. Precio desde <strong>$4,607.28</strong>.</p>
            <ul class="text-gray-400 font-light space-y-3 mb-8 grid grid-cols-1 sm:grid-cols-2 gap-x-4">
              <li class="flex items-center"><svg class="w-5 h-5 text-accent mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> 8 Paneles solares</li>
              <li class="flex items-center"><svg class="w-5 h-5 text-accent mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> 2 Microinversores</li>
              <li class="flex items-center"><svg class="w-5 h-5 text-accent mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Estructura de montaje</li>
              <li class="flex items-center"><svg class="w-5 h-5 text-accent mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Medidor y equipos eléctricos</li>
            </ul>
            <a href="/cotizacion/?kit=Kit-4.96kWp" class="mt-auto w-full md:w-auto self-start text-center bg-gray-800 text-white px-8 py-3 rounded-xl font-semibold group-hover:bg-accent group-hover:text-white transition-all duration-300 shadow-lg">
              Cotizar este Kit
            </a>
          </div>
        </div>

        <!-- Kit 2: 7.44 kWp -->
        <div class="bg-[#1a1a1a] border border-gray-800 rounded-2xl overflow-hidden hover:border-accent transition-colors duration-500 group flex flex-col md:flex-row-reverse h-full items-stretch">
          <div class="w-full md:w-2/5">
            <img src="/assets/img/hero/kit_2.jpeg" alt="Kit 2 (7.44 kWp)" class="w-full h-auto md:h-full object-cover">
          </div>
          <div class="p-8 flex flex-col w-full md:w-3/5">
            <div class="mb-6 mt-4 md:mt-0">
              <h3 class="text-2xl font-bold text-white font-display mb-2">Kit 2 <span class="text-xl font-medium text-gray-500 ml-2">7.44 kWp</span></h3>
              <p class="text-accent font-semibold text-lg">Ahorro hasta $220.00 / mes (941 kWh)</p>
            </div>
            <p class="text-gray-400 mb-6 text-sm">El sistema es "todo incluido" y conectado a la red. Precio desde <strong>$6,100.09</strong>.</p>
            <ul class="text-gray-400 font-light space-y-3 mb-8 grid grid-cols-1 sm:grid-cols-2 gap-x-4">
              <li class="flex items-center"><svg class="w-5 h-5 text-accent mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> 12 Paneles solares</li>
              <li class="flex items-center"><svg class="w-5 h-5 text-accent mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> 3 Microinversores</li>
              <li class="flex items-center"><svg class="w-5 h-5 text-accent mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Estructura de montaje</li>
              <li class="flex items-center"><svg class="w-5 h-5 text-accent mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Medidor y equipos eléctricos</li>
            </ul>
            <a href="/cotizacion/?kit=Kit-7.44kWp" class="mt-auto w-full md:w-auto self-start text-center bg-gray-800 text-white px-8 py-3 rounded-xl font-semibold group-hover:bg-accent group-hover:text-white transition-all duration-300 shadow-lg">
              Cotizar este Kit
            </a>
          </div>
        </div>

        <!-- Kit 3: 9.92 kWp -->
        <div class="bg-[#1a1a1a] border border-gray-800 rounded-2xl overflow-hidden hover:border-accent transition-colors duration-500 group flex flex-col md:flex-row h-full items-stretch">
          <div class="w-full md:w-2/5">
            <img src="/assets/img/hero/kit_3.jpeg" alt="Kit 3 (9.92 kWp)" class="w-full h-auto md:h-full object-cover">
          </div>
          <div class="p-8 flex flex-col w-full md:w-3/5">
            <div class="mb-6">
              <h3 class="text-2xl font-bold text-white font-display mb-2">Kit 3 <span class="text-xl font-medium text-gray-500 ml-2">9.92 kWp</span></h3>
              <p class="text-accent font-semibold text-lg">Ahorro hasta $300.00 / mes (1255 kWh)</p>
            </div>
            <p class="text-gray-400 mb-6 text-sm">El sistema es "todo incluido" y conectado a la red. Precio desde <strong>$7,684.59</strong>.</p>
            <ul class="text-gray-400 font-light space-y-3 mb-8 grid grid-cols-1 sm:grid-cols-2 gap-x-4">
              <li class="flex items-center"><svg class="w-5 h-5 text-accent mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> 16 Paneles solares</li>
              <li class="flex items-center"><svg class="w-5 h-5 text-accent mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> 4 Microinversores</li>
              <li class="flex items-center"><svg class="w-5 h-5 text-accent mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Estructura de montaje</li>
              <li class="flex items-center"><svg class="w-5 h-5 text-accent mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Medidor y equipos eléctricos</li>
            </ul>
            <a href="/cotizacion/?kit=Kit-9.92kWp" class="mt-auto w-full md:w-auto self-start text-center bg-gray-800 text-white px-8 py-3 rounded-xl font-semibold group-hover:bg-accent group-hover:text-white transition-all duration-300 shadow-lg">
              Cotizar este Kit
            </a>
          </div>
        </div>

        <!-- Kit 4: 12.40 kWp -->
        <div class="bg-[#1a1a1a] border border-gray-800 rounded-2xl overflow-hidden hover:border-accent transition-colors duration-500 group flex flex-col md:flex-row-reverse h-full items-stretch">
          <div class="w-full md:w-2/5">
            <img src="/assets/img/hero/kit_4.jpeg" alt="Kit 4 (12.40 kWp)" class="w-full h-auto md:h-full object-cover">
          </div>
          <div class="p-8 flex flex-col w-full md:w-3/5">
            <div class="mb-6 mt-4 md:mt-0">
              <h3 class="text-2xl font-bold text-white font-display mb-2">Kit 4 <span class="text-xl font-medium text-gray-500 ml-2">12.40 kWp</span></h3>
              <p class="text-accent font-semibold text-lg">Ahorro hasta $400.00 / mes (1569 kWh)</p>
            </div>
            <p class="text-gray-400 mb-6 text-sm">El sistema es "todo incluido" y conectado a la red. Precio desde <strong>$9,745.60</strong>.</p>
            <ul class="text-gray-400 font-light space-y-3 mb-8 grid grid-cols-1 sm:grid-cols-2 gap-x-4">
              <li class="flex items-center"><svg class="w-5 h-5 text-accent mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> 20 Paneles solares</li>
              <li class="flex items-center"><svg class="w-5 h-5 text-accent mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> 5 Microinversores</li>
              <li class="flex items-center"><svg class="w-5 h-5 text-accent mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Estructura de montaje</li>
              <li class="flex items-center"><svg class="w-5 h-5 text-accent mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Medidor y equipos eléctricos</li>
            </ul>
            <a href="/cotizacion/?kit=Kit-12.40kWp" class="mt-auto w-full md:w-auto self-start text-center bg-gray-800 text-white px-8 py-3 rounded-xl font-semibold group-hover:bg-accent group-hover:text-white transition-all duration-300 shadow-lg">
              Cotizar este Kit
            </a>
          </div>
        </div>

        <!-- Kit 5: 14.88 kWp -->
        <div class="bg-[#1a1a1a] border border-gray-800 rounded-2xl overflow-hidden hover:border-accent transition-colors duration-500 group flex flex-col md:flex-row h-full items-stretch">
          <div class="w-full md:w-2/5">
            <img src="/assets/img/hero/kit_5.jpeg" alt="Kit 5 (14.88 kWp)" class="w-full h-auto md:h-full object-cover">
          </div>
          <div class="p-8 flex flex-col w-full md:w-3/5">
            <div class="mb-6">
              <h3 class="text-2xl font-bold text-white font-display mb-2">Kit 5 <span class="text-xl font-medium text-gray-500 ml-2">14.88 kWp</span></h3>
              <p class="text-accent font-semibold text-lg">Ahorro hasta $490.00 / mes (1882 kWh)</p>
            </div>
            <p class="text-gray-400 mb-6 text-sm">El sistema es "todo incluido" y conectado a la red. Precio desde <strong>$11,174.65</strong>.</p>
            <ul class="text-gray-400 font-light space-y-3 mb-8 grid grid-cols-1 sm:grid-cols-2 gap-x-4">
              <li class="flex items-center"><svg class="w-5 h-5 text-accent mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> 24 Paneles solares</li>
              <li class="flex items-center"><svg class="w-5 h-5 text-accent mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> 6 Microinversores</li>
              <li class="flex items-center"><svg class="w-5 h-5 text-accent mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Estructura de montaje</li>
              <li class="flex items-center"><svg class="w-5 h-5 text-accent mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Medidor y equipos eléctricos</li>
            </ul>
            <a href="/cotizacion/?kit=Kit-14.88kWp" class="mt-auto w-full md:w-auto self-start text-center bg-gray-800 text-white px-8 py-3 rounded-xl font-semibold group-hover:bg-accent group-hover:text-white transition-all duration-300 shadow-lg">
              Cotizar este Kit
            </a>
          </div>
        </div>

      </div>

    </div>
  </section>

  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/whatsapp.php'; ?>

  <script src="/assets/js/main.js"></script>
</body>
</html>

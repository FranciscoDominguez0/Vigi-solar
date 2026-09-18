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
  <section class="relative overflow-hidden pt-16 pb-24 lg:pt-24 lg:pb-32 bg-[#0a0a0a]">
    <!-- Fondo Decorativo Abstracto -->
    <div class="absolute top-0 right-0 w-1/2 h-full bg-accent rounded-l-[100px] opacity-10 hidden lg:block"></div>
    
    <div class="container mx-auto px-4 max-w-7xl relative z-10 flex flex-col lg:flex-row items-center">
      
      <!-- Contenido Izquierdo (Texto y Botones) -->
      <div class="w-full lg:w-1/2 lg:pr-12 text-center lg:text-left mb-16 lg:mb-0">
        <h1 class="text-5xl lg:text-6xl xl:text-7xl font-display font-extrabold text-white leading-[1.1] mb-6 tracking-tight mt-10">
          Energía Limpia, <br>
          <span class="text-accent">Ahorro Inteligente.</span>
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
      <div class="w-full lg:w-1/2 relative">
        <div class="relative w-full max-w-md mx-auto">
          <!-- Cuadro Decorativo Superior -->
          <div class="absolute -top-6 -left-6 w-24 h-24 border-4 border-accent rounded-3xl opacity-50"></div>
          <div class="absolute -bottom-8 -right-8 w-32 h-32 bg-accent rounded-full z-0 opacity-20"></div>
          
          <!-- Imagen Principal -->
          <div class="relative z-10 w-full aspect-[4/5] overflow-hidden rounded-[2rem] rounded-tr-none shadow-2xl border-4 border-gray-800 bg-gray-900 flex items-center justify-center">
             <img src="/assets/img/hero/hero_solar.jpg" alt="Paneles Solares" class="w-full h-full object-cover">
          </div>
          
          <!-- Etiqueta Flotante -->
          <div class="absolute bottom-4 left-4 sm:bottom-10 sm:-left-8 lg:-left-20 bg-white p-4 rounded-2xl shadow-xl z-20 flex items-center space-x-4">
            <div class="bg-red-100 p-3 rounded-full text-accent">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
            </div>
            <div>
              <p class="text-sm font-bold text-gray-900">Energía 100%</p>
              <p class="text-xs text-gray-500">Renovable</p>
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
          <div class="w-full md:w-2/5 h-64 md:h-auto">
            <img src="/assets/img/hero/kit_1.jpeg" alt="Kit 1 (4.96 kWp)" class="w-full h-full object-cover">
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
              <li class="flex items-center"><svg class="w-5 h-5 text-accent mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Medidor y equipos eléc.</li>
            </ul>
            <a href="/cotizacion/?kit=Kit-4.96kWp" class="mt-auto w-full md:w-auto self-start text-center bg-gray-800 text-white px-8 py-3 rounded-xl font-semibold group-hover:bg-accent group-hover:text-white transition-all duration-300 shadow-lg">
              Cotizar este Kit
            </a>
          </div>
        </div>

        <!-- Kit 2: 7.44 kWp (RECOMENDADO) -->
        <div class="bg-[#240a0c] border-2 border-accent rounded-2xl overflow-hidden shadow-[0_0_40px_rgba(230,57,70,0.25)] flex flex-col md:flex-row-reverse h-full items-stretch relative transform md:scale-[1.02] transition-transform duration-500 z-10">
          <div class="absolute top-0 right-0 bg-accent text-white text-sm font-bold uppercase tracking-widest py-2 px-6 rounded-bl-2xl rounded-tr-2xl z-20 shadow-lg flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path></svg>
            Nuestra Recomendación
          </div>
          <div class="w-full md:w-2/5 h-64 md:h-auto relative">
            <div class="absolute inset-0 bg-gradient-to-t from-[#240a0c] to-transparent z-10 md:hidden"></div>
            <img src="/assets/img/hero/kit_2.jpeg" alt="Kit 2 (7.44 kWp)" class="w-full h-full object-cover">
          </div>
          <div class="p-8 md:p-10 flex flex-col w-full md:w-3/5 relative z-20">
            <div class="mb-6 mt-4 md:mt-0">
              <h3 class="text-3xl font-extrabold text-white font-display mb-2">Kit 2 <span class="text-2xl font-medium text-gray-500 ml-2">7.44 kWp</span></h3>
              <p class="text-accent font-semibold text-xl">Ahorro hasta $220.00 / mes (941 kWh)</p>
            </div>
            <p class="text-gray-300 mb-6 text-base font-medium">El sistema ideal para la mayoría de los hogares. "Todo incluido" y conectado a la red. Precio desde <span class="text-3xl font-bold text-white block mt-2">$6,100.09</span></p>
            <ul class="text-gray-300 font-medium space-y-4 mb-8 grid grid-cols-1 sm:grid-cols-2 gap-x-4">
              <li class="flex items-center"><svg class="w-6 h-6 text-accent mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> 12 Paneles solares</li>
              <li class="flex items-center"><svg class="w-6 h-6 text-accent mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> 3 Microinversores</li>
              <li class="flex items-center"><svg class="w-6 h-6 text-accent mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Estructura de montaje</li>
              <li class="flex items-center"><svg class="w-6 h-6 text-accent mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Medidor y equipos eléc.</li>
            </ul>
            <a href="/cotizacion/?kit=Kit-7.44kWp" class="mt-auto w-full md:w-auto self-start text-center bg-accent text-white px-10 py-4 rounded-xl font-bold text-lg hover:bg-white hover:text-accent transition-all duration-300 shadow-[0_0_20px_rgba(230,57,70,0.5)]">
              Cotizar este Kit Recomendado
            </a>
          </div>
        </div>

        <!-- Kit 3: 9.92 kWp -->
        <div class="bg-[#1a1a1a] border border-gray-800 rounded-2xl overflow-hidden hover:border-accent transition-colors duration-500 group flex flex-col md:flex-row h-full items-stretch">
          <div class="w-full md:w-2/5 h-64 md:h-auto">
            <img src="/assets/img/hero/kit_3.jpeg" alt="Kit 3 (9.92 kWp)" class="w-full h-full object-cover">
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
              <li class="flex items-center"><svg class="w-5 h-5 text-accent mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Medidor y equipos eléc.</li>
            </ul>
            <a href="/cotizacion/?kit=Kit-9.92kWp" class="mt-auto w-full md:w-auto self-start text-center bg-gray-800 text-white px-8 py-3 rounded-xl font-semibold group-hover:bg-accent group-hover:text-white transition-all duration-300 shadow-lg">
              Cotizar este Kit
            </a>
          </div>
        </div>

        <!-- Kit 4: 12.40 kWp -->
        <div class="bg-[#1a1a1a] border border-gray-800 rounded-2xl overflow-hidden hover:border-accent transition-colors duration-500 group flex flex-col md:flex-row-reverse h-full items-stretch">
          <div class="w-full md:w-2/5 h-64 md:h-auto">
            <img src="/assets/img/hero/kit_4.jpeg" alt="Kit 4 (12.40 kWp)" class="w-full h-full object-cover">
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
              <li class="flex items-center"><svg class="w-5 h-5 text-accent mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Medidor y equipos eléc.</li>
            </ul>
            <a href="/cotizacion/?kit=Kit-12.40kWp" class="mt-auto w-full md:w-auto self-start text-center bg-gray-800 text-white px-8 py-3 rounded-xl font-semibold group-hover:bg-accent group-hover:text-white transition-all duration-300 shadow-lg">
              Cotizar este Kit
            </a>
          </div>
        </div>

        <!-- Kit 5: 14.88 kWp -->
        <div class="bg-[#1a1a1a] border border-gray-800 rounded-2xl overflow-hidden hover:border-accent transition-colors duration-500 group flex flex-col md:flex-row h-full items-stretch">
          <div class="w-full md:w-2/5 h-64 md:h-auto">
            <img src="/assets/img/hero/kit_5.jpeg" alt="Kit 5 (14.88 kWp)" class="w-full h-full object-cover">
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
              <li class="flex items-center"><svg class="w-5 h-5 text-accent mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Medidor y equipos eléc.</li>
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

import Link from "next/link";
import Image from "next/image";

export default function Home() {
  return (
    <>
      {/* ==================== SECCIÓN PRINCIPAL (HERO) ==================== */}
      <section 
        className="relative overflow-hidden pt-16 pb-24 lg:pt-24 lg:pb-32 bg-[#0a0a0a] bg-cover bg-center bg-no-repeat" 
        style={{ backgroundImage: "url('/assets/img/hero/servicios_bg.png')" }}
      >
        {/* Fondo Decorativo Abstracto */}
        <div className="absolute top-0 right-0 w-1/2 h-full bg-accent rounded-l-[100px] opacity-10 hidden lg:block"></div>
        
        <div className="container mx-auto px-4 max-w-7xl relative z-10 flex flex-col lg:flex-row items-center">
          
          {/* Contenido Izquierdo (Texto y Botones) */}
          <div className="w-full lg:w-1/2 lg:pr-12 text-center lg:text-left mb-16 lg:mb-0">
            <h1 className="text-5xl lg:text-7xl font-extrabold font-display leading-tight mb-6 tracking-tight text-white">
              Energía Limpia, <br/><span className="text-accent relative inline-block">Ahorro Inteligente</span>
              <span className="sr-only"> con Kits de Paneles Solares</span>
            </h1>
            
            <p className="text-gray-400 text-lg lg:text-xl font-light max-w-lg mx-auto lg:mx-0 mb-10 leading-relaxed">
              Sistemas de paneles solares diseñados para tu hogar o negocio. Comienza a ahorrar hoy mismo con nuestros kits listos para instalar.
            </p>
            
            <div className="flex flex-col sm:flex-row items-center justify-center lg:justify-start space-y-4 sm:space-y-0 sm:space-x-4">
              <a href="#kits" className="w-full sm:w-auto bg-accent text-white px-8 py-4 rounded-full font-semibold hover:bg-accentHover transition-all duration-300 flex items-center justify-center shadow-red-glow">
                Ver Kits Solares
              </a>
            </div>
          </div>
          
          {/* Contenido Derecho (Imagen Decorativa) */}
          <div className="w-full lg:w-1/2 relative mt-16 lg:mt-0">
            <div className="relative w-full max-w-xl mx-auto lg:-mr-10">
              
              {/* Cuadros Decorativos (Líneas y acentos) */}
              <div className="absolute -top-6 -left-6 w-32 h-32 border-4 border-accent rounded-3xl opacity-50 z-0 hidden lg:block"></div>
              <div className="absolute -bottom-8 -right-8 w-40 h-40 bg-accent rounded-full z-0 opacity-20"></div>

              {/* Imagen Principal de la Casa en Caja */}
              <div className="relative z-10 w-full overflow-hidden rounded-[2rem] shadow-2xl border-4 border-gray-800 bg-gray-900 flex items-center justify-center aspect-square">
                 <img src="/assets/img/hero/hero_house.jpg?v=2" alt="Casa con Paneles Solares" className="w-full h-full object-cover" />
              </div>

            </div>
          </div>
          
        </div>
      </section>

      {/* ==================== KITS SOLARES ==================== */}
      <section id="kits" className="py-24 bg-[#111111]">
        <div className="container mx-auto px-4 max-w-6xl">
          
          <div className="text-center mb-20">
            <h4 className="text-accent font-bold tracking-widest uppercase text-sm mb-4">Nuestras Soluciones</h4>
            <h2 className="text-3xl lg:text-4xl font-display font-bold text-white mb-6 tracking-tight">Kits de Paneles Solares</h2>
            <div className="w-16 h-1 bg-gray-800 mx-auto rounded-full relative overflow-hidden">
              <div className="absolute top-0 left-0 w-8 h-full bg-accent"></div>
            </div>
            <p className="text-gray-400 mt-6 max-w-2xl mx-auto">Encuentra el sistema ideal para tus necesidades energéticas. Ofrecemos kits completos con instalación profesional incluida.</p>
          </div>

          {/* Cuadrícula de Kits */}
          <div className="grid grid-cols-1 gap-12">
            
            {/* Kit 1: 4.96 kWp */}
            <div className="bg-[#1a1a1a] border border-gray-800 rounded-2xl overflow-hidden hover:border-accent transition-colors duration-500 group flex flex-col md:flex-row h-full items-stretch">
              <div className="w-full md:w-2/5">
                <img src="/assets/img/hero/kit_1.jpeg" alt="Kit 1 (4.96 kWp)" className="w-full h-auto md:h-full object-cover" />
              </div>
              <div className="p-8 flex flex-col w-full md:w-3/5">
                <div className="mb-6">
                  <h3 className="text-2xl font-bold text-white font-display mb-2">Kit 1 <span className="text-xl font-medium text-gray-500 ml-2">4.96 kWp</span></h3>
                  <p className="text-accent font-semibold text-lg">Ahorro hasta $140.00 / mes (627 kWh)</p>
                </div>
                <p className="text-gray-400 mb-6 text-sm">El sistema es "todo incluido" y conectado a la red. Precio desde <strong>$4,607.28</strong>.</p>
                <ul className="text-gray-400 font-light space-y-3 mb-8 grid grid-cols-1 sm:grid-cols-2 gap-x-4">
                  <li className="flex items-center"><svg className="w-5 h-5 text-accent mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M5 13l4 4L19 7"></path></svg> 8 Paneles solares</li>
                  <li className="flex items-center"><svg className="w-5 h-5 text-accent mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M5 13l4 4L19 7"></path></svg> 2 Microinversores</li>
                  <li className="flex items-center"><svg className="w-5 h-5 text-accent mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M5 13l4 4L19 7"></path></svg> Estructura de montaje</li>
                  <li className="flex items-center"><svg className="w-5 h-5 text-accent mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M5 13l4 4L19 7"></path></svg> Medidor y equipos eléctricos</li>
                </ul>
                <Link href="/cotizacion/?kit=Kit-4.96kWp" className="mt-auto w-full md:w-auto self-start text-center bg-gray-800 text-white px-8 py-3 rounded-xl font-semibold group-hover:bg-accent group-hover:text-white transition-all duration-300 shadow-lg">
                  Cotizar este Kit
                </Link>
              </div>
            </div>

            {/* Kit 2: 7.44 kWp */}
            <div className="bg-[#1a1a1a] border border-gray-800 rounded-2xl overflow-hidden hover:border-accent transition-colors duration-500 group flex flex-col md:flex-row-reverse h-full items-stretch">
              <div className="w-full md:w-2/5">
                <img src="/assets/img/hero/kit_2.jpeg" alt="Kit 2 (7.44 kWp)" className="w-full h-auto md:h-full object-cover" />
              </div>
              <div className="p-8 flex flex-col w-full md:w-3/5">
                <div className="mb-6 mt-4 md:mt-0">
                  <h3 className="text-2xl font-bold text-white font-display mb-2">Kit 2 <span className="text-xl font-medium text-gray-500 ml-2">7.44 kWp</span></h3>
                  <p className="text-accent font-semibold text-lg">Ahorro hasta $220.00 / mes (941 kWh)</p>
                </div>
                <p className="text-gray-400 mb-6 text-sm">El sistema es "todo incluido" y conectado a la red. Precio desde <strong>$6,100.09</strong>.</p>
                <ul className="text-gray-400 font-light space-y-3 mb-8 grid grid-cols-1 sm:grid-cols-2 gap-x-4">
                  <li className="flex items-center"><svg className="w-5 h-5 text-accent mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M5 13l4 4L19 7"></path></svg> 12 Paneles solares</li>
                  <li className="flex items-center"><svg className="w-5 h-5 text-accent mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M5 13l4 4L19 7"></path></svg> 3 Microinversores</li>
                  <li className="flex items-center"><svg className="w-5 h-5 text-accent mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M5 13l4 4L19 7"></path></svg> Estructura de montaje</li>
                  <li className="flex items-center"><svg className="w-5 h-5 text-accent mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M5 13l4 4L19 7"></path></svg> Medidor y equipos eléctricos</li>
                </ul>
                <Link href="/cotizacion/?kit=Kit-7.44kWp" className="mt-auto w-full md:w-auto self-start text-center bg-gray-800 text-white px-8 py-3 rounded-xl font-semibold group-hover:bg-accent group-hover:text-white transition-all duration-300 shadow-lg">
                  Cotizar este Kit
                </Link>
              </div>
            </div>

            {/* Kit 3: 9.92 kWp */}
            <div className="bg-[#1a1a1a] border border-gray-800 rounded-2xl overflow-hidden hover:border-accent transition-colors duration-500 group flex flex-col md:flex-row h-full items-stretch">
              <div className="w-full md:w-2/5">
                <img src="/assets/img/hero/kit_3.jpeg" alt="Kit 3 (9.92 kWp)" className="w-full h-auto md:h-full object-cover" />
              </div>
              <div className="p-8 flex flex-col w-full md:w-3/5">
                <div className="mb-6">
                  <h3 className="text-2xl font-bold text-white font-display mb-2">Kit 3 <span className="text-xl font-medium text-gray-500 ml-2">9.92 kWp</span></h3>
                  <p className="text-accent font-semibold text-lg">Ahorro hasta $300.00 / mes (1255 kWh)</p>
                </div>
                <p className="text-gray-400 mb-6 text-sm">El sistema es "todo incluido" y conectado a la red. Precio desde <strong>$7,684.59</strong>.</p>
                <ul className="text-gray-400 font-light space-y-3 mb-8 grid grid-cols-1 sm:grid-cols-2 gap-x-4">
                  <li className="flex items-center"><svg className="w-5 h-5 text-accent mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M5 13l4 4L19 7"></path></svg> 16 Paneles solares</li>
                  <li className="flex items-center"><svg className="w-5 h-5 text-accent mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M5 13l4 4L19 7"></path></svg> 4 Microinversores</li>
                  <li className="flex items-center"><svg className="w-5 h-5 text-accent mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M5 13l4 4L19 7"></path></svg> Estructura de montaje</li>
                  <li className="flex items-center"><svg className="w-5 h-5 text-accent mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M5 13l4 4L19 7"></path></svg> Medidor y equipos eléctricos</li>
                </ul>
                <Link href="/cotizacion/?kit=Kit-9.92kWp" className="mt-auto w-full md:w-auto self-start text-center bg-gray-800 text-white px-8 py-3 rounded-xl font-semibold group-hover:bg-accent group-hover:text-white transition-all duration-300 shadow-lg">
                  Cotizar este Kit
                </Link>
              </div>
            </div>

            {/* Kit 4: 12.40 kWp */}
            <div className="bg-[#1a1a1a] border border-gray-800 rounded-2xl overflow-hidden hover:border-accent transition-colors duration-500 group flex flex-col md:flex-row-reverse h-full items-stretch">
              <div className="w-full md:w-2/5">
                <img src="/assets/img/hero/kit_4.jpeg" alt="Kit 4 (12.40 kWp)" className="w-full h-auto md:h-full object-cover" />
              </div>
              <div className="p-8 flex flex-col w-full md:w-3/5">
                <div className="mb-6 mt-4 md:mt-0">
                  <h3 className="text-2xl font-bold text-white font-display mb-2">Kit 4 <span className="text-xl font-medium text-gray-500 ml-2">12.40 kWp</span></h3>
                  <p className="text-accent font-semibold text-lg">Ahorro hasta $400.00 / mes (1569 kWh)</p>
                </div>
                <p className="text-gray-400 mb-6 text-sm">El sistema es "todo incluido" y conectado a la red. Precio desde <strong>$9,745.60</strong>.</p>
                <ul className="text-gray-400 font-light space-y-3 mb-8 grid grid-cols-1 sm:grid-cols-2 gap-x-4">
                  <li className="flex items-center"><svg className="w-5 h-5 text-accent mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M5 13l4 4L19 7"></path></svg> 20 Paneles solares</li>
                  <li className="flex items-center"><svg className="w-5 h-5 text-accent mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M5 13l4 4L19 7"></path></svg> 5 Microinversores</li>
                  <li className="flex items-center"><svg className="w-5 h-5 text-accent mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M5 13l4 4L19 7"></path></svg> Estructura de montaje</li>
                  <li className="flex items-center"><svg className="w-5 h-5 text-accent mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M5 13l4 4L19 7"></path></svg> Medidor y equipos eléctricos</li>
                </ul>
                <Link href="/cotizacion/?kit=Kit-12.40kWp" className="mt-auto w-full md:w-auto self-start text-center bg-gray-800 text-white px-8 py-3 rounded-xl font-semibold group-hover:bg-accent group-hover:text-white transition-all duration-300 shadow-lg">
                  Cotizar este Kit
                </Link>
              </div>
            </div>

            {/* Kit 5: 14.88 kWp */}
            <div className="bg-[#1a1a1a] border border-gray-800 rounded-2xl overflow-hidden hover:border-accent transition-colors duration-500 group flex flex-col md:flex-row h-full items-stretch">
              <div className="w-full md:w-2/5">
                <img src="/assets/img/hero/kit_5.jpeg" alt="Kit 5 (14.88 kWp)" className="w-full h-auto md:h-full object-cover" />
              </div>
              <div className="p-8 flex flex-col w-full md:w-3/5">
                <div className="mb-6">
                  <h3 className="text-2xl font-bold text-white font-display mb-2">Kit 5 <span className="text-xl font-medium text-gray-500 ml-2">14.88 kWp</span></h3>
                  <p className="text-accent font-semibold text-lg">Ahorro hasta $490.00 / mes (1882 kWh)</p>
                </div>
                <p className="text-gray-400 mb-6 text-sm">El sistema es "todo incluido" y conectado a la red. Precio desde <strong>$11,174.65</strong>.</p>
                <ul className="text-gray-400 font-light space-y-3 mb-8 grid grid-cols-1 sm:grid-cols-2 gap-x-4">
                  <li className="flex items-center"><svg className="w-5 h-5 text-accent mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M5 13l4 4L19 7"></path></svg> 24 Paneles solares</li>
                  <li className="flex items-center"><svg className="w-5 h-5 text-accent mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M5 13l4 4L19 7"></path></svg> 6 Microinversores</li>
                  <li className="flex items-center"><svg className="w-5 h-5 text-accent mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M5 13l4 4L19 7"></path></svg> Estructura de montaje</li>
                  <li className="flex items-center"><svg className="w-5 h-5 text-accent mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M5 13l4 4L19 7"></path></svg> Medidor y equipos eléctricos</li>
                </ul>
                <Link href="/cotizacion/?kit=Kit-14.88kWp" className="mt-auto w-full md:w-auto self-start text-center bg-gray-800 text-white px-8 py-3 rounded-xl font-semibold group-hover:bg-accent group-hover:text-white transition-all duration-300 shadow-lg">
                  Cotizar este Kit
                </Link>
              </div>
            </div>

          </div>

        </div>
      </section>
    </>
  );
}

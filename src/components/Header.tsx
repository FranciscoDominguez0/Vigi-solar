"use client";

import Link from "next/link";
import { usePathname } from "next/navigation";
import { useState } from "react";

export default function Header() {
  const pathname = usePathname();
  const [isMobileMenuOpen, setIsMobileMenuOpen] = useState(false);

  return (
    <header className="bg-primary/95 backdrop-blur-md py-4 sticky top-0 z-50 shadow-2xl border-b border-gray-800">
      <div className="container mx-auto px-4 max-w-7xl flex items-center justify-between">
        
        {/* Logo */}
        <Link href="/" className="flex items-center">
          <img src="/assets/img/hero/vigitec-logo.webp" alt="Vigitec Panama" className="h-10 w-auto" />
        </Link>
        
        {/* Menú para Computadoras */}
        <nav className="hidden md:flex items-center space-x-8 text-[15px] font-medium text-gray-300">
          <Link 
            href="/" 
            className={`hover:text-white transition-colors ${pathname === '/' ? 'text-accent font-semibold' : ''}`}
          >
            Inicio
          </Link>
        </nav>

        {/* Botón de Llamada a la Acción */}
        <div className="hidden md:block">
          <Link 
            href="/cotizacion" 
            className="bg-accent text-white px-6 py-2.5 rounded-full font-semibold text-sm hover:bg-accentHover hover:shadow-red-glow transition-all duration-300"
          >
            Cotizar Ahora
          </Link>
        </div>

        {/* Botón del Menú Móvil */}
        <button 
          onClick={() => setIsMobileMenuOpen(!isMobileMenuOpen)}
          className="md:hidden text-gray-300 hover:text-white focus:outline-none p-2"
        >
          <svg className="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
        </button>
      </div>

      {/* Menú Desplegable Móvil */}
      {isMobileMenuOpen && (
        <div className="md:hidden bg-[#111111] absolute top-full left-0 w-full border-b border-gray-800 shadow-2xl">
          <div className="flex flex-col px-6 py-6 space-y-4">
            <Link 
              href="/" 
              onClick={() => setIsMobileMenuOpen(false)}
              className={`text-gray-300 hover:text-accent font-medium text-lg ${pathname === '/' ? 'text-accent font-semibold' : ''}`}
            >
              Inicio
            </Link>
            <div className="pt-4 mt-2 border-t border-gray-800">
              <Link 
                href="/cotizacion" 
                onClick={() => setIsMobileMenuOpen(false)}
                className="block text-center bg-accent text-white px-6 py-3 rounded-full font-semibold hover:bg-accentHover transition-colors w-full"
              >
                Cotizar Ahora
              </Link>
            </div>
          </div>
        </div>
      )}
    </header>
  );
}

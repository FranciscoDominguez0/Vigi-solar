import type { Metadata } from "next";
import { Inter, Plus_Jakarta_Sans } from "next/font/google";
import "./globals.css";
import Header from "../components/Header";
import Footer from "../components/Footer";
import WhatsAppChat from "../components/WhatsAppChat";

const inter = Inter({
  variable: "--font-inter",
  subsets: ["latin"],
});

const plusJakartaSans = Plus_Jakarta_Sans({
  variable: "--font-plus-jakarta-sans",
  subsets: ["latin"],
});

export const metadata: Metadata = {
  title: {
    default: "Vigi-Solar - Kits y Sistemas de Energía Solar",
    template: "%s | Vigi-Solar"
  },
  description: "Vigi-Solar - Especialistas en sistemas de energía solar. Instalación de kits fotovoltaicos y soluciones de ahorro energético para tu hogar o negocio.",
  keywords: ["sistemas de energía solar panamá", "paneles solares", "instalación de paneles", "kits solares", "ahorro energético", "energía renovable", "cotización paneles solares"],
  authors: [{ name: "Francisco Dominguez", url: "https://github.com/FranciscoDominguez0" }],
  creator: "Francisco Dominguez",
  publisher: "Francisco Dominguez",
  robots: {
    index: true,
    follow: true,
    googleBot: {
      index: true,
      follow: true,
      'max-video-preview': -1,
      'max-image-preview': 'large',
      'max-snippet': -1,
    },
  },
  openGraph: {
    title: "Vigi-Solar - Kits y Sistemas de Energía Solar",
    description: "Especialistas en sistemas de energía solar. Instalación de kits fotovoltaicos y soluciones de ahorro energético.",
    url: "https://vigisolar.com/",
    siteName: "Vigi-Solar",
    locale: "es_PA",
    type: "website",
    images: [{
      url: "https://vigisolar.com/assets/img/hero/hero_solar.jpg",
      width: 1200,
      height: 630,
      alt: "Vigi-Solar - Kits de Energía Solar"
    }],
  },
  twitter: {
    card: "summary_large_image",
    title: "Vigi-Solar - Kits y Sistemas de Energía Solar",
    description: "Especialistas en sistemas de energía solar. Instalación de kits fotovoltaicos y soluciones de ahorro energético.",
    creator: "@franciscod",
    images: ["https://vigisolar.com/assets/img/hero/hero_solar.jpg"],
  }
};

export default function RootLayout({
  children,
}: Readonly<{
  children: React.ReactNode;
}>) {
  return (
    <html lang="es" data-scroll-behavior="smooth" className={`${inter.variable} ${plusJakartaSans.variable} scroll-smooth`}>
      <body className="min-h-full flex flex-col font-sans antialiased selection:bg-accent selection:text-white">
        <Header />
        <main className="flex-grow">
          {children}
        </main>
        <Footer />
        <WhatsAppChat />
      </body>
    </html>
  );
}

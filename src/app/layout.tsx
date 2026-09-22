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
  title: "Vigi-Solar - Kits y Sistemas de Energía Solar",
  description: "Vigi-Solar - Especialistas en sistemas de energía solar. Instalación de kits fotovoltaicos y soluciones de ahorro energético para tu hogar o negocio.",
  keywords: "sistemas de energía solar panamá, paneles solares, instalación de paneles, kits solares, ahorro energético, energía renovable",
  authors: [{ name: "Vigi-Solar" }],
  openGraph: {
    title: "Vigi-Solar - Kits y Sistemas de Energía Solar",
    description: "Vigi-Solar - Especialistas en sistemas de energía solar. Instalación de kits fotovoltaicos y soluciones de ahorro energético para tu hogar o negocio.",
    url: "https://vigisolar.com/",
    type: "website",
    images: ["https://vigisolar.com/assets/img/hero/hero_solar.jpg"],
  },
  twitter: {
    card: "summary_large_image",
    title: "Vigi-Solar - Kits y Sistemas de Energía Solar",
    description: "Vigi-Solar - Especialistas en sistemas de energía solar. Instalación de kits fotovoltaicos y soluciones de ahorro energético para tu hogar o negocio.",
    images: ["https://vigisolar.com/assets/img/hero/hero_solar.jpg"],
  }
};

export default function RootLayout({
  children,
}: Readonly<{
  children: React.ReactNode;
}>) {
  return (
    <html lang="es" className={`${inter.variable} ${plusJakartaSans.variable} scroll-smooth`}>
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

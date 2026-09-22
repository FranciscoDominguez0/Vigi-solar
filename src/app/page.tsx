import { Metadata } from 'next';
import Hero from "@/components/Hero";
import KitsSection from "@/components/KitsSection";

export const metadata: Metadata = {
  title: "Inicio | Vigi-Solar",
  description: "Ahorra en tu factura de luz con nuestros kits de paneles solares listos para instalar. Energía limpia y ahorro inteligente para Panamá.",
};

export default function Home() {
  return (
    <>
      <Hero />
      <KitsSection />
    </>
  );
}

@extends('layouts.plantilla')
@section('contenido')

<!-- Banner de Nosotros (ANCHO COMPLETO) -->
<div class="w-full h-64 relative">
  <img src="{{ asset('images/fondomovimiento.gif') }}" alt="Banner" class="absolute inset-0 w-full h-full object-cover" />
  <div class="absolute inset-0 bg-black/60"></div>
  <div class="relative z-10 flex items-center justify-center h-full">
    <h1 class="text-white text-4xl md:text-5xl font-bold text-center">Acerca de Nosotros</h1>
  </div>
</div>

<!-- Contenido general con padding y centrado -->
<div class="max-w-6xl mx-auto px-4 py-10">
    <!-- Intro -->
    <div class="text-center max-w-2xl mx-auto mb-12">
        <h2 class="text-xl font-semibold mb-2">TicketGO, la manera más rápida de ir a tu concierto favorito</h2>
        <p class="text-gray-600">En TicketGO, hacemos que comprar entradas sea fácil, rápido y seguro. Conectamos a organizadores con el público y garantizamos una experiencia confiable en cada compra.</p>
    </div>

    <!-- Misión -->
    <div class="flex flex-col md:flex-row items-center gap-10 mb-16">
        <div class="md:w-1/2">
            <h3 class="text-2xl font-bold text-blue-700 mb-4">Misión</h3>
            <p class="text-gray-600">Ofrecer una plataforma digital confiable, ágil y segura para la venta de entradas, brindando una experiencia óptima tanto para organizadores como para asistentes a eventos.</p>
        </div>
        <div class="md:w-1/2">
            <img src="{{ asset('images/mision.png') }}" class="rounded-lg shadow-md w-full h-80 object-contain" alt="Misión TicketGO">
        </div>
    </div>

    <!-- Visión -->
    <div class="flex flex-col md:flex-row-reverse items-center gap-8 mb-16">
        <div class="md:w-1/2">
            <h3 class="text-2xl font-bold text-blue-700 mb-4">Visión</h3>
            <p class="text-gray-600">Ser la plataforma líder en ticketing de eventos en Latinoamérica, reconocida por su innovación, seguridad y compromiso con la mejor experiencia del usuario.</p>
        </div>
        <div class="md:w-1/2">
            <img src="{{ asset('images/vision.png') }}" class="rounded-lg shadow-md w-full h-80 object-cover" alt="Visión TicketGO">
        </div>
    </div>

    <!-- Experiencia -->
    <div class="text-center max-w-3xl mx-auto mb-16">
        <h3 class="text-2xl font-bold text-blue-700 mb-4">Experiencia</h3>
        <p class="text-gray-600">Pensado, diseñado y desarrollado para vivir la mejor experiencia en vivo, ideal e inolvidable. Creemos que navegar con seguridad y rapidez es lo que buscas, por eso tu experiencia es nuestro objetivo.</p>
    </div>

    <!-- Historia / Concepto -->
    <div class="text-center max-w-3xl mx-auto mb-16">
        <h3 class="text-2xl font-bold text-blue-700 mb-4">Nuestro Concepto</h3>
        <p class="text-gray-600">Espacio creado para conciertos, shows artísticos, circos, eventos culturales, corporativos, espectáculos musicales y muchos más. Un gran sueño comienza con un soñador, y su inspiración, fuerza y pasión lo hicieron realidad.</p>
    </div>

    <!-- Contacto -->
    <div class="bg-gray-100 rounded-lg p-8">
        <h3 class="text-xl font-bold text-blue-700 mb-4">Contáctanos</h3>
        <p class="text-gray-700 mb-2">📍 Av. Cascanueces Santa Anita - Lima</p>
        <p class="text-gray-700 mb-2">📧 ticket_go@eventos.com</p>
        <p class="text-gray-700 mb-4">💬 ¿Deseas más información? Ponte en contacto con nosotros.</p>
        <a href="#" class="inline-block bg-yellow-500 text-white px-5 py-2 rounded hover:bg-yellow-600 transition font-bold">Contáctanos</a>
    </div>
</div>

@endsection

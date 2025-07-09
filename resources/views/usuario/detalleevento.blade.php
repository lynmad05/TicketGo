@extends('layouts.procesopago')

@section('contenido')
    <div class="min-h-screen flex flex-col relative overflow-hidden">
        <!-- Imagen de fondo cubriendo toda la pantalla -->
        <div class="fixed inset-0 -z-10">
            <img src="{{ asset('storage/' . $evento->imagen_fondo) }}" alt="Fondo {{ $evento->nombre }}"
                class="w-full h-full object-cover object-center" />
            <div class="absolute inset-0 bg-black/30"></div>
        </div>
        
        <!-- Header con imagen principal -->
        <div class="relative pt-8 pb-4">
            <div class="w-full max-w-4xl mx-auto px-4">
                <!-- Imagen principal del evento -->
                <div class="relative mb-6">
                    <img src="{{ asset('storage/' . $evento->imagen) }}" alt="{{ $evento->nombre }}"
                        class="w-full h-80 md:h-96 object-cover rounded-xl shadow-lg">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent rounded-xl"></div>
                </div>
                <!-- Información del evento centrada -->
                <div class="flex flex-col items-center text-center gap-2 mb-6">
                    <h1 class="text-2xl md:text-4xl font-extrabold leading-tight drop-shadow-lg text-white">
                        {{ strtoupper($evento->nombre) }}
                    </h1>
                    <span class="bg-white-/20 text-white px-3 py-1 border border-white/30 rounded-full font-bold backdrop-blur-sm text-xs md:text-sm mb-1">
                        {{ $evento->categoria }}
                    </span>
                    <span class="font-medium drop-shadow-lg text-white">
                        {{ \Carbon\Carbon::parse($evento->fecha)->translatedFormat('l, d \d\e F Y H:i') }}
                    </span>
                    <span class="font-medium drop-shadow-lg text-white">{{ $evento->ubicacion }}</span>
                </div>
            </div>
        </div>
        
        <!-- Contenido principal debajo de la imagen -->
        <div class="relative">
            <div class="max-w-4xl mx-auto px-4 py-8">
                <!-- Descripción del evento -->
                <div class="mb-8">
                    <h2 class="text-2xl md:text-3xl font-bold text-white mb-4 text-center drop-shadow-lg">Descripción del Evento</h2>
                    <div class="bg-white/20 backdrop-blur-sm rounded-xl p-6 border border-white/30">
                        <p class="text-white text-base md:text-lg leading-relaxed drop-shadow-lg">
                            {{ $evento->descripcion }}
                        </p>
                    </div>
                </div>
                
                <!-- Sectores y precios -->
                <div class="mb-8">
                    <h2 class="text-2xl md:text-3xl font-bold text-white mb-6 text-center drop-shadow-lg">Sectores y Precios</h2>
                    <div class="bg-white/20 backdrop-blur-sm rounded-xl p-6 border border-white/30">
                        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach ($evento->entradas as $entrada)
                                <div class="bg-white/30 backdrop-blur-sm rounded-lg p-4 border border-white/40 text-center hover:bg-white/40 transition-all duration-300">
                                    <h3 class="text-lg font-bold text-white mb-2 drop-shadow-lg">{{ strtoupper($entrada->tipo) }}</h3>
                                    <div class="text-2xl font-bold text-blue-700 drop-shadow-lg">
                                        S/. {{ number_format($entrada->precio, 2) }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                
                <!-- Botones de acción -->
                <div class="flex justify-center gap-4">
                <a href="{{ url()->previous() }}"
                    class="bg-yellow-400 hover:bg-yellow-500 text-black font-bold py-2 px-8 rounded-full shadow">Volver</a>
                <a href="{{ route('comprar.index', $evento->id_evento) }}"
                    class="bg-blue-700 hover:bg-blue-800 text-white font-bold py-2 px-8 rounded-full shadow">Continuar</a>
            </div>
            </div>
        </div>
    </div>
@endsection

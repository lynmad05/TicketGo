@extends('layouts.plantilla')
@section('contenido')
  <main class="max-w-4xl mx-auto px-4">
    <br>
    <h3 class=" text-center text-blue-700 text-2xl font-semi-bold mb-6 ">EVENTOS POPULARES</h3>
    <div id="carouselExample" class="carousel slide mb-6" data-bs-ride="carousel" >
        <div class="carousel-inner" style="height: 400px;">
            <div class="carousel-item active">
            <img src="{{ asset('images/trueno.jpg') }}" class="d-block w-100" alt="Evento Trueno" />
            </div>
            <div class="carousel-item">
            <img src="{{ asset('images/duki.jpg') }}" class="d-block w-100" alt="Evento Duki" />
            </div>
            <div class="carousel-item">
            <img src="{{ asset('images/emilia.jpg') }}" class="d-block w-100" alt="Evento Emilia" />
            </div>
            <div class="carousel-item">
            <img src="{{ asset('images/bahia.jpg') }}" class="d-block w-100" alt="Evento bahia" />
            </div>
            <div class="carousel-item">
            <img src="{{ asset('images/shaw.jpg') }}" class="d-block w-100" alt="Evento Shaw" />
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>
      <h3 class=" text-center text-blue-700 text-2xl font-semi-bold mb-6 ">EVENTOS DESTACADOS</h3>
    <section aria-label="Eventos destacados" class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-12">
       <!-- Evento 1 -->
        <a href="https://www.ticketgo.pe/eventos/deyvis-orozco"
            class="border border-gray-300 rounded-md p-2 text-xs leading-tight max-w-[180px] mx-auto block transform transition duration-200 hover:scale-105 hover:shadow-lg focus:scale-105 focus:shadow-lg"
            aria-label="Evento Deyvis Orozco en Anifteatro parque de la Exposición, Av. 28 de Julio - LIMA, dom. 01 de diciembre, 19:00">

            <img alt="Cartel del evento Deyvis Orozco"
                    class="h-[180px] w-full object-cover rounded-sm mb-1 "
                    src="{{ asset('images/Eventodeyvis.jpg') }}" />

            <p class="font-semibold text-[9px] mb-0.5">
                Anifteatro parque de la Exposición  
            </p>
            <p class="text-[8px] text-gray-600 mb-0.5">
                Av. 28 de Julio - LIMA
            </p>
            <p class="text-[7px] text-yellow-400 font-semibold">
                dom. 01 de diciembre, 19:00
            </p>
            <p class="font-semibold mt-1">
                Deyvis Orozco
            </p>
        </a>
      <!-- Evento 2 -->
        <a href="https://www.ticketgo.pe/eventos/duki"
            class="border border-gray-300 rounded-md p-2 text-xs leading-tight max-w-[180px] mx-auto block transform transition duration-200 hover:scale-105 hover:shadow-lg focus:scale-105 focus:shadow-lg"
            aria-label="Evento DUKI en Multiespacio Costa21, Av. 28 de Julio - LIMA, vie. 31 de octubre, 19:00">
            
            <img alt="Cartel del evento DUKI"
                    class="h-[180px] w-full object-cover rounded-sm mb-1 " 
                    src="{{ asset('images/Eventoduki.jpg') }}" />

            <p class="font-semibold text-[9px] mb-0.5">
                Multiespacio Costa21
            </p>
            <p class="text-[8px] text-gray-600 mb-0.5">
                Av. 28 de Julio - LIMA
            </p>
            <p class="text-[7px] text-yellow-400 font-semibold">
                vie. 31 de octubre, 19:00
            </p>
            <p class="font-semibold mt-1">
                DUKI
            </p>
        </a>
        <!-- Evento 3 -->
        <a href="https://www.ticketgo.pe/eventos/alvaro-de-la-puente-m"
            class="border border-gray-300 rounded-md p-2 text-xs leading-tight max-w-[180px] mx-auto block transform transition duration-200 hover:scale-105 hover:shadow-lg focus:scale-105 focus:shadow-lg"
            aria-label="Evento Álvaro de la Puente M. en GALERIA ODERS, Jr. Domeyer 270 Barranco - LIMA, 07 Mar - 30 Mayo 2023">
            
            <img alt="CCartel del evento GALERIA ODERS"
                    class="h-[180px] w-full object-cover rounded-sm mb-1 " 
                    src="{{ asset('images/alvaro.jpg') }}" />

            <p class="font-semibold text-[9px] mb-0.5">
               Jr. Domeyer 270 Barranco - LIMA
            </p>
            <p class="text-[8px] text-gray-600 mb-0.5">
                Av. 28 de Julio - LIMA
            </p>
            <p class="text-[7px] text-yellow-400 font-semibold">
                07 Mar - 30 Mayo 2023
            </p>
            <p class="font-semibold mt-1">
                Álvaro de la Puente M.
            </p>
        </a>

        <!-- Evento 4 -->
        <a href="https://www.ticketgo.pe/eventos/hablando-huevadas"
            class="border border-gray-300 rounded-md p-2 text-xs leading-tight max-w-[180px] mx-auto block transform transition duration-200 hover:scale-105 hover:shadow-lg focus:scale-105 focus:shadow-lg"
            aria-label="Evento Hablando Huevadas en Multiespacio Costa 21 San Miguel - Lima, Música vie. 11 Agosto, 20:00 hrs">

            <img alt="Cartel del evento Hablando Huevadas "
                    class="h-[180px] w-full object-cover rounded-sm mb-1 "
                    src="{{ asset('images/Eventohablando.jpg') }}" />

            <p class="font-semibold text-[9px] mb-0.5">
                Teatro CANOUT - LIMA
            </p>
            <p class="text-[7px] text-yellow-400 font-semibold">
                vie. 11 Agosto, 20:00 hrs
            </p>
            <p class="font-semibold mt-1">
                Hablando Huevadas
            </p>
        </a>
        <!-- Evento 5 -->
        <a href="https://www.ticketgo.pe/eventos/trueno"
            class="border border-gray-300 rounded-md p-2 text-xs leading-tight max-w-[180px] mx-auto block transform transition duration-200 hover:scale-105 hover:shadow-lg focus:scale-105 focus:shadow-lg"
            aria-label="Evento Trueno en Multiespacio Costa 21 San Miguel - Lima, Música vie. 11 noviembre, 21:00 hrs">

            <img alt="Cartel del evento Trueno con persona sentada con ropa negra y fondo azul"
                    class="h-[180px] w-full object-cover rounded-sm mb-1 "
                    src="{{ asset('images/Eventotrueno.jpg') }}" />

            <p class="font-semibold text-[9px] mb-0.5">
                Multiespacio Costa 21 San Miguel - Lima
            </p>
            <p class="text-[7px] text-yellow-400 font-semibold">
                Música vie. 11 noviembre, 21:00 hrs
            </p>
            <p class="font-semibold mt-1">
                Trueno
            </p>
        </a>
        <!-- Evento 6 -->
        <a href="https://www.ticketgo.pe/eventos/emilia-mernes"
            class="border border-gray-300 rounded-md p-2 text-xs leading-tight max-w-[180px] mx-auto block transform transition duration-200 hover:scale-105 hover:shadow-lg focus:scale-105 focus:shadow-lg"
            aria-label="Evento Emilia Mernes en Multiespacio Costa 21 San Miguel - Lima, EMILIA TOLLER 2023">

            <img alt="Cartel del evento EMILIA TOLLER 2023 con rostro de mujer y texto rosa"
                    class="h-[180px] w-full object-cover rounded-sm mb-1 "
                    src="{{ asset('images/Eventoemilia.jpg') }}" />

            <p class="font-semibold text-[9px] mb-0.5">
                Multiespacio Costa 21 San Miguel - Lima
            </p>
            <p class="text-[7px] text-yellow-400 font-semibold">
                EMILIA TOLLER 2023
            </p>
            <p class="font-semibold mt-1">
                Emilia Mernes
            </p>
        </a>
    </section>
  </main>
@endsection
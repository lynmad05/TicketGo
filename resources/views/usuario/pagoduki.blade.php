@extends('layouts.pago')
@section('pago')

<main class="max-w-7xl mx-auto flex flex-col md:flex-row bg-white shadow-md">
  <section class="flex-1 bg-white px-6 py-6 max-w-4xl">
    <nav class="flex items-center space-x-6 mb-8">
      <div class="flex items-center space-x-2 text-gray-300 text-xs uppercase font-semibold">
        <button class="text-black text-xl mr-1">
          <i class="fas fa-arrow-left"></i>
        </button>
        <span class="w-5 h-5 rounded-full border border-gray-300 flex items-center justify-center">
          <span class="block w-2.5 h-2.5 rounded-full bg-gray-300"></span>
        </span>
        <span>TICKETS</span>
      </div>
      <button  class="flex items-center space-x-2 text-xs uppercase font-semibold text-black relative">
        <span class="w-5 h-5 rounded-full border-2 border-black flex items-center justify-center bg-black">
          <span class="block w-2.5 h-2.5 rounded-full bg-white"></span>
        </span>
        <span>DATOS DE COMPRA</span>
        <span aria-hidden="true" class="absolute bottom-0 left-0 right-0 h-[2px] bg-black -mb-6"></span>
      </button>
      <button class="flex items-center space-x-2 text-gray-300 text-xs uppercase font-semibold" disabled>
        <span class="w-5 h-5 rounded-full border border-gray-300 flex items-center justify-center">
          <span class="block w-2.5 h-2.5 rounded-full bg-gray-300"></span>
        </span>
        <span>CONFIRMACIÓN</span>
      </button>
    </nav>


    <div class="mb-6">
      <h3 class="bg-blue-900 text-white text-xs font-bold uppercase px-3 py-1 mb-3 inline-block">Selecciona Documento</h3>
      <div class="flex items-center space-x-3 mb-2">
        <div class="w-5 h-5 rounded-full bg-yellow-500 border border-yellow-700 flex items-center justify-center">
          <div class="w-3 h-3 rounded-full bg-yellow-400"></div>
        </div>
        <span class="text-xs font-bold">BOLETA</span>
      </div>
      <p class="text-[10px] leading-tight text-justify max-w-xl">
        Las entradas son vendidas por TICKETGO, por cuenta y orden de la empresa organizadora del evento, correspondiéndole la entrega de Comprobante de Pago (boleta o factura) únicamente por el monto de la comisión por servicio de venta.
      </p>
      <p class="text-[10px] font-bold mt-2 max-w-xl">Para descargar tu Boleta ingresa a “MI CUENTA”.</p>
    </div>


    <div class="mb-6">
      <h3 class="bg-blue-900 text-white text-xs font-bold uppercase px-3 py-1 mb-3 inline-block">Selecciona el Medio de Pago</h3>
      <label for="niubiz" id="niubizLabel" class="flex items-center justify-between border border-gray-300 rounded-md p-3 cursor-pointer max-w-xl mb-2">
        <div class="flex items-center space-x-3">
          <img class="h-6 w-auto" src="{{ asset('images/metodos.png') }}"  />
          <span class="text-xs">NIUBIZ</span>
        </div>
        <input type="radio" id="niubiz" name="payment" value="niubiz" class="form-radio h-5 w-5 text-yellow-500 border-gray-300" checked />
      </label>

      <div id="niubizSteps" class="max-w-xl mt-4 p-3 border border-yellow-500 rounded bg-yellow-50 text-[11px] text-yellow-800">
        <h4 class="font-bold mb-1">Pasos para completar tu pago con NIUBIZ:</h4>
        <ol class="list-decimal list-inside space-y-1">
          <li>Confirma que los datos de tu compra sean correctos.</li>
          <li>Serás redirigido a la plataforma Niubiz.</li>
          <li>Ingresa los datos de tu tarjeta.</li>
          <li>Confirma y espera validación.</li>
          <li>Recibirás confirmación por email.</li>
        </ol>
      </div>
    </div>

    <div class="max-w-xl">
      <h4 class="text-xs font-bold mb-2">RESUMEN</h4>
      <div class="border-t border-b border-gray-300 divide-y divide-gray-300 text-[10px]">
        <div class="flex justify-between py-2">
          <div class="flex space-x-2 w-1/2">
            <span class="w-16">1 TICKET</span>
            <span class="w-24">CANCHA VIP</span>
          </div>
          <span class="w-20 text-right">S/ 345.00</span>
          <button class="text-xs text-gray-400 hover:text-gray-600 w-16 text-right cursor-pointer" onclick="removeItem(this)">Eliminar</button>
        </div>
        <div class="flex justify-between py-2">
          <div class="flex space-x-2 w-1/2">
            <span class="w-16">1 TICKET</span>
            <span class="w-36">CANCHA PREFERENCIAL</span>
          </div>
          <span class="w-20 text-right">S/ 288.00</span>
          <button class="text-xs text-gray-400 hover:text-gray-600 w-16 text-right cursor-pointer" onclick="removeItem(this)">Eliminar</button>
        </div>
        <div class="flex justify-between py-2">
          <div class="flex space-x-2 w-1/2">
            <span class="w-16">1 TICKET</span>
            <span class="w-24">CANCHA GENERAL</span>
          </div>
          <span class="w-20 text-right">S/ 173.00</span>
          <button class="text-xs text-gray-400 hover:text-gray-600 w-16 text-right cursor-pointer" onclick="removeItem(this)">Eliminar</button>
        </div>
      </div>
      <div class="text-center mt-3 text-[10px]">TOTAL</div>
      <div id="totalPrice" class="text-center font-bold text-lg">S/. 806,00</div>
    </div>
  </section>

  <aside class="w-full md:w-96 bg-white border-l border-gray-200 p-6 flex flex-col items-center">
    <img class="mb-6 w-full object-cover" src="{{ asset('images/dukiderecho.jpg') }}" width="320" height="200" />
    <p class="text-xs text-gray-900 mb-1">MÚSICA <a href="#" class="text-blue-700 font-bold">/ PRESENCIAL</a></p>
    <h2 class="font-extrabold text-lg mb-1">DUKI - AMERI WORLD TOUR 2025</h2>
    <p class="text-[10px] text-gray-500 mb-6">sábado, 23 de agosto 21:00 hrs.</p>
    <a href="{{ route('usuario.identificadorduki') }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold text-sm py-3 px-10 shadow-lg w-full inline-block text-center">
      CONTINUAR
    </a>
  </aside>
</main>

@endsection
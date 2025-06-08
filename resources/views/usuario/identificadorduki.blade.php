@extends('layouts.identificadorlayout')
@section('añaidentificador')



<section class="flex-1 bg-white px-6 py-6 max-w-4xl">
    <nav class="flex items-center space-x-6 mb-8">
        <div class="flex items-center space-x-2 text-gray-300 text-xs uppercase font-semibold">
            <button  class="text-black text-xl mr-1">
                <i class="fas fa-arrow-left"></i>
            </button>
            <span class="w-5 h-5 rounded-full border border-gray-300 flex items-center justify-center">
                <span class="block w-2.5 h-2.5 rounded-full bg-gray-300"></span>
            </span>
            <span>TICKETS</span>
        </div>
        <button class="flex items-center space-x-2 text-gray-300 text-xs uppercase font-semibold" disabled>
            <span class="w-5 h-5 rounded-full border border-gray-300 flex items-center justify-center">
                <span class="block w-2.5 h-2.5 rounded-full bg-gray-300"></span>
            </span>
            <span>DATOS DE COMPRA</span>
        </button>
        <button  class="flex items-center space-x-2 text-xs uppercase font-semibold text-black relative">
            <span class="w-5 h-5 rounded-full border-2 border-black flex items-center justify-center bg-black">
                <span class="block w-2.5 h-2.5 rounded-full bg-white"></span>
            </span>
            <span>CONFIRMACIÓN</span>
            <span  class="absolute bottom-0 left-0 right-0 h-[2px] bg-black -mb-6"></span>
        </button>
    </nav>

    <table class="w-full text-[10px] text-gray-900 mb-6 border-collapse">
        <thead>
            <tr>
                <th class="text-left font-normal pb-2">RESUMEN</th>
                <th class="text-right font-normal pb-2">PRECIO</th>
                <th class="text-right font-normal pb-2">TOTAL</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-t border-gray-300">
                <td class="py-2">1 TICKET CANCHA VIP</td>
                <td class="py-2 text-right">S/ 345.00</td>
                <td class="py-2 text-right">S/ 345.00</td>
            </tr>
            <tr class="border-t border-gray-300">
                <td class="py-2">1 TICKET CANCHA PREFERENCIAL</td>
                <td class="py-2 text-right">S/ 288.00</td>
                <td class="py-2 text-right">S/ 345.00</td>
            </tr>
            <tr class="border-t border-gray-300">
                <td class="py-2">1 TICKET CANCHA GENERAL</td>
                <td class="py-2 text-right">S/ 173.00</td>
                <td class="py-2 text-right">S/ 245.00</td>
            </tr>
        </tbody>
    </table>

    <div class="text-right text-[12px] font-semibold text-gray-700 mb-6">
        S/. 806.00
    </div>

    <div class="mb-4">
        <div class="inline-block bg-[#0a2a6e] text-white text-[10px] font-bold uppercase px-3 py-1">
            SELECCIONA PARA CONTINUAR
        </div>
    </div>

    <form id="termsForm" class="border border-gray-300 p-3 mb-6 text-[10px] text-gray-900">
        <label class="flex items-start space-x-2 mb-2">
            <input class="mt-1" type="checkbox" />
            <span>
                Declaro que he leído y acepto los
                <a class="underline text-black font-semibold" href="#">Términos y Condiciones</a> y
                <a class="underline text-black font-semibold" href="#">Política de Privacidad</a> de TicketGo.
            </span>
        </label>
        <label class="flex items-start space-x-2">
            <input class="mt-1" type="checkbox" />
            <span>
                He leído y acepto los
                <a class="underline text-black font-semibold" href="#">Términos y Condiciones</a> de la tienda.
            </span>
        </label>
    </form>

    <div class="flex items-center space-x-3 max-w-[320px]">
        <label for="fileInput" class="flex items-center space-x-2 border border-gray-700 rounded px-3 py-1 text-[10px] font-semibold text-gray-900 cursor-pointer select-none">
            <i class="fas fa-upload"></i>
            <span>Subir documento de identidad</span>
        </label>
        <input accept=".png,.jpg,.jpeg" class="hidden" id="fileInput" type="file" />
        <div id="checkIcon" class="hidden border border-gray-700 rounded p-1">
            <i class="fas fa-check text-green-600 text-sm"></i>
        </div>
    </div>
    <p id="uploadMessage" class="text-[8px] mt-1 hidden"></p>
</section>

<aside class="flex-1 max-w-full md:max-w-[40%]">
    <img src="{{ asset('images/dukiderecho.jpg') }}" class="w-full mb-4" width="300" height="200" />
    <p class="text-[10px] font-semibold mb-1">
        MÚSICA /
        <a class="text-blue-600" href="#">PRESENCIAL</a>
    </p>
    <h2 class="text-[12px] font-extrabold mb-1">DUKI - AMERI WORLD TOUR 2025</h2>
    <p class="text-[8px] text-gray-700 mb-4">sábado, 23 de agosto 21:00 hrs.</p>
    <button id="continueBtn" class="bg-[#f7b24a] text-white text-[10px] font-semibold uppercase px-6 py-2 w-full max-w-[220px]" type="button">
        CONTINUAR
    </button>
    <p id="warningMessage" class="text-[8px] text-red-600 mt-2 hidden">Falta subir el documento de identidad.</p>
</aside>






@endsection
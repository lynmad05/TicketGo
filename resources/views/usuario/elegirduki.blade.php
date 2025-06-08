@extends('layouts.elegir')
@section('añaelegir')




        <div class="mb-4">
            <div class="inline-block bg-[#0a2a6e] text-white text-[10px] font-bold uppercase px-3 py-1">
                SELECCIONA TU FORMATO DE ENTREGA
            </div>
        </div>

        <div id="container-eticket" class="border border-yellow-400 p-3 text-[10px] text-[#333333] mb-4 relative cursor-pointer">
            <div class="flex justify-between items-center mb-1">
                <div class="flex space-x-2 text-[10px] font-semibold uppercase">
                    <span>S/0</span>
                    <span>ETICKET</span>
                </div>
                <input class="w-4 h-4 accent-yellow-400" type="radio" name="deliveryOption" id="radioEticket" checked />
            </div>
            <div id="eticket-detail">
                <ol class="list-decimal pl-4 space-y-1 text-[9px] text-[#333333]">
                    <li>Descarga tus E-tickets desde www.teleticket.com.pe en "MIS ETICKETS".</li>
                    <li>El E-ticket es válido y no se canjea por entrada física.</li>
                    <li>Puedes usarlo en digital o impreso (deportes requieren impreso).</li>
                    <li>No lo compartas, podría impedir tu ingreso.</li>
                    <li>El primero en usarlo será quien acceda.</li>
                </ol>
            </div>
        </div>

        <div id="container-retiro" class="border border-gray-300 p-3 text-[10px] text-[#333333] mb-4 relative cursor-pointer">
            <div class="flex justify-between items-center mb-1">
                <div class="flex space-x-2 text-[10px] font-semibold uppercase">
                    <span>S/12</span>
                    <span>RETIRO DE TIENDA</span>
                </div>
                <input class="w-4 h-4 accent-yellow-400" type="radio" name="deliveryOption" id="radioRetiro" />
            </div>
            <div id="retiro-detail" class="hidden">
                <ol class="list-decimal pl-4 space-y-1 text-[9px] text-[#333333]">
                    <li>Presenta tu DNI y código de compra.</li>
                    <li>Horario: Lunes a sábado de 10:00 a 19:00 hrs.</li>
                    <li>Solo el comprador o autorizado puede retirar.</li>
                    <li>No hay devoluciones ni cambios.</li>
                    <li>Conserva tu comprobante de compra.</li>
                </ol>
            </div>
        </div>

        <div class="border-t border-gray-300 pt-2 text-[10px]">
            <table class="w-full text-gray-600">
                <tbody>
                    <tr class="border-b border-gray-300">
                        <td class="py-1">1 TICKET</td>
                        <td class="py-1">CANCHA VIP</td>
                        <td class="py-1 text-right">S/ 345.00</td>
                    </tr>
                    <tr class="border-b border-gray-300">
                        <td class="py-1">1 TICKET</td>
                        <td class="py-1">CANCHA PREFERENCIAL</td>
                        <td class="py-1 text-right">S/ 288.00</td>
                    </tr>
                    <tr class="border-b border-gray-300">
                        <td class="py-1">1 TICKET</td>
                        <td class="py-1">CANCHA GENERAL</td>
                        <td class="py-1 text-right">S/ 173.00</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mt-2 text-[10px] font-semibold flex justify-end space-x-1">
            <span>TOTAL</span>
            <span class="text-base font-bold">S/. 806.00</span>
        </div>
    </section>

    <aside class="hidden lg:flex flex-col w-[360px] bg-white border-l border-gray-200 px-6 py-6">
        <img class="w-full h-[180px] object-cover mb-4" src="{{ asset('images/dukiderecho.jpg') }}" />
        <div class="text-[10px] font-semibold uppercase text-black mb-1">
            MÚSICA <a href="#" class="text-blue-600 hover:underline ml-1">/ PRESENCIAL</a>
        </div>
        <h2 class="text-base font-extrabold text-black mb-1 leading-tight">DUKI - AMERI WORLD TOUR 2025</h2>
        <p class="text-[10px] text-gray-600 mb-6">sábado, 23 de agosto 21:00 hrs.</p>
        <a href="{{ route('pagoduki') }}" class="bg-[#f7b32b] text-white uppercase font-bold text-sm py-3 rounded shadow-md hover:shadow-lg transition-shadow inline-block text-center">
            CONTINUAR
        </a>
    </aside>
</main>


@endsection
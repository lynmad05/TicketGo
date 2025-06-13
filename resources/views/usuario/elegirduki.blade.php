@extends('layouts.elegir')
@section('añaelegir')

<form action="{{ route('guardar.formatoEntrega') }}" method="POST">
    @csrf

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
            <input class="w-4 h-4 accent-yellow-400" type="radio" name="formato_entrega" value="eticket" id="radioEticket" checked />
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
            <input class="w-4 h-4 accent-yellow-400" type="radio" name="formato_entrega" value="retiro" id="radioRetiro" />
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
                @php $total = $total ?? 0; @endphp
                @foreach($tickets as $tipo => $ticket)
                    @if ($ticket['cantidad'] > 0)
                        @php
                            $subtotal = $ticket['cantidad'] * $ticket['precio'];
                        @endphp
                        <tr class="border-b border-gray-300">
                            <td class="py-1">{{ $ticket['cantidad'] }} TICKET{{ $ticket['cantidad'] > 1 ? 'S' : '' }}</td>
                            <td class="py-1">
                                @switch($tipo)
                                    @case('vip') CANCHA VIP @break
                                    @case('preferencial') CANCHA PREFERENCIAL @break
                                    @case('general') CANCHA GENERAL @break
                                @endswitch
                            </td>
                            <td class="py-1 text-right">S/ {{ number_format($subtotal, 1) }}</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-2 text-[10px] font-semibold flex justify-end space-x-1">
        <span>TOTAL</span>
        <span class="text-base font-bold" id="totalFinal">S/. {{ number_format($total, 1) }}</span>
        <input type="hidden" name="total_final" id="inputTotalFinal" value="{{ $total }}">
    </div>

    <div class="mt-4">
        <button type="submit" class="w-full bg-[#f7b32b] text-white uppercase font-bold text-sm py-3 rounded shadow-md hover:shadow-lg transition-shadow text-center">
            CONTINUAR
        </button>
    </div>
</form>

<aside class="hidden lg:flex flex-col w-[360px] bg-white border-l border-gray-200 px-6 py-6">
    <img class="w-full h-[180px] object-cover mb-4" src="{{ asset('images/dukiderecho.jpg') }}" />
    <div class="text-[10px] font-semibold uppercase text-black mb-1">
        MÚSICA <a href="#" class="text-blue-600 hover:underline ml-1">/ PRESENCIAL</a>
    </div>
    <h2 class="text-base font-extrabold text-black mb-1 leading-tight">DUKI - AMERI WORLD TOUR 2025</h2>
    <p class="text-[10px] text-gray-600 mb-6">sábado, 23 de agosto 21:00 hrs.</p>
    <a href="{{ route('pagoduki') }}" class="bg-[#f7b32b] text-white uppercase font-bold text-sm py-3 rounded shadow-md hover:shadow-lg transition-shadow text-center block">
        CONTINUAR
    </a>
</aside>

@endsection

<script>
    const radioEticket = document.getElementById('radioEticket');
    const radioRetiro = document.getElementById('radioRetiro');
    const eticketDetail = document.getElementById('eticket-detail');
    const retiroDetail = document.getElementById('retiro-detail');
    const totalSpan = document.getElementById('totalFinal');
    const totalInput = document.getElementById('inputTotalFinal');
    const totalOriginal = parseFloat("{{ $total }}");

    function actualizarTotal() {
        let envio = 0;
        if (radioRetiro.checked) envio = 12;

        const totalFinal = totalOriginal + envio;
        totalSpan.textContent = `S/. ${totalFinal.toFixed(2)}`;
        totalInput.value = totalFinal.toFixed(2);
    }

    radioEticket.addEventListener('change', () => {
        eticketDetail.classList.remove('hidden');
        retiroDetail.classList.add('hidden');
        actualizarTotal();
    });

    radioRetiro.addEventListener('change', () => {
        retiroDetail.classList.remove('hidden');
        eticketDetail.classList.add('hidden');
        actualizarTotal();
    });

    window.addEventListener('DOMContentLoaded', actualizarTotal);
</script>

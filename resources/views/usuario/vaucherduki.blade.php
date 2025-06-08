@extends('layouts.vaucher')
@section('añavaucher')


<main class="max-w-5xl mx-auto p-8 pt-20">
    <section class="bg-white rounded-xl shadow-lg p-10 max-w-3xl mx-auto">
        <h1 class="text-4xl font-extrabold text-gray-900 mb-6">
            ¡Compra Confirmada!
        </h1>
        <p class="text-lg mb-8 text-gray-600 leading-relaxed">
            Gracias por tu compra. A continuación, encontrarás el voucher con los detalles de tu adquisición. Por favor, guarda este comprobante para presentarlo en el evento.
        </p>

        <div class="border border-gray-200 rounded-lg p-6 bg-gray-50">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Voucher de Compra</h2>

            <dl class="grid grid-cols-1 gap-6 text-sm text-gray-700">
                <div>
                    <dt class="font-semibold">Evento</dt>
                    <dd>DUKI - AMERI WORLD TOUR 2025</dd>
                </div>
                <div>
                    <dt class="font-semibold">Fecha y Hora</dt>
                    <dd>Sábado, 23 de agosto 21:00 hrs</dd>
                </div>
                <div>
                    <dt class="font-semibold">Entradas</dt>
                    <dd>1 Ticket Cancha VIP - S/ 345.00</dd>
                    <dd>1 Ticket Cancha Preferencial - S/ 288.00</dd>
                    <dd>1 Ticket Cancha General - S/ 173.00</dd>
                </div>
                <div>
                    <dt class="font-semibold">Total Pagado</dt>
                    <dd class="text-lg font-bold">S/ 806.00</dd>
                </div>
                <div>
                    <dt class="font-semibold">Número de Orden</dt>
                    <dd>TG-2025-08-23001</dd>
                </div>
                <div>
                    <dt class="font-semibold">Método de Pago</dt>
                    <dd>Tarjeta de crédito</dd>
                </div>
                <div>
                    <dt class="font-semibold">Comprador</dt>
                    <dd>Juan Pérez</dd>
                </div>
            </dl>

            <div class="mt-10 flex justify-center">
                <button onclick="window.print();" class="bg-black text-white uppercase font-semibold px-6 py-3 rounded-lg shadow-md hover:bg-gray-900 transition">
                    Imprimir Voucher
                </button>
            </div>
        </div>
    </section>
</main>



@endsection
@extends('layouts.compraslayout')
@section('compras')

<div class="max-w-5xl mx-auto py-8 space-y-6">
    @if ($compras->count() > 0)
        <div class="space-y-6">
            @foreach ($compras as $compra)
                <section class="bg-white rounded-xl shadow-md border border-gray-200 hover:shadow-lg transition-shadow duration-300">
                    <header class="bg-yellow-500 rounded-t-xl px-6 py-3 flex justify-between items-center">
                        <h2 class="font-semibold text-gray-900 text-lg">Compra #{{ $compra->id }}</h2>
                        <span class="text-sm font-medium text-gray-700">{{ \Carbon\Carbon::parse($compra->created_at)->format('d M Y') }}</span>
                    </header>
                    <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-4 text-gray-800 text-sm">
                        <div class="space-y-1 border-b border-gray-200 pb-4">
                            <p class="font-semibold uppercase tracking-wide">Número de Orden</p>
                            <p>#{{ $compra->id }}</p>
                        </div>
                        <div class="space-y-1 border-b border-gray-200 pb-4">
                            <p class="font-semibold uppercase tracking-wide">Estado</p>
                            <p>
                                <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold
                                    @if ($compra->estado == 'pagado') bg-green-100 text-green-800
                                    @elseif($compra->estado == 'pendiente') bg-yellow-100 text-yellow-800
                                    @else bg-gray-100 text-gray-600 @endif">
                                    {{ ucfirst($compra->estado) }}
                                </span>
                            </p>
                        </div>
                        <div class="space-y-1 border-b border-gray-200 pb-4">
                            <p class="font-semibold uppercase tracking-wide">Evento</p>
                            <p>{{ $compra->evento?->nombre ?? 'Evento no especificado' }}</p>
                        </div>
                        <div class="space-y-1 border-b border-gray-200 pb-4">
                            <p class="font-semibold uppercase tracking-wide">Tipo de Envío</p>
                            <p>{{ ucfirst($compra->formato_entrega ?? 'No especificado') }}</p>
                        </div>
                        <div class="space-y-1 border-b border-gray-200 pb-4">
                            <p class="font-semibold uppercase tracking-wide">Tickets</p>
                            <p>
                                @foreach ($compra->detalles as $detalle)
                                    {{ $detalle->cantidad }} x {{ $detalle->tipo_ticket }}<br>
                                @endforeach
                            </p>
                        </div>
                        <div class="space-y-1 border-b border-gray-200 pb-4">
                            <p class="font-semibold uppercase tracking-wide">Medio de Pago</p>
                            <p>Transferencia Bancaria</p>
                        </div>
                        <div class="space-y-1 md:col-span-2 text-right border-b border-gray-200 pb-4">
                            <p class="font-semibold uppercase tracking-wide">Total</p>
                            <p class="text-lg font-bold">S/. {{ number_format($compra->total, 2) }}</p>
                        </div>
                        <div class="space-y-1 md:col-span-2">
                            <p class="font-semibold uppercase tracking-wide">Documento Electrónico</p>
                            <p>
                                @if ($compra->estado == 'pagado')
                                    <a href="{{ route('usuario.Voucher', $compra->id) }}"
                                        class="text-yellow-600 hover:text-yellow-700 underline font-semibold">
                                        Ver Voucher
                                    </a>
                                @else
                                    <span class="text-gray-400 italic">No disponible</span>
                                @endif
                            </p>
                        </div>
                    </div>
                </section>
            @endforeach
        </div>
    @else
        <section class="bg-white rounded-xl shadow-md border border-gray-200 max-w-md mx-auto p-8 text-center">
            <h2 class="text-xl font-semibold text-gray-900 mb-4">Mis Compras</h2>
            <p class="text-gray-600 mb-6">No tienes compras registradas aún.</p>
            <a href="{{ route('usuario.principallog') }}"
                class="inline-block bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-semibold py-2 px-6 rounded-full transition-colors">
                Ver Eventos Disponibles
            </a>
        </section>
    @endif
</div>

@endsection

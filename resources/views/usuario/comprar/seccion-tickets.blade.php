{{-- Sección de Selección de Tickets --}}
<section id="seccion-tickets">
    <div class="mb-4 bg-white rounded-lg shadow p-6 px-6 w-full md:w-full mx-4">
        {{-- Barra de pasos --}}
        <div class="flex items-center gap-6 mb-10 text-sm md:text-base font-semibold uppercase justify-start" id="barra-pasos-tickets">
            <div class="flex items-center space-x-2 text-black relative">
                <span class="w-6 h-6 md:w-7 md:h-7 rounded-full border-2 border-black flex items-center justify-center bg-black">
                    <span class="block w-3 h-3 rounded-full bg-white"></span>
                </span>
                <span class="tracking-wide">Tickets</span>
                <span class="absolute bottom-0 left-0 right-0 h-[2px] bg-black -mb-5 md:-mb-6"></span>
            </div>
            <span class="text-gray-400 text-lg font-bold">/</span>
            <div class="flex items-center space-x-2 text-gray-400">
                <span class="w-6 h-6 md:w-7 md:h-7 rounded-full border border-gray-400 flex items-center justify-center">
                    <span class="block w-3 h-3 rounded-full bg-gray-400"></span>
                </span>
                <span class="tracking-wide">Datos de compra</span>
            </div>
            <span class="text-gray-400 text-lg font-bold">/</span>
            <div class="flex items-center space-x-2 text-gray-400">
                <span class="w-6 h-6 md:w-7 md:h-7 rounded-full border border-gray-400 flex items-center justify-center">
                    <span class="block w-3 h-3 rounded-full bg-gray-400"></span>
                </span>
                <span class="tracking-wide">Confirmado</span>
            </div>
        </div>

        <div class="px-4 py-2 bg-[#0a2f7a]">
            <p class="text-xs font-bold text-white uppercase">SELECCIONA TU UBICACIÓN EN EL MAPA</p>
        </div>

        <div class="mb-4">
            @php
                $ubicacion = strtolower(str_replace(' ', '', $evento->ubicacion));
                $mapa = match ($ubicacion) {
                    'costa21' => 'costa21.png',
                    'estadionacional' => 'estadionacional.png',
                    'teatrocanout' => 'teatro.png',
                    'anfiteatrop.exposición' => 'parqueexpo.png',
                    default => 'mapa_default.png',
                };
            @endphp

            <img src="{{ asset('images/' . $mapa) }}" alt="Mapa" class="w-full max-w-xs mx-auto">
        </div>
            <!-- Cantidad entradas-->

        <div class="mb-4">
            <div class="flex flex-col gap-2" id="entradas-lista">
            @foreach ($evento->entradas as $entrada)
                @php
                    $maximo = min($entrada->ticket_por_persona, $entrada->stock);
                @endphp
                <div class="flex items-center justify-between entrada-item" data-id="{{ $entrada->id }}"
                    data-tipo="{{ strtoupper($entrada->tipo) }}" data-precio="{{ $entrada->precio }}"
                    style="gap: 1rem;">

                    <div class="w-1/3 font-semibold">
                        {{ strtoupper($entrada->tipo) }}
                    </div>

                    <div class="w-1/3">
                        S/. {{ number_format($entrada->precio, 2) }}
                    </div>

                    <div class="w-1/3 flex items-center space-x-2">
                        <button type="button" class="decrease border border-gray-300 rounded px-2 py-0.5 text-xs font-bold">-</button>
                        <input 
                            type="number" 
                            min="0" 
                            max="{{ $maximo }}" 
                            value="0"
                            class="border rounded w-16 text-center cantidad-input" 
                            name="cantidad[{{ $entrada->id }}]"
                        >
                        <button type="button" class="increase border border-gray-300 rounded px-2 py-0.5 text-xs font-bold">+</button>
                    </div>

                    <div class="flex flex-col text-xs text-gray-500 ml-4">
                        <span>Máx: {{ $maximo }}</span>
                        <span>Stock: {{ $entrada->stock }}</span>
                    </div>
                </div>
            @endforeach
        </div>

            {{-- BLOQUE DE PROMOCIONES --}}
            <div class="flex flex-col gap-2 mt-6" id="promociones-lista">
                <h4 class="font-bold text-yellow-700">PROMOCIONES DISPONIBLES</h4>
                @foreach ($promociones as $promo)
                    <div class="flex items-center justify-between promo-item border border-yellow-300 rounded p-2 bg-yellow-50"
                        data-id="{{ $promo->id_promocion }}" data-nombre="{{ $promo->nombre }}"
                        data-precio="{{ $promo->valor ?? 0 }}">
                        <div>
                            <span class="font-semibold">{{ $promo->nombre }}</span>
                            <span class="text-xs text-gray-600 ml-2">{{ $promo->descripcion }}</span>
                        </div>
                        <span>S/. {{ number_format($promo->valor ?? 0, 2) }}</span>
                        <input type="radio" name="promo_seleccionada" value="{{ $promo->id_promocion }}"
                            class="promo-radio">
                    </div>
                @endforeach
            </div>

            <div class="px-4 pb-6 flex justify-end">
                <button id="agregarBtn" class="bg-gray-300 hover:bg-gray-400 text-black font-bold py-1.5 px-6 rounded shadow mt-4 text-sm mr-[-18px]" 
                type="submit"> Agregar </button>
            </div>


        </div>

        {{-- Resumen --}}
        <div class="mt-6">
            <h3 class="font-bold mb-2">RESUMEN</h3>
            <ul id="resumen-lista" class="mb-2"></ul>
            <div class="font-bold text-right mt-2">SUBTOTAL: S/. <span id="total-monto">0.00</span></div>
        </div>

        <div class="mt-6 flex justify-center gap-4">
            <button id="volverBtn"
                class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-8 rounded-full shadow mt-4">
                Volver
            </button>
            <button id="continuarBtn"
                class="bg-blue-700 hover:bg-blue-600 text-white font-bold py-2 px-8 rounded-full shadow mt-4">
                Continuar
            </button>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const entradasLista = document.getElementById('entradas-lista');

        entradasLista.querySelectorAll('.entrada-item').forEach(item => {
            const decreaseBtn = item.querySelector('.decrease');
            const increaseBtn = item.querySelector('.increase');
            const input = item.querySelector('.cantidad-input');
            const max = parseInt(input.max);

            decreaseBtn.addEventListener('click', () => {
                let val = parseInt(input.value) || 0;
                if (val > 0) {
                    input.value = val - 1;
                }
            });

            increaseBtn.addEventListener('click', () => {
                let val = parseInt(input.value) || 0;
                if (val < max) {
                    input.value = val + 1;
                }
            });
        });
    });
</script>

</section>

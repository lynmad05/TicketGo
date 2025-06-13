@extends('layouts.identificadorlayout')
@section('añaidentificador')

<div class="flex flex-col md:flex-row gap-6 px-4 py-4">

    <!-- LADO IZQUIERDO -->
    <main class="flex-1 md:max-w-[60%]">
        <table class="w-full text-[10px] text-gray-900 mb-6 border-collapse">
            <thead>
                <tr>
                    <th class="text-left font-normal pb-2">RESUMEN</th>
                    <th class="text-right font-normal pb-2">PRECIO</th>
                    <th class="text-right font-normal pb-2">TOTAL</th>
                </tr>
            </thead>
            <tbody>
                @foreach($resumen as $item)
                    <tr class="border-t border-gray-300">
                        <td class="py-2">{{ $item['descripcion'] }}</td>
                        <td class="py-2 text-right">S/ {{ number_format($item['precio'], 2) }}</td>
                        <td class="py-2 text-right">S/ {{ number_format($item['total'], 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="text-right text-[12px] font-semibold text-gray-700 mb-6">
            S/. {{ number_format($totalFinal, 2) }}
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
    </main>

    <!-- LADO DERECHO -->
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
</div>

<script>
document.getElementById('fileInput').addEventListener('change', async function () {
    const file = this.files[0];
    if (!file) return;

    const formData = new FormData();
    formData.append('documento', file);
    const csrfToken = '{{ csrf_token() }}';

    try {
        const response = await fetch('{{ route("documento.simular") }}', {
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': csrfToken },
            body: formData
        });

        if (response.ok) {
            document.getElementById('checkIcon').classList.remove('hidden');
            document.getElementById('uploadMessage').textContent = "Documento cargado correctamente.";
            document.getElementById('uploadMessage').classList.remove('hidden');
            document.getElementById('continueBtn').dataset.valid = 'true';
        } else {
            document.getElementById('uploadMessage').textContent = "Error al subir el documento.";
            document.getElementById('uploadMessage').classList.remove('hidden');
        }
    } catch (error) {
        document.getElementById('uploadMessage').textContent = "Error de red.";
        document.getElementById('uploadMessage').classList.remove('hidden');
    }
});

document.getElementById('continueBtn').addEventListener('click', function () {
    if (this.dataset.valid === 'true') {
       window.location.href = "{{ route('usuario.vaucherduki') }}";
    } else {
        document.getElementById('warningMessage').classList.remove('hidden');
    }
});
</script>

@endsection

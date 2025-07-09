@extends('layouts.ad-plantilla')

@section('titulo', 'Nueva Promoción')

@section('contenido')
    <div class="w-full max-w-2xl mx-auto bg-white p-8 mt-10 rounded shadow border">
        <h2 class="text-2xl font-bold mb-6 text-black">Agregar promoción</h2>

        <form action="{{ route('admin.promociones.store') }}" method="POST">
            @csrf

            <div class="flex items-center mb-4">
                <label for="nombre" class="w-32 text-gray-700 font-semibold">Nombre</label>
                <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}"
                    class="flex-1 border rounded px-3 py-2 focus:outline-none focus:ring-1 focus:ring-black"
                    placeholder="Ingrese el nombre de la promoción" required>
            </div>

            <div class="flex items-center mb-4">
                <label for="tipo" class="w-32 text-gray-700 font-semibold">Tipo</label>
                <select id="tipo" name="tipo"
                    class="flex-1 border rounded px-3 py-2 focus:outline-none focus:ring-1 focus:ring-black" required>
                    <option value="">Selecciona un tipo</option>
                    <option value="MONTO" {{ old('tipo') == 'MONTO' ? 'selected' : '' }}>Monto</option>
                    <option value="2x1" {{ old('tipo') == '2x1' ? 'selected' : '' }}>2x1</option>
                </select>
            </div>


            <div class="flex items-center mb-4">
                <label for="valor" class="w-32 text-gray-700 font-semibold">Valor</label>
                <input type="number" step="0.01" id="valor" name="valor" value="{{ old('valor') }}"
                    class="flex-1 border rounded px-3 py-2 focus:outline-none focus:ring-1 focus:ring-black"
                    placeholder="Ingrese un valor acorde al tipo" required>
            </div>

            <div class="flex items-center mb-4">
                <label for="id_evento" class="w-32 text-gray-700 font-semibold">Evento</label>
                <select id="id_evento" name="id_evento"
                    class="flex-1 border rounded px-3 py-2 focus:outline-none focus:ring-1 focus:ring-black" required>
                    <option value="">Seleccionar</option>
                    @foreach ($eventos as $evento)
                        <option value="{{ $evento->id_evento }}">{{ Str::limit($evento->nombre, 50) }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex items-center mb-4">
                <label for="fecha_inicio" class="w-32 text-gray-700 font-semibold">Fecha Inicio</label>
                <input type="date" id="fecha_inicio" name="fecha_inicio" value="{{ old('fecha_inicio') }}"
                    class="flex-1 border rounded px-3 py-2 focus:outline-none focus:ring-1 focus:ring-black" required>
            </div>

            <div class="flex items-center mb-4">
                <label for="fecha_fin" class="w-32 text-gray-700 font-semibold">Fecha Fin</label>
                <input type="date" id="fecha_fin" name="fecha_fin" value="{{ old('fecha_fin') }}"
                    class="flex-1 border px-3 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-black" required>
            </div>

            <div class="flex items-center mb-6">
                <label for="estado" class="w-32 text-gray-700 font-semibold">Estado</label>
                <div class="flex-1">
                    <label class="inline-flex items-center mr-4">
                        <input type="radio" name="estado" value="ACTIVO" class="mr-1"
                            {{ old('estado', 'ACTIVO') == 'ACTIVO' ? 'checked' : '' }}>
                        Activo
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" name="estado" value="INACTIVO" class="mr-1"
                            {{ old('estado') == 'INACTIVO' ? 'checked' : '' }}>
                        Inactivo
                    </label>
                </div>
            </div>

            <div class="flex justify-between">
                <button type="submit"
                    class="bg-blue-700 text-white px-6 py-2 rounded font-semibold hover:bg-blue-800">Guardar</button>
                <a href="{{ route('admin.promociones.index') }}"
                    class="bg-yellow-400 text-black px-4 py-2 rounded hover:bg-yellow-500">Cancelar</a>
            </div>
        </form>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const tipoInput = document.getElementById('tipo');
                const valorInput = document.getElementById('valor');

                function ajustarValidacion() {
                    const tipo = tipoInput.value;

                    if (tipo === 'MONTO') {
                        valorInput.type = 'number';
                        valorInput.min = 0;
                        valorInput.step = '0.01';
                        valorInput.removeAttribute('max');
                        valorInput.placeholder = 'Ingrese el monto de las entradas';
                        valorInput.disabled = false;
                    } else if (tipo === '2x1') {
                        valorInput.type = 'number';
                        valorInput.min = 0;
                        valorInput.step = '0.01';
                        valorInput.placeholder = 'Ingrese el monto del 2x1';
                        valorInput.removeAttribute('max');
                        valorInput.disabled = false;
                    } else {
                        valorInput.type = 'text';
                        valorInput.placeholder = 'Seleccione primero el tipo de promoción';
                        valorInput.removeAttribute('min');
                        valorInput.removeAttribute('max');
                        valorInput.removeAttribute('step');
                        valorInput.disabled = true;
                        valorInput.value = '';
                    }
                }

                tipoInput.addEventListener('change', ajustarValidacion);
                ajustarValidacion();
            });
        </script>
    </div>
@endsection

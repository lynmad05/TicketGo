@extends('layouts.ad-plantilla')

@section('titulo', 'Agregar Proveedor')

@section('contenido')
    <div class="w-full max-w-2xl mx-auto bg-white p-8 mt-10 rounded shadow border">
        <h2 class="text-2xl font-bold mb-6 text-black">Agregar proveedor</h2>

        <form action="{{ route('admin.proveedores.store') }}" method="POST">
            @csrf

            <div class="flex items-center mb-4">
                <label for="nombre" class="w-32 text-gray-700 font-semibold">Nombre</label>
                <input type="text" id="nombre" name="nombre"
                    class="flex-1 border rounded px-3 py-2 focus:outline-none focus:ring-1 focus:ring-black"
                    placeholder="Ingresar nombre">
            </div>


            <div class="flex items-center mb-4">
                <label for="correo" class="w-32 text-gray-700 font-semibold">Correo</label>
                <input type="email" name="correo" id="correo"
                    class="flex-1 border rounded px-3 py-2 focus:outline-none focus:ring-1 focus:ring-black"
                    placeholder="Ingresar correo electrónico" required>
            </div>

            <div class="flex items-center mb-4">
                <label for="telefono" class="w-32 text-gray-700 font-semibold">Teléfono</label>
                <input type="text" name="telefono" id="telefono"
                    class="flex-1 border rounded px-3 py-2 focus:outline-none focus:ring-1 focus:ring-black"
                    placeholder="Ingresar numero de telefono" maxlength="11"
                    oninput="let val = this.value.replace(/[^0-9]/g, '').slice(0,9);
                        this.value = val.replace(/(\d{3})(\d{3})(\d{0,3})/, function(_, a, b, c){ return a + (b ? ' ' + b : '') + (c ? ' ' + c : ''); });"
                    inputmode="numeric">
            </div>

            <div class="flex items-center mb-4">
                <label for="empresa" class="w-32 text-gray-700 font-semibold">Empresa</label>
                <input type="text" name="empresa" id="empresa"
                    class="flex-1 border rounded px-3 py-2 focus:outline-none focus:ring-1 focus:ring-black"
                    placeholder="Ingresar nombre de la empresa">
            </div>

            <div class="flex items-center mb-6">
                <label for="estado" class="w-32 text-gray-700 font-semibold">Estado</label>
                <select name="estado" id="estado"
                    class="flex-1 border rounded px-3 py-2 focus:outline-none focus:ring-1 focus:ring-black">
                    <option value="ACTIVO">Activo</option>
                    <option value="INACTIVO">Inactivo</option>
                </select>
            </div>

            <div class="flex justify-between">
                <button type="submit"
                    class="bg-blue-700 text-white px-6 py-2 rounded font-semibold hover:bg-blue-800">Guardar</button>
                <a href="{{ route('admin.proveedores.index') }}"
                    class="bg-yellow-400 text-black px-4 py-2 rounded hover:bg-yellow-500">Cancelar</a>
            </div>
        </form>
    </div>
@endsection

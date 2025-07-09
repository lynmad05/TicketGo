@extends('layouts.ad-plantilla')
@section('titulo', 'Gestión de Proveedores')
@section('contenido')
    <!-- Gestión de Proveedores -->
    <div class="w-full bg-white p-8 shadow-md mt-8 rounded-md">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-black">Gestión de Proveedores</h2>
            <a href="{{ route('admin.proveedores.create') }}"
                class="bg-blue-700 hover:bg-blue-800 text-white px-4 py-2 rounded-md font-semibold">
                + Nuevo Proveedor
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border border-black-200 rounded-md">
                <thead class="bg-blue-700">
                    <tr>
                        <th class="px-4 py-2 font-semibold text-white">NOMBRE</th>
                        <th class="px-4 py-2 font-semibold text-white">CORREO</th>
                        <th class="px-4 py-2 font-semibold text-white">ESTADO</th>
                        <th class="px-4 py-2 font-semibold text-white">ACCIONES</th>
                    </tr>
                </thead>
                <tbody class="text-gray-800">
                    @foreach ($proveedores as $proveedor)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $proveedor->nombre }}</td>
                            <td class="px-4 py-2">{{ $proveedor->correo }}</td>
                            <td
                                class="px-4 py-2 font-bold {{ $proveedor->estado == 'ACTIVO' ? 'text-green-600' : 'text-red-600' }}">
                                {{ $proveedor->estado == 'ACTIVO' ? '🟢 ACTIVO' : '🔴 INACTIVO' }}
                            </td>
                            <td class="px-4 py-2 space-x-2">
                                <a href="{{ route('admin.proveedores.edit', $proveedor->id_proveedor) }}"
                                    class="px-4 py-1 text-sm font-semibold text-white border bg-blue-700 rounded hover:bg-blue-800 transition">
                                    Editar
                                </a>
                                <form action="{{ route('admin.proveedores.destroy', $proveedor->id_proveedor) }}"
                                    method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('¿Estás seguro?')"
                                        class="px-4 py-1 text-sm font-semibold text-black border bg-yellow-400 rounded hover:bg-yellow-500 transition">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>

@endsection

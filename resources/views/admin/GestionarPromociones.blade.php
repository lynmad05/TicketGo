@extends('layouts.ad-plantilla')

@section('contenido')
    <!-- Gestión de Promociones -->
    <div class="w-full bg-white p-8 shadow-md mt-8 rounded-md">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-black">Gestión de Promociones</h2>
            <a href="{{ route('admin.promociones.create') }}"
                class="bg-blue-700 hover:bg-blue-800 text-white px-4 py-2 rounded-md font-semibold">
                + Nueva Promoción
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border border-black-200 rounded-md">
                <thead class="bg-blue-700">
                    <tr>
                        <th class="px-4 py-2 font-semibold text-white">NOMBRE</th>
                        <th class="px-4 py-2 font-semibold text-white">TIPO</th>
                        <th class="px-4 py-2 font-semibold text-white">EVENTO</th>
                        <th class="px-4 py-2 font-semibold text-white">INICIO</th>
                        <th class="px-4 py-2 font-semibold text-white">FIN</th>
                        <th class="px-4 py-2 font-semibold text-white">ESTADO</th>
                        <th class="px-4 py-2 font-semibold text-white">ACCIONES</th>
                    </tr>
                </thead>
                <tbody class="text-gray-800">
                    @foreach ($promociones as $promocion)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $promocion->nombre }}</td>
                            <td class="px-4 py-2">{{ $promocion->tipo }}</td>
                            <td class="px-4 py-2">
                                @if($promocion->evento)
                                    <span title="{{ $promocion->evento->nombre }}">
                                        {{ Str::limit($promocion->evento->nombre, 25) }}
                                    </span>
                                @else
                                    Sin evento
                                @endif
                            </td>
                            <td class="px-4 py-2">{{ \Carbon\Carbon::parse($promocion->fecha_inicio)->format('d/m/Y') }}
                            </td>
                            <td class="px-4 py-2">{{ \Carbon\Carbon::parse($promocion->fecha_fin)->format('d/m/Y') }}</td>
                            <td
                                class="px-4 py-2 font-bold {{ $promocion->estado == 'ACTIVO' ? 'text-green-600' : 'text-red-600' }}">
                                {{ $promocion->estado == 'ACTIVO' ? '🟢 ACTIVO' : '🔴 INACTIVO' }}
                            </td>
                            <td class="px-4 py-2 space-x-2">
                                <a href="{{ route('admin.promociones.edit', $promocion->id_promocion) }}"
                                    class="px-4 py-1 text-sm font-semibold bg-blue-700 text-white border rounded hover:bg-blue-800 transition">
                                    Editar
                                </a>
                                <form action="{{ route('admin.promociones.destroy', $promocion->id_promocion) }}"
                                    method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('¿Estás seguro de eliminar esta promoción?')"
                                        class="px-4 py-1 text-sm font-semibold bg-yellow-400 text-black border rounded hover:bg-yellow-500 transition">
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

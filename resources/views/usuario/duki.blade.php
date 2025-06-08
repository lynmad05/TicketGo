@extends('layouts.vista')
@section('aña')



<main class="flex flex-col items-center px-4 mt-6  mx-auto bg-[url('{{ asset('images/evento.png') }}')] bg-cover bg-center bg-no-repeat rounded-md">
    <div class="relative w-full max-w-[400px]">

        <img src="{{ asset('images/duki.png') }}" class="w-full object-cover" width="400" height="400" />

        <div class="absolute inset-0 flex flex-col items-center justify-center text-white font-extrabold" style="font-family: 'Roboto', sans-serif;">
            <img src="{{ asset('images/dukilogo.png') }}" class="w-full object-cover" width="400" height="400" />

            <img src="{{ asset('images/mapa.png') }}" class="w-full object-cover" width="400" height="400" />
            <div class="w-full max-w-[400px] bg-[#5A5A5A] text-white mt-2 rounded-b-md shadow-lg" style="font-family: 'Roboto', sans-serif;">
                <div class="flex items-center justify-between px-3 py-1 border-b border-[#3B3B3B]">
                    <div class="flex items-center space-x-1">
                        <i class="fas fa-star text-[#D20B0B]"></i>
                        <span class="text-xs font-semibold">Paquetes VIP</span>
                    </div>
                    <a href="#" class="text-xs text-[#7B7B7B] hover:underline">Más información</a>
                </div>
                <table class="w-full text-xs text-[#B3B3B3] border-collapse">
                    <thead>
                        <tr class="text-[#D20B0B] text-[10px] font-bold">
                            <th class="py-1 px-2 text-left">SECTORES</th>
                            <th class="py-1 px-2 text-right bg-[#D20B0B] rounded-tr-md">REGULAR</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-t border-[#3B3B3B]">
                            <td class="py-1 px-2">HYPERX PLUS</td>
                            <td class="py-1 px-2 text-right">S/633.00</td>
                        </tr>
                        <tr class="border-t border-[#3B3B3B] bg-[#3B3B3B]">
                            <td class="py-1 px-2">BELAMARTE</td>
                            <td class="py-1 px-2 text-right">S/518.00</td>
                        </tr>
                        <tr class="border-t border-[#3B3B3B]">
                            <td class="py-1 px-2">FLYTMESA</td>
                            <td class="py-1 px-2 text-right">S/460.00</td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>

    </div>

    <a href="{{ route('usuario.compraduki') }}" class="mt-4 mb-8 bg-[#E6A400] hover:bg-[#C48B00] text-white font-bold text-[12px] py-2 px-8 rounded-full inline-block text-center" style="font-family: 'Roboto', sans-serif;">
        REGULAR
    </a>
</main>


@endsection
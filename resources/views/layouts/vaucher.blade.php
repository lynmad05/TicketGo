<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Voucher de Compra - TicketGO</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap');

        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #ffffff;
            color: #6b7280;
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body>
    <header class="sticky top-0 bg-white shadow-sm z-10 flex items-center justify-between px-8 py-4">
        <div class="text-2xl font-bold text-gray-900">TicketGO</div>
        <nav>
            <ul class="flex space-x-6 text-gray-600 text-sm">
                <li><a href="{{ route('pagina.principallog') }}" class="hover:text-gray-900 transition">Inicio</a></li>
            </ul>
        </nav>
    </header>


    @yield('añavaucher')


    <footer class="bg-black text-white py-4 min-h-[100px]">
        <div class="container px-6 flex flex-col md:flex-row items-start gap-80 ">

            <div class="mb-6 md:mb-0">
                <img src="{{ asset('images/logo.png') }}" class="w-80">
            </div>

            <div class="mb-6 md:mb-0 pt-14" style="margin-left: -10px;">
                <h4 class="text-lg font-bold mb-3">CONOZCÁMONOS</h4>
                <ul class="space-y-1 text-sm">
                    <li><a href="#" class="hover:underline">Acerca de nosotros</a></li>
                    <li><a href="{{ route('terminos') }}" class="hover:underline">Términos y condiciones</a></li>
                    <li><a href="#" class="hover:underline">Política de cookies</a></li>
                    <li><a href="#" class="hover:underline">Política de privacidad</a></li>
                    <li><a href="#" class="hover:underline">Derechos Arco</a></li>
                    <li><a href="#" class="hover:underline">Revisa tu boleta</a></li>
                </ul>
            </div>

            <div class="mb-6 md:mb-0 pt-14">
                <h4 class="text-lg font-bold mb-3">¡TRABAJEMOS JUNTOS!</h4>
                <ul class="space-y-1 text-sm">
                    <li><a href="#" class="hover:underline">¿Tienes un evento?</a></li>
                    <li><a href="#" class="hover:underline">Venta empresas</a></li>
                    <li><a href="#" class="hover:underline">Módulo promotores</a></li>
                </ul>
            </div>
        </div>
    </footer>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Punto Ticket - TicketGO</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex flex-col font-[Inter] bg-white text-[#222]">

    <!-- Header -->
    <header class="sticky top-0 z-50 bg-gradient-to-r from-[#1c237e] to-[#f8af1b] text-white font-semibold text-sm py-3">
        <div class="container mx-auto px-4">
            <a href="{{ route('pagina.principallog') }}" class="select-none">Inicio</a>
        </div>
    </header>

    <!-- Main -->
    <main class="container mx-auto px-4 flex-1">
        <!-- Logo Section -->
        <section class="flex items-center gap-4 py-6">
            <div class="flex items-center space-x-1">
                <h1 class="text-3xl font-bold text-blue-500 leading-none select-none">Ticket</h1>
                <h1 class="text-3xl font-serif font-bold text-yellow-500 leading-none select-none">GO</h1>
            </div>
        </section>

        <!-- Sección eTickets (contenido dinámico) -->
        @yield('compras')
    </main>

    <!-- Footer -->
    <footer class="bg-black text-white py-8 mt-8">
        <div class="container mx-auto px-6 flex flex-col md:flex-row items-start gap-16 md:gap-32">
            <!-- Logo -->
            <div class="mb-6 md:mb-0">
                <img src="{{ asset('images/logo.png') }}" class="w-52">
            </div>

            <!-- Conozcámonos -->
            <div class="pt-6 md:pt-14">
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

            <!-- Trabajemos Juntos -->
            <div class="pt-6 md:pt-14">
                <h4 class="text-lg font-bold mb-3">¡TRABAJEMOS JUNTOS!</h4>
                <ul class="space-y-1 text-sm">
                    <li><a href="#" class="hover:underline">¿Tienes un evento?</a></li>
                    <li><a href="#" class="hover:underline">Venta empresas</a></li>
                    <li><a href="#" class="hover:underline">Módulo promotores</a></li>
                </ul>
            </div>
        </div>
    </footer>

</body>

</html>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>TicketGO - @yield('titulo')</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />

    <style>
        body {
            font-family: "Roboto", sans-serif;
        }
    </style>
</head>

<body class="bg-white">

    <header class="bg-gradient-to-r from-[#0a4ccf] via-[#0a4ccf] to-[#d1b300] shadow-md h-20 flex items-center px-6">
        <div class="container mx-auto h-full flex justify-between items-center">
            <div>
                <a href="/">
                    <img src="{{ asset('images/logo.png') }}" class="w-32" />
                </a>
            </div>
        </div>
    </header>

    <main class="flex flex-1 max-w-7xl mx-auto w-full">
        <section class="flex-1 bg-white px-6 py-6 max-w-4xl">
            <nav class="flex items-center space-x-6 mb-8">
                <div class="flex items-center space-x-2 text-gray-300 text-xs uppercase font-semibold">
                    <button onclick="history.back()" class="text-black text-xl mr-1">
                        <i class="fas fa-arrow-left"></i>
                    </button>
                    <button class="flex items-center space-x-2 text-xs uppercase font-semibold text-black relative">
                        <span class="w-5 h-5 rounded-full border-2 border-black flex items-center justify-center bg-black">
                            <span class="block w-2.5 h-2.5 rounded-full bg-white"></span>
                        </span>
                        <span>DATOS DE COMPRA</span>
                        <span class="absolute bottom-0 left-0 right-0 h-[2px] bg-black -mb-6"></span>
                    </button>
                    <button class="flex items-center space-x-2 text-gray-300 text-xs uppercase font-semibold" disabled>
                        <span class="w-5 h-5 rounded-full border border-gray-300 flex items-center justify-center">
                            <span class="block w-2.5 h-2.5 rounded-full bg-gray-300"></span>
                        </span>
                        <span>DATOS DE COMPRA</span>
                    </button>
                    <button class="flex items-center space-x-2 text-gray-300 text-xs uppercase font-semibold" disabled>
                        <span class="w-5 h-5 rounded-full border border-gray-300 flex items-center justify-center">
                            <span class="block w-2.5 h-2.5 rounded-full bg-gray-300"></span>
                        </span>
                        <span>CONFIRMACIÓN</span>
                    </button>
            </nav>

            @yield('añaticket')

    </main>

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

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script>
        document.querySelectorAll('.increase').forEach((btn) => {
            btn.addEventListener('click', () => {
                const input = btn.parentElement.querySelector('.ticket-input');
                input.value = parseInt(input.value) + 1;
            });
        });

        document.querySelectorAll('.decrease').forEach((btn) => {
            btn.addEventListener('click', () => {
                const input = btn.parentElement.querySelector('.ticket-input');
                const currentValue = parseInt(input.value);
                if (currentValue > 0) {
                    input.value = currentValue - 1;
                }
            });
        });

        document.getElementById('add-tickets')?.addEventListener('click', () => {
            const summaryContent = document.getElementById('summary-content');
            if (!summaryContent) return;
            summaryContent.innerHTML = '';
            let totalTickets = 0;
            let totalPrice = 0;

            const ticketRows = [{
                    name: 'CANCHA VIP',
                    price: 345.00,
                    input: document.querySelectorAll('.ticket-input')[0]
                },
                {
                    name: 'CANCHA PREFERENCIAL',
                    price: 288.00,
                    input: document.querySelectorAll('.ticket-input')[1]
                },
                {
                    name: 'CANCHA GENERAL',
                    price: 173.00,
                    input: document.querySelectorAll('.ticket-input')[2]
                },
            ];

            ticketRows.forEach(row => {
                const quantity = parseInt(row.input?.value || '0');
                if (quantity > 0) {
                    totalTickets += quantity;
                    totalPrice += quantity * row.price;
                    summaryContent.innerHTML += `<p>${row.name}: ${quantity} tickets - S/ ${row.price.toFixed(2)} cada uno</p>`;
                }
            });

            if (totalTickets > 0) {
                summaryContent.innerHTML += `<p class="font-bold">Total: ${totalTickets} tickets - S/ ${totalPrice.toFixed(2)}</p>`;
                document.getElementById('summary')?.classList.remove('hidden');
            } else {
                summaryContent.innerHTML = '<p>No se ha seleccionado ningún ticket.</p>';
                document.getElementById('summary')?.classList.remove('hidden');
            }
        });
    </script>

</body>

</html>
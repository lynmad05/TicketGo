<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>TicketGO - @yield('titulo')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
</head>

<header class="bg-gradient-to-r from-[#0a4ccf] via-[#0a4ccf] to-[#d1b300] shadow-md h-20 flex items-center px-6">
    <div class="container mx-auto h-full flex justify-between items-center">
        <div>
            <a href="/">
                <img src="{{ asset('images/logo.png') }}" class="w-32" />
            </a>
        </div>
    </div>
</header>

<main class="max-w-7xl mx-auto flex flex-col md:flex-row bg-white shadow-md">
    <section class="flex-1 bg-white px-6 py-6 max-w-4xl">
        <nav class="flex items-center space-x-6 mb-8">
            <div class="flex items-center space-x-2 text-gray-300 text-xs uppercase font-semibold">
                <button onclick="history.back()" class="text-black text-xl mr-1">
                    <i class="fas fa-arrow-left"></i>
                </button>
                <span class="w-5 h-5 rounded-full border border-gray-300 flex items-center justify-center">
                    <span class="block w-2.5 h-2.5 rounded-full bg-gray-300"></span>
                </span>
                <span>TICKETS</span>
            </div>
            <button class="flex items-center space-x-2 text-xs uppercase font-semibold text-black relative">
                <span class="w-5 h-5 rounded-full border-2 border-black flex items-center justify-center bg-black">
                    <span class="block w-2.5 h-2.5 rounded-full bg-white"></span>
                </span>
                <span>DATOS DE COMPRA</span>
                <span aria-hidden="true" class="absolute bottom-0 left-0 right-0 h-[2px] bg-black -mb-6"></span>
            </button>
            <button class="flex items-center space-x-2 text-gray-300 text-xs uppercase font-semibold" disabled>
                <span class="w-5 h-5 rounded-full border border-gray-300 flex items-center justify-center">
                    <span class="block w-2.5 h-2.5 rounded-full bg-gray-300"></span>
                </span>
                <span>CONFIRMACIÓN</span>
            </button>
        </nav>

        @yield('pago')


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

        <script>
            function removeItem(button) {
                const itemRow = button.parentElement;
                itemRow.remove();
                updateTotal();
            }

            function updateTotal() {
                const rows = document.querySelectorAll('div.border-t > div.flex.justify-between.py-2');
                let total = 0;
                rows.forEach(row => {
                    const priceSpan = row.querySelector('span.w-20');
                    if (priceSpan) {
                        let priceText = priceSpan.textContent.trim().replace('S/', '').replace(',', '').replace(' ', '');
                        let priceNum = parseFloat(priceText);
                        if (!isNaN(priceNum)) {
                            total += priceNum;
                        }
                    }
                });
                document.getElementById('totalPrice').textContent = 'S/. ' + total.toFixed(2).replace('.', ',');
            }

            document.getElementById('niubizLabel').addEventListener('click', function(e) {
                e.preventDefault();
                const steps = document.getElementById('niubizSteps');
                if (steps.style.display === 'none' || steps.style.display === '') {
                    steps.style.display = 'block';
                } else {
                    steps.style.display = 'none';
                }
            });
        </script>
        </body>


</html>
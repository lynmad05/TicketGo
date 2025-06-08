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

<body class="bg-white">
    <header class="flex items-center px-4 py-2 bg-gradient-to-r from-[#0a4ccf] via-[#0a4ccf] to-[#d1b300]">
        <div class="flex items-center space-x-1">
            <h1 class="text-3xl font-bold text-blue-500 leading-none select-none">Ticket</h1>
            <h1 class="text-3xl font-serif font-bold text-yellow-500 leading-none select-none">GO</h1>
        </div>
    </header>

        @yield('pago')


    <footer class="bg-black text-white py-4 min-h-[100px]">
        <div class="container px-6 flex flex-col md:flex-row items-start gap-80 ">

            <div class="mb-6 md:mb-0">
                <img src="{{ asset('images/logo.png') }}"  class="w-80">
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
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

    <main class="min-h-screen">
        @yield('añaelegir')
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

    <script>
        const radioEticket = document.getElementById('radioEticket');
        const radioRetiro = document.getElementById('radioRetiro');
        const containerEticket = document.getElementById('container-eticket');
        const containerRetiro = document.getElementById('container-retiro');
        const eticketDetail = document.getElementById('eticket-detail');
        const retiroDetail = document.getElementById('retiro-detail');

        function updateUI() {
            if (radioEticket.checked) {
                containerEticket.classList.replace('border-gray-300', 'border-yellow-400');
                containerRetiro.classList.replace('border-yellow-400', 'border-gray-300');
                eticketDetail.classList.remove('hidden');
                retiroDetail.classList.add('hidden');
            } else if (radioRetiro.checked) {
                containerEticket.classList.replace('border-yellow-400', 'border-gray-300');
                containerRetiro.classList.replace('border-gray-300', 'border-yellow-400');
                eticketDetail.classList.add('hidden');
                retiroDetail.classList.remove('hidden');
            }
        }

        updateUI();

        containerEticket.addEventListener('click', () => {
            radioEticket.checked = true;
            updateUI();
        });

        containerRetiro.addEventListener('click', () => {
            radioRetiro.checked = true;
            updateUI();
        });

        radioEticket.addEventListener('change', updateUI);
        radioRetiro.addEventListener('change', updateUI);
    </script>
</body>

</html>
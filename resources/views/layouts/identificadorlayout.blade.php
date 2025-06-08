<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'TicketGO Confirmation')</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap");

        body {
            font-family: "Montserrat", sans-serif;
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

    <main class="flex flex-col md:flex-row max-w-7xl mx-auto mt-4 px-4 md:px-8 gap-6">

        @yield('añaidentificador')

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
        const fileInput = document.getElementById("fileInput");
        const checkIcon = document.getElementById("checkIcon");
        const uploadMessage = document.getElementById("uploadMessage");
        const continueBtn = document.getElementById("continueBtn");
        const warningMessage = document.getElementById("warningMessage");

        if (fileInput) {
            fileInput.addEventListener("change", () => {
                warningMessage.classList.add("hidden");
                if (fileInput.files.length > 0) {
                    const file = fileInput.files[0];
                    const validTypes = ["image/png", "image/jpeg"];
                    if (validTypes.includes(file.type)) {
                        checkIcon.classList.remove("hidden");
                        uploadMessage.textContent = "(Documento aceptado correctamente)";
                        uploadMessage.classList.remove("hidden");
                        uploadMessage.classList.remove("text-red-600");
                        uploadMessage.classList.add("text-green-600");
                    } else {
                        checkIcon.classList.add("hidden");
                        uploadMessage.textContent = "Solo se permiten archivos PNG o JPG.";
                        uploadMessage.classList.remove("hidden");
                        uploadMessage.classList.remove("text-green-600");
                        uploadMessage.classList.add("text-red-600");
                        fileInput.value = "";
                    }
                } else {
                    checkIcon.classList.add("hidden");
                    uploadMessage.classList.add("hidden");
                }
            });
        }

        if (continueBtn) {
            continueBtn.addEventListener("click", () => {
                warningMessage.classList.add("hidden");
                if (!fileInput.files.length) {
                    warningMessage.classList.remove("hidden");
                } else {
                    alert("Continuando con el proceso...");
                }
            });
        }
    </script>
</body>

</html>
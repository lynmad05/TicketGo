<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Registro - TicketGO</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet" />
    
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
        .btn-yellow {
            background-color: #facc15; /* Tailwind amber-400 */
            color: black;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn-yellow:hover {
            background-color: #eab308; /* Tailwind amber-500 */
        }
    </style>
</head>
<body class="flex flex-col min-h-screen bg-white text-black">
    <main class="flex flex-1 flex-col md:flex-row px-8 md:px-16 py-6 gap-8 md:gap-16 max-w-7xl mx-auto w-full">
        <section class="flex flex-col max-w-xl w-full space-y-6">

            <div class="flex space-x-6 mb-6 text-sm font-semibold">
                <button class="text-blue-800">Usuario</button>
                <button class="text-black">Administrador</button>
            </div>


            <form action="#" method="POST" class="flex flex-col space-y-4">
                @csrf

                <!-- Nombres -->
                <div>
                    <label class="text-sm font-semibold text-gray-600" for="name">Nombres</label>
                    <input class="border border-yellow-500 rounded px-3 py-2 w-full text-sm placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:ring-yellow-500"
                           id="name" name="name" type="text" placeholder="Ej: JOSE" required />
                </div>

                <!-- Apellidos -->
                <div>
                    <label class="text-sm font-semibold text-gray-600" for="last_name">Apellidos</label>
                    <input class="border border-yellow-500 rounded px-3 py-2 w-full text-sm placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:ring-yellow-500"
                           id="last_name" name="last_name" type="text" placeholder="Ej: MUÑOZ" required />
                </div>

                <!-- Email -->
                <div>
                    <label class="text-sm font-semibold text-gray-600" for="email">Email</label>
                    <input class="border border-yellow-500 rounded px-3 py-2 w-full text-sm placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:ring-yellow-500"
                           id="email" name="email" type="email" placeholder="Ej: jose@gmail.com" required />
                </div>

                <!-- Celular -->
                <div>
                    <label class="text-sm font-semibold text-gray-600" for="phone">Celular</label>
                    <input class="border border-yellow-500 rounded px-3 py-2 w-full text-sm placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:ring-yellow-500"
                           id="phone" name="phone" type="tel" placeholder="+51 945 567 921" required />
                </div>

                <!-- País -->
                <div>
                    <label class="text-sm font-semibold text-gray-600" for="country">País</label>
                    <select id="country" name="country"
                            class="border border-yellow-500 rounded px-3 py-2 w-full text-sm focus:outline-none focus:ring-1 focus:ring-yellow-500" required>
                        <option disabled selected>Selecciona tu país</option>
                        <option value="PE">Perú</option>
                        <option value="CL">Chile</option>
                        <option value="AR">Argentina</option>
                    </select>
                </div>

                <!-- Documento -->
                <div>
                    <label class="text-sm font-semibold text-gray-600" for="dni">DNI</label>
                    <input class="border border-yellow-500 rounded px-3 py-2 w-full text-sm placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:ring-yellow-500"
                           id="dni" name="dni" type="text" placeholder="Ej: 33333333" maxlength="8" required />
                </div>

                <!-- Sexo -->
                <div>
                    <label class="text-sm font-semibold text-gray-600">Sexo</label>
                    <div class="flex space-x-4 text-sm mt-1">
                        <label><input type="radio" name="gender" value="M" required /> Masculino</label>
                        <label><input type="radio" name="gender" value="F" /> Femenino</label>
                    </div>
                </div>

                <!-- Fecha de nacimiento -->
                <div>
                    <label class="text-sm font-semibold text-gray-600" for="birthdate">Fecha de Nacimiento</label>
                    <input class="border border-yellow-500 rounded px-3 py-2 w-full text-sm text-gray-500 focus:outline-none focus:ring-1 focus:ring-yellow-500"
                           id="birthdate" name="birthdate" type="date" required />
                    <p class="text-xs text-gray-500 mt-1">* Debes ser mayor de edad para poder registrarte</p>
                </div>

                <!-- Contraseña -->
                <div>
                    <label class="text-sm font-semibold text-gray-600" for="password">Contraseña</label>
                    <input class="border border-yellow-500 rounded px-3 py-2 w-full text-sm placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:ring-yellow-500"
                           id="password" name="password" type="password" placeholder="Contraseña" required />
                    <p class="text-xs text-gray-500 mt-1">Entre 8 a 16 caracteres, 1 mayúscula, una minúscula, un carácter especial (@$*#) y al menos un número.</p>
                </div>

                <!-- Confirmar contraseña -->
                <div>
                    <label class="text-sm font-semibold text-gray-600" for="password_confirmation">Confirmar Contraseña</label>
                    <input class="border border-yellow-500 rounded px-3 py-2 w-full text-sm placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:ring-yellow-500"
                           id="password_confirmation" name="password_confirmation" type="password" placeholder="Confirmar contraseña" required />
                </div>

                <!-- Términos y autorizaciones -->
                <div class="flex flex-col space-y-2 text-sm">
                    <label><input type="checkbox" required /> Declaro que he leído y acepto los <a href="#" class="underline">Términos y Condiciones</a>, y Política de Privacidad de TicketGO</label>
                    <label><input type="checkbox" /> Autorizo que TicketGO envíe información sobre eventos y promociones</label>
                </div>

                <!-- No soy un robot -->
                <div class="flex items-center space-x-3 bg-gray-300 rounded px-4 py-2 w-max">
                    <input class="w-5 h-5" id="robot" name="robot" type="checkbox" required />
                    <label class="text-xs font-bold select-none" for="robot">No soy un robot</label>
                    <img src="{{ asset('images/recapcha.png') }}" class="h-6 w-auto object-contain rounded shadow" />
                </div>

                <!-- Botón -->
                <button type="submit" class="btn-yellow w-full text-center">Registrarme</button>
            </form>
        </section>

        <section class="flex-1 max-w-lg">
            <img class="rounded-lg w-full h-auto object-cover"
                 src="{{ asset('images/9P93.gif') }}"
                 alt="Imagen decorativa" />
        </section>
    </main>
</body>
</html>

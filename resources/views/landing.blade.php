<head>
    <link href="{{ mix('resources/css/app.css') }}" rel="stylesheet">
    <style>
        /* Animación para burbujas de colores flotando */
        @keyframes floatBubbles {
            0% {
                transform: translateY(0) scale(1);
                opacity: 0.8;
            }
            50% {
                transform: translateY(-40px) scale(1.2);
                opacity: 1;
            }
            100% {
                transform: translateY(0) scale(1);
                opacity: 0.8;
            }
        }

        /* Estilos para las burbujas */
        .bubble {
            position: absolute;
            border-radius: 50%;
            animation: floatBubbles 4s ease-in-out infinite;
            z-index: 1; /* Asegura que estén por encima del fondo */
        }

        /* Burbujas de diferentes colores y tamaños */
        .bubble:nth-child(1) {
            background-color: #ffcc00; /* Dorado */
            width: 100px;
            height: 100px;
            top: 10%;
            left: 15%;
            animation-delay: 0s;
        }

        .bubble:nth-child(2) {
            background-color: #ff4d4d; /* Rojo */
            width: 120px;
            height: 120px;
            top: 30%;
            left: 65%;
            animation-delay: 0.5s;
        }

        .bubble:nth-child(3) {
            background-color: #4caf50; /* Verde */
            width: 90px;
            height: 90px;
            top: 50%;
            left: 25%;
            animation-delay: 1s;
        }

        .bubble:nth-child(4) {
            background-color: #ffffff; /* Blanco */
            width: 70px;
            height: 70px;
            top: 60%;
            left: 75%;
            animation-delay: 1.5s;
        }

        .bubble:nth-child(5) {
            background-color: #ff80e1; /* Rosa */
            width: 80px;
            height: 80px;
            top: 20%;
            left: 40%;
            animation-delay: 2s;
        }

        .bubble:nth-child(6) {
            background-color: #0099ff; /* Azul */
            width: 110px;
            height: 110px;
            top: 70%;
            left: 50%;
            animation-delay: 2.5s;
        }
    </style>
</head>

<body>
    <!-- Fondo de gradiente navideño -->
    <div class="min-h-screen flex items-center justify-center relative overflow-hidden bg-gradient-to-r from-green-500 via-red-500 to-yellow-400">
        <!-- Burbujas animadas -->
        <div class="absolute top-0 left-0 right-0 bottom-0 pointer-events-none">
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>
        </div>

        <!-- Contenido principal -->
        <div class="bg-white p-8 rounded-lg shadow-xl w-full max-w-md relative z-10">
            <h2 class="text-4xl font-bold text-center text-gray-800 mb-6">
                ¡Bienvenido al Mundo Navideño!
            </h2>

            <div class="text-center mb-6">
                <p class="text-lg text-gray-700 mb-2">El monstruo verde está esperando...</p>
                <p class="text-md text-gray-500">¿Estás listo para salvar la Navidad?</p>
            </div>

            <!-- Formulario para ingresar el nombre -->
            <form method="POST">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-semibold mb-2">Ingresa tu nombre:</label>
                    <input type="text" name="name" id="name" required class="w-full p-3 border-2 border-green-500 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-600" placeholder="Tu nombre...">
                </div>

                <!-- Botón para pasar a la siguiente página -->
                <div class="flex justify-center mt-4">
                    <button type="submit" class="bg-green-600 text-white px-6 py-3 rounded-lg shadow-xl hover:bg-green-700 transition duration-300">
                        Empezar la Aventura
                    </button>
                </div>
            </form>

            <!-- Mensaje adicional -->
            <div class="mt-8 text-center">
                <p class="text-sm text-gray-600">¿Necesitas ayuda? <a href="#" class="text-blue-600 hover:underline">Contacta con nosotros</a></p>
            </div>
        </div>
    </div>
</body>

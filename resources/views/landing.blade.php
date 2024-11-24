<head>
    <link href="{{ mix('resources/css/app.css') }}" rel="stylesheet">
    <style>
        /* Fondo con gradiente estático navideño */
        body {
            background: linear-gradient(135deg, #ff0000, #00cc66, #ffcc00);
            background-size: cover;
            overflow: hidden;
            position: relative;
            margin: 0;
            padding: 0;
            height: 100vh;
        }

        /* Animación de caída */
        @keyframes fall {
            0% {
                transform: translateY(-100px);
                opacity: 1;
            }
            100% {
                transform: translateY(110vh);
                opacity: 0;
            }
        }

        /* Estilo de los emoticonos navideños */
        .emoji {
            position: absolute;
            font-size: 24px;
            animation: fall linear infinite;
            opacity: 0.9;
            z-index: 0;
        }

        /* Variantes de tamaño */
        .emoji.small {
            font-size: 16px;
            animation-duration: 6s;
        }

        .emoji.large {
            font-size: 32px;
            animation-duration: 10s;
        }
    </style>
</head>

<body>
    <!-- Fondo animado con emoticonos -->
    <div class="min-h-screen flex items-center justify-center relative z-10">
        <div class="bg-white p-8 rounded-lg shadow-xl w-full max-w-md">
            <h2 class="text-4xl font-bold text-center text-gray-800 mb-6">
                ¡Bienvenido al Mundo Navideño!
            </h2>

            <div class="text-center mb-6">
                <p class="text-lg text-gray-700 mb-2">El monstruo verde está esperando...</p>
                <p class="text-md text-gray-500">¿Estás listo para salvar la Navidad?</p>
            </div>

            <!-- Formulario para ingresar el nombre -->
            <form method="POST" action="{{ route('dashboard') }}">
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

    <!-- Generador de emoticonos dinámicos -->
    <script>
        const emojis = ['🎄', '🎅', '✨', '🎁', '☃️', '❄️']; // Iconos navideños
        const body = document.body;

        // Función para crear más emojis
        function createEmoji() {
            const emoji = document.createElement('div');
            emoji.className = 'emoji';
            emoji.textContent = emojis[Math.floor(Math.random() * emojis.length)];
            emoji.style.left = Math.random() * 100 + 'vw'; // Posición horizontal aleatoria
            emoji.style.animationDuration = Math.random() * 3 + 5 + 's'; // Duración de animación
            emoji.style.top = '-' + Math.random() * 20 + 'px'; // Inicio ligeramente fuera de pantalla
            emoji.style.fontSize = Math.random() * 20 + 20 + 'px'; // Tamaño aleatorio
            body.appendChild(emoji);

            // Eliminar emojis después de la animación
            emoji.addEventListener('animationend', () => emoji.remove());
        }

        // Crear nuevos emojis cada 150 ms
        setInterval(createEmoji, 150);
    </script>
</body>

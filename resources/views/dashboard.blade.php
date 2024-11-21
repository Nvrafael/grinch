<link href="{{ mix('resources/css/app.css') }}" rel="stylesheet">
<body class="min-h-screen bg-red-700 relative overflow-hidden flex items-center justify-center text-white">
    <!-- Fondo animado con copos de nieve -->
    <div class="absolute inset-0 pointer-events-none overflow-hidden">
        <!-- Copos de nieve -->
        <div class="snowflake"></div>
        <div class="snowflake"></div>
        <div class="snowflake"></div>
        <div class="snowflake"></div>
        <div class="snowflake"></div>
        <div class="snowflake"></div>
        <div class="snowflake"></div>
        <div class="snowflake"></div>
    </div>

    <!-- Contenido principal -->
    <div class="relative z-10 bg-white/90 p-8 rounded-xl shadow-lg text-center max-w-lg">
        <h1 class="text-5xl font-bold text-green-700 mb-4">
            ¡Hola, {{ $name }}!
        </h1>
        <p class="text-xl text-gray-800 mb-6">
            🎄 Bienvenido al Dashboard Navideño 🎅
        </p>
        <p class="text-lg text-gray-600">
            ¡Prepárate para disfrutar de una mágica Navidad!
        </p>

        <!-- Botón para regresar -->
        <a href="{{ route('landing') }}" 
           class="mt-6 inline-block bg-green-600 text-white px-6 py-3 rounded-lg shadow hover:bg-green-700 transition duration-300">
            Volver al inicio
        </a>
    </div>

    <!-- Créditos o mensaje adicional -->
    <div class="absolute bottom-4 text-sm text-gray-300">
        <p>🎅 Hecho con amor navideño 🎁</p>
    </div>

    <!-- Estilos CSS para las animaciones -->
    <style>
        /* Fondo animado con copos de nieve */
        @keyframes fall {
            0% {
                transform: translateY(-100px);
                opacity: 1;
            }
            100% {
                transform: translateY(100vh);
                opacity: 0;
            }
        }

        .snowflake {
            position: absolute;
            top: -10%;
            width: 10px;
            height: 10px;
            background-color: white;
            border-radius: 50%;
            animation: fall linear infinite;
        }

        /* Variaciones de los copos */
        .snowflake:nth-child(1) {
            left: 10%;
            animation-duration: 4s;
        }

        .snowflake:nth-child(2) {
            left: 25%;
            animation-duration: 6s;
            width: 12px;
            height: 12px;
        }

        .snowflake:nth-child(3) {
            left: 40%;
            animation-duration: 5s;
            width: 8px;
            height: 8px;
        }

        .snowflake:nth-child(4) {
            left: 55%;
            animation-duration: 7s;
            width: 15px;
            height: 15px;
        }

        .snowflake:nth-child(5) {
            left: 70%;
            animation-duration: 4.5s;
        }

        .snowflake:nth-child(6) {
            left: 85%;
            animation-duration: 6.5s;
            width: 18px;
            height: 18px;
        }

        .snowflake:nth-child(7) {
            left: 95%;
            animation-duration: 5.5s;
            width: 6px;
            height: 6px;
        }

        .snowflake:nth-child(8) {
            left: 50%;
            animation-duration: 4.2s;
            width: 10px;
            height: 10px;
        }
    </style>
</body>

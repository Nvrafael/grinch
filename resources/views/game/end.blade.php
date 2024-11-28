<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gracias por Jugar</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-b from-green-800 to-green-600 overflow-hidden relative">
    <!-- Fondo animado navideño -->
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden bg-gradient-to-b from-green-800 to-green-700">
        <!-- Efecto de copos de nieve animados -->
        <div class="absolute top-0 left-0 w-full h-full">
            <div class="snowflakes">
                <div class="snowflake">❄️</div>
                <div class="snowflake">❄️</div>
                <div class="snowflake">❄️</div>
                <div class="snowflake">❄️</div>
                <div class="snowflake">❄️</div>
                <div class="snowflake">❄️</div>
            </div>
        </div>
    </div>

    <!-- Contenedor -->
    <div class="relative p-12 rounded-3xl shadow-2xl bg-white bg-opacity-80 border-4 border-green-600 text-center max-w-lg transform scale-100 hover:scale-105 transition-transform duration-300">
        <h1 class="text-4xl font-bold text-green-700 mb-6 bg-clip-text text-transparent bg-gradient-to-r from-yellow-400 to-green-500">
            🎄 ¡Gracias por jugar! 🎄
        </h1>
        <p class="text-lg text-gray-800 mb-6">
            Esperamos que hayas disfrutado esta aventura interactiva sobre el Grinch y la Navidad.
        </p>
        <p class="text-md text-gray-600 italic mb-6">
            ¡Te deseamos unas felices fiestas llenas de alegría y unión!
        </p>
        <!-- Botón para volver al dashboard -->
        <a href="{{ route('dashboard') }}" 
           class="bg-blue-600 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-blue-700 transition duration-300 text-lg font-semibold mt-4 block transform hover:scale-105">
            ⬅️ Página de inicio
        </a>
        <!-- Botón para volver al inicio del juego -->
        <a href="{{ route('game.start') }}" 
           class="bg-green-600 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-green-700 transition duration-300 text-lg font-semibold mt-4 block transform hover:scale-105">
            Volver al Inicio
        </a>
    </div>

    <!-- Estilos de animación -->
    <style>
        .snowflakes {
            position: relative;
            width: 100%;
            height: 100%;
        }
        .snowflake {
            position: absolute;
            color: white;
            font-size: 2rem;
            animation: fall 10s linear infinite;
        }
        .snowflake:nth-child(1) {
            left: 10%;
            animation-delay: 0s;
        }
        .snowflake:nth-child(2) {
            left: 25%;
            animation-delay: 2s;
        }
        .snowflake:nth-child(3) {
            left: 50%;
            animation-delay: 4s;
        }
        .snowflake:nth-child(4) {
            left: 70%;
            animation-delay: 6s;
        }
        .snowflake:nth-child(5) {
            left: 90%;
            animation-delay: 8s;
        }

        @keyframes fall {
            0% {
                transform: translateY(-100vh);
                opacity: 0;
            }
            50% {
                opacity: 1;
            }
            100% {
                transform: translateY(100vh);
                opacity: 0;
            }
        }
    </style>
</body>
</html>

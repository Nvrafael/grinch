<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comienza el Juego</title>
    <!-- Importar estilos -->
    <link href="{{ mix('resources/css/app.css') }}" rel="stylesheet">
    <style>
        /* Animación de fondo de estrellas */
        @keyframes starTwinkle {
            0% {
                opacity: 0.8;
                transform: scale(5);
            }
            50% {
                opacity: 1;
                transform: scale(4);
            }
            100% {
                opacity: 0.8;
                transform: scale(3);
            }
        }

        .star {
            position: absolute;
            background-color: white;
            border-radius: 50%;
            animation: starTwinkle 3s infinite;
        }

        .star:nth-child(1) {
            width: 6px;
            height: 6px;
            top: 10%;
            left: 20%;
            animation-delay: 0s;
        }

        .star:nth-child(2) {
            width: 8px;
            height: 8px;
            top: 30%;
            left: 70%;
            animation-delay: 1s;
        }

        .star:nth-child(3) {
            width: 5px;
            height: 5px;
            top: 50%;
            left: 40%;
            animation-delay: 2s;
        }

        .star:nth-child(4) {
            width: 7px;
            height: 7px;
            top: 70%;
            left: 10%;
            animation-delay: 0.5s;
        }

        .star:nth-child(5) {
            width: 6px;
            height: 6px;
            top: 85%;
            left: 85%;
            animation-delay: 1.5s;
        }
    </style>
</head>
<body>
    <!-- Fondo del juego -->
    <div class="min-h-screen flex flex-col items-center justify-center bg-green-700 text-white relative overflow-hidden">
        <!-- Estrellas animadas -->
        <div class="absolute top-0 left-0 w-full h-full pointer-events-none">
            <div class="star"></div>
            <div class="star"></div>
            <div class="star"></div>
            <div class="star"></div>
            <div class="star"></div>
        </div>

        <!-- Contenido del juego -->
        <div class="bg-white p-8 rounded-lg shadow-xl w-full max-w-lg z-10 text-center">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">🎮 ¡Comienza tu Historia Interactiva!</h1>
            
            <p class="text-lg text-gray-700 mb-4">
                Es Navidad y el Grinch, conocido por su odio hacia estas fechas, enfrenta un dilema. Algo está cambiando en su corazón, y esta vez, <span class="font-semibold text-gray-800">tú tienes el control</span>.
            </p>

            <div class="bg-gray-100 p-4 rounded-lg shadow-md text-gray-800">
                <p class="text-md">
                    ¿Robará la Navidad una vez más o ayudará a los habitantes de <span class="font-semibold text-green-700">Villa Quién</span> a salvarla?
                </p>
                <p class="text-md mt-2">
                    <span class="italic">Tus decisiones escribirán esta historia navideña llena de sorpresas.</span>
                </p>
            </div>

            <!-- Botón para continuar -->
            <div class="mt-6">
                <a href="#" class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-lg shadow-md transition duration-300">
                    ¡Comenzar la Aventura!
                </a>
            </div>
        </div>
    </div>
</body>
</html>

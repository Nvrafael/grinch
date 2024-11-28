<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comienza el Juego</title>
    <link href="{{ mix('resources/css/app.css') }}" rel="stylesheet">
    <style>
        /* Fondo dinámico con gradiente animado navideño */
        body {
            background: linear-gradient(45deg, #A70D2A, #E63946, #F4A261, #E9C46A, #2A9D8F);
            background-size: 400% 400%;
            animation: gradientBackground 12s ease infinite;
            color: white;
            font-family: 'Comic Sans MS', cursive, sans-serif;
            overflow: hidden; /* Evita el scroll */
            margin: 0;       /* Elimina posibles márgenes */
            height: 100vh;   /* Fuerza la altura total de la ventana */
        }

        @keyframes gradientBackground {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Contenedor con luz neón navideña */
        .neon-container {
            border: 2px solid transparent;
            border-radius: 15px;
            padding: 2rem;
            background: rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 20px rgba(255, 0, 0, 0.8), 0 0 50px rgba(0, 255, 0, 0.5);
            transition: box-shadow 0.3s ease-in-out, transform 0.3s;
            backdrop-filter: blur(10px);
        }

        .neon-container:hover {
            box-shadow: 0 0 30px rgba(255, 0, 0, 0.9), 0 0 60px rgba(0, 255, 0, 0.7);
            transform: scale(1.02);
        }

        /* Botones con efecto de neón navideño */
        .neon-btn {
            display: inline-block;
            text-align: center;
            color: white;
            background: transparent;
            border: 2px solid white;
            border-radius: 8px;
            padding: 0.75rem 1.5rem;
            font-size: 1.2rem;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            cursor: pointer;
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.7);
        }

        .neon-btn:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: scale(1.1);
        }

        .neon-btn-primary {
            border-color: #00FF00; /* Verde navideño */
            text-shadow: 0 0 10px rgba(0, 255, 0, 0.7);
        }

        .neon-btn-primary:hover {
            color: #00FF00;
            box-shadow: 0 0 20px rgba(0, 255, 0, 0.8), 0 0 40px rgba(0, 255, 0, 0.5);
        }

        .neon-btn-secondary {
            border-color: #FF0000; /* Rojo navideño */
            text-shadow: 0 0 10px rgba(255, 0, 0, 0.7);
        }

        .neon-btn-secondary:hover {
            color: #FF0000;
            box-shadow: 0 0 20px rgba(255, 0, 0, 0.8), 0 0 40px rgba(255, 0, 0, 0.5);
        }

        /* Decoraciones navideñas flotantes */
        .snowflake {
            position: absolute;
            width: 15px;
            height: 15px;
            background: white;
            border-radius: 50%;
            animation: fall 5s infinite;
        }

        @keyframes fall {
            0% { transform: translateY(-50px) rotate(0deg); opacity: 1; }
            100% { transform: translateY(100vh) rotate(360deg); opacity: 0.5; }
        }

        .snowflake:nth-child(1) { left: 10%; animation-delay: 0s; }
        .snowflake:nth-child(2) { left: 30%; animation-delay: 1s; }
        .snowflake:nth-child(3) { left: 50%; animation-delay: 2s; }
        .snowflake:nth-child(4) { left: 70%; animation-delay: 3s; }
        .snowflake:nth-child(5) { left: 90%; animation-delay: 4s; }
    </style>
</head>
<body>
    <!-- Copos de nieve decorativos -->
    <div class="snowflake"></div>
    <div class="snowflake"></div>
    <div class="snowflake"></div>
    <div class="snowflake"></div>
    <div class="snowflake"></div>

    <div class="min-h-screen flex flex-col items-center justify-center">
        <!-- Contenedor principal -->
        <div class="neon-container text-center max-w-lg">
            <h1 class="text-5xl font-bold mb-6">🎄 ¡Vive la Navidad con el Grinch! 🎁</h1>
            <p class="text-lg mb-6">
                Es Navidad y el Grinch enfrenta un dilema. Algo está cambiando en su corazón, y esta vez, <span class="font-semibold">tú tienes el control</span>.
            </p>
            <div class="bg-white/10 p-4 rounded-lg shadow-md text-white mb-6">
                <p class="text-md">
                    ¿Robará la Navidad una vez más o ayudará a los habitantes de <span class="font-semibold text-green-400">Villa Quién</span> a salvarla?
                </p>
                <p class="text-md mt-2 italic">
                    ¡Tus decisiones darán forma a esta historia llena de magia navideña!
                </p>
            </div>
            <!-- Botones -->
            <div class="mt-4 space-y-4">
                <a href="{{ route('game.chapter', ['chapter' => 'chapter1']) }}" class="neon-btn neon-btn-primary">
                    🎮 Comenzar Aventura
                </a>
                <a href="{{ route('dashboard') }}" class="neon-btn neon-btn-secondary">
                    ⬅️ Página de inicio
                </a>
            </div>
        </div>
    </div>
</body>
</html>

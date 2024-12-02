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
        background: linear-gradient(45deg, #7F1734, #A70D2A, #CD4631, #E9C46A, #228B22);
        background-size: 400% 400%;
        animation: gradientBackground 12s ease infinite;
        color: #FFFFFF; /* Blanco puro para contraste */
        font-family: 'Comic Sans MS', cursive, sans-serif;
        overflow: hidden;
        margin: 0;
        height: 100vh;
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
        background: rgba(0, 0, 0, 0.5); /* Fondo oscuro para destacar el texto */
        box-shadow: 0 0 25px rgba(255, 255, 255, 0.6), 0 0 40px rgba(0, 255, 127, 0.4);
        transition: box-shadow 0.3s ease-in-out, transform 0.3s;
        backdrop-filter: blur(8px);
    }

    .neon-container:hover {
        box-shadow: 0 0 30px rgba(255, 255, 255, 0.9), 0 0 60px rgba(50, 205, 50, 0.7);
        transform: scale(1.02);
    }

    /* Botones con efectos neón */
    .neon-btn {
        display: inline-block;
        text-align: center;
        color: #FFFFFF;
        background: transparent;
        border: 2px solid #FFFFFF;
        border-radius: 8px;
        padding: 0.75rem 1.5rem;
        font-size: 1.2rem;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: all 0.3s ease;
        cursor: pointer;
        text-shadow: 0 0 12px rgba(255, 255, 255, 0.8);
    }

    .neon-btn-primary {
        border-color: #32CD32; /* Verde neón */
        text-shadow: 0 0 15px rgba(50, 205, 50, 0.9);
    }

    .neon-btn-primary:hover {
        color: #32CD32;
        background: rgba(255, 255, 255, 0.1);
        box-shadow: 0 0 25px rgba(50, 205, 50, 0.8), 0 0 50px rgba(50, 205, 50, 0.6);
    }

    .neon-btn-secondary {
        border-color: #FF6347; /* Rojo tomate */
        text-shadow: 0 0 15px rgba(255, 99, 71, 0.8);
    }

    .neon-btn-secondary:hover {
        color: #FF6347;
        background: rgba(255, 255, 255, 0.1);
        box-shadow: 0 0 25px rgba(255, 99, 71, 0.8), 0 0 50px rgba(255, 99, 71, 0.6);
    }

    /* Decoraciones navideñas flotantes */
    .snowflake {
        position: absolute;
        width: 15px;
        height: 15px;
        background: #FFFFFF; /* Blanco puro para que contraste con el fondo */
        border-radius: 50%;
        animation: fall 6s infinite;
    }

    @keyframes fall {
        0% { transform: translateY(-50px) rotate(0deg); opacity: 1; }
        100% { transform: translateY(100vh) rotate(360deg); opacity: 0.7; }
    }

    .snowflake:nth-child(1) { left: 10%; animation-delay: 0s; }
    .snowflake:nth-child(2) { left: 30%; animation-delay: 1.5s; }
    .snowflake:nth-child(3) { left: 50%; animation-delay: 3s; }
    .snowflake:nth-child(4) { left: 70%; animation-delay: 4.5s; }
    .snowflake:nth-child(5) { left: 90%; animation-delay: 6s; }
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
            <h1 class="text-5xl font-bold mb-6"> ¡Vive la Navidad con el Grinch! </h1>
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

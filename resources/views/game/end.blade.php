<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Final de la Historia</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Fondo parallax y animación */
        body {
            background: url('https://cdn.pixabay.com/photo/2019/12/15/17/27/christmas-4698374_1280.jpg') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            font-family: 'Comic Sans MS', cursive, sans-serif;
        }

        /* Superposición animada */
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(180deg, rgba(10, 10, 10, 0.7) 10%, rgba(255, 0, 0, 0.4) 80%);
            z-index: 0;
            animation: fadeOverlay 8s ease-in-out infinite alternate;
        }

        @keyframes fadeOverlay {
            0% { opacity: 0.7; }
            100% { opacity: 0.9; }
        }

        /* Animación del texto del título */
        .title {
            font-size: 3rem;
            font-weight: bold;
            background: linear-gradient(90deg, #FF4500, #32CD32, #FFD700);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: glow 3s infinite;
        }

        @keyframes glow {
            0%, 100% { text-shadow: 0 0 10px rgba(255, 255, 255, 0.9), 0 0 30px rgba(0, 255, 127, 0.5); }
            50% { text-shadow: 0 0 20px rgba(255, 215, 0, 0.9), 0 0 40px rgba(50, 205, 50, 0.7); }
        }

        /* Botones con efectos navideños */
        .btn {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            margin: 1rem 0;
            font-size: 1.25rem;
            font-weight: bold;
            text-transform: uppercase;
            border: 2px solid transparent;
            border-radius: 8px;
            transition: all 0.3s ease;
            cursor: pointer;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
        }

        .btn-primary {
            background: #32CD32;
            color: #FFF;
            border-color: #228B22;
        }

        .btn-primary:hover {
            background: #228B22;
            transform: scale(1.1);
            box-shadow: 0 0 20px rgba(50, 205, 50, 0.8), 0 0 40px rgba(0, 255, 0, 0.5);
        }

        .btn-secondary {
            background: #FF4500;
            color: #FFF;
            border-color: #B22222;
        }

        .btn-secondary:hover {
            background: #B22222;
            transform: scale(1.1);
            box-shadow: 0 0 20px rgba(255, 69, 0, 0.8), 0 0 40px rgba(255, 0, 0, 0.5);
        }

        /* Decoraciones animadas */
        .decorations {
            position: absolute;
            width: 100%;
            height: 100%;
            pointer-events: none;
        }

        .decoration {
            position: absolute;
            width: 20px;
            height: 20px;
            background: white;
            border-radius: 50%;
            animation: sparkle 6s linear infinite;
        }

        .decoration:nth-child(1) { top: 10%; left: 20%; animation-delay: 1s; }
        .decoration:nth-child(2) { top: 30%; left: 70%; animation-delay: 2s; }
        .decoration:nth-child(3) { top: 60%; left: 50%; animation-delay: 3s; }
        .decoration:nth-child(4) { top: 80%; left: 10%; animation-delay: 4s; }

        @keyframes sparkle {
            0%, 100% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.5); opacity: 0.7; }
        }
    </style>
</head>
<body>
    <div class="overlay"></div>
    <div class="decorations">
        <div class="decoration"></div>
        <div class="decoration"></div>
        <div class="decoration"></div>
        <div class="decoration"></div>
    </div>
    <div class="relative z-10 text-center p-8 bg-white bg-opacity-90 rounded-xl shadow-xl">
        <h1 class="title">¡Gracias por Jugar! 🎄</h1>
        <p class="text-lg mt-4 mb-8 text-gray-800">
            Has completado la historia interactiva del Grinch. Te esperamos en futuras aventuras llenas de magia y diversión. 🎅
        </p>
        <a href="{{ route('dashboard') }}" class="btn btn-primary">Volver a Inicio</a>
        <a href="{{ route('game.start') }}" class="btn btn-secondary">Jugar de Nuevo</a>
    </div>
</body>
</html>

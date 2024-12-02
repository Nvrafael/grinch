<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Final de la Historia</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Fondo animado */
        body {
            margin: 0;
            height: 100vh;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-family: 'Comic Sans MS', cursive, sans-serif;
            background: linear-gradient(to bottom, #3b1f61, #ff4d4d, #e8a6c1);
            overflow: hidden;
            position: relative;
            animation: gradientShift 8s infinite alternate;
        }

        @keyframes gradientShift {
            0% {
                background: linear-gradient(to bottom, #3b1f61, #ff4d4d, #e8a6c1);
            }
            100% {
                background: linear-gradient(to bottom, #1f4d3b, #ff6347, #fcbf49);
            }
        }

        /* Contenedor centrado */
        .container {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(15px);
            padding: 2rem;
            border-radius: 20px;
            box-shadow: 0 0 50px rgba(255, 255, 255, 0.6);
            text-align: center;
            width: 90%;
            max-width: 600px;
            z-index: 10;
            animation: fadeIn 1s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        /* Título */
        .title {
            font-size: 3rem;
            font-weight: bold;
            color: #FFD700;
            text-shadow: 0 0 20px #FFA500, 0 0 30px #FFD700;
        }

        /* Botones */
        .btn {
            display: inline-block;
            margin: 1rem 0.5rem;
            padding: 1rem 2.5rem;
            font-size: 1.2rem;
            font-weight: bold;
            text-transform: uppercase;
            border-radius: 12px;
            border: 2px solid transparent;
            transition: all 0.4s ease;
            cursor: pointer;
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.8);
        }

        .btn-primary {
            background: linear-gradient(90deg, #32CD32, #228B22);
            color: white;
            box-shadow: 0 0 20px rgba(50, 205, 50, 0.8);
        }

        .btn-primary:hover {
            background: #228B22;
            transform: translateY(-5px) scale(1.1);
            box-shadow: 0 0 40px rgba(50, 205, 50, 1);
        }

        .btn-secondary {
            background: linear-gradient(90deg, #FF6347, #B22222);
            color: white;
            box-shadow: 0 0 20px rgba(255, 99, 71, 0.8);
        }

        .btn-secondary:hover {
            background: #B22222;
            transform: translateY(-5px) scale(1.1);
            box-shadow: 0 0 40px rgba(255, 69, 0, 1);
        }

        /* Nieve */
        .snowflake {
            position: absolute;
            width: 8px;
            height: 8px;
            background-color: white;
            border-radius: 50%;
            opacity: 0.8;
            animation: fall 4s linear infinite, sway 1s ease-in-out infinite;
        }

        @keyframes fall {
            0% {
                top: -10%;
                opacity: 1;
            }
            100% {
                top: 100%;
                opacity: 0.5;
            }
        }

        @keyframes sway {
            0%, 100% {
                transform: translateX(0);
            }
            50% {
                transform: translateX(5px);
            }
        }

        /* Estrellas parpadeantes */
        .star {
            position: absolute;
            width: 5px;
            height: 5px;
            background-color: #fff;
            border-radius: 50%;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.8);
            animation: twinkle 1.5s infinite ease-in-out;
        }

        @keyframes twinkle {
            0%, 100% {
                opacity: 0.8;
            }
            50% {
                opacity: 0.2;
            }
        }

        /* Fondo animado */
        .background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }
    </style>
</head>
<body>
    <!-- Contenedor principal -->
    <div class="container">
        <h1 class="title">¡Gracias por Completar la Historia! 🎉</h1>
        <p class="mt-4 mb-8 text-lg">
            Esperamos que hayas disfrutado la mágica aventura del Grinch. ¡Te deseamos unas fiestas llenas de alegría y diversión! 🎅
        </p>
        <div>
            <a href="{{ route('dashboard') }}" class="btn btn-primary">Volver a Inicio</a>
            <a href="{{ route('game.start') }}" class="btn btn-secondary">Jugar de Nuevo</a>
        </div>
    </div>

    <!-- Fondo animado -->
    <div class="background" id="background"></div>

    <script>
        // Generar copos de nieve
        for (let i = 0; i < 100; i++) {
            const snowflake = document.createElement('div');
            snowflake.classList.add('snowflake');
            snowflake.style.left = Math.random() * 100 + 'vw';
            snowflake.style.animationDuration = Math.random() * 3 + 2 + 's';
            snowflake.style.animationDelay = Math.random() * 5 + 's';
            snowflake.style.width = Math.random() * 5 + 3 + 'px';
            snowflake.style.height = snowflake.style.width;
            document.querySelector('.background').appendChild(snowflake);
        }

        // Generar estrellas parpadeantes
        for (let i = 0; i < 50; i++) {
            const star = document.createElement('div');
            star.classList.add('star');
            star.style.left = Math.random() * 100 + 'vw';
            star.style.top = Math.random() * 100 + 'vh';
            star.style.animationDuration = Math.random() * 2 + 1 + 's';
            document.querySelector('.background').appendChild(star);
        }
    </script>
</body>
</html>

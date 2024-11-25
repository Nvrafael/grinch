<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $chapter['title'] }}</title>
    <link href="{{ mix('resources/css/app.css') }}" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, rgba(34,193,195,1) 0%, rgba(253,187,45,1) 100%);
            background-size: cover;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .background-pattern {
            background-image: url('data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40" fill="none"%3E%3Ccircle cx="10" cy="10" r="4" fill="%23FFFFFF" opacity="0.2" /%3E%3C/svg%3E');
            background-size: 20px 20px;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        /* Contenedor principal en la parte inferior */
        .content-wrapper {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            position: absolute;
            bottom: 0;
            width: 100%;
            padding: 10px;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.9); /* Fondo translúcido */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 100%;
            position: relative;
            z-index: 1;
            box-sizing: border-box;
        }

        h1 {
            color: #2e7d32;
            font-size: 2.5rem;
            text-align: center;
            margin-bottom: 20px;
        }

        p {
            color: #333;
            font-size: 1.2rem;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .options {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 10px;
        }

        .option-button {
            background-color: #388e3c;
            color: white;
            padding: 15px 30px;
            border-radius: 25px;
            font-size: 1.1rem;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .option-button:hover {
            background-color: #2c6e31;
        }

        .return-button {
            background-color: #1976d2;
            color: white;
            padding: 15px 30px;
            border-radius: 25px;
            font-size: 1.1rem;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 20px;
        }

        .return-button:hover {
            background-color: #1565c0;
        }

        /* Barra de progreso */
        .progress-container {
            width: 100%;
            background-color: rgba(0, 0, 0, 0.1);
            border-radius: 20px;
            margin-top: 10px;
            padding: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }

        .progress-bar {
            height: 15px;
            background-color: #FF6347; /* Color naranja-rojo vibrante */
            border-radius: 15px;
            width: {{ $progress }}%; /* Progreso dinámico basado en el capítulo actual */
            transition: width 0.5s ease-in-out; /* Transición suave para el cambio de la barra */
        }
    </style>
</head>
<body>
    <div class="background-pattern"></div>

    <div class="content-wrapper">
        <!-- Barra de progreso -->
        <div class="progress-container">
            <div class="progress-bar"></div>
        </div>

        <!-- Contenedor del contenido -->
        <div class="container">
            <h1>{{ $chapter['title'] }}</h1>
            <p>{{ $chapter['text'] }}</p>

            <form action="{{ route('game.choose', ['chapter' => request()->route('chapter')]) }}" method="POST">
                @csrf
                <div class="options">
                    @foreach ($chapter['options'] as $option)
                        <button type="submit" name="next" value="{{ $option['next'] }}" class="option-button">
                            {{ $option['text'] }}
                        </button>
                    @endforeach
                </div>
            </form>

            <!-- Botón para volver al dashboard -->
            <div class="text-center mt-4">
                <a href="{{ route('dashboard') }}" class="return-button">⬅️ Página de inicio</a>
            </div>
        </div>
    </div>
</body>
</html>

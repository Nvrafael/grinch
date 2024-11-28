<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $chapter['title'] }}</title>
    <link href="{{ mix('resources/css/app.css') }}" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #b5e48c, #f0f3bd); /* Verde suave y un toque de dorado */
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
        }

        .background-pattern {
            background-image: url('{{ asset($chapter['image']) }}');
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center top;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 70%;
            z-index: -1;
            opacity: 0.6;
        }

        .content-wrapper {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            position: absolute;
            bottom: 0;
            width: 100%;
            padding: 15px;
            z-index: 1;
        }

        .container {
            background: radial-gradient(circle, #f9e4b7 0%, #d1b68d 100%); /* Fondo en tonos dorados */
            padding: 20px;
            border-radius: 20px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
            width: 85%; /* Ajuste de tamaño */
            max-width: 100%;
            height: auto;
            overflow-y: auto;
            margin: 0 auto;
            max-height: 60%; /* Reducida la altura */
            border: 4px solid #d3b093;
            border-image-source: linear-gradient(45deg, #d1b68d, #b5e48c);
            border-image-slice: 1;
            position: relative;
        }

        h1 {
            color: #8d3f2f; /* Color rojo oscuro para el título */
            font-size: 2rem; /* Tamaño reducido */
            text-align: center;
            margin-bottom: 15px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        p {
            color: #4a4a4a; /* Gris oscuro para un contraste sutil */
            font-size: 1rem; /* Tamaño de fuente reducido */
            line-height: 1.5;
            margin-bottom: 15px;
            text-align: justify;
        }

        .options {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 10px; /* Reducción del espacio entre botones */
            margin-top: 10px;
        }

        .option-button {
            background: linear-gradient(145deg, #5f9c6d, #3e6e4d); /* Verde esmeralda */
            color: white;
            padding: 10px 20px; /* Ajuste de padding */
            border-radius: 20px; /* Redondeo más sutil */
            font-size: 0.9rem; /* Tamaño reducido */
            text-align: center;
            cursor: pointer;
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease-in-out;
            position: relative;
            border: 2px solid #7da173;
            overflow: hidden;
            z-index: 1;
        }

        .option-button::before {
            content: '';
            position: absolute;
            top: 3px;
            left: 3px;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(34, 139, 34, 0.5), rgba(0, 128, 0, 0.5));
            z-index: -1;
            border-radius: 20px;
            opacity: 0.5;
        }

        .option-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.4);
            background: linear-gradient(145deg, #4a9c5b, #3c6e3e);
        }

        .return-button {
            background: linear-gradient(145deg, #e07b7b, #d84c4c); /* Rojo cálido */
            color: white;
            padding: 10px 20px; /* Ajuste de padding */
            border-radius: 20px;
            font-size: 0.9rem; /* Tamaño reducido */
            text-align: center;
            cursor: pointer;
            border: none;
            margin-top: 15px; /* Ajuste de margen */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease-in-out;
            position: relative;
            border: 2px solid #cf4f4f;
            overflow: hidden;
            z-index: 1;
        }

        .return-button::before {
            content: '';
            position: absolute;
            top: 3px;
            left: 3px;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(255, 99, 71, 0.5), rgba(255, 87, 34, 0.5));
            z-index: -1;
            border-radius: 20px;
            opacity: 0.5;
        }

        .return-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.4);
            background: linear-gradient(145deg, #d05858, #a03e3e);
        }

        .progress-container {
            width: 100%;
            background-color: #e0e0e0; /* Gris claro para la barra */
            border-radius: 25px;
            padding: 3px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            margin-top: 15px;
            position: relative;
            border: 2px solid #d1d1d1;
        }

        .progress-bar {
            height: 20px;
            background-color: #34c759; /* Verde brillante */
            border-radius: 20px;
            width: {{ $progress }}%;
            transition: width 0.5s ease-in-out;
            box-shadow: 0 0 8px 1px rgba(52, 199, 89, 0.8);
            position: relative;
        }

        .progress-text {
            position: absolute;
            width: 100%;
            text-align: center;
            line-height: 20px;
            color: #333;
            font-weight: bold;
            font-size: 1rem;
        }
    </style>
</head>
<body>
    <div class="background-pattern"></div>

    <div class="content-wrapper">
        <div class="progress-container">
            <div class="progress-bar">
                <div class="progress-text">{{ $progress }}%</div>
            </div>
        </div>

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

            <div class="text-center">
                <a href="{{ route('dashboard') }}" class="return-button">⬅️ Página de inicio</a>
            </div>
        </div>
    </div>
</body>
</html>

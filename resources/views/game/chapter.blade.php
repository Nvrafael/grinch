<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $chapter['title'] }}</title>
    <link href="{{ mix('resources/css/app.css') }}" rel="stylesheet">
    <style>
        body {
            background: url('https://cdn.pixabay.com/photo/2017/12/12/10/51/snow-3013916_960_720.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Arial', sans-serif;
            height: 100vh;
            margin: 0;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .chapter-container {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            margin: 1rem;
            position: relative;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        h1 {
            text-align: center;
            font-size: 2.5rem;
            color: #006400;
            margin-bottom: 1rem;
        }

        p {
            font-size: 1.2rem;
            color: #333;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .options-container {
            position: absolute;
            bottom: 10%;
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 1rem;
            align-items: center;
            padding: 1rem;
            transform: translateY(100%);
            animation: slideUp 1s ease-out forwards;
        }

        @keyframes slideUp {
            from {
                transform: translateY(100%);
            }

            to {
                transform: translateY(0);
            }
        }

        .button {
            background-color: #f44336;
            border: none;
            padding: 14px 28px;
            color: white;
            border-radius: 12px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transform: scale(0.95);
        }

        .button:hover {
            background-color: #e53935;
            transform: scale(1);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        }

        .button:active {
            transform: scale(0.9);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .btn-back {
            background-color: #007bff;
            color: white;
            font-size: 18px;
            text-align: center;
            padding: 12px 20px;
            border-radius: 8px;
            margin-top: 2rem;
            display: block;
            width: 200px;
            margin-left: auto;
            margin-right: auto;
            text-decoration: none;
        }

        .btn-back:hover {
            background-color: #0056b3;
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            animation: fadeIn 1s ease-out;
            z-index: -1;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

    </style>
</head>

<body>
    <div class="overlay"></div>
    <div class="chapter-container">
        <h1>{{ $chapter['title'] }}</h1>
        <p>{{ $chapter['text'] }}</p>

        <div class="options-container">
            <form action="{{ route('game.choose', ['chapter' => request()->route('chapter')]) }}" method="POST">
                @csrf
                @foreach ($chapter['options'] as $option)
                    <button type="submit" name="next" value="{{ $option['next'] }}" class="button">
                        {{ $option['text'] }}
                    </button>
                @endforeach
            </form>
        </div>
    </div>

    <a href="{{ route('dashboard') }}" class="btn-back">⬅️ Página de inicio</a>
</body>

</html>

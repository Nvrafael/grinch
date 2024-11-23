<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $chapter['title'] }}</title>
    <link href="{{ mix('resources/css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 flex flex-col justify-end min-h-screen">
    <div class="bg-white p-8 rounded-t-2xl shadow-lg text-center w-full max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold text-green-700 mb-6">{{ $chapter['title'] }}</h1>
        <p class="text-lg text-gray-800 mb-6">{{ $chapter['text'] }}</p>
        <form action="{{ route('game.choose', ['chapter' => request()->route('chapter')]) }}" method="POST">
            @csrf
            <div class="flex justify-between">
                @foreach ($chapter['options'] as $option)
                    <button name="next" value="{{ $option['next'] }}" 
                            class="bg-green-600 text-white px-6 py-3 rounded-lg shadow hover:bg-green-700 transition duration-300 text-lg font-semibold">
                        {{ $option['text'] }}
                    </button>
                @endforeach
            </div>
        </form>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gracias por Jugar</title>
    <link href="{{ mix('resources/css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-green-700 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-lg text-center max-w-lg animate-fade-in">
        <h1 class="text-4xl font-bold text-green-600 mb-4">🎄 ¡Gracias por jugar! 🎄</h1>
        <p class="text-lg text-gray-700 mb-6">
            Esperamos que hayas disfrutado esta aventura interactiva sobre el Grinch y la Navidad. 
        </p>
        <p class="text-md text-gray-500 mb-6 italic">
            ¡Te deseamos unas felices fiestas llenas de alegría y unión!
        </p>
        <!-- Botón para volver al dashboard -->
        <a href="{{ route('dashboard') }}" 
           class="bg-blue-600 text-white px-6 py-3 rounded-lg shadow hover:bg-blue-700 transition duration-300 text-lg font-semibold mt-4 block">
            ⬅️ Volver al Dashboard
        </a>
        <!-- Botón para volver al inicio del juego -->
        <a href="{{ route('game.start') }}" 
           class="bg-green-600 text-white px-6 py-3 rounded-lg shadow hover:bg-green-700 transition duration-300 text-lg font-semibold mt-4 block">
            Volver al Inicio
        </a>
    </div>
</body>
<style>
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in { animation: fadeIn 1.5s ease-in-out; }
</style>
</html>

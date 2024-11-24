<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Personajes</title>
    <link href="{{ mix('resources/css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background: url('https://cdn.pixabay.com/photo/2017/12/12/10/51/snow-3013916_960_720.jpg') no-repeat center center fixed;
            background-size: cover;
        }
        .btn-animated:hover {
            transform: translateY(-5px);
            transition: all 0.2s ease-in-out;
        }
        .modal-fade {
            animation: fadeIn 0.5s ease-out forwards;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.9); }
            to { opacity: 1; transform: scale(1); }
        }
    </style>
</head>
<body class="min-h-screen text-white font-sans">
    <div class="container mx-auto p-6">
        <!-- Botón para volver al dashboard -->
        <div class="text-right mb-4">
        <a href="{{ route('dashboard') }}" 
   class="bg-blue-600 text-white px-6 py-3 rounded-lg shadow hover:bg-blue-700 transition duration-300 text-lg font-semibold">
    ⬅️ Página de inicio
</a>
        </div>

        <h1 class="text-4xl font-bold text-center mb-8 text-black">🎄 Gestión de Personajes 🎅</h1>

        <button class="btn-animated bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg mb-6 shadow-lg"
                data-modal-toggle="addCharacterModal">
            ➕ Añadir Personaje
        </button>

        <div class="overflow-x-auto bg-white rounded-lg shadow-lg">
            <table class="w-full text-gray-700">
                <thead class="bg-red-500 text-white">
                    <tr>
                        <th class="px-4 py-2 text-left">Nombre</th>
                        <th class="px-4 py-2 text-left">Descripción</th>
                        <th class="px-4 py-2 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($characters as $character)
                    <tr class="odd:bg-red-100 even:bg-red-50">
                        <td class="px-4 py-2">{{ $character->name }}</td>
                        <td class="px-4 py-2">{{ $character->description }}</td>
                        <td class="px-4 py-2 text-center space-x-2">
                            <button class="btn-animated bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-md"
                                    data-modal-toggle="editCharacterModal{{ $character->id }}">
                                ✏️ Editar
                            </button>
                            <form action="{{ route('characters.destroy', $character->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button class="btn-animated bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md"
                                        onclick="return confirm('¿Estás seguro de eliminar este personaje?')">
                                    🗑️ Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function toggleModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.toggle('hidden');
        }
        document.querySelectorAll('[data-modal-toggle]').forEach(button => {
            button.addEventListener('click', () => {
                const modalId = button.getAttribute('data-modal-toggle');
                toggleModal(modalId);
            });
        });
    </script>
</body>
</html>

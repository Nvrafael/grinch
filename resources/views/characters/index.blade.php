<link href="{{ mix('resources/css/app.css') }}" rel="stylesheet">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Personajes</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Fondo animado con nieve */
        body {
            background: url('https://cdn.pixabay.com/photo/2017/12/12/10/51/snow-3013916_960_720.jpg') no-repeat center center fixed;
            background-size: cover;
        }

        /* Animación para botones */
        .btn-animated:hover {
            transform: translateY(-5px);
            transition: all 0.2s ease-in-out;
        }

        /* Animación para modales */
        .modal-fade {
            animation: fadeIn 0.5s ease-out forwards;
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
    </style>
</head>
<body class="min-h-screen text-white font-sans">

    <div class="container mx-auto p-6">
        <h1 class="text-4xl font-bold text-center mb-8 text-black">🎄 Gestión de Personajes 🎅</h1>

        <!-- Botón para abrir el modal -->
        <button class="btn-animated bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg mb-6 shadow-lg"
                data-modal-toggle="addCharacterModal">
            ➕ Añadir Personaje
        </button>

        <!-- Tabla de personajes -->
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
                            <!-- Botón para editar -->
                            <button class="btn-animated bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-md"
                                    data-modal-toggle="editCharacterModal{{ $character->id }}">
                                ✏️ Editar
                            </button>

                            <!-- Botón para eliminar -->
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

    <!-- Modal para añadir personaje -->
    <div id="addCharacterModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center">
        <div class="bg-white text-gray-800 rounded-lg p-6 w-1/2 modal-fade">
            <h2 class="text-2xl font-bold mb-4">➕ Añadir Nuevo Personaje</h2>
            <form action="{{ route('characters.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium mb-1">Nombre</label>
                    <input type="text" id="name" name="name" required class="w-full border rounded-md px-3 py-2">
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium mb-1">Descripción</label>
                    <textarea id="description" name="description" rows="3" required class="w-full border rounded-md px-3 py-2"></textarea>
                </div>
                <div class="text-right">
                    <button type="button" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md"
                            onclick="toggleModal('addCharacterModal')">Cancelar</button>
                    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md">Guardar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal para editar personaje -->
    @foreach($characters as $character)
    <div id="editCharacterModal{{ $character->id }}" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center">
        <div class="bg-white text-gray-800 rounded-lg p-6 w-1/2 modal-fade">
            <h2 class="text-2xl font-bold mb-4">✏️ Editar Personaje</h2>
            <form action="{{ route('characters.update', $character->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium mb-1">Nombre</label>
                    <input type="text" id="name" name="name" value="{{ $character->name }}" required class="w-full border rounded-md px-3 py-2">
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium mb-1">Descripción</label>
                    <textarea id="description" name="description" rows="3" required class="w-full border rounded-md px-3 py-2">{{ $character->description }}</textarea>
                </div>
                <div class="text-right">
                    <button type="button" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md"
                            onclick="toggleModal('editCharacterModal{{ $character->id }}')">Cancelar</button>
                    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
    @endforeach

    <!-- Script para manejar los modales -->
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

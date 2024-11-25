<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Personajes</title>
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

        .group:hover .group-hover\:scale-105 {
            transform: scale(1.05);
        }

        .group:hover .group-hover\:opacity-100 {
            opacity: 1;
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

        <!-- Botón para abrir el modal de Añadir Personaje -->
        <button class="btn-animated bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg mb-6 shadow-lg"
                data-modal-toggle="addCharacterModal">
            ➕ Añadir Personaje
        </button>

        <!-- Tabla de personajes -->
        <div class="overflow-x-auto bg-white rounded-lg shadow-lg">
            <table class="w-full text-gray-700">
                <thead class="bg-red-500 text-white">
                    <tr>
                        <th class="px-4 py-2">Imagen</th>
                        <th class="px-4 py-2">Nombre</th>
                        <th class="px-4 py-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($characters as $character)
                    <tr class="odd:bg-red-100 even:bg-red-50">
                        <td class="px-4 py-2 flex items-center space-x-4">
                            <div class="relative group">
                                <img src="{{ asset('storage/' . $character->image) }}" alt="{{ $character->name }}"
                                     class="w-16 h-16 object-cover rounded-full border-2 border-gray-300 group-hover:scale-105 transition-transform duration-300">
                                <!-- Información flotante -->
                                <div class="absolute left-20 top-1/2 transform -translate-y-1/2 w-64 p-4 bg-white shadow-md rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-10">
                                    <h4 class="font-bold text-lg text-gray-800">{{ $character->name }}</h4>
                                    <p class="text-sm text-gray-600">{{ $character->description }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-2">{{ $character->name }}</td>
                        <td class="px-4 py-2 text-center space-x-2">
                            <!-- Botón para editar -->
                            <button class="btn-animated bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-md"
                                    data-modal-toggle="editCharacterModal{{ $character->id }}">
                                ✏️ Editar
                            </button>
                            <!-- Modal de Edición -->
                            <div id="editCharacterModal{{ $character->id }}" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
                                <div class="bg-white p-6 rounded-lg shadow-lg w-96">
                                    <h3 class="text-2xl font-bold mb-4">Editar Personaje</h3>
                                    <form action="{{ route('characters.update', $character->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-4">
                                            <label for="name" class="block text-gray-700">Nombre</label>
                                            <input type="text" name="name" id="name" value="{{ $character->name }}" required
                                                   class="w-full text-black bg-white border border-gray-300 p-2 rounded-md">
                                        </div>
                                        <div class="mb-4">
                                            <label for="description" class="block text-gray-700">Descripción</label>
                                            <textarea name="description" id="description" required
                                                      class="w-full text-black bg-white border border-gray-300 p-2 rounded-md">{{ $character->description }}</textarea>
                                        </div>
                                        <div class="mb-4">
                                            <label for="image" class="block text-gray-700">Imagen</label>
                                            <input type="file" name="image" id="image" accept="image/*"
                                                   class="w-full text-black bg-white border border-gray-300 p-2 rounded-md">
                                        </div>
                                        <div class="flex justify-end space-x-2">
                                            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-md">Actualizar</button>
                                            <button type="button" class="bg-red-500 text-white px-4 py-2 rounded-md"
                                                    onclick="toggleModal('editCharacterModal{{ $character->id }}')">Cerrar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- Formulario para eliminar -->
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
    <div id="addCharacterModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg w-96">
            <h3 class="text-2xl font-bold mb-4">Añadir Personaje</h3>
            <form action="{{ route('characters.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700">Nombre</label>
                    <input type="text" name="name" id="name" required
                           class="w-full text-black bg-white border border-gray-300 p-2 rounded-md">
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-gray-700">Descripción</label>
                    <textarea name="description" id="description" required
                              class="w-full text-black bg-white border border-gray-300 p-2 rounded-md"></textarea>
                </div>
                <div class="mb-4">
                    <label for="image" class="block text-gray-700">Imagen</label>
                    <input type="file" name="image" id="image" required accept="image/*"
                           class="w-full text-black bg-white border border-gray-300 p-2 rounded-md">
                </div>
                <div class="flex justify-end space-x-2">
                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-md">Añadir</button>
                    <button type="button" class="bg-red-500 text-white px-4 py-2 rounded-md"
                            onclick="toggleModal('addCharacterModal')">Cerrar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- JavaScript -->
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

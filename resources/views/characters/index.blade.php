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
        /* Cambiar el color del texto dentro del campo de descripción y nombre */
        textarea, input {
            color: black;
            background-color: #f7fafc; /* Fondo claro para contraste */
            border: 1px solid #cbd5e0; /* Borde gris claro */
            padding: 0.5rem;
            border-radius: 0.375rem;
            font-size: 1rem;
        }

        /* Estilo para cuando el campo de texto está enfocado */
        textarea:focus, input:focus {
            outline: none;
            border-color: #63b3ed; /* Borde azul claro al enfocar */
            box-shadow: 0 0 0 2px rgba(99, 184, 237, 0.5); /* Sombra azul */
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
                            <!-- Botón para abrir el modal de editar personaje -->
                            <button class="btn-animated bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-md"
                                    data-modal-toggle="editCharacterModal{{ $character->id }}">
                                ✏️ Editar
                            </button>
                            <!-- Formulario para eliminar el personaje -->
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
        <form action="{{ route('characters.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Nombre</label>
                <!-- Campo de nombre con color de texto negro -->
                <input type="text" name="name" id="name" required class="w-full text-black bg-white border border-gray-300 p-2 rounded-md" placeholder="Nombre del personaje">
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700">Descripción</label>
                <!-- Campo de descripción con color de texto negro -->
                <textarea name="description" id="description" required class="w-full text-black bg-white border border-gray-300 p-2 rounded-md" placeholder="Descripción del personaje"></textarea>
            </div>
            <div class="flex justify-end space-x-2">
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-md">Añadir</button>
                <button type="button" class="bg-red-500 text-white px-4 py-2 rounded-md" onclick="toggleModal('addCharacterModal')">Cerrar</button>
            </div>
        </form>
    </div>
</div>

    <!-- Modal para editar personaje (se muestra dinámicamente con el ID del personaje) -->
<div id="editCharacterModal{{ $character->id }}" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
        <h3 class="text-2xl font-bold mb-4">Editar Personaje</h3>
        <form action="{{ route('characters.update', $character->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Nombre</label>
                <!-- Campo de nombre con color de texto negro -->
                <input type="text" name="name" id="name" value="{{ $character->name }}" required class="w-full text-black bg-white border border-gray-300 p-2 rounded-md" placeholder="Nombre del personaje">
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700">Descripción</label>
                <!-- Campo de descripción con color de texto negro -->
                <textarea name="description" id="description" required class="w-full text-black bg-white border border-gray-300 p-2 rounded-md" placeholder="Descripción del personaje">{{ $character->description }}</textarea>
            </div>
            <div class="flex justify-end space-x-2">
                <button type="submit" class="bg-yellow-600 text-white px-4 py-2 rounded-md">Guardar cambios</button>
                <button type="button" class="bg-red-500 text-white px-4 py-2 rounded-md" onclick="toggleModal('editCharacterModal{{ $character->id }}')">Cerrar</button>
            </div>
        </form>
    </div>
</div>

    <script>
        // Función para abrir y cerrar los modales
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

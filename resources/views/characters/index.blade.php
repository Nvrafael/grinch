<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🎄 Gestión de Personajes 🎅</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Fondo animado con gradiente navideño */
        body {
            background: linear-gradient(90deg, #8E44AD, #3498DB, #2ECC71, #E74C3C);
            background-size: 300% 300%;
            animation: gradientBG 10s ease infinite;
            font-family: 'Verdana', sans-serif;
            color: #FDFEFE;
            margin: 0;
            height: 100vh;
            overflow-x: hidden;
        }

        @keyframes gradientBG {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        /* Botones */
        .button {
            padding: 0.5rem 1rem;
            font-size: 1rem;
            border-radius: 0.5rem;
            border: none;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .button:hover {
            transform: translateY(-3px);
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2);
        }

        .btn-add {
            background-color: #2ECC71;
            color: white;
        }

        .btn-edit {
            background-color: #F39C12;
            color: white;
        }

        .btn-delete {
            background-color: #E74C3C;
            color: white;
        }

        .btn-back {
            background-color: #3498DB;
            color: white;
        }

        /* Tablas */
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 1rem;
        }

        th {
            background-color: #34495E;
            color: #FDFEFE;
            text-align: left;
            padding: 12px;
        }

        tr:nth-child(even) {
            background-color: #BDC3C7;
        }

        td {
            text-align: center;
            padding: 12px;
        }

        /* Estilo para modales */
        .modal {
            position: fixed;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 50;
        }

        .modal-content {
            background-color: white;
            border-radius: 8px;
            padding: 2rem;
            width: 90%;
            max-width: 500px;
            color: black;
        }

        .modal-header {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            text-align: center;
            color: #2C3E50;
        }

        label,
        input,
        textarea {
            color: black;
        }
    </style>
</head>

<body>
    <div class="container mx-auto p-6">
        <div class="text-right mb-4">
            <a href="{{ route('dashboard') }}" class="button btn-back">
                ⬅️ Página de inicio
            </a>
        </div>

        <h1 class="text-4xl font-bold text-center mb-8">🎄 Gestión de Personajes 🎅</h1>

        <!-- Botón de añadir personaje -->
        <button class="button btn-add" onclick="toggleModal('addCharacterModal')">
            ➕ Añadir Personaje
        </button>

        <!-- Tabla de personajes -->
        <div class="overflow-x-auto rounded-lg mt-6">
            <table>
                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($characters as $character)
                    <tr>
                        <td>
                            <img src="{{ asset('storage/' . $character->image) }}" alt="{{ $character->name }}"
                                class="w-16 h-16 object-cover rounded-full mx-auto">
                        </td>
                        <td>{{ $character->name }}</td>
                        <td>
                            <!-- Botón de ver descripción -->
                            <button class="button btn-edit" onclick="toggleModal('viewCharacterModal{{ $character->id }}')">
                                👁️ Ver Descripción
                            </button>
                            <!-- Botón de editar -->
                            <button class="button btn-edit" onclick="toggleModal('editCharacterModal{{ $character->id }}')">
                                ✏️ Editar
                            </button>

                            <!-- Formulario para eliminar -->
                            <form action="{{ route('characters.destroy', $character->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button class="button btn-delete"
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

    <!-- Modal de añadir personaje -->
    <div id="addCharacterModal" class="hidden modal">
        <div class="modal-content">
            <h3 class="modal-header">Añadir Personaje</h3>
            <form action="{{ route('characters.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700">Nombre</label>
                    <input type="text" name="name" id="name" required class="w-full border border-gray-300 p-2 rounded-md">
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-gray-700">Descripción</label>
                    <textarea name="description" id="description" required class="w-full border border-gray-300 p-2 rounded-md"></textarea>
                </div>
                <div class="mb-4">
                    <label for="image" class="block text-gray-700">Imagen</label>
                    <input type="file" name="image" id="image" accept="image/*" class="w-full border border-gray-300 p-2 rounded-md">
                </div>
                <div class="flex justify-end space-x-2">
                    <button type="submit" class="button btn-add">Añadir</button>
                    <button type="button" class="button btn-delete" onclick="toggleModal('addCharacterModal')">Cerrar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal para ver descripción -->
    @foreach($characters as $character)
    <div id="viewCharacterModal{{ $character->id }}" class="hidden modal">
        <div class="modal-content">
            <h3 class="modal-header">Descripción de {{ $character->name }}</h3>
            <p>{{ $character->description }}</p>
            <div class="flex justify-end space-x-2">
                <button type="button" class="button btn-delete" onclick="toggleModal('viewCharacterModal{{ $character->id }}')">Cerrar</button>
            </div>
        </div>
    </div>
    @endforeach

    <!-- Modal de edición para cada personaje -->
    @foreach($characters as $character)
    <div id="editCharacterModal{{ $character->id }}" class="hidden modal">
        <div class="modal-content">
            <h3 class="modal-header">Editar Personaje</h3>
            <form action="{{ route('characters.update', $character->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="name" class="block text-gray-700">Nombre</label>
                    <input type="text" name="name" id="name" value="{{ $character->name }}" required class="w-full border border-gray-300 p-2 rounded-md">
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-gray-700">Descripción</label>
                    <textarea name="description" id="description" required class="w-full border border-gray-300 p-2 rounded-md">{{ $character->description }}</textarea>
                </div>
                <div class="mb-4">
                    <label for="image" class="block text-gray-700">Imagen</label>
                    <input type="file" name="image" id="image" accept="image/*" class="w-full border border-gray-300 p-2 rounded-md">
                </div>
                <div class="flex justify-end space-x-2">
                    <button type="submit" class="button btn-add">Actualizar</button>
                    <button type="button" class="button btn-delete" onclick="toggleModal('editCharacterModal{{ $character->id }}')">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
    @endforeach

    <!-- JavaScript -->
    <script>
        function toggleModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.toggle('hidden');
        }
    </script>
</body>

</html>

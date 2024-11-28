<link href="{{ mix('resources/css/app.css') }}" rel="stylesheet">
<body class="min-h-screen bg-gradient-to-br from-red-500 via-red-700 to-red-900 relative overflow-hidden flex items-center justify-center text-white">
    <!-- Fondo animado con copos de nieve -->
    <div class="absolute inset-0 pointer-events-none overflow-hidden">
        <div class="snowflake"></div>
        <div class="snowflake"></div>
        <div class="snowflake"></div>
        <div class="snowflake"></div>
        <div class="snowflake"></div>
        <div class="snowflake"></div>
        <div class="snowflake"></div>
        <div class="snowflake"></div>
    </div>

    <!-- Contenido principal -->
    <div class="relative z-10 bg-gradient-to-br from-white via-gray-100 to-gray-200 p-10 rounded-3xl shadow-2xl text-center max-w-lg glow-container">
        <h1 class="text-6xl font-extrabold text-green-700 mb-6 drop-shadow-md">
            ¡Hola, {{ $name }}!
        </h1>
        <p class="text-2xl text-gray-800 mb-6">
            🎄 Bienvenido a nuestra historia interactiva 🎅
        </p>
        <p class="text-lg text-gray-600 mb-8 font-medium">
            ¡Elige una opción para continuar!
        </p>

        <!-- Botones de funcionalidad -->
        <div class="flex flex-col gap-6">
            <!-- Botón para jugar -->
            <a href="{{ route('game.start') }}"
               class="bg-green-500 text-white px-8 py-4 rounded-full shadow-lg hover:bg-green-600 transition-all duration-500 text-xl font-bold transform hover:scale-105">
                🎮 Jugar Ahora
            </a>

            <!-- Botón para información sobre personajes -->
            <a href="{{ route('characters.info') }}"
               class="bg-red-500 text-white px-8 py-4 rounded-full shadow-lg hover:bg-red-600 transition-all duration-500 text-xl font-bold transform hover:scale-105">
                🌟 Información de Personajes
            </a>

            <!-- Botón para información sobre nosotros -->
            <button id="about-us-btn"
               class="bg-blue-500 text-white px-8 py-4 rounded-full shadow-lg hover:bg-blue-600 transition-all duration-500 text-xl font-bold transform hover:scale-105">
                🧑‍💻 Información Sobre Nosotros
            </button>
        </div>
    </div>

    <!-- Contenedor del GIF del Grinch -->
    <div id="grinch-gif-container" class="absolute top-1/4 right-10 hidden">
        <img src="https://i.giphy.com/media/v1.Y2lkPTc5MGI3NjExZW02MDI1MHB1cHdnNGFpNGpucDR4eml5bXhkYTFyNjl0N3pzdWs3bSZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/dX4qmW4DV3S6qdx1cU/giphy-downsized-large.gif" alt="Grinch agradeciendo" width="300" class="drop-shadow-lg rounded-lg">
    </div>

    <!-- Estilos adicionales -->
    <style>
        /* Fondo animado con copos de nieve */
        @keyframes fall {
            0% { transform: translateY(-100px); opacity: 1; }
            100% { transform: translateY(100vh); opacity: 0; }
        }

        .snowflake {
            position: absolute;
            top: -10%;
            width: 12px;
            height: 12px;
            background: white;
            border-radius: 50%;
            animation: fall linear infinite;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.8);
        }

        .snowflake:nth-child(1) { left: 10%; animation-duration: 5s; }
        .snowflake:nth-child(2) { left: 20%; animation-duration: 7s; width: 14px; height: 14px; }
        .snowflake:nth-child(3) { left: 40%; animation-duration: 6s; }
        .snowflake:nth-child(4) { left: 60%; animation-duration: 8s; width: 10px; height: 10px; }
        .snowflake:nth-child(5) { left: 80%; animation-duration: 4s; }
        .snowflake:nth-child(6) { left: 90%; animation-duration: 9s; width: 16px; height: 16px; }

        /* Estilo para el contenedor con luz fluorescente */
        .glow-container {
            position: relative;
            border: 2px solid transparent;
            box-shadow: 0 0 30px 10px rgba(255, 0, 0, 0.8), 0 0 60px 20px rgba(255, 0, 0, 0.6), inset 0 0 10px rgba(255, 0, 0, 0.5);
            transition: box-shadow 0.5s ease-in-out, transform 0.3s;
        }

        .glow-container:hover {
            box-shadow: 0 0 40px 15px rgba(255, 0, 0, 1), 0 0 80px 30px rgba(255, 0, 0, 0.9), inset 0 0 20px rgba(255, 0, 0, 0.8);
            transform: scale(1.02);
        }

        /* SweetAlert estilos personalizados */
        .swal2-popup { background: linear-gradient(145deg, #1b1b1b, #4caf50); color: white; }
        .swal2-title { font-family: 'Comic Sans MS', cursive; color: #00ffcc; }
        .swal2-html-container { font-family: 'Comic Sans MS', cursive; text-align: left; color: white; }
    </style>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('about-us-btn').addEventListener('click', function () {
            let gifContainer = document.getElementById('grinch-gif-container');
            gifContainer.style.display = 'block';

            Swal.fire({
                title: '<h2 style="color: #00ffcc;">🎄 Sobre Nosotros 🎅</h2>',
                html: `
                    <div>
                        <p><strong style="color: #FF5733;">🎨 Paula</strong>: Diseñadora UX/UI con pasión por los colores navideños.</p>
                        <p><strong style="color: #33FF57;">🖥️ Rafa</strong>: Experto Backend, asegura que todo funcione perfectamente.</p>
                        <p><strong style="color: #FFC300;">✨ Carlos</strong>: Especialista en Frontend, hace magia en la pantalla.</p>
                        <p><strong style="color: #C70039;">👨‍🔧 Sergio</strong>: Coordinador y Testing QA, ¡el Grinch de los bugs!</p>
                    </div>
                `,
                showCloseButton: true,
                showConfirmButton: false,
                icon: 'info',
            }).then(() => gifContainer.style.display = 'none');
        });
    </script>
</body>

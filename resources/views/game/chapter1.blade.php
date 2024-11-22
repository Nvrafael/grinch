<link href="{{ mix('resources/css/app.css') }}" rel="stylesheet">


    <div class="relative z-10 bg-white/90 p-8 rounded-xl shadow-lg text-center max-w-lg">
        <h1 class="text-4xl font-bold text-green-700 mb-6">Capítulo 1: Una noche de dudas</h1>
        <p class="text-xl text-gray-800 mb-6">
            El Grinch se despierta en su cueva, molesto por los ruidos de la Villa Quién. Está cansado de la alegría navideña, pero algo dentro de él le hace dudar.
        </p>
        <p class="text-lg text-gray-600 mb-8">
            ¿Qué hará el Grinch?
        </p>

        <!-- Opciones del jugador -->
        <div id="options" class="flex flex-col gap-4">
            <!-- Opción 1: Robar la Navidad -->
            <button id="option1" class="bg-green-600 text-white px-6 py-3 rounded-lg shadow hover:bg-green-700 transition duration-300 text-lg font-semibold">
                🎄 Decidir robar la Navidad
            </button>

            <!-- Opción 2: Bajar a la Villa Quién -->
            <button id="option2" class="bg-red-600 text-white px-6 py-3 rounded-lg shadow hover:bg-red-700 transition duration-300 text-lg font-semibold">
                🌟 Bajar a la Villa Quién
            </button>
        </div>

        <!-- Area para mostrar el siguiente capítulo -->
        <div id="chapterContent" class="mt-6 hidden">
            <h2 id="chapterTitle" class="text-3xl text-green-700 mb-6"></h2>
            <p id="chapterText" class="text-xl text-gray-800 mb-6"></p>
            <div id="nextChapterButton" class="mt-4">
                <!-- Aquí irán las opciones del siguiente capítulo -->
            </div>
        </div>
    </div>

    <script>
        // Función para manejar las elecciones del jugador
        document.getElementById('option1').addEventListener('click', function () {
            showNextChapter('El Grinch decide robar la Navidad para silenciar los villancicos. Pero se da cuenta de que hay más en juego de lo que pensaba...', 'Capítulo 2: El robo de la Navidad', [
                { text: '💼 Seguir con el plan de robar la Navidad', route: '/chapter2/robbery' },
                { text: '💭 Reflexionar y arrepentirse', route: '/chapter2/change' }
            ]);
        });

        document.getElementById('option2').addEventListener('click', function () {
            showNextChapter('El Grinch decide bajar a la Villa Quién para entender por qué celebran tanto. Se enfrenta a una nueva aventura...', 'Capítulo 2: La Villa Quién', [
                { text: '👀 Observar en secreto', route: '/chapter2/observe' },
                { text: '🗣️ Acercarse y preguntar', route: '/chapter2/approach' }
            ]);
        });

        // Mostrar el siguiente capítulo con nuevas opciones
        function showNextChapter(chapterText, chapterTitle, options) {
            // Ocultar las opciones del capítulo actual
            document.getElementById('options').classList.add('hidden');
            document.getElementById('chapterContent').classList.remove('hidden');
            
            // Mostrar el título y texto del siguiente capítulo
            document.getElementById('chapterTitle').textContent = chapterTitle;
            document.getElementById('chapterText').textContent = chapterText;

            // Crear botones para las opciones del siguiente capítulo
            const nextChapterButtonContainer = document.getElementById('nextChapterButton');
            nextChapterButtonContainer.innerHTML = ''; // Limpiar botones anteriores
            options.forEach(function (option) {
                const button = document.createElement('button');
                button.textContent = option.text;
                button.classList.add('bg-blue-600', 'text-white', 'px-6', 'py-3', 'rounded-lg', 'shadow', 'hover:bg-blue-700', 'transition', 'duration-300', 'text-lg', 'font-semibold');
                button.addEventListener('click', function () {
                    window.location.href = option.route;  // Redirigir a la siguiente página
                });
                nextChapterButtonContainer.appendChild(button);
            });
        }
    </script>


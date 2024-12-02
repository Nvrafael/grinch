<link href="{{ mix('resources/css/app.css') }}" rel="stylesheet">
<body class="min-h-screen bg-gradient-to-br from-red-500 via-red-700 to-red-900 relative overflow-hidden flex items-center justify-center text-white">
    <!-- Fondo animado con copos de nieve -->
    <div class="absolute inset-0 pointer-events-none overflow-hidden">
        <div class="snowflake" style="left: 10%; animation-duration: 10s;"></div>
        <div class="snowflake" style="left: 20%; animation-duration: 12s; width: 14px; height: 14px;"></div>
        <div class="snowflake" style="left: 40%; animation-duration: 11s;"></div>
        <div class="snowflake" style="left: 60%; animation-duration: 15s; width: 10px; height: 10px;"></div>
        <div class="snowflake" style="left: 80%; animation-duration: 9s;"></div>
        <div class="snowflake" style="left: 90%; animation-duration: 14s; width: 16px; height: 16px;"></div>
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
            <a href="{{ route('game.start') }}"
               class="bg-green-500 text-white px-8 py-4 rounded-full shadow-lg hover:bg-green-600 transition-all duration-500 text-xl font-bold transform hover:scale-105">
                🎮 Jugar Ahora
            </a>
            <a href="{{ route('characters.info') }}"
               class="bg-red-500 text-white px-8 py-4 rounded-full shadow-lg hover:bg-red-600 transition-all duration-500 text-xl font-bold transform hover:scale-105">
                🌟 Información de Personajes
            </a>
            <button id="about-us-btn"
               class="bg-blue-500 text-white px-8 py-4 rounded-full shadow-lg hover:bg-blue-600 transition-all duration-500 text-xl font-bold transform hover:scale-105">
                🧑‍💻 Información Sobre Nosotros
            </button>
        </div>
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

        /* Ajuste de los copos de nieve */
        .snowflake:nth-child(1) { animation-duration: 10s; left: 10%; }
        .snowflake:nth-child(2) { animation-duration: 12s; left: 20%; width: 14px; height: 14px; }
        .snowflake:nth-child(3) { animation-duration: 11s; left: 40%; }
        .snowflake:nth-child(4) { animation-duration: 15s; left: 60%; width: 10px; height: 10px; }
        .snowflake:nth-child(5) { animation-duration: 9s; left: 80%; }
        .snowflake:nth-child(6) { animation-duration: 14s; left: 90%; width: 16px; height: 16px; }

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

        /* Ajustar el tamaño de la ventana de SweetAlert */
        .swal2-popup {
            width: 700px;
            height: auto;
            background: linear-gradient(145deg, #1b1b1b, #4caf50);
            color: white;
            border-radius: 15px;
            box-shadow: 0 0 20px 5px rgba(0, 255, 150, 0.7);
            border: 2px solid #00ffcc;
            overflow: hidden;
            position: relative;
            font-size: 1.2rem;
            padding: 20px;
            z-index: 1; /* Asegura que el contenido esté en frente */
        }

        .swal2-popup::before {
            content: '';
            position: absolute;
            top: 10%;
            left: 50%;
            transform: translate(-50%, -10%);
            width: 180px;
            height: auto;
            z-index: -2; /* Menor que el contenido del popup */
            background-image: url('images/chapters/grinch2.jpg');
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
            opacity: 0.2;
        }

        /* Animación de la imagen del Grinch */
        .grinch {
            position: absolute;
            width: 150px;
            z-index: -1; /* Asegura que la imagen esté detrás del contenido */
        }
    </style>

    <!-- Script de SweetAlert con imagen animada -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('about-us-btn').addEventListener('click', function () {
            Swal.fire({
                title: '<h2 style="color: #00ffcc;">🎄 Sobre Nosotros 🎅</h2>',
                html: `
                    <div>
                        <p><strong style="color: #FF5733;">🎨 Rafael</strong>: Experto en backend.</p>
                        <p><strong style="color: #FF5733;">🎨 Paula</strong>: Diseñadora UX/UI con pasión por los colores navideños.</p>
                        <p><strong style="color: #FFC300;">✨ Carlos</strong>: Especialista en Frontend, hace magia en la pantalla.</p>
                        <p><strong style="color: #C70039;">👨‍🔧 Sergio</strong>: Coordinador y Testing QA, ¡el Grinch de los bugs!</p>
                    </div>
                `,
                background: 'linear-gradient(145deg, #1b1b1b, #4caf50)',
                customClass: {
                    popup: 'swal2-glow',
                },
                showCloseButton: true,
                showConfirmButton: false,
                icon: 'info',
                willOpen: () => {
                    // Crear y animar la imagen del Grinch
                    const grinch = document.createElement('img');
                    grinch.src = 'images/chapters/elgrinch 1.png'; // Verifica que el URL sea correcto
                    grinch.classList.add('grinch');
                    document.querySelector('.swal2-popup').appendChild(grinch);

                    // Variables para el movimiento
                    let posX = 0;
                    let posY = 0;
                    let dx = 1; // Cambio en la posición horizontal
                    let dy = 1; // Cambio en la posición vertical

                    // Función para mover la imagen de manera sutil
                    function moveGrinch() {
                        const popup = document.querySelector('.swal2-popup');
                        const popupWidth = popup.offsetWidth;
                        const popupHeight = popup.offsetHeight;
                        const grinchWidth = grinch.offsetWidth;
                        const grinchHeight = grinch.offsetHeight;

                        // Limitar el movimiento para que no salga del contenedor
                        if (posX + grinchWidth > popupWidth || posX < 0) dx *= -1;
                        if (posY + grinchHeight > popupHeight || posY < 0) dy *= -1;

                        posX += dx;
                        posY += dy;

                        grinch.style.left = posX + 'px';
                        grinch.style.top = posY + 'px';

                        requestAnimationFrame(moveGrinch);
                    }

                    moveGrinch();
                }
            });
        });
    </script>
</body>

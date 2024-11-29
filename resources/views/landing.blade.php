<head>
    <link href="{{ mix('resources/css/app.css') }}" rel="stylesheet">
    <style>
        /* Fondo degradado */
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            background: radial-gradient(circle, #ffcc00, #ff5733, #c70039, #900c3f, #581845);
            overflow: hidden;
            position: relative;
        }

        /* Estilo del canvas de partículas */
        #particles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0; /* Al fondo */
        }

        /* Contenedor de la tarjeta al frente */
        .card {
            position: relative;
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(10px);
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            border: 3px solid #00ff00;
            animation: glow 2s infinite alternate;
            z-index: 10; /* Siempre al frente */
        }

        @keyframes glow {
            0% { box-shadow: 0 0 10px #00ff00, 0 0 20px #00ff00; }
            100% { box-shadow: 0 0 20px #00ff00, 0 0 30px #00ff00; }
        }

        .card:hover {
            transform: scale(1.05);
            transition: transform 0.3s ease;
        }

        /* Botones animados */
        .button {
            background: linear-gradient(135deg, #43a047, #66bb6a);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            font-weight: bold;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(67, 160, 71, 0.4);
        }

        .button:hover {
            background: linear-gradient(135deg, #66bb6a, #43a047);
            transform: translateY(-3px) scale(1.1);
            box-shadow: 0 8px 20px rgba(67, 160, 71, 0.6);
        }

        /* Tipografía */
        .title {
            font-family: 'Pacifico', cursive;
            font-size: 3rem;
            color: #2e7d32;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .subtitle {
            font-size: 1.25rem;
            color: #4caf50;
        }
    </style>
</head>
<body>
    <!-- Canvas para partículas -->
    <canvas id="particles"></canvas>

    <!-- Contenido principal -->
    <div class="min-h-screen flex items-center justify-center relative">
        <div class="card">
            <h2 class="title text-center">¡Bienvenido al Mundo Navideño!</h2>
            <p class="subtitle text-center mb-6">El monstruo verde está esperando... ¿Listo para salvar la Navidad?</p>
            <form method="POST" action="{{ route('dashboard') }}">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-semibold mb-2">Ingresa tu nombre:</label>
                    <input type="text" name="name" id="name" required class="w-full p-3 border border-green-500 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-600" placeholder="Tu nombre...">
                </div>
                <div class="text-center">
                    <button type="submit" class="button">Empezar la Aventura</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Script para animar partículas -->
    <script>
        const canvas = document.getElementById("particles");
        const ctx = canvas.getContext("2d");
        let particlesArray = [];

        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;

        window.addEventListener("resize", () => {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
            init();
        });

        class Particle {
            constructor(x, y, size, color, speedX, speedY) {
                this.x = x;
                this.y = y;
                this.size = size;
                this.color = color;
                this.speedX = speedX;
                this.speedY = speedY;
            }
            update() {
                this.x += this.speedX;
                this.y += this.speedY;

                // Reaparecer al salir de los límites
                if (this.x < 0 || this.x > canvas.width || this.y < 0 || this.y > canvas.height) {
                    this.x = Math.random() * canvas.width;
                    this.y = 0;
                }
            }
            draw() {
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
                ctx.fillStyle = this.color;
                ctx.fill();
            }
        }

        function init() {
            particlesArray = [];
            const numberOfParticles = Math.min((canvas.width * canvas.height) / 5000, 150);
            for (let i = 0; i < numberOfParticles; i++) {
                const size = Math.random() * 3 + 1;
                const x = Math.random() * canvas.width;
                const y = Math.random() * canvas.height;
                const speedX = (Math.random() - 0.5) * 2;
                const speedY = Math.random() * 1 + 0.5;
                const color = `rgba(255, ${Math.random() * 255}, ${Math.random() * 200}, 0.8)`;
                particlesArray.push(new Particle(x, y, size, color, speedX, speedY));
            }
        }

        function animate() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            particlesArray.forEach((particle) => {
                particle.update();
                particle.draw();
            });
            requestAnimationFrame(animate);
        }

        init();
        animate();
    </script>
</body>

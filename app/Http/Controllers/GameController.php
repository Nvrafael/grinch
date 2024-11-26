<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{
    public function start()
    {
        return view('game.start');
    }

    protected $story = [
        'chapter1' => [
            'title' => 'Capítulo 1: Una noche de dudas',
            'text' => 'El Grinch se despierta en su cueva, molesto por los ruidos de la Villa Quién. Está cansado de la alegría navideña, pero algo dentro de él le hace dudar.',
            'image' => 'images/grinchinicio.png', //  imagen para este capítulo
            'options' => [
                ['text' => '🎄 Decidir robar la Navidad', 'next' => 'chapter2A'],
                ['text' => '🌟 Bajar a la Villa Quién', 'next' => 'chapter2B'],
            ],
        ],
        'chapter2A' => [
            'title' => 'Capítulo 2A: La misión del robo',
            'text' => 'El Grinch planifica cómo robar todos los regalos y decoraciones de la Villa Quién. Mientras se prepara, ve a su perro Max con una expresión dudosa.',
            'options' => [
                ['text' => '💼 Continuar con el plan', 'next' => 'chapter3A'],
                ['text' => '🐾 Escuchar los sentimientos de Max', 'next' => 'chapter3B'],
            ],
        ],
        'chapter2B' => [
            'title' => 'Capítulo 2B: La curiosidad del Grinch',
            'text' => 'El Grinch camina hacia la Villa Quién y se encuentra con Cindy Lou, quien lo invita a una fiesta de Navidad.',
            'options' => [
                ['text' => '🎉 Aceptar la invitación y asistir a la fiesta', 'next' => 'chapter3B'],
                ['text' => '👀 Espiar la fiesta desde las sombras', 'next' => 'chapter3B'],
            ],
        ],
        'chapter3A' => [
            'title' => 'Capítulo 3A: Max y el dilema moral',
            'text' => 'Si el Grinch ignora a Max, el robo avanza, pero algo sale mal: ¡los niños despiertan! Si lo escucha, Max sugiere que no necesita robar nada.',
            'options' => [
                ['text' => '🏃 Huir rápidamente', 'next' => 'chapter4A'],
                ['text' => '🎁 Devolver los regalos y enfrentarse a la Villa Quién', 'next' => 'chapter4B'],
            ],
        ],
        'chapter3B' => [
            'title' => 'Capítulo 3B: Entre luces y sombras',
            'text' => 'En la fiesta, el Grinch descubre la calidez de la Navidad y siente un cosquilleo en el corazón. Si espía desde las sombras, escucha que la Navidad no se trata de regalos, sino de amor y unión.',
            'options' => [
                ['text' => '🎊 Unirse a la celebración', 'next' => 'chapter4A'],
                ['text' => '🚪 Escapar antes de ser descubierto', 'next' => 'chapter4D'],
            ],
        ],
        'chapter4A' => [
            'title' => 'Capítulo 4A: El caos o la redención',
            'text' => 'El Grinch es descubierto por los Quién. Si devuelve los regalos, lo reciben con sorpresa y amabilidad. Si huye, se siente más solo que nunca.',
            'options' => [
                ['text' => '🤝 Quedarse con los Quién', 'next' => 'chapter5A'],
                ['text' => '🏔️ Regresar a su cueva', 'next' => 'chapter5B'],
            ],
        ],
        'chapter5A' => [
            'title' => 'Capítulo 5A: Transformación completa',
            'text' => 'El Grinch acepta la Navidad y aprende sobre la unión. Ahora sabe que no todo se trata de regalos.',
            'options' => [
                ['text' => '🎄 Celebrar la Navidad con los Quién', 'next' => null],
            ],
        ],
        'chapter5B' => [
            'title' => 'Capítulo 5B: Reflexión del Grinch',
            'text' => 'El Grinch regresa a su cueva, pero algo le sigue rondando en el corazón. Se da cuenta de que su soledad no lo hace feliz.',
            'options' => [
                ['text' => '❤️ Regresar a la Villa Quién para unirse a ellos', 'next' => 'chapter6A'],
                ['text' => '❌ Seguir aislado en su cueva', 'next' => 'chapter6B'],
            ],
        ],
        'chapter6A' => [
            'title' => 'Capítulo 6A: La Navidad del Grinch',
            'text' => 'Si el Grinch se queda, se convierte en el héroe de la Navidad. Si sigue aislado, ve la Navidad desde lejos, arrepintiéndose de su decisión.',
            'options' => [
                ['text' => '🎉 Reconciliarse con los Quién', 'next' => null],
            ],
        ],
        'chapter6B' => [
            'title' => 'Capítulo 6B: Una nueva tradición',
            'text' => 'Si el Grinch acepta a Cindy, se convierte en parte de la tradición navideña. Si huye, descubre que su soledad no trae felicidad.',
            'options' => [
                ['text' => '🔄 Volver y cambiar las cosas', 'next' => null],
                ['text' => '🚶 Alejarse para siempre, dejando su legado como el Grinch que casi salvó la Navidad.', 'next' => null],
            ],
        ],
    ];


    public function showChapter($chapter)
    {
        if (!array_key_exists($chapter, $this->story)) {
            abort(404, 'Capítulo no encontrado');
        }
    
        $chapterData = $this->story[$chapter];
    
        // Calcular progreso en función del capítulo actual
        $totalChapters = count($this->story); // Total de capítulos
        $currentChapterIndex = array_search($chapter, array_keys($this->story)); // Índice del capítulo actual
        $progress = round(($currentChapterIndex + 1) / $totalChapters * 100); // Progreso en porcentaje

        // Si el capítulo no tiene continuación, mostrar mensaje de agradecimiento
        if (collect($chapterData['options'])->every(fn($option) => $option['next'] === null)) {
            return view('game.end'); // Vista para finalizar la historia
        }
    
        // Pasar el progreso a la vista
        return view('game.chapter', ['chapter' => $chapterData, 'progress' => $progress]);
    }

    public function chooseOption(Request $request, $chapter)
    {
        $next = $request->input('next');
        if (!array_key_exists($next, $this->story)) {
            abort(404, 'Capítulo no válido');
        }

        return redirect()->route('game.chapter', ['chapter' => $next]);
    }
}

    


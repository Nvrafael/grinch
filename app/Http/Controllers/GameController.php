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
            'title' => ' Una noche de dudas',
            'text' => 'El Grinch se despierta en su cueva, molesto por los ruidos de la Villa Quién. Está cansado de la alegría navideña, pero algo dentro de él le hace dudar.',
            'image'=>'images/chapters/chapter1.png',
            'options' => [
               
                ['text' => '🎄 Decidir robar la Navidad', 'next' => 'chapter2A'],
                ['text' => '🌟 Bajar a la Villa Quién', 'next' => 'chapter2B'],
            ],
        ],
        'chapter2A' => [
            'title' => ' La misión del robo',
            'text' => 'El Grinch planifica cómo robar todos los regalos y decoraciones de la Villa Quién. Mientras se prepara, ve a su perro Max con una expresión dudosa.',
            'image'=>'images/chapters/chapter2A.png',
            'options' => [
                ['text' => '💼 Continuar con el plan', 'next' => 'chapter3A'],
                ['text' => '🐾 Escuchar los sentimientos de Max', 'next' => 'chapter3B'],
            ],
        ],
        'chapter2B' => [
            'title' => ' La curiosidad del Grinch',
            'text' => 'El Grinch camina hacia la Villa Quién y se encuentra con Cindy Lou, quien lo invita a una fiesta de Navidad.',
            'image'=>'images/chapters/chapter2B.png',
            'options' => [
                ['text' => '🎉 Aceptar la invitación y asistir a la fiesta', 'next' => 'chapter3B'],
                ['text' => '👀 Espiar la fiesta desde las sombras', 'next' => 'chapter4B'],
            ],
        ],
        'chapter3A' => [
            'title' => ' Max y el dilema moral',
            'text' => 'Si el Grinch ignora a Max, el robo avanza, pero algo sale mal: ¡los niños despiertan! Si lo escucha, Max sugiere que no necesita robar nada.',
            'image'=>'images/chapters/chapter3A.png',
            'options' => [
                ['text' => '🏃 Huir rápidamente', 'next' => 'chapter4A'],
                ['text' => '🎁 Devolver los regalos y enfrentarse a la Villa Quién', 'next' => 'chapter4B'],
            ],
        ],
        'chapter3B' => [
            'title' => ' Entre luces y sombras',
            'text' => 'En la fiesta, el Grinch descubre la calidez de la Navidad y siente un cosquilleo en el corazón. Si espía desde las sombras, escucha que la Navidad no se trata de regalos, sino de amor y unión.',
            'image'=>'images/chapters/chapter3B.png',
            'options' => [
                ['text' => '🎊 Unirse a la celebración', 'next' => 'chapter4A'],
                ['text' => '🚪 Escapar antes de ser descubierto', 'next' => 'chapter4B'],
            ],
        ],
        'chapter4A' => [
            'title' => ' El caos o la redención',
            'text' => 'El Grinch es descubierto por los Quién. Si devuelve los regalos, lo reciben con sorpresa y amabilidad. Si huye, se siente más solo que nunca.',
            'image'=>'images/chapters/chapter4A.png',
            'options' => [
                ['text' => '🤝 Quedarse con los Quién', 'next' => 'chapter5A'],
                ['text' => '🏔️ Regresar a su cueva', 'next' => 'chapter5B'],
            ],
        ],
        'chapter4B' => [
             'title' => ' Un descubrimiento inesperado',
             'text' => 'El Grinch, oculto en las sombras, escucha una conversación entre Cindy Lou y el alcalde de la Villa Quién. Hablan sobre cómo la Navidad no se trata de regalos, sino de estar juntos y compartir amor. Sin embargo, Cindy menciona que alguien solitario, como el Grinch, también merece felicidad. Estas palabras despiertan una chispa en el corazón del Grinch.',
            'image' => 'images/cindy_talk.png',
            'options' => [
                ['text' => '🌟 Decidir acercarse a Cindy Lou para hablar con ella', 'next' => 'chapter6B'],
                ['text' => '👀 Permanecer escondido y seguir escuchando', 'next' => 'chapter5B'],
    ],
],
        'chapter5A' => [
            'title' => ' Transformación completa',
            'text' => 'El Grinch acepta la Navidad y aprende sobre la unión. Ahora sabe que no todo se trata de regalos.',
            'image'=>'images/grinch.png',
            'options' => [
                ['text' => '🎄 Celebrar la Navidad con los Quién', 'next' => 'chapter6A'],
            ],
        ],
        'chapter5B' => [
            'title' => ' Reflexión del Grinch',
            'text' => 'El Grinch regresa a su cueva, pero algo le sigue rondando en el corazón. Se da cuenta de que su soledad no lo hace feliz.',
            'image'=>'images/grinch.png',
            'options' => [
                ['text' => '❤️ Regresar a la Villa Quién para unirse a ellos', 'next' => 'chapter6A'],
                ['text' => '❌ Seguir aislado en su cueva', 'next' => 'chapter6B'],
            ],
        ],
        'chapter6A' => [
            'title' => ' La Navidad del Grinch',
            'text' => 'Si el Grinch se queda, se convierte en el héroe de la Navidad. Si sigue aislado, ve la Navidad desde lejos, arrepintiéndose de su decisión.',
            'image'=>'images/grinch.png',
            'options' => [
                ['text' => '🎉 Reconciliarse con los Quién', 'next' => 'chapter7A'],
            ],
        ],
        'chapter6B' => [
            'title' => 'Una nueva tradición',
            'text' => 'Si el Grinch acepta a Cindy, se convierte en parte de la tradición navideña. Si huye, descubre que su soledad no trae felicidad.',
            'image'=>'images/grinch.png',
            'options' => [
                ['text' => '🔄 Volver y cambiar las cosas', 'next' => 'chapter7A'],
                ['text' => '🚶 Alejarse para siempre, dejando su legado como el Grinch que casi salvó la Navidad.', 'next' => 'chapter7B'],      
            ],
        ],
        'chapter7A' => [
            'title' => ' El Grinch da un paso inesperado',
            'text' => 'El Grinch, motivado por un nuevo sentimiento, decide devolver un pequeño regalo a la villa como señal de paz. La reacción de los Quién lo deja sorprendido.',
            'image' => 'images/regalo_puerta.png',
            'options' => [
                ['text' => '🎁 Continuar devolviendo más regalos', 'next' => 'chapter8A'],
                ['text' => '👀 Observar la reacción de lejos', 'next' => 'chapter8B'],
            ],
        ],
        'chapter7B' => [
            'title' => ' Más frío que la nieve',
            'text' => 'El Grinch decide que la Navidad y la felicidad no son para él. Su corazón parece volverse aún más frío mientras observa cómo los Quién celebran de todos modos.',
            'image' => 'images/grinch_frio.png',
            'options' => [
                ['text' => '🔄 Reconsiderar sus acciones y descender a la villa', 'next' => 'chapter9A'],
                ['text' => '🏔️ Permanecer solo en la cueva', 'next' => 'chapter9B'],
            ],
        ],
        'chapter8A' => [
            'title' => ' La bondad inesperada',
            'text' => 'El Grinch comienza a devolver regalos en secreto. Poco a poco, los Quién notan los cambios y deciden invitarlo a una gran cena navideña.',
            'image' => 'images/chapters/chapter8A.png',
            'options' => [
                ['text' => '🎉 Aceptar la invitación', 'next' => 'chapter9A'],
                ['text' => '🚪 Rechazar y observar desde lejos', 'next' => 'chapter8B'],
            ],  
        ],
        'chapter8B' => [
            'title' => ' Observador en las sombras',
            'text' => 'El Grinch observa cómo los Quién encuentran el regalo y reaccionan con gratitud y alegría. Esto hace que empiece a replantearse su aislamiento.',
            'image' => 'images/chapters/chapter8B.png',
            'options' => [
                ['text' => '🌟 Acercarse para ser parte de la celebración', 'next' => 'chapter9A'],
                ['text' => '❄️ Regresar a la cueva', 'next' => 'chapter9B'],
            ],
        ],
        'chapter9A' => [
            'title' => ' El héroe inesperado',
            'text' => 'El Grinch es recibido como un invitado de honor en la villa. Su corazón crece tres tallas mientras descubre la verdadera magia de la Navidad.',
            'image' => 'images/chapters/chapter9A.png',
            'options' => [
                ['text' => '🎄 Disfrutar de la Navidad como nunca antes lo había hecho', 'next' => null],   
            ],
        ],
        'chapter9B' => [
            'title' => ' El observador solitario',
            'text' => 'El Grinch decide no unirse a la fiesta, pero ve desde lejos cómo la Navidad une a todos. Aunque sigue aislado, siente un poco de calidez.',
            'image' => 'images/observador.png',
            'options' => [
                ['text' => '🔄 Cambiar de opinión y bajar a la villa', 'next' => 'chapter9A'],
                ['text' => '🏔️ Permanecer en su cueva, reflexionando', 'next' => 'chapter9A'],
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
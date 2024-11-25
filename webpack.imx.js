const mix = require('laravel-mix');

mix
    .postCss('resources/css/app.css', 'public/css')  // Aquí le decimos a Laravel Mix que compile `resources/css/app.css` y lo ponga en `public/css`
    .js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css') // Aquí Mix trabaja con `resources`
    .sourceMaps();
    

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Character extends Model
{
    use HasFactory;

     //Define los campos que se pueden asignar masivamente.
     
    protected $fillable = ['name', 'description'];
    
     //Define la estructura de la tabla 'characters' en la base de datos.
     // Esta función debería estar en una migración y no en el modelo.
     
    public function up()
{
    Schema::create('characters', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->text('description');
        $table->timestamps();
    });
}
}

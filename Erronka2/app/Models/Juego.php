<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Juego extends Model
{
    public $timestamps = false;
    use HasFactory;

    protected $table="juegos";

    protected $primaryKey="id";

    protected $fillable = [
        'tiempo_parts',
        'score',
        'llave',
        'tutorial',
        'tiempo_min',
        'tiempo_sec',
        'id_usuario',
    ];
}

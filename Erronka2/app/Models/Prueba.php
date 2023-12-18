<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prueba extends Model
{
    public $timestamps = false;
    use HasFactory;
    
    protected $table="pruebas";

    protected $primaryKey="id";

    protected $fillable = [
        'tiempoPartida',
        'scorePartida',
        'id_juego',
        

    ];
}

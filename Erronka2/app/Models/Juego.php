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
        'tiempo',
        'score',
        'id_usuario',
    ];
}

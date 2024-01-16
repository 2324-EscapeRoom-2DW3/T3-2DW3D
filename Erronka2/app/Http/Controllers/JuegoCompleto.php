<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Http\Requests\StoreAlumno;
use App\Models\Alumno;
use App\Models\Curso;
use App\Models\Juego;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth; // Add this line

class JuegoCompleto extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
/*         $alumnos = Alumno::orderBy('nombre_apellido','asc')->paginate(10);
 */
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(/* Request $request */)
    {
        $juego_comp = Juego::create([
            'tiempo' => 0,
            'score' => 0,
            'id_usuario' =>  Auth::user()->id,
        ]);

        $juego_comp->save();

        return redirect()->route('juego1.index', ['id' => $juego_comp->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
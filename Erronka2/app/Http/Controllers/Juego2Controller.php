<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\StoreAlumno;
use App\Models\Alumno;
use App\Models\Curso;
use App\Models\Prueba;
use Illuminate\Support\Facades\Storage;

class Juego2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        return view('juegos/juego2.index', ['id' => $id]);

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
    public function store(Request $request)
    {

        $juego1 = Prueba::create($request->all());
        /*         dd($juego1);
 */
        $juego1->save();
        return redirect()->route('menu.index', ['id' => $juego1->id_juego]);
    }

    /**
     * Display the specified resource.
     */
    /*   public function show(string $id)
    {
        //
    } */

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

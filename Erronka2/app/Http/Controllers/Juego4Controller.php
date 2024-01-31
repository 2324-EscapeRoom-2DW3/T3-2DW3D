<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\StoreAlumno;
use App\Models\Alumno;
use App\Models\Curso;
use App\Models\Juego;
use App\Models\Prueba;
use Illuminate\Support\Facades\Storage;

class Juego4Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {

        return view('juegos/juego4.index', compact('id'));
/*         return view('juegos/juego4.show', ['id' => $id]); */

}



    public function show($id)
    {
        return view('juegos/juego4.show', compact('id'));
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

        $key = Juego::create($request->all());
        /*         dd($juego1);
 */
        $key->save();
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
        $juego = Juego::findOrFail($id);
        $juego->update(['llave' => '1']);
/*         return redirect()-> route('juego4.update', ['id' => $id]);
 */
    }

    public function tutorial(Request $request, string $id)
    {
        $juego = Juego::findOrFail($id);
        $juego->update(['tutorial' => '1']);
/*         return redirect()-> route('juego4.update', ['id' => $id]);
 */
    }
 public function tutorialvalue (string $id){
        $juego = Juego::findOrFail($id);
        $tutorial_valor = $juego->tutorial;

        return $tutorial_valor;
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

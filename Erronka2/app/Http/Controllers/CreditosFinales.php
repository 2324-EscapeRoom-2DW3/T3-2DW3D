<?php

namespace App\Http\Controllers;
use App\Models\Prueba;
use App\Models\Juego;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreditosFinales extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        return view('juegos/creditos.index', ['id' => $id]);
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
        //
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
        $totalTiempoPartida = Prueba::where('id_juego', $id)->sum('tiempoPartida');
        $totalScorePartida = Prueba::where('id_juego', $id)->sum('scorePartida');
    
        // Find the Juego with the given id
        $juego = Juego::find($id);
    
        // Update the tiempo and score fields of the Juego
        $juego->tiempo_parts = $totalTiempoPartida;
        $juego->score = $totalScorePartida;
    
        // Save the changes
        $juego->save();
        return redirect()-> route('welcome');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


}

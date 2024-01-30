<?php

namespace App\Http\Controllers;
use App\Models\Juego;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Juego5Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        return view('juegos/juego5.index', ['id' => $id]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function keyvalue (string $id){
        $juego = Juego::findOrFail($id);
        $llave_valor = $juego->llave;

        return $llave_valor;
    }
}

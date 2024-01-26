<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Juego;


class AdminController extends Controller
{
    public function obtenerDatosErab()
    {
        $datosErab = User::all();
        $datosPart = Juego::all();

        // dd($datos);


        return view('AdminPage', ['datosErab' => $datosErab, 'datosPart' => $datosPart]);
    }


}


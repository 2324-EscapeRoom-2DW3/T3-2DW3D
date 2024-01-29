<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Juego;
use Illuminate\Http\Request;
use Illuminate\View\View;


class AdminController extends Controller
{
    public function general()
    {

        return view('AdminPage');
    }

    public function obtenerDatosErab()
    {
        $datosErab = User::all();
        $datosPart = Juego::all();
        $datosErab = User::where('rol', 0)->paginate(5);

        // dd($datos);


        return view('ErabiltzailePage', ['datosErab' => $datosErab, 'datosPart' => $datosPart]);
    }

    public function obtenerDatosPart()
    {
        $datosErab = User::all();
        $datosPart = Juego::all();

        // dd($datos);


        return view('PartidakPage', ['datosErab' => $datosErab, 'datosPart' => $datosPart]);
    }

    public function destroy($id)
    {
        $erab = User::find($id);
        $erab->delete();
        return redirect()->route('adminpageErab');
    }

    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function editRol(Request $request, $id)
{
    $user = User::find($id);

    if (!$user) {
        // Handle the case when the user is not found
        return response()->json(['message' => 'User not found'], 404);
    }

    $user->rol = 1; // Update the "rol" field to 1
    $user->save();

    return redirect()->route('adminpageErab');
}


}


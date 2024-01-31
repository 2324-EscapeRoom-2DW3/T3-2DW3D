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


        return view('ErabiltzailePage', compact('datosErab', 'datosPart'));
    }

    public function obtenerDatosAdmin()
    {
        $datosAdmin = User::all();

        $datosAdmin = User::where('rol', 1)->paginate(5);

        // dd($datos);


        return view('AdminErab', compact('datosAdmin'));
    }

    public function obtenerDatosPart()
    {
        $datosErab = User::all();

        $datosPart = Juego::paginate(5);
        // dd($datosPart);



        return view('PartidakPage', compact('datosErab', 'datosPart'));
    }

    public function destroyErab($id)
    {
        $erab = User::find($id);
        $erab->delete();
        return redirect()->route('adminpageErab');
    }

    public function destroyPart($id)
    {
        $part = Juego::find($id);
        $part->delete();
        return redirect()->route('adminpagePart');
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

public function editRolAdmin(Request $request, $id)
{
    $user = User::find($id);


    $user->rol = 0; // Update the "rol" field to 1
    $user->save();

    return redirect()->route('adminpageAdmin');
}


}


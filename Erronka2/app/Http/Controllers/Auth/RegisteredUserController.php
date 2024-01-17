<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'imagen' => ['required'],


            
        ]);

        // $file = $request->file('imagen');
        // $file->move(base_path('\storage\app\public\images'), $file->getClientOriginalName());
        // $nombre = $request->name;
        // $file_name = $_FILES['imagen']['name'];
        // $file_path = $_FILES['imagen']['tmp_name'];
        // $target_dir = base_path('\storage\app\public\images');
        // $target_file = $target_dir . basename($file_name);

        // move_uploaded_file($file_path, $target_file);

        // Obtener el nombre del archivo subido
$file_name = $_FILES['imagen']['name'];

// Obtener el nombre del usuario (reemplaza 'nombre_de_usuario' con la lógica real para obtener el nombre del usuario)
$user_name = $request->name;

// Obtener la extensión del archivo
$file_extension = pathinfo($file_name, PATHINFO_EXTENSION);

// Crear un nuevo nombre para el archivo basado en el nombre del usuario
$new_file_name = $user_name . '.' . $file_extension;

// Ruta del directorio donde deseas guardar el archivo
$upload_directory = base_path('\storage\app\public\images');

// Ruta completa del nuevo archivo
$new_file_path = $upload_directory . $new_file_name;
//mover
move_uploaded_file($_FILES['imagen']['tmp_name'], $new_file_path);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rol' => '0',
            'imagen' => $new_file_name,


            
        ]);

        event(new Registered($user));

        Auth::login($user);

        // $inf = 1;

         return redirect(RouteServiceProvider::HOME);

        // return redirect("welcome", compact("inf"));
    }
}

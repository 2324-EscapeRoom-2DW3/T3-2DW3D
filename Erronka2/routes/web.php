<?php

use App\Http\Controllers\Juego1Controller;
use App\Http\Controllers\JuegoCompleto;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');;

// Route::get('/',['welcome'])->name('welcome');


Route::get("/froga", function () {
    return view('froga');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
/* Route::resource('juegos/juego1', Juego1Controller::class);
 */
Route::get('juegocompleto/store', [JuegoCompleto::class, 'store']) -> name('juegocompleto.store');
Route::get('juegos/juego1/{id}', [Juego1Controller::class, 'index'])->name('juego1.index');
Route::post('juegos/juego1/store', [Juego1Controller::class, 'store']) -> name('juego1.store');
Route::get('/guri', function () {
    return view('guri');
})->name('guri');

Route::get('juegos/menu', function () {
    return view('juegos/menu/menujuego');
})->name('menujuego');

Route::get('juegos/juego2', function () {
    return view('juegos/juego2/index');
})->name('juego2');

Route::get('juegos/juego2', function () {
    return view('juegos/juego3/index');
})->name('juego3');


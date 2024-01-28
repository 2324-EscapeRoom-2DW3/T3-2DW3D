<?php

use App\Http\Controllers\Juego1Controller;
use App\Http\Controllers\Juego4Controller;
use App\Http\Controllers\JuegoCompleto;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Juego5Controller;
use App\Http\Controllers\MenuController;

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
Route::put('juegocompleto/tiempo/{id}', [JuegoCompleto::class, 'tiempo']) -> name('juegocompleto.tiempo');
Route::get('juegocompleto/tiempo_val/{id}', [JuegoCompleto::class, 'tiempo_val']) -> name('juegocompleto.tiempo_val');


Route::get('juegos/juego1/{id}', [Juego1Controller::class, 'index'])->name('juego1.index');
Route::post('juegos/juego1/store', [Juego1Controller::class, 'store']) -> name('juego1.store');


Route::get('/guri', function () {
    return view('guri');
})->name('guri');

Route::get('juegos/menu/{id}', [MenuController::class, 'index'])->name('menu.index')->middleware('checkgame');


Route::get('juegos/juego2', function () {
    return view('juegos/juego2/index');
})->name('juego2');

Route::get('juegos/juego3', function () {
    return view('juegos/juego3/index');
})->name('juego3');

Route::get('juegos/juego4/{id}', [Juego4Controller::class, 'index'])->name('juego4.index')->middleware('checkgame');
Route::get('juegos/juego4/show/{id}', [Juego4Controller::class, 'show'])->name('juego4.show')->middleware('checkgame');
Route::put('juegos/juego4/update/{id}', [Juego4Controller::class, 'update'])->name('juego4.update')->middleware('checkgame');
Route::get('juegos/juego4/tutorialvalue/{id}', [Juego4Controller::class, 'tutorialvalue'])->name('juego4.tutorialvalue')->middleware('checkgame');
Route::put('juegos/juego4/tutorial/{id}', [Juego4Controller::class, 'tutorial'])->name('juego4.tutorial')->middleware('checkgame');


Route::get('juegos/juego5/{id}', [Juego5Controller::class, 'index'])->name('juego5.index')->middleware('checkgame');
Route::get('juegos/juego5/llave/{id}', [Juego5Controller::class, 'keyvalue'])->name('juego5.keyvalue')->middleware('checkgame');


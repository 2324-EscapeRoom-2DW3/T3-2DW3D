<?php

use App\Http\Controllers\BossController;
use App\Http\Controllers\Juego1Controller;
use App\Http\Controllers\Juego2Controller;
use App\Http\Controllers\Juego4Controller;
use App\Http\Controllers\JuegoCompleto;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Juego5Controller;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CreditosFinales;

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

require __DIR__ . '/auth.php';
/* Route::resource('juegos/juego1', Juego1Controller::class);
 */
Route::get('juegocompleto/store', [JuegoCompleto::class, 'store'])->name('juegocompleto.store');
Route::put('juegocompleto/tiempo/{id}', [JuegoCompleto::class, 'tiempo']) -> name('juegocompleto.tiempo');
Route::get('juegocompleto/tiempo_val/{id}', [JuegoCompleto::class, 'tiempo_val']) -> name('juegocompleto.tiempo_val');


Route::get('juegos/juego1/{id}', [Juego1Controller::class, 'index'])->name('juego1.index');
Route::post('juegos/juego1/store', [Juego1Controller::class, 'store']) -> name('juego1.store');
Route::get('/guri', function () {
    return view('guri');
})->name('guri');

Route::get('juegos/menu/{id}', [MenuController::class, 'index'])->name('menu.index')->middleware('checkgame');


/* Route::get('juegos/juego2', function () {
    return view('juegos/juego2/index');
})->name('juego2');
 */
Route::get('juegos/juego2/{id}', [Juego2Controller::class, 'index'])->name('juego2.index');


// Route::get('adminpage', function () {
//     return view('/AdminPage');
// })->name('adminpage');

Route::get('/adminpage', [AdminController::class, 'general'])->name('adminpage');
// Route::get('/adminpage', [AdminController::class, 'obtenerDatosPart'])->name('adminpage');

Route::get('/adminpage/erabiltzaileak', [AdminController::class, 'obtenerDatosErab'])->name('adminpageErab');
Route::get('/adminpage/partidak', [AdminController::class, 'obtenerDatosPart'])->name('adminpagePart');
Route::delete('/adminpage/erabiltzaileak/{id}', [AdminController::class, 'destroyErab'])->name('adminpageErab.destroy');
Route::get('/adminpage/partidak/{id}/edit', [AdminController::class, 'editDatosPart'])->name('adminpagePart.edit');
Route::patch('/adminpage/erabiltzaileak/{id}/edit-rol', [AdminController::class, 'editRol'])->name('adminpageErab.updateRole');
Route::delete('/adminpage/partidak/{id}', [AdminController::class, 'destroyPart'])->name('adminpagePart.destroy');
Route::get('/adminpage/administrazioa', [AdminController::class, 'obtenerDatosAdmin'])->name('adminpageAdmin');
Route::delete('/adminpage/administrazioa/{id}', [AdminController::class, 'destroyAdmin'])->name('adminpageAdmin.destroy');
Route::patch('/adminpage/administrazioa/{id}/edit-rol', [AdminController::class, 'editRolAdmin'])->name('adminpageAdmin.updateRole');






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

Route::get('juegos/boss/{id}', [BossController::class, 'index'])->name('boss.index')->middleware('checkgame');

Route::get('juegos/creditos/{id}', [CreditosFinales::class, 'index'])->name('creditos.index')->middleware('checkgame');
Route::get('juegos/creditos/update/{id}', [CreditosFinales::class, 'update'])->name('creditos.update')->middleware('checkgame');
Route::get('/perfilIndex', [ProfileController::class, 'index'])->name('profile.index');

Route::delete('/borrar-juego/{id}', [PerfilController::class, 'destroy'])->name('juego.borrar');



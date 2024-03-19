<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DenunciaController;
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
//Ruteo para acceder a la vista Welcome
Route::get('/', function () {
    return view('welcome');
});
//Rotueo para acceder a Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
//RUTEO PARA usuarios autenticados
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//RUTEO PARA FILTRAR POR ESTADO
Route::get('/denuncias/filtrar', [DenunciaController::class, 'stateFilter']);

//RUTEO para cualquier recurso de Denuncias
Route::resource("denuncias",DenunciaController::class);
//Ruteo para ver denuncias propias
Route::get('/OwnComplains', [DenunciaController::class, 'ownComplains'])->name('denuncias.ownComplains');

//Ruteo para usuarios con roles admin
Route::group(['middleware' => 'admin'],function(){
    //Ruteo para ver todos los usuarios
    Route::get('/userIndex', [UserController::class, 'index'])->name('user.index');
    //Ruteo para acceder a cualquier recurso del CRUD users
    Route::resource('users',UserController::class);
});

require __DIR__.'/auth.php';

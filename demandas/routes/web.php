<?php

use App\Http\Controllers\DenunciaController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FormularioController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\showDashboardController;
use App\Http\Controllers\UsuarioController;
use App\Models\Denuncia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Middleware\SetLocaleMiddleware;

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
//Ruteo para ver la vista welcome
Route::get('/', function () {
    return view('welcome');
});
//Ruteo para ver la vista dashboard
Route::get('/dashboard', function () {
    $userId = auth()->user()->expedient;
    $denuncia = Denuncia::where('id', $userId)->first();
    return view('dashboard', ['denuncia' => $denuncia]);
})->middleware(['auth', 'verified'])->name('dashboard');
//Ruteos para usuarios autenticados
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//RUTEO para actualizar locales
Route::get('locale/{locale}', [LocaleController::class, 'setLocale'])->name('setLocale');
//Ruteos para crear denuncia
Route::get('/formulario/pagina1', [FormularioController::class, 'showFirstPage'])->name('denuncia.form');
Route::post('/formulario/pagina1', [FormularioController::class, 'procesFirstPage']);

Route::get('/formulario/pagina2', [FormularioController::class, 'showSecondPage'])->name('denuncia.confirm');
Route::post('/formulario/pagina2', [FormularioController::class, 'procesSecondPage']);

Route::get('/formulario/pagina3', [UsuarioController::class, 'mostrarFormulario'])->name('denuncia.passwordCreate');
Route::post('/formulario/pagina3', [UsuarioController::class, 'createUser'])->name('usuarios.store');
Route::get('/denuncia/{id}/edit', [DenunciaController::class, 'edit'])->name('denuncia.edit');
Route::patch('/denuncias/{id}', [DenunciaController::class, 'update'])->name('denuncias.update');


//Ruteo para pasar la tabla a PDF
Route::get('/export-to-pdf', [PdfController::class, 'exportToPdf']);

//Ruteo TEST pasar datos a otra base de datos
Route::get('/denuncias', function () {
    Denuncia::getAll();
});


//RUTEO API
Route::resource('denunciaApi', ApiController::class);

require __DIR__ . '/auth.php';

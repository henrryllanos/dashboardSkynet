<?php

use App\Http\Controllers\AmbienteController;
use App\Http\Controllers\SolicitudController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::post('/register', [App\Http\Controllers\RegisterController::class, 'store'])
->name('register.store');

Route::get('/register', [App\Http\Controllers\RegisterController::class, 'create'])
->middleware('guest')
->name('register.index');

Route::post('/registerAdmin', [App\Http\Controllers\RegisterAdminController::class, 'store'])
->name('admin.registerAdminStore');

Route::get('/registerAdmin', [App\Http\Controllers\RegisterAdminController::class, 'create'])
->middleware('guest')
->name('admin.registerAdmin');

//Ruta del login
Route::get('/login', [App\Http\Controllers\SessionsController::class, 'create'])
->middleware('guest')
->name('login.index');

Route::post('/login', [App\Http\Controllers\SessionsController::class, 'store'])
->name('login.store');

Route::get('/logout', [App\Http\Controllers\SessionsController::class, 'destroy'])
->middleware('auth')
->name('login.destroy');


Route::get('/auth', function () {
    return view('index');
})->middleware('auth.user')
->name('auth.user');

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])
->middleware('auth.admin')
->name('admin.index');

Route::get('/docente', [App\Http\Controllers\UserController::class, 'index'])
->middleware('auth.user')
->name('user.index');

Route::get('/auth', function () {
    return view('index');
})->middleware('auth.user')
->name('auth.user');

//Rutas de los ambientes
Route::get('/ambientes/index', [App\Http\Controllers\AmbienteController::class, 'index'])
    ->name('admin.ambientes.index');

Route::post('/ambientes/store', [App\Http\Controllers\AmbienteController::class, 'store'])
    ->name('admin.ambientes.store');

Route::get('/ambientes/create', [App\Http\Controllers\AmbienteController::class, 'create'])
    ->name('admin.ambientes.create');

Route::delete('/ambientes/{ambienteId}/delete', [App\Http\Controllers\AmbienteController::class, 'delete'])
    ->name('admin.ambientes.delete');


Route::post('/ambientes/{ambienteId}/update', [App\Http\Controllers\AmbienteController::class, 'update'])
    ->name('admin.ambientes.update');

// Route::get('/grupos', [App\Http\Controllers\SolicitudController::class, 'getGrupos']);

//Delete para aulas reservadas
Route::delete('/ambientesR/{ambienteId}/deleteReservadas', [App\Http\Controllers\AmbienteController::class, 'deleteReservadas'])
->name('admin.ambienteR.delete');

//Rutas de las ubicaciones


//Rutas de las Solicitude de Reserva
Route::get('/solicitudesR/index', [App\Http\Controllers\SolicitudController::class, 'index'])
    ->name('admin.solicitudesR.index');

Route::get('/solicitudesR/create', [App\Http\Controllers\SolicitudController::class, 'create'])
    ->name('admin.solicitudesR.create');


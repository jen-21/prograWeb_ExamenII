
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InsumoController;
use App\Http\Controllers\ProveedorController;

// Rutas de prueba
Route::get('/hola', function () {
    return 'Hola, bienvenido a Laravel';
});

Route::get('/hola1', function () {
    return view('hola', [
        'empresa' => 'Ferretería La Bendición'
    ]);
});

// Rutas públicas: inicio de sesión
Route::get('/', [AuthController::class, 'login'])->name('login');

Route::post('/login', [AuthController::class, 'authenticate'])
    ->name('login.authenticate');

// Rutas protegidas: requieren autenticación
Route::middleware('auth')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

});
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::resource('insumos', InsumoController::class);
    Route::resource('proveedores', ProveedorController::class)
    ->parameters(['proveedores' => 'proveedor']);

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

});

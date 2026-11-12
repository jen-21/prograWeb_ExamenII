<?php

use Illuminate\Support\Facades\Route;


Route::get('/hola', function () {
    return 'Hola, bienvenido a Laravel';
});

Route::get('/hola1', function () {
    return view('hola', [
        'empresa' => 'Ferretería La Bendición'
    ]);
});

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
     /**
     * Mostrar el panel principal del sistema.
     */
    public function index()
    {
        return view('dashboard');
    }
}

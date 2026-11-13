<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Insumo;
use App\Models\Proveedor;
use App\Models\Empleado;


class DashboardController extends Controller
{
    /**
     * Mostrar el panel principal del sistema.
     */
    public function index()
{
    $totalInsumos = Insumo::count();
    $totalProveedores = Proveedor::count();
    $totalEmpleados = Empleado::count();

    $usuario = auth()->user();

    return view('dashboard', compact(
        'totalInsumos',
        'totalProveedores',
        'totalEmpleados',
        'usuario'
    ));
}
}

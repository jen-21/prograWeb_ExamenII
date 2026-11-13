<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;

class EmpleadoController extends Controller
{
    // Mostrar todos los empleados
    public function index()
    {
        $empleados = Empleado::orderBy('created_at', 'desc')->get();

        return view('empleados.index', compact('empleados'));
    }

    // Mostrar formulario de registro
    public function create()
    {
        return view('empleados.create');
    }

    // Guardar empleado
    public function store(Request $request)
    {
        $datos = $request->validate([
            'identidad' => 'required|string|size:13|unique:empleados,identidad',
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'correo' => 'nullable|email|max:255',
            'cargo' => 'required|in:Ingeniero Agronomo,Asesor Tecnico de Campo,Jefe de Bodega Central,Operador de Maquinaria,Cajero',
            'salario' => 'required|numeric|min:0',
            'fecha_ingreso' => 'required|date',
            'estado' => 'required|in:Activo,Inactivo',
        ]);

        Empleado::create($datos);

        return redirect()->route('empleados.index')
            ->with('success', 'Empleado registrado correctamente.');
    }

    // Mostrar detalles del empleado
    public function show(Empleado $empleado)
    {
        return view('empleados.show', compact('empleado'));
    }

    // Mostrar formulario de edición
    public function edit(Empleado $empleado)
    {
        return view('empleados.edit', compact('empleado'));
    }

    // Actualizar empleado
    public function update(Request $request, Empleado $empleado)
    {
        $datos = $request->validate([
            'identidad' => 'required|string|size:13|unique:empleados,identidad,' . $empleado->id,
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'correo' => 'nullable|email|max:255',
            'cargo' => 'required|in:Ingeniero Agronomo,Asesor Tecnico de Campo,Jefe de Bodega Central,Operador de Maquinaria,Cajero',
            'salario' => 'required|numeric|min:0',
            'fecha_ingreso' => 'required|date',
            'estado' => 'required|in:Activo,Inactivo',
        ]);

        $empleado->update($datos);

        return redirect()->route('empleados.index')
            ->with('success', 'Empleado actualizado correctamente.');
    }

    // Eliminar empleado
    public function destroy(Empleado $empleado)
    {
        $empleado->delete();

        return redirect()->route('empleados.index')
            ->with('success', 'Empleado eliminado correctamente.');
    }
}

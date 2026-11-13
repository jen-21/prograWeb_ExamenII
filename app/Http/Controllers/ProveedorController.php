<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;

class ProveedorController extends Controller
{
     public function index()
    {
        $proveedores = Proveedor::orderBy('created_at', 'desc')->get();

        return view('proveedores.index', compact('proveedores'));
    }
    public function create()
    {
        return view('proveedores.create');
    }

     // Guardar un nuevo proveedor
    public function store(Request $request)
    {
        $datos = $request->validate([
            'rtn' => 'required|string|max:14|unique:proveedores,rtn',
            'empresa' => 'required|string|max:255',
            'contacto' => 'required|string|max:255',
            'telefono' => 'required|string|size:8',
            'categoria' => 'required|in:Quimicos,Semilleros,Maquinaria',
            'limite_credito' => 'required|numeric|min:0',
            'dias_credito' => 'required|in:15,30,45,60',
            'estado' => 'required|in:Activo,Inactivo',
            'fecha_registro' => 'required|date',
        ]);

        Proveedor::create($datos);

        return redirect()->route('proveedores.index')
            ->with('success', 'Proveedor registrado correctamente.');
    }

    // Mostrar detalles de un proveedor
    public function show(Proveedor $proveedor)
    {
        return view('proveedores.show', compact('proveedor'));
    }

    // Mostrar formulario de edición
    public function edit(Proveedor $proveedor)
    {
        return view('proveedores.edit', compact('proveedor'));
    }

    // Actualizar proveedor
    public function update(Request $request, Proveedor $proveedor)
    {
        $datos = $request->validate([
            'rtn' => 'required|string|max:14|unique:proveedores,rtn,' . $proveedor->id,
            'empresa' => 'required|string|max:255',
            'contacto' => 'required|string|max:255',
            'telefono' => 'required|string|size:8',
            'categoria' => 'required|in:Quimicos,Semilleros,Maquinaria',
            'limite_credito' => 'required|numeric|min:0',
            'dias_credito' => 'required|in:15,30,45,60',
            'estado' => 'required|in:Activo,Inactivo',
            'fecha_registro' => 'required|date',
        ]);

        $proveedor->update($datos);

        return redirect()->route('proveedores.index')
            ->with('success', 'Proveedor actualizado correctamente.');
    }

    // Eliminar proveedor
    public function destroy(Proveedor $proveedor)
    {
        $proveedor->delete();

        return redirect()->route('proveedores.index')
            ->with('success', 'Proveedor eliminado correctamente.');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Insumo;

class InsumoController extends Controller
{
     /**
     * Mostrar el listado de insumos.
     */
    public function index()
    {
        $insumos = Insumo::orderBy('created_at', 'desc')->get();

        return view('insumos.index', compact('insumos'));
    }
    /**
     * Mostrar el formulario para registrar un insumo.
     */
    public function create()
    {
        return view('insumos.create');
    }


    /**
     * Guardar un nuevo insumo.
     */
    public function store(Request $request)
    {
        $datos = $request->validate([
            'codigo' => 'required|string|max:255|unique:insumos,codigo',
            'nombre' => 'required|string|max:255',
            'categoria' => 'required',
            'precio' => 'required|numeric|min:0',
            'costo' => 'required|numeric|min:0',
            'inventario' => 'required|integer|min:0',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'fabricante' => 'required|string|max:255',
            'fecha_vencimiento' => 'nullable|date',
            'numero_lote' => 'required|string|max:255',
            'fecha_registro' => 'required|date',
        ]);

        if ($request->hasFile('imagen')) {
            $datos['imagen'] = $request->file('imagen')
                ->store('insumos', 'public');
        }

        Insumo::create($datos);

        return redirect()
            ->route('insumos.index')
            ->with('success', 'Insumo registrado correctamente.');
    }


    /**
     * Mostrar los detalles de un insumo.
     */
    public function show(Insumo $insumo)
    {
        return view('insumos.show', compact('insumo'));
    }

    /**
     * Mostrar el formulario para editar un insumo.
     */
    public function edit(Insumo $insumo)
    {
        return view('insumos.edit', compact('insumo'));
    }

    /**
     * Actualizar un insumo existente.
     */
    public function update(Request $request, Insumo $insumo)
    {
        $datos = $request->validate([
            'codigo' => 'required|string|max:255|unique:insumos,codigo,' . $insumo->id,
            'nombre' => 'required|string|max:255',
            'categoria' => 'required',
            'precio' => 'required|numeric|min:0',
            'costo' => 'required|numeric|min:0',
            'inventario' => 'required|integer|min:0',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'fabricante' => 'required|string|max:255',
            'fecha_vencimiento' => 'nullable|date',
            'numero_lote' => 'required|string|max:255',
            'fecha_registro' => 'required|date',
        ]);

        if ($request->hasFile('imagen')) {
            $datos['imagen'] = $request->file('imagen')
                ->store('insumos', 'public');
        }

        $insumo->update($datos);

        return redirect()
            ->route('insumos.index')
            ->with('success', 'Insumo actualizado correctamente.');
    }

    /**
     * Eliminar un insumo.
     */
    public function destroy(Insumo $insumo)
    {
        $insumo->delete();

        return redirect()
            ->route('insumos.index')
            ->with('success', 'Insumo eliminado correctamente.');
    }



}


@extends('layouts.admin')

@section('titulo', 'Detalle del insumo')

@section('contenido')
<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-1">Detalle del insumo</h1>
            <p class="text-muted mb-0">Información completa del producto registrado.</p>
        </div>

        <a href="{{ route('insumos.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Volver
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-header">
            <strong>Información general</strong>
        </div>

        <div class="card-body">
            <div class="row">

                <div class="col-md-4 mb-3">
                    @if($insumo->imagen)
                        <img src="{{ asset('storage/' . $insumo->imagen) }}"
                             alt="Imagen del insumo"
                             class="img-fluid rounded"
                             style="max-height: 250px;">
                    @else
                        <div class="bg-light rounded p-5 text-center text-muted">
                            <i class="bi bi-image fs-1"></i>
                            <p class="mb-0">Sin imagen</p>
                        </div>
                    @endif
                </div>

                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <strong>Código:</strong>
                            <p>{{ $insumo->codigo }}</p>
                        </div>

                        <div class="col-md-6 mb-3">
                            <strong>Nombre:</strong>
                            <p>{{ $insumo->nombre }}</p>
                        </div>

                        <div class="col-md-6 mb-3">
                            <strong>Categoría:</strong>
                            <p>{{ $insumo->categoria }}</p>
                        </div>

                        <div class="col-md-6 mb-3">
                            <strong>Fabricante:</strong>
                            <p>{{ $insumo->fabricante }}</p>
                        </div>

                        <div class="col-md-6 mb-3">
                            <strong>Precio:</strong>
                            <p>L. {{ number_format($insumo->precio, 2) }}</p>
                        </div>

                        <div class="col-md-6 mb-3">
                            <strong>Costo:</strong>
                            <p>L. {{ number_format($insumo->costo, 2) }}</p>
                        </div>

                        <div class="col-md-6 mb-3">
                            <strong>Inventario:</strong>
                            <p>{{ $insumo->inventario }}</p>
                        </div>

                        <div class="col-md-6 mb-3">
                            <strong>Número de lote:</strong>
                            <p>{{ $insumo->numero_lote }}</p>
                        </div>

                        <div class="col-md-6 mb-3">
                            <strong>Fecha de vencimiento:</strong>
                            <p>{{ $insumo->fecha_vencimiento ?? 'No especificada' }}</p>
                        </div>

                        <div class="col-md-6 mb-3">
                            <strong>Fecha de registro:</strong>
                            <p>{{ $insumo->fecha_registro }}</p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="mt-3">
                <a href="{{ route('insumos.edit', $insumo) }}" class="btn btn-success">
                    <i class="bi bi-pencil"></i> Editar insumo
                </a>
            </div>
        </div>
    </div>

</div>
@endsection

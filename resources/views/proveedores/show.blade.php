
@extends('layouts.admin')

@section('titulo', 'Detalle del proveedor')

@section('contenido')
<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3">Detalle del proveedor</h1>
            <p class="text-muted mb-0">Información completa del fabricante o proveedor.</p>
        </div>

        <a href="{{ route('proveedores.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Volver
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-header">
            <strong>Información general</strong>
        </div>

        <div class="card-body">
            <div class="row">

                <div class="col-md-6 mb-3">
                    <strong>RTN:</strong>
                    <p>{{ $proveedor->rtn }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Empresa:</strong>
                    <p>{{ $proveedor->empresa }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Contacto:</strong>
                    <p>{{ $proveedor->contacto }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Teléfono:</strong>
                    <p>{{ $proveedor->telefono }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Categoría:</strong>
                    <p>{{ $proveedor->categoria }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Límite de crédito:</strong>
                    <p>L. {{ number_format($proveedor->limite_credito, 2) }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Días de crédito:</strong>
                    <p>{{ $proveedor->dias_credito }} días</p>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Estado:</strong>
                    <p>
                        <span class="badge {{ $proveedor->estado == 'Activo' ? 'bg-success' : 'bg-secondary' }}">
                            {{ $proveedor->estado }}
                        </span>
                    </p>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Fecha de registro:</strong>
                    <p>{{ $proveedor->fecha_registro }}</p>
                </div>

            </div>

            <a href="{{ route('proveedores.edit', ['proveedor' => $proveedor->id]) }}"
                 class="btn btn-success">
                <i class="bi bi-pencil"></i> Editar proveedor
            </a>
        </div>
    </div>
</div>
@endsection

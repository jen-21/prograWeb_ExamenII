
@extends('layouts.admin')

@section('titulo', 'Detalles del Empleado')

@section('contenido')

<div class="container-fluid px-4">

    <h1 class="mt-4">Detalles del empleado</h1>
    <p class="text-muted">Información del personal registrado.</p>

    <div class="card mb-4">
        <div class="card-header">
            <i class="bi bi-person-vcard me-1"></i>
            Información del empleado
        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-6 mb-3">
                    <strong>Identidad / DNI</strong>
                    <p>{{ $empleado->identidad }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Nombre completo</strong>
                    <p>{{ $empleado->nombre }} {{ $empleado->apellido }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Correo electrónico</strong>
                    <p>{{ $empleado->correo ?? 'No registrado' }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Cargo</strong>
                    <p>{{ $empleado->cargo }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Salario</strong>
                    <p>L. {{ number_format($empleado->salario, 2) }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Fecha de ingreso</strong>
                    <p>{{ $empleado->fecha_ingreso }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Estado</strong>
                    <p>
                        @if($empleado->estado == 'Activo')
                            <span class="badge bg-success">Activo</span>
                        @else
                            <span class="badge bg-danger">Inactivo</span>
                        @endif
                    </p>
                </div>

            </div>

            <a href="{{ route('empleados.edit', $empleado->id) }}" class="btn btn-success">
                <i class="bi bi-pencil"></i> Editar empleado
            </a>

            <a href="{{ route('empleados.index') }}" class="btn btn-secondary">
                Volver al listado
            </a>

        </div>
    </div>
</div>

@endsection


@extends('layouts.admin')

@section('titulo', 'Editar Empleado')

@section('contenido')

<div class="container-fluid px-4">

    <h1 class="mt-4">Editar empleado</h1>
    <p class="text-muted">Modifica la información del empleado.</p>

    <div class="card mb-4">
        <div class="card-header">
            <i class="bi bi-pencil me-1"></i> Actualizar información
        </div>

        <div class="card-body">

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('empleados.update', $empleado->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Identidad / DNI</label>
                        <input type="text" name="identidad" class="form-control"
                               value="{{ old('identidad', $empleado->identidad) }}"
                               maxlength="13" minlength="13" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" name="nombre" class="form-control"
                               value="{{ old('nombre', $empleado->nombre) }}" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Apellido</label>
                        <input type="text" name="apellido" class="form-control"
                               value="{{ old('apellido', $empleado->apellido) }}" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Correo electrónico</label>
                        <input type="email" name="correo" class="form-control"
                               value="{{ old('correo', $empleado->correo) }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Cargo</label>
                        <select name="cargo" class="form-select" required>
                            @foreach([
                                'Ingeniero Agronomo',
                                'Asesor Tecnico de Campo',
                                'Jefe de Bodega Central',
                                'Operador de Maquinaria',
                                'Cajero'
                            ] as $cargo)
                                <option value="{{ $cargo }}"
                                    {{ old('cargo', $empleado->cargo) == $cargo ? 'selected' : '' }}>
                                    {{ $cargo }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Salario (L.)</label>
                        <input type="number" name="salario" class="form-control"
                               value="{{ old('salario', $empleado->salario) }}"
                               min="0" step="0.01" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Fecha de ingreso</label>
                        <input type="date" name="fecha_ingreso" class="form-control"
                               value="{{ old('fecha_ingreso', $empleado->fecha_ingreso) }}" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Estado</label>
                        <select name="estado" class="form-select" required>
                            <option value="Activo" {{ old('estado', $empleado->estado) == 'Activo' ? 'selected' : '' }}>Activo</option>
                            <option value="Inactivo" {{ old('estado', $empleado->estado) == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                        </select>
                    </div>

                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-save"></i> Actualizar empleado
                    </button>

                    <a href="{{ route('empleados.index') }}" class="btn btn-secondary">
                        Cancelar
                    </a>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection

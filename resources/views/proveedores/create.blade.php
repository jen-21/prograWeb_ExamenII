
@extends('layouts.admin')

@section('titulo', 'Registrar proveedor')

@section('contenido')
<div class="container-fluid">

    <div class="mb-4">
        <h1 class="h3">Registrar proveedor</h1>
        <p class="text-muted">Ingresa la información del fabricante o proveedor.</p>
    </div>

    <div class="card shadow-sm">
        <div class="card-header">
            <strong>Información del proveedor</strong>
        </div>

        <div class="card-body">
            <form action="{{ route('proveedores.store') }}" method="POST">
                @csrf

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label">RTN</label>
                        <input type="text" name="rtn" class="form-control"
                               value="{{ old('rtn') }}" maxlength="14" required>
                        @error('rtn') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Empresa</label>
                        <input type="text" name="empresa" class="form-control"
                               value="{{ old('empresa') }}" required>
                        @error('empresa') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Contacto</label>
                        <input type="text" name="contacto" class="form-control"
                               value="{{ old('contacto') }}" required>
                        @error('contacto') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Teléfono</label>
                        <input type="text" name="telefono" class="form-control"
                               value="{{ old('telefono') }}" maxlength="8" minlength="8" required>
                        @error('telefono') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Categoría</label>
                        <select name="categoria" class="form-select" required>
                            <option value="">Seleccione una categoría</option>
                            <option value="Quimicos" {{ old('categoria') == 'Quimicos' ? 'selected' : '' }}>Químicos</option>
                            <option value="Semilleros" {{ old('categoria') == 'Semilleros' ? 'selected' : '' }}>Semilleros</option>
                            <option value="Maquinaria" {{ old('categoria') == 'Maquinaria' ? 'selected' : '' }}>Maquinaria</option>
                        </select>
                        @error('categoria') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Límite de crédito (L.)</label>
                        <input type="number" name="limite_credito" class="form-control"
                               value="{{ old('limite_credito') }}" min="0" step="0.01" required>
                        @error('limite_credito') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Días de crédito</label>
                        <select name="dias_credito" class="form-select" required>
                            <option value="">Seleccione los días</option>
                            @foreach([15, 30, 45, 60] as $dias)
                                <option value="{{ $dias }}" {{ old('dias_credito') == $dias ? 'selected' : '' }}>
                                    {{ $dias }} días
                                </option>
                            @endforeach
                        </select>
                        @error('dias_credito') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Estado</label>
                        <select name="estado" class="form-select" required>
                            <option value="Activo" {{ old('estado', 'Activo') == 'Activo' ? 'selected' : '' }}>Activo</option>
                            <option value="Inactivo" {{ old('estado') == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                        </select>
                        @error('estado') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Fecha de registro</label>
                        <input type="date" name="fecha_registro" class="form-control"
                               value="{{ old('fecha_registro', date('Y-m-d')) }}" required>
                        @error('fecha_registro') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                </div>

                <div class="d-flex gap-2 mt-3">
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-save"></i> Guardar proveedor
                    </button>

                    <a href="{{ route('proveedores.index') }}" class="btn btn-secondary">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


@extends('layouts.admin')

@section('titulo', 'Editar proveedor')

@section('contenido')
<div class="container-fluid">

    <div class="mb-4">
        <h1 class="h3">Editar proveedor</h1>
        <p class="text-muted">
            Modifica la información del proveedor seleccionado.
        </p>
    </div>

    <div class="card shadow-sm">
        <div class="card-header">
            <strong>Información del proveedor</strong>
        </div>

        <div class="card-body">

            {{-- Formulario de actualización --}}
            <form action="{{ url('/proveedores/' . $proveedor->id) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="row">

                    {{-- RTN --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">RTN</label>

                        <input
                            type="text"
                            name="rtn"
                            class="form-control"
                            value="{{ old('rtn', $proveedor->rtn) }}"
                            maxlength="14"
                            required
                        >

                        @error('rtn')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Empresa --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Empresa</label>

                        <input
                            type="text"
                            name="empresa"
                            class="form-control"
                            value="{{ old('empresa', $proveedor->empresa) }}"
                            required
                        >

                        @error('empresa')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Contacto --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Contacto</label>

                        <input
                            type="text"
                            name="contacto"
                            class="form-control"
                            value="{{ old('contacto', $proveedor->contacto) }}"
                            required
                        >

                        @error('contacto')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Teléfono --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Teléfono</label>

                        <input
                            type="text"
                            name="telefono"
                            class="form-control"
                            value="{{ old('telefono', $proveedor->telefono) }}"
                            maxlength="8"
                            minlength="8"
                            required
                        >

                        @error('telefono')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Categoría --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Categoría</label>

                        <select name="categoria" class="form-select" required>
                            <option value="">Seleccione una categoría</option>

                            <option value="Quimicos"
                                {{ old('categoria', $proveedor->categoria) == 'Quimicos' ? 'selected' : '' }}>
                                Químicos
                            </option>

                            <option value="Semilleros"
                                {{ old('categoria', $proveedor->categoria) == 'Semilleros' ? 'selected' : '' }}>
                                Semilleros
                            </option>

                            <option value="Maquinaria"
                                {{ old('categoria', $proveedor->categoria) == 'Maquinaria' ? 'selected' : '' }}>
                                Maquinaria
                            </option>
                        </select>

                        @error('categoria')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Límite de crédito --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Límite de crédito (L.)</label>

                        <input
                            type="number"
                            name="limite_credito"
                            class="form-control"
                            value="{{ old('limite_credito', $proveedor->limite_credito) }}"
                            min="0"
                            step="0.01"
                            required
                        >

                        @error('limite_credito')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Días de crédito --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Días de crédito</label>

                        <select name="dias_credito" class="form-select" required>
                            @foreach([15, 30, 45, 60] as $dias)
                                <option
                                    value="{{ $dias }}"
                                    {{ old('dias_credito', $proveedor->dias_credito) == $dias ? 'selected' : '' }}
                                >
                                    {{ $dias }} días
                                </option>
                            @endforeach
                        </select>

                        @error('dias_credito')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Estado --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Estado</label>

                        <select name="estado" class="form-select" required>
                            <option value="Activo"
                                {{ old('estado', $proveedor->estado) == 'Activo' ? 'selected' : '' }}>
                                Activo
                            </option>

                            <option value="Inactivo"
                                {{ old('estado', $proveedor->estado) == 'Inactivo' ? 'selected' : '' }}>
                                Inactivo
                            </option>
                        </select>

                        @error('estado')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Fecha de registro --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Fecha de registro</label>

                        <input
                            type="date"
                            name="fecha_registro"
                            class="form-control"
                            value="{{ old('fecha_registro', $proveedor->fecha_registro) }}"
                            required
                        >

                        @error('fecha_registro')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                </div>

                {{-- Botones --}}
                <div class="d-flex gap-2 mt-3">

                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-save"></i>
                        Actualizar proveedor
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

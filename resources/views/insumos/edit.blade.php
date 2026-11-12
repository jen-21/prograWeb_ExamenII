
@extends('layouts.admin')

@section('titulo', 'Editar insumo')

@section('contenido')

<div class="container-fluid px-4">

    <div class="d-flex justify-content-between align-items-center mt-4 mb-4">
        <div>
            <h2>Editar insumo</h2>
            <p class="text-muted mb-0">
                Modifique la información del insumo seleccionado.
            </p>
        </div>

        <a href="{{ route('insumos.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left me-1"></i>
            Regresar
        </a>
    </div>

    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h6 class="m-0 fw-bold" style="color: #244B35;">
                <i class="bi bi-pencil-square me-2"></i>
                Información del insumo
            </h6>
        </div>

        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Corrige los siguientes errores:</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('insumos.update', $insumo) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Código *</label>
                        <input type="text" name="codigo" class="form-control"
                               value="{{ old('codigo', $insumo->codigo) }}" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nombre del insumo *</label>
                        <input type="text" name="nombre" class="form-control"
                               value="{{ old('nombre', $insumo->nombre) }}" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Categoría *</label>
                        <select name="categoria" class="form-select" required>
                            <option value="">Seleccione una categoría</option>

                            @foreach ([
                                'Fertilizantes',
                                'Semillas Certificadas',
                                'Agroquimicos',
                                'Herramientas',
                                'Sistemas de Riego'
                            ] as $categoria)

                                <option value="{{ $categoria }}"
                                    {{ old('categoria', $insumo->categoria) == $categoria ? 'selected' : '' }}>
                                    {{ $categoria }}
                                </option>

                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Fabricante *</label>
                        <input type="text" name="fabricante" class="form-control"
                               value="{{ old('fabricante', $insumo->fabricante) }}" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Precio de venta (L.) *</label>
                        <input type="number" name="precio" class="form-control"
                               value="{{ old('precio', $insumo->precio) }}"
                               min="0" step="0.01" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Costo (L.) *</label>
                        <input type="number" name="costo" class="form-control"
                               value="{{ old('costo', $insumo->costo) }}"
                               min="0" step="0.01" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Inventario disponible *</label>
                        <input type="number" name="inventario" class="form-control"
                               value="{{ old('inventario', $insumo->inventario) }}"
                               min="0" step="1" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Número de lote *</label>
                        <input type="text" name="numero_lote" class="form-control"
                               value="{{ old('numero_lote', $insumo->numero_lote) }}" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Fecha de vencimiento</label>
                        <input type="date" name="fecha_vencimiento" class="form-control"
                               value="{{ old('fecha_vencimiento', $insumo->fecha_vencimiento) }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Fecha de registro *</label>
                        <input type="date" name="fecha_registro" class="form-control"
                               value="{{ old('fecha_registro', $insumo->fecha_registro) }}"
                               required>
                    </div>

                    <div class="col-md-12 mb-3">

                        <label class="form-label">Fotografía actual</label>

                        @if ($insumo->imagen)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $insumo->imagen) }}"
                                     alt="Fotografía del insumo"
                                     style="width: 120px; height: 100px; object-fit: cover;"
                                     class="rounded border">
                            </div>
                        @else
                            <p class="text-muted">No hay fotografía registrada.</p>
                        @endif

                        <label class="form-label">Seleccionar nueva fotografía</label>
                        <input type="file" name="imagen" class="form-control"
                               accept=".jpg,.jpeg,.png,.webp">

                        <small class="text-muted">
                            Opcional. JPG, JPEG, PNG o WEBP. Máximo 2 MB.
                            Si no selecciona otra imagen, se conservará la actual.
                        </small>

                    </div>

                </div>

                <div class="d-flex justify-content-end gap-2">

                    <a href="{{ route('insumos.index') }}" class="btn btn-secondary">
                        Cancelar
                    </a>

                    <button type="submit" class="btn text-white"
                            style="background-color: #244B35;">
                        <i class="bi bi-save me-1"></i>
                        Actualizar insumo
                    </button>

                </div>

            </form>

        </div>
    </div>

</div>

@endsection

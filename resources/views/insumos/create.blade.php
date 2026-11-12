
@extends('layouts.admin')

@section('titulo', 'Registrar insumo')

@section('contenido')

<div class="container-fluid px-4">

    <!-- Encabezado -->
    <div class="d-flex justify-content-between align-items-center mt-4 mb-4">
        <div>
            <h2>Registrar nuevo insumo</h2>
            <p class="text-muted mb-0">
                Complete la información del insumo agropecuario.
            </p>
        </div>

        <a href="{{ route('insumos.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left me-1"></i>
            Regresar
        </a>
    </div>

    <!-- Formulario -->
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h6 class="m-0 fw-bold" style="color: #244B35;">
                <i class="bi bi-box-seam me-2"></i>
                Información del insumo
            </h6>
        </div>

        <div class="card-body">

            <!-- Errores de validación -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Por favor, corrige los siguientes errores:</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('insumos.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="row">

                    <!-- Código -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Código *</label>
                        <input type="text"
                               name="codigo"
                               class="form-control"
                               value="{{ old('codigo') }}"
                               placeholder="Ej. INS-001"
                               required>
                    </div>

                    <!-- Nombre -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nombre del insumo *</label>
                        <input type="text"
                               name="nombre"
                               class="form-control"
                               value="{{ old('nombre') }}"
                               placeholder="Nombre del producto"
                               required>
                    </div>

                    <!-- Categoría -->
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
                                    {{ old('categoria') == $categoria ? 'selected' : '' }}>
                                    {{ $categoria }}
                                </option>

                            @endforeach
                        </select>
                    </div>

                    <!-- Fabricante -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Fabricante *</label>
                        <input type="text"
                               name="fabricante"
                               class="form-control"
                               value="{{ old('fabricante') }}"
                               placeholder="Nombre del fabricante"
                               required>
                    </div>

                    <!-- Precio -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Precio de venta (L.) *</label>
                        <input type="number"
                               name="precio"
                               class="form-control"
                               value="{{ old('precio') }}"
                               min="0"
                               step="0.01"
                               required>
                    </div>

                    <!-- Costo -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Costo (L.) *</label>
                        <input type="number"
                               name="costo"
                               class="form-control"
                               value="{{ old('costo') }}"
                               min="0"
                               step="0.01"
                               required>
                    </div>

                    <!-- Inventario -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Inventario disponible *</label>
                        <input type="number"
                               name="inventario"
                               class="form-control"
                               value="{{ old('inventario') }}"
                               min="0"
                               step="1"
                               required>
                    </div>

                    <!-- Número de lote -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Número de lote *</label>
                        <input type="text"
                               name="numero_lote"
                               class="form-control"
                               value="{{ old('numero_lote') }}"
                               placeholder="Ej. LOTE-2026-001"
                               required>
                    </div>

                    <!-- Fecha de vencimiento -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Fecha de vencimiento</label>
                        <input type="date"
                               name="fecha_vencimiento"
                               class="form-control"
                               value="{{ old('fecha_vencimiento') }}">
                    </div>

                    <!-- Fecha de registro -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Fecha de registro *</label>
                        <input type="date"
                               name="fecha_registro"
                               class="form-control"
                               value="{{ old('fecha_registro', date('Y-m-d')) }}"
                               required>
                    </div>

                    <!-- Imagen -->
                    <div class="col-md-12 mb-4">
                        <label class="form-label">Fotografía del insumo</label>
                        <input type="file"
                               name="imagen"
                               class="form-control"
                               accept=".jpg,.jpeg,.png,.webp">
                        <small class="text-muted">
                            Formatos permitidos: JPG, JPEG, PNG y WEBP. Máximo 2 MB.
                        </small>
                    </div>

                </div>

                <!-- Botones -->
                <div class="d-flex justify-content-end gap-2">

                    <a href="{{ route('insumos.index') }}"
                       class="btn btn-secondary">
                        Cancelar
                    </a>

                    <button type="submit"
                            class="btn text-white"
                            style="background-color: #244B35;">
                        <i class="bi bi-save me-1"></i>
                        Guardar insumo
                    </button>

                </div>

            </form>

        </div>
    </div>

</div>

@endsection

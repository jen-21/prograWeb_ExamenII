
@extends('layouts.admin')

@section('titulo', 'Insumos agropecuarios')

@section('contenido')

<div class="container-fluid px-4">

    <!-- Encabezado -->
    <div class="d-flex justify-content-between align-items-center mt-4 mb-4">
        <div>
            <h2>Insumos agropecuarios</h2>
            <p class="text-muted mb-0">
                Administración y control de insumos registrados.
            </p>
        </div>

        <a href="{{ route('insumos.create') }}"
           class="btn text-white"
           style="background-color: #244B35;">
            <i class="bi bi-plus-circle me-1"></i>
            Nuevo insumo
        </a>
    </div>

    <!-- Mensaje de éxito -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Tabla de insumos -->
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h6 class="m-0 fw-bold" style="color: #244B35;">
                <i class="bi bi-box-seam me-2"></i>
                Listado de insumos
            </h6>
        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead style="background-color: #244B35; color: white;">
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Categoría</th>
                            <th>Fabricante</th>
                            <th>Precio</th>
                            <th>Inventario</th>
                            <th>Vencimiento</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($insumos as $insumo)

                            <tr>
                                <td>{{ $insumo->codigo }}</td>
                                <td>{{ $insumo->nombre }}</td>
                                <td>{{ $insumo->categoria }}</td>
                                <td>{{ $insumo->fabricante }}</td>
                                <td>L. {{ number_format($insumo->precio, 2) }}</td>
                                <td>{{ $insumo->inventario }}</td>

                                <td>
                                    {{ $insumo->fecha_vencimiento
                                        ? \Carbon\Carbon::parse($insumo->fecha_vencimiento)->format('d/m/Y')
                                        : 'No aplica' }}
                                </td>

                                <td>
                                    <div class="d-flex gap-1">

                                        <a href="{{ route('insumos.show', $insumo) }}"
                                           class="btn btn-sm btn-info text-white"
                                           title="Ver detalles">
                                            <i class="bi bi-eye"></i>
                                        </a>

                                        <a href="{{ route('insumos.edit', $insumo) }}"
                                           class="btn btn-sm btn-warning"
                                           title="Editar">
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        <form action="{{ route('insumos.destroy', $insumo) }}"
                                              method="POST"
                                              onsubmit="return confirm('¿Estás seguro de eliminar este insumo?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-sm btn-danger"
                                                    title="Eliminar">
                                                <i class="bi bi-trash"></i>
                                            </button>

                                        </form>

                                    </div>
                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="8" class="text-center py-4">
                                    <i class="bi bi-inbox fs-2 text-muted"></i>
                                    <p class="mb-0 mt-2 text-muted">
                                        No hay insumos registrados.
                                    </p>
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>
    </div>

</div>

@endsection

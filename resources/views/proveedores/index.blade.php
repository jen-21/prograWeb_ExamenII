
@extends('layouts.admin')

@section('titulo', 'Fabricantes y proveedores')

@section('contenido')
<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-1">Fabricantes y proveedores</h1>
            <p class="text-muted mb-0">Administración de proveedores de AGROVALLE.</p>
        </div>

        <a href="{{ route('proveedores.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Nuevo proveedor
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-header">
            <strong>Listado de proveedores</strong>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>RTN</th>
                            <th>Empresa</th>
                            <th>Contacto</th>
                            <th>Teléfono</th>
                            <th>Categoría</th>
                            <th>Límite de crédito</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($proveedores as $proveedor)
                            <tr>
                                <td>{{ $proveedor->rtn }}</td>
                                <td>{{ $proveedor->empresa }}</td>
                                <td>{{ $proveedor->contacto }}</td>
                                <td>{{ $proveedor->telefono }}</td>
                                <td>{{ $proveedor->categoria }}</td>
                                <td>L. {{ number_format($proveedor->limite_credito, 2) }}</td>

                                <td>
                                    <span class="badge {{ $proveedor->estado == 'Activo' ? 'bg-success' : 'bg-secondary' }}">
                                        {{ $proveedor->estado }}
                                    </span>
                                </td>

                                <td>
                                    <a href="{{ url('/proveedores/' . $proveedor->id) }}"
                                    class="btn btn-sm btn-info text-white">
                                        <i class="bi bi-eye"></i>
                                    </a>

                                    <a href="{{ url('/proveedores/' . $proveedor->id . '/edit') }}"
                                    class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    <form action="{{ url('/proveedores/' . $proveedor->id) }}"
                                        method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('¿Estás seguro de eliminar este proveedor?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted py-4">
                                    No hay proveedores registrados.
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

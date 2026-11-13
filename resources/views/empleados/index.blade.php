
@extends('layouts.admin')

@section('titulo', 'Gestión de Empleados')

@section('contenido')

<div class="container-fluid px-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="mt-4">Empleados</h1>
            <p class="text-muted">Administración del personal de AGROVALLE HONDURAS</p>
        </div>

        <a href="{{ route('empleados.create') }}" class="btn btn-success">
            <i class="bi bi-person-plus"></i> Nuevo empleado
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card mb-4">
        <div class="card-header">
            <i class="bi bi-people me-1"></i>
            Listado de empleados
        </div>

        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-success">
                    <tr>
                        <th>Identidad</th>
                        <th>Nombre completo</th>
                        <th>Correo</th>
                        <th>Cargo</th>
                        <th>Salario</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($empleados as $empleado)
                        <tr>
                            <td>{{ $empleado->identidad }}</td>
                            <td>{{ $empleado->nombre }} {{ $empleado->apellido }}</td>
                            <td>{{ $empleado->correo ?? 'No registrado' }}</td>
                            <td>{{ $empleado->cargo }}</td>
                            <td>L. {{ number_format($empleado->salario, 2) }}</td>
                            <td>
                                @if($empleado->estado == 'Activo')
                                    <span class="badge bg-success">Activo</span>
                                @else
                                    <span class="badge bg-danger">Inactivo</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('empleados.show', $empleado->id) }}"
                                   class="btn btn-info btn-sm" title="Ver">
                                    <i class="bi bi-eye"></i>
                                </a>

                                <a href="{{ route('empleados.edit', $empleado->id) }}"
                                   class="btn btn-warning btn-sm" title="Editar">
                                    <i class="bi bi-pencil"></i>
                                </a>

                                <form action="{{ route('empleados.destroy', $empleado->id) }}"
                                      method="POST" class="d-inline"
                                      onsubmit="return confirm('¿Deseas eliminar este empleado?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger btn-sm" title="Eliminar">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">
                                No hay empleados registrados.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

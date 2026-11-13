
@extends('layouts.admin')

@section('titulo', 'Panel principal')

@section('contenido')

<div class="container-fluid px-4">

    <h1 class="mt-4">Panel principal</h1>

    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">
            Bienvenido al sistema de gestión interna de AGROVALLE HONDURAS
        </li>
    </ol>

    <!-- Mensaje de bienvenida -->
    <div class="alert alert-success">
        <i class="bi bi-person-check-fill"></i>
        Bienvenido,
        <strong>{{ $usuario->name }}</strong>.
        Has iniciado sesión correctamente.
    </div>

    <!-- Indicadores estadísticos -->
    <div class="row">

        <!-- Insumos -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card text-white shadow h-100"
                 style="background-color: #244B35;">

                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="small">Insumos registrados</div>
                            <h3 class="mt-2 mb-0">{{ $totalInsumos }}</h3>
                        </div>
                        <i class="bi bi-box-seam fs-1"></i>
                    </div>
                </div>

                <a href="{{ route('insumos.index') }}"
                   class="card-footer d-flex align-items-center justify-content-between text-white text-decoration-none">
                    <span class="small">Módulo de insumos</span>
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>

        <!-- Proveedores -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card text-white shadow h-100"
                 style="background-color: #5B8060;">

                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="small">Proveedores registrados</div>
                            <h3 class="mt-2 mb-0">{{ $totalProveedores }}</h3>
                        </div>
                        <i class="bi bi-truck fs-1"></i>
                    </div>
                </div>

                <a href="{{ route('proveedores.index') }}"
                   class="card-footer d-flex align-items-center justify-content-between text-white text-decoration-none">
                    <span class="small">Módulo de proveedores</span>
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>

        <!-- Empleados -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card text-white shadow h-100"
                 style="background-color: #78966D;">

                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="small">Empleados registrados</div>
                            <h3 class="mt-2 mb-0">{{ $totalEmpleados }}</h3>
                        </div>
                        <i class="bi bi-people fs-1"></i>
                    </div>
                </div>

                <a href="{{ route('empleados.index') }}"
                   class="card-footer d-flex align-items-center justify-content-between text-white text-decoration-none">
                    <span class="small">Módulo de recursos humanos</span>
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>

        <!-- Usuario conectado -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card text-white shadow h-100"
                 style="background-color: #A18B58;">

                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="small">Usuario conectado</div>
                            <h5 class="mt-2 mb-0">{{ $usuario->name }}</h5>
                        </div>
                        <i class="bi bi-person-circle fs-1"></i>
                    </div>
                </div>

                <div class="card-footer d-flex align-items-center justify-content-between">
                    <span class="small">Sesión activa</span>
                    <i class="bi bi-check-circle"></i>
                </div>
            </div>
        </div>

    </div>

    <!-- Información general -->
    <div class="card shadow mb-4">

        <div class="card-header">
            <i class="bi bi-info-circle me-1"></i>
            Información del sistema
        </div>

        <div class="card-body">
            <h5>AGROVALLE HONDURAS</h5>

            <p class="mb-0">
                Plataforma de gestión interna para la administración
                de insumos agropecuarios, proveedores y recursos humanos.
            </p>
        </div>

    </div>

</div>

@endsection

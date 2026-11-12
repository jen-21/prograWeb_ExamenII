
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('titulo') | AGROVALLE HONDURAS</title>

    <!-- Estilos SB Admin -->
    <link href="{{ asset('sb-admin/css/styles.css') }}" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Font Awesome -->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js"
            crossorigin="anonymous"></script>

    <!-- Personalización corporativa -->
    <style>
        .sb-topnav {
            background-color: #244B35 !important;
        }

        .sb-sidenav-dark {
            background-color: #244B35;
        }

        .sb-sidenav-dark .nav-link {
            color: #E8F0E9;
        }

        .sb-sidenav-dark .nav-link:hover {
            color: #FFFFFF;
            background-color: #365F46;
        }

        .sb-sidenav-dark .sb-sidenav-menu-heading {
            color: #B8CEBB;
        }

        .sb-sidenav-footer {
            background-color: #193A28;
            color: #FFFFFF;
        }
    </style>

    @yield('estilos')
</head>

<body class="sb-nav-fixed">

    <!-- Barra superior -->
    <nav class="sb-topnav navbar navbar-expand navbar-dark">

        <a class="navbar-brand ps-3" href="{{ route('dashboard') }}">
            <i class="bi bi-flower1 me-2"></i>
            AGROVALLE HONDURAS
        </a>

        <ul class="navbar-nav ms-auto me-3">

            <li class="nav-item">
                <span class="nav-link text-white">
                    <i class="bi bi-person-circle me-1"></i>
                    {{ Auth::user()->name ?? 'Usuario' }}
                </span>
            </li>

            <li class="nav-item">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf

                    <button type="submit"
                            class="btn btn-outline-light btn-sm mt-1">
                        <i class="bi bi-box-arrow-right me-1"></i>
                        Cerrar sesión
                    </button>
                </form>
            </li>

        </ul>

    </nav>

    <div id="layoutSidenav">

        <!-- Menú lateral -->
        <div id="layoutSidenav_nav">

            <nav class="sb-sidenav accordion sb-sidenav-dark">

                <div class="sb-sidenav-menu">

                    <div class="nav">

                        <div class="sb-sidenav-menu-heading">
                            Principal
                        </div>

                        <a class="nav-link" href="{{ route('dashboard') }}">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            Dashboard
                        </a>

                        <div class="sb-sidenav-menu-heading">
                            Administración
                        </div>

                        <a class="nav-link" href="#">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-seedling"></i>
                            </div>
                            Insumos
                        </a>


                        <a class="nav-link" href="#">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-truck"></i>
                            </div>
                            Proveedores
                        </a>

                        <a class="nav-link" href="#">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            Empleados
                        </a>

                    </div>

                </div>

                <div class="sb-sidenav-footer">
                    <div class="small">Sistema de gestión</div>
                    AGROVALLE HONDURAS
                </div>

            </nav>

        </div>

        <!-- Contenido principal -->
        <div id="layoutSidenav_content">

            <main>

                @yield('contenido')

            </main>

            <!-- Pie de página -->
            <footer class="py-4 bg-light mt-auto">

                <div class="container-fluid px-4">
                    <div class="text-muted text-center small">
                        © {{ date('Y') }} AGROVALLE HONDURAS.
                        Todos los derechos reservados.
                    </div>
                </div>

            </footer>

        </div>

    </div>

    <!-- Scripts SB Admin -->
    <script src="{{ asset('sb-admin/js/scripts.js') }}"></script>

    @yield('scripts')

</body>
</html>

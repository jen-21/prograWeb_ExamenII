
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Iniciar sesión | AGROVALLE HONDURAS</title>

    <!-- Estilos SB Admin -->
    <link href="{{ asset('sb-admin/css/styles.css') }}" rel="stylesheet">

    <!-- Iconos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Estilos personalizados -->
    <style>
        body {
            background-color: #F4F6EF;
            min-height: 100vh;
        }

        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px 15px;
        }

        .login-card {
            width: 100%;
            max-width: 460px;
            border: none;
            border-radius: 14px;
            overflow: hidden;
        }

        .login-header {
            background-color: #244B35;
            color: white;
            padding: 35px 20px;
            text-align: center;
        }

        .login-header i {
            font-size: 45px;
            display: block;
            margin-bottom: 10px;
        }

        .login-header h2 {
            font-weight: 700;
            letter-spacing: 1px;
            margin-bottom: 5px;
        }

        .login-header p {
            margin-bottom: 0;
            color: #DCE8DD;
            letter-spacing: 3px;
        }

        .login-body {
            padding: 35px;
            background-color: white;
        }

        .form-floating {
            margin-bottom: 22px;
        }

        .form-control:focus {
            border-color: #5B8060;
            box-shadow: 0 0 0 0.2rem rgba(91, 128, 96, 0.20);
        }

        .btn-login {
            background-color: #244B35;
            border-color: #244B35;
            color: white;
            width: 100%;
            padding: 12px;
            font-weight: 600;
            font-size: 16px;
            border-radius: 7px;
            transition: 0.3s;
        }

        .btn-login:hover {
            background-color: #5B8060;
            border-color: #5B8060;
            color: white;
        }

        .login-footer {
            background-color: #F8F9F5;
            padding: 20px;
            text-align: center;
            color: #6C757D;
            font-size: 13px;
        }

        .login-footer strong {
            color: #244B35;
        }

        @media (max-width: 576px) {
            .login-body {
                padding: 25px 20px;
            }
        }
    </style>
</head>

<body>

    <div class="login-container">

        <div class="card shadow-lg login-card">

            <!-- Encabezado -->
            <div class="login-header">

                <i class="bi bi-flower1"></i>

                <h2>AGROVALLE</h2>

                <p>HONDURAS</p>

                <h5 class="mt-4 mb-0">Sistema de Gestión Interna</h5>

            </div>

            <!-- Formulario -->
            <div class="login-body">

                <h4 class="text-center mb-4">Iniciar sesión</h4>

                <!-- Mensajes de error -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <i class="bi bi-exclamation-circle"></i>
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login.authenticate') }}">

                    @csrf

                    <!-- Correo electrónico -->
                    <div class="form-floating">

                        <input
                            class="form-control"
                            id="email"
                            type="email"
                            name="email"
                            placeholder="nombre@empresa.com"
                            value="{{ old('email') }}"
                            required
                            autofocus
                        >

                        <label for="email">
                            <i class="bi bi-envelope"></i>
                            Correo electrónico
                        </label>

                    </div>

                    <!-- Contraseña -->
                    <div class="form-floating">

                        <input
                            class="form-control"
                            id="password"
                            type="password"
                            name="password"
                            placeholder="Contraseña"
                            required
                        >

                        <label for="password">
                            <i class="bi bi-lock"></i>
                            Contraseña
                        </label>

                    </div>

                    <!-- Botón -->
                    <button type="submit" class="btn btn-login mt-2">

                        <i class="bi bi-box-arrow-in-right me-2"></i>

                        Ingresar

                    </button>

                </form>

            </div>

            <!-- Pie de página -->
            <div class="login-footer">

                <div>
                    Sistema de Gestión Interna
                </div>

                <strong>
                    AGROVALLE HONDURAS
                </strong>

                <div class="mt-1">
                    © {{ date('Y') }} Todos los derechos reservados.
                </div>

            </div>

        </div>

    </div>

    <!-- Scripts SB Admin -->
    <script src="{{ asset('sb-admin/js/scripts.js') }}"></script>

</body>
</html>

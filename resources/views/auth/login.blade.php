<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión o Registrarse</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        .btn-primary {
            background-color: #6c757d;
            border-color: #6c757d;
        }
        .btn-secondary {
            background-color: #f8a488;
            border-color: #f8a488;
        }
        .form-container {
            transition: all 0.5s ease-in-out;
        }
        .slide-in {
            animation: slideIn 0.5s ease-in-out;
        }
        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
        .bg-login {
            background-color: #6c757d;
        }
        .bg-register {
            background-color: #f8a488;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-md-6 p-5">
                                <h2 class="text-center mb-4">Lanza tu App</h2>
                                <div class="text-center mb-4">
                                    <i class="fas fa-rocket fa-4x text-primary"></i>
                                </div>
                                <button id="showRegister" class="btn btn-primary w-100 mb-3">Crear Cuenta</button>
                                <button id="showLogin" class="btn btn-secondary w-100">Iniciar Sesión</button>
                                <p class="text-center mt-3"><small>Términos y Condiciones</small></p>
                            </div>
                            <div id="formContainer" class="col-md-6 bg-login p-5 form-container">
                                <div id="loginForm">
                                    <h3 class="text-white mb-4">Iniciar Sesión</h3>
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                                <input type="email" class="form-control" name="email" placeholder="E-Mail" required>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                                <input type="password" class="form-control" name="password" placeholder="Contraseña" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 form-check">
                                            <input type="checkbox" class="form-check-input" id="keepLoggedIn">
                                            <label class="form-check-label text-white" for="keepLoggedIn">Mantenerme conectado</label>
                                        </div>
                                        <button type="submit" class="btn btn-light w-100">Iniciar Sesión</button>
                                    </form>
                                    <p class="text-center mt-3 text-white"><small>¿Olvidaste tu contraseña?</small></p>
                                </div>
                                <div id="registerForm" style="display: none;">
                                    <h3 class="text-white mb-4">Crear Cuenta</h3>
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                <input type="text" class="form-control" name="name" placeholder="Nombre" required>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                                <input type="email" class="form-control" name="email" placeholder="E-Mail" required>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                                <input type="password" class="form-control" name="password" placeholder="Contraseña" required>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirmar Contraseña" required>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-light w-100">¡Vamos!</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const showRegister = document.getElementById('showRegister');
            const showLogin = document.getElementById('showLogin');
            const formContainer = document.getElementById('formContainer');
            const loginForm = document.getElementById('loginForm');
            const registerForm = document.getElementById('registerForm');

            showRegister.addEventListener('click', function() {
                formContainer.classList.remove('bg-login');
                formContainer.classList.add('bg-register', 'slide-in');
                loginForm.style.display = 'none';
                registerForm.style.display = 'block';
            });

            showLogin.addEventListener('click', function() {
                formContainer.classList.remove('bg-register');
                formContainer.classList.add('bg-login', 'slide-in');
                registerForm.style.display = 'none';
                loginForm.style.display = 'block';
            });

            formContainer.addEventListener('animationend', function() {
                formContainer.classList.remove('slide-in');
            });
        });
    </script>
</body>
</html>

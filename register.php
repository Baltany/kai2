<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Kairos</title>
    <?php include("includes/head-tag-contents.php"); ?>
</head>
<body>
    <main class="d-flex align-items-center justify-content-center min-vh-100">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Logo -->
                <div class="col-12 text-center mb-5">
                    <img class="img-fluid" style="max-width: 150px; height: auto;" 
                         src="assets/img/kairos.png" 
                         onerror="this.src='https://placehold.co/150x50/1c0538/ffffff?text=Kairos'" 
                         alt="Kairos Logo"/>
                </div>

                <!-- Register Form Card -->
                <div class="col-12 col-sm-9 col-md-7 col-lg-5 col-xl-4">
                    <div class="card border-0 shadow-lg">
                        <div class="card-body p-5">
                            <!-- Título -->
                            <h1 class="card-title h2 text-center mb-2">
                                ¡Regístrate!
                            </h1>
                            <p class="text-center text-muted small mb-4">
                                Crea tu cuenta rellenando el formulario
                            </p>

                            <!-- Formulario Registro -->
                            <form method="POST" action="includes/register-process.php" novalidate>
                                
                                <!-- Nombre Input -->
                                <div class="mb-3">
                                    <label for="nombre" class="form-label fw-500">Nombre</label>
                                    <input 
                                        type="text" 
                                        id="nombre" 
                                        name="nombre"
                                        class="form-control form-control-lg" 
                                        placeholder="Tu nombre" 
                                        required />
                                    <div class="invalid-feedback d-block" style="display: none;">
                                        El nombre es obligatorio.
                                    </div>
                                </div>

                                <!-- Apellidos Input -->
                                <div class="mb-3">
                                    <label for="apellidos" class="form-label fw-500">Apellidos</label>
                                    <input 
                                        type="text" 
                                        id="apellidos" 
                                        name="apellidos"
                                        class="form-control form-control-lg" 
                                        placeholder="Tus apellidos" 
                                        required />
                                    <div class="invalid-feedback d-block" style="display: none;">
                                        Los apellidos son obligatorios.
                                    </div>
                                </div>

                                <!-- Email Input -->
                                <div class="mb-3">
                                    <label for="email" class="form-label fw-500">Email</label>
                                    <input 
                                        type="email" 
                                        id="email" 
                                        name="email"
                                        class="form-control form-control-lg" 
                                        placeholder="correo@ejemplo.com" 
                                        required />
                                    <div class="invalid-feedback d-block" style="display: none;">
                                        Por favor introduce un email válido.
                                    </div>
                                </div>

                                <!-- Password Input -->
                                <div class="mb-4">
                                    <label for="password" class="form-label fw-500">Contraseña</label>
                                    <input 
                                        type="password" 
                                        id="password" 
                                        name="password"
                                        class="form-control form-control-lg" 
                                        placeholder="Crea una contraseña segura" 
                                        required />
                                    <div class="invalid-feedback d-block" style="display: none;">
                                        La contraseña es obligatoria.
                                    </div>
                                </div>

                                <!-- Buttons Row -->
                                <div class="d-grid gap-2 mb-3">
                                    <button type="submit" class="btn btn-primary btn-lg fw-bold">
                                        Aceptar
                                    </button>
                                    <a href="login.php" class="btn btn-outline-secondary btn-lg fw-bold">
                                        Cancelar
                                    </a>
                                </div>

                                <!-- Login Link -->
                                <div class="text-center">
                                    <p class="small mb-0">
                                        ¿Ya tienes cuenta? 
                                        <a href="login.php" class="text-primary text-decoration-none fw-bold">
                                            Inicia sesión aquí
                                        </a>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="js/scripts.js"></script>
</body>
</html>
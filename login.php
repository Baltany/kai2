<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Kairos</title>
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

                <!-- Login Form Card -->
                <div class="col-12 col-sm-9 col-md-7 col-lg-5 col-xl-4">
                    <div class="card border-0 shadow-lg">
                        <div class="card-body p-5">
                            <!-- Título -->
                            <h1 class="card-title h2 text-center mb-4">
                                ¡Bienvenido a Kairos!
                            </h1>

                            <!-- Formulario Login -->
                            <form method="POST" action="includes/login-process.php" novalidate>
                                
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
                                        placeholder="••••••••" 
                                        required />
                                    <div class="invalid-feedback d-block" style="display: none;">
                                        Por favor introduce tu contraseña.
                                    </div>
                                </div>

                                <!-- Login Button -->
                                <div class="d-grid gap-2 mb-4">
                                    <button type="submit" class="btn btn-primary btn-lg fw-bold">
                                        Iniciar Sesión
                                    </button>
                                </div>

                                <!-- Register Link -->
                                <div class="text-center">
                                    <p class="mb-0">
                                        ¿Aún no tienes cuenta? 
                                        <a href="register.php" class="text-primary text-decoration-none fw-bold">
                                            Regístrate aquí
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

</body>
</html>
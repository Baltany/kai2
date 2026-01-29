<?php 
session_start();
include("includes/a_config.php");

if (isset($_SESSION['usuario_id'])) {
    header("Location: index.php");
    exit();
}

$error = '';
$exito = '';
$resultado = null;

// Si el formulario se envía
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once __DIR__ . "/model/Conexion.php";
    require_once __DIR__ . "/model/Usuario.php";
    require_once __DIR__ . "/controller/UsuarioController.php";
    
    $controller = new UsuarioController();
    
    $username = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    
    $resultado = $controller->login($username, $password);
    
    if ($resultado['success']) {
        $exito = $resultado['message'];
        header("refresh:1;url=index.php");
    } else {
        $error = $resultado['message'];
    }
}

?>

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
                    <img class="img-fluid" style="max-width: 150px; height: auto;" src="assets/img/kairos.png"
                        onerror="this.src='https://placehold.co/150x50/1c0538/ffffff?text=Kairos'" alt="Kairos Logo" />
                </div>

                <!-- Login Form Card -->
                <div class="col-12 col-sm-9 col-md-7 col-lg-5 col-xl-4">
                    <div class="card border-0 shadow-lg">
                        <div class="card-body p-5">
                            <!-- Título -->
                            <h1 class="card-title h2 text-center mb-4">
                                ¡Bienvenido a Kairos!
                            </h1>

                            <!-- Mostrar Error -->
                            <?php if ($error): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>❌ Error:</strong> <?php echo htmlspecialchars($error); ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            <?php endif; ?>

                            <!-- Mostrar Éxito -->
                            <?php if ($exito): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>✅ Éxito:</strong> <?php echo htmlspecialchars($exito); ?> Redirigiendo...
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            <?php endif; ?>

                            <!-- Formulario Login -->
                            <form method="POST" action="" novalidate>

                                <!-- Email/Username Input -->
                                <div class="mb-3">
                                    <label for="email" class="form-label fw-500">Email o Usuario</label>
                                    <input type="text" id="email" name="email" class="form-control form-control-lg"
                                        placeholder="correo@ejemplo.com o usuario_nombre"
                                        value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>"
                                        required />
                                    <div class="invalid-feedback d-block" style="display: none;">
                                        Por favor introduce un email o usuario válido.
                                    </div>
                                </div>

                                <!-- Password Input -->
                                <div class="mb-4">
                                    <label for="password" class="form-label fw-500">Contraseña</label>
                                    <input type="password" id="password" name="password"
                                        class="form-control form-control-lg" placeholder="••••••••" required />
                                    <div class="invalid-feedback d-block" style="display: none;">
                                        Por favor introduce tu contraseña.
                                    </div>
                                </div>

                                <!-- Login Button -->
                                <div class="d-grid gap-2 mb-4">
                                    <button type="submit" class="btn btn-primary btn-lg fw-bold" name="enviar"
                                        id="enviar">
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

                            <!-- Divider -->
                            <hr class="my-4">

                            <!-- Google OAuth (para después) -->
                            <div class="d-grid gap-2">
                                <button type="button" class="btn btn-outline-secondary btn-lg"
                                    onclick="alert('Google OAuth - Próximamente')">
                                    🔵 Iniciar con Google
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include("includes/footer.php"); ?>
    <script src="js/scripts.js"></script>
</body>

</html>
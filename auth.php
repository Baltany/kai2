<?php
session_start();
header('Content-Type: application/json');

require_once "model/Conexion.php";
require_once "model/Usuario.php";
require_once "controller/UsuarioController.php";

$controller = new UsuarioController();
$accion = $_POST['accion'] ?? $_GET['accion'] ?? null;
$response = ["success" => false, "message" => "Acción no válida"];

try {
    switch ($accion) {
        
        // ============================================
        // LOGIN TRADICIONAL
        // ============================================
        case 'login':
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            $response = $controller->login($username, $password);
            break;

        // ============================================
        // REGISTRO
        // ============================================
        case 'registrar':
            $datos = [
                'username' => $_POST['username'] ?? '',
                'password' => $_POST['password'] ?? '',
                'nombre' => $_POST['nombre'] ?? '',
                'apellidos' => $_POST['apellidos'] ?? '',
                'correo' => $_POST['correo'] ?? '',
                'fecha_nacimiento' => $_POST['fecha_nacimiento'] ?? '',
                'codigo_postal' => $_POST['codigo_postal'] ?? '',
                'telefono' => $_POST['telefono'] ?? ''
            ];
            $response = $controller->registrar($datos);
            break;

        // ============================================
        // GOOGLE OAUTH LOGIN
        // ============================================
        case 'loginGoogle':
            $googleToken = $_POST['token'] ?? '';
            $response = $controller->loginGoogle($googleToken);
            break;

        // ============================================
        // LOGOUT
        // ============================================
        case 'logout':
            $response = $controller->logout();
            break;

        // ============================================
        // VERIFICAR SESIÓN
        // ============================================
        case 'verificarSesion':
            if ($controller->verificarSesion()) {
                $usuario = $controller->usuarioActual();
                $response = [
                    "success" => true,
                    "logueado" => true,
                    "usuario" => $usuario
                ];
            } else {
                $response = [
                    "success" => true,
                    "logueado" => false
                ];
            }
            break;

        // ============================================
        // OBTENER USUARIO ACTUAL
        // ============================================
        case 'obtenerUsuario':
            $usuario = $controller->usuarioActual();
            if ($usuario) {
                $response = [
                    "success" => true,
                    "usuario" => $usuario
                ];
            } else {
                $response = [
                    "success" => false,
                    "message" => "No hay usuario logueado"
                ];
            }
            break;

        default:
            $response = ["success" => false, "message" => "Acción no encontrada"];
    }

} catch (Exception $e) {
    $response = ["success" => false, "message" => "Error: " . $e->getMessage()];
}

echo json_encode($response);
?>
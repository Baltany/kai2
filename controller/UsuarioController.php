<?php
require_once "../model/Conexion.php";
require_once "../model/Usuario.php";
class UsuarioController {
    private $conexion;

    public function __construct() {
        $db = new Conexion();
        $this->conexion = $db->getConexion();
    }

    // ============================================
    // LOGIN TRADICIONAL
    // ============================================
    public function login($username, $password) {
        try {
            // Validar que no estén vacíos
            if (empty($username) || empty($password)) {
                return ["success" => false, "message" => "Usuario y contraseña requeridos"];
            }

            // Buscar usuario por username o email
            $sql = "SELECT * FROM usuario WHERE username = :username OR correo = :correo";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':correo', $username, PDO::PARAM_STR);
            $stmt->execute();

            if ($stmt->rowCount() === 0) {
                return ["success" => false, "message" => "Usuario no encontrado"];
            }

            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verificar que el usuario esté activo
            if (!$usuario['activo']) {
                return ["success" => false, "message" => "Usuario desactivado"];
            }

            // Verificar contraseña
            if (!password_verify($password, $usuario['password'])) {
                return ["success" => false, "message" => "Contraseña incorrecta"];
            }

            // Login exitoso - crear sesión
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['username'] = $usuario['username'];
            $_SESSION['rol'] = $usuario['rol'];
            $_SESSION['nombre'] = $usuario['nombre'];
            $_SESSION['correo'] = $usuario['correo'];

            return ["success" => true, "message" => "Login exitoso", "usuario" => $usuario];

        } catch (Exception $e) {
            return ["success" => false, "message" => "Error en el servidor: " . $e->getMessage()];
        }
    }

    // ============================================
    // REGISTRO
    // ============================================
    public function registrar($datos) {
        try {
            // Validar campos obligatorios
            $camposObligatorios = ['username', 'password', 'nombre', 'apellidos', 'correo', 'fecha_nacimiento', 'codigo_postal', 'telefono'];
            
            foreach ($camposObligatorios as $campo) {
                if (empty($datos[$campo])) {
                    return ["success" => false, "message" => "Campo requerido: $campo"];
                }
            }

            // Validar email
            if (!filter_var($datos['correo'], FILTER_VALIDATE_EMAIL)) {
                return ["success" => false, "message" => "Email no válido"];
            }

            // Validar teléfono (9 dígitos)
            if (!preg_match('/^\d{9}$/', $datos['telefono'])) {
                return ["success" => false, "message" => "Teléfono debe tener 9 dígitos"];
            }

            // Validar código postal (5 dígitos)
            if (!preg_match('/^\d{5}$/', $datos['codigo_postal'])) {
                return ["success" => false, "message" => "Código postal debe tener 5 dígitos"];
            }

            // Validar contraseña fuerte (minúscula, mayúscula, número, carácter especial)
            if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $datos['password'])) {
                return ["success" => false, "message" => "Contraseña debe tener: minúscula, mayúscula, número, carácter especial (@$!%*?&) y 8+ caracteres"];
            }

            // Validar username (alfanumérico, 3-50 caracteres)
            if (!preg_match('/^[a-zA-Z0-9_]{3,50}$/', $datos['username'])) {
                return ["success" => false, "message" => "Username: alfanumérico/guion bajo, 3-50 caracteres"];
            }

            // Validar fecha de nacimiento (mayor de 18 años)
            $fecha = DateTime::createFromFormat('Y-m-d', $datos['fecha_nacimiento']);
            if (!$fecha) {
                return ["success" => false, "message" => "Formato de fecha inválido"];
            }
            $today = new DateTime();
            $age = $today->diff($fecha)->y;
            if ($age < 18) {
                return ["success" => false, "message" => "Debes ser mayor de 18 años"];
            }

            // Verificar si usuario ya existe
            $sql = "SELECT id FROM usuario WHERE username = :username OR correo = :correo";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':username', $datos['username'], PDO::PARAM_STR);
            $stmt->bindParam(':correo', $datos['correo'], PDO::PARAM_STR);
            $stmt->execute();
            
            if ($stmt->rowCount() > 0) {
                return ["success" => false, "message" => "Usuario o email ya registrado"];
            }

            // Hashear contraseña
            $passwordHasheada = password_hash($datos['password'], PASSWORD_BCRYPT);

            // Insertar nuevo usuario
            $sql = "INSERT INTO usuario (username, password, nombre, apellidos, correo, fecha_nacimiento, codigo_postal, telefono, rol, activo) 
                    VALUES (:username, :password, :nombre, :apellidos, :correo, :fecha_nacimiento, :codigo_postal, :telefono, 3, 1)";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':username', $datos['username'], PDO::PARAM_STR);
            $stmt->bindParam(':password', $passwordHasheada, PDO::PARAM_STR);
            $stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
            $stmt->bindParam(':apellidos', $datos['apellidos'], PDO::PARAM_STR);
            $stmt->bindParam(':correo', $datos['correo'], PDO::PARAM_STR);
            $stmt->bindParam(':fecha_nacimiento', $datos['fecha_nacimiento'], PDO::PARAM_STR);
            $stmt->bindParam(':codigo_postal', $datos['codigo_postal'], PDO::PARAM_STR);
            $stmt->bindParam(':telefono', $datos['telefono'], PDO::PARAM_STR);

            if ($stmt->execute()) {
                return ["success" => true, "message" => "Registro exitoso"];
            } else {
                return ["success" => false, "message" => "Error al registrar usuario"];
            }

        } catch (Exception $e) {
            return ["success" => false, "message" => "Error: " . $e->getMessage()];
        }
    }

    // ============================================
    // GOOGLE OAUTH LOGIN
    // ============================================
    public function loginGoogle($googleToken) {
        try {
            if (empty($googleToken)) {
                return ["success" => false, "message" => "Token de Google inválido"];
            }

            // Decodificar JWT (versión simplificada)
            $parts = explode('.', $googleToken);
            if (count($parts) !== 3) {
                return ["success" => false, "message" => "Token inválido"];
            }

            $payload = json_decode(base64_decode(strtr($parts[1], '-_', '+/')), true);
            
            if (!$payload) {
                return ["success" => false, "message" => "No se pudo procesar el token"];
            }

            $googleEmail = $payload['email'] ?? null;
            $googleNombre = $payload['given_name'] ?? '';
            $googleApellido = $payload['family_name'] ?? '';

            if (!$googleEmail) {
                return ["success" => false, "message" => "Email de Google no disponible"];
            }

            // Buscar usuario por email
            $sql = "SELECT * FROM usuario WHERE correo = :correo";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':correo', $googleEmail, PDO::PARAM_STR);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                // Usuario existe, login
                $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

                if (!$usuario['activo']) {
                    return ["success" => false, "message" => "Usuario desactivado"];
                }

                // Crear sesión
                $_SESSION['usuario_id'] = $usuario['id'];
                $_SESSION['username'] = $usuario['username'];
                $_SESSION['rol'] = $usuario['rol'];
                $_SESSION['nombre'] = $usuario['nombre'];
                $_SESSION['correo'] = $usuario['correo'];

                return ["success" => true, "message" => "Login con Google exitoso", "usuario" => $usuario];

            } else {
                // Crear nuevo usuario desde Google
                $username = str_replace(' ', '_', strtolower($googleNombre . $googleApellido));
                $passwordAleatorio = bin2hex(random_bytes(16));
                $passwordHasheada = password_hash($passwordAleatorio, PASSWORD_BCRYPT);

                $sql = "INSERT INTO usuario (username, password, nombre, apellidos, correo, rol, activo) 
                        VALUES (:username, :password, :nombre, :apellidos, :correo, 3, 1)";
                $stmt = $this->conexion->prepare($sql);
                $stmt->bindParam(':username', $username, PDO::PARAM_STR);
                $stmt->bindParam(':password', $passwordHasheada, PDO::PARAM_STR);
                $stmt->bindParam(':nombre', $googleNombre, PDO::PARAM_STR);
                $stmt->bindParam(':apellidos', $googleApellido, PDO::PARAM_STR);
                $stmt->bindParam(':correo', $googleEmail, PDO::PARAM_STR);

                if ($stmt->execute()) {
                    $usuarioId = $this->conexion->lastInsertId();

                    $_SESSION['usuario_id'] = $usuarioId;
                    $_SESSION['username'] = $username;
                    $_SESSION['rol'] = 3;
                    $_SESSION['nombre'] = $googleNombre;
                    $_SESSION['correo'] = $googleEmail;

                    return ["success" => true, "message" => "Usuario creado y login exitoso"];
                } else {
                    return ["success" => false, "message" => "Error al crear usuario"];
                }
            }

        } catch (Exception $e) {
            return ["success" => false, "message" => "Error: " . $e->getMessage()];
        }
    }

    // ============================================
    // LOGOUT
    // ============================================
    public function logout() {
        session_start();
        session_destroy();
        return ["success" => true, "message" => "Sesión cerrada"];
    }

    // ============================================
    // OBTENER USUARIO ACTUAL
    // ============================================
    public function usuarioActual() {
        if (!isset($_SESSION['usuario_id'])) {
            return null;
        }

        $sql = "SELECT * FROM usuario WHERE id = :id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':id', $_SESSION['usuario_id'], PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // ============================================
    // VERIFICAR SESIÓN
    // ============================================
    public function verificarSesion() {
        return isset($_SESSION['usuario_id']);
    }

    // ============================================
    // OBTENER USUARIO POR ID
    // ============================================
    public function obtenerUsuario($id) {
        $sql = "SELECT * FROM usuario WHERE id = :id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}

?>
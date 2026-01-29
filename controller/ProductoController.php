<?php
require_once __DIR__ . "/../model/Conexion.php";

class ProductoController {
    private $conexion;

    public function __construct() {
        $db = new Conexion();
        $this->conexion = $db->getConexion();
    }

    // ============================================
    // OBTENER TODOS LOS PRODUCTOS
    // ============================================
    public function obtenerTodos() {
        try {
            $sql = "SELECT p.*, pl.nombre as plataforma_nombre 
                    FROM producto p
                    LEFT JOIN plataforma pl ON p.platform_id = pl.id
                    ORDER BY p.id DESC";
            $stmt = $this->conexion->prepare($sql);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return [];
        }
    }

    // ============================================
    // OBTENER PRODUCTOS POR PLATAFORMA
    // ============================================
    public function obtenerPorPlataforma($platform_id) {
        try {
            $sql = "SELECT p.*, pl.nombre as plataforma_nombre 
                    FROM producto p
                    LEFT JOIN plataforma pl ON p.platform_id = pl.id
                    WHERE p.platform_id = :platform_id
                    ORDER BY p.id DESC";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':platform_id', $platform_id, PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return [];
        }
    }

    // ============================================
    // OBTENER PRODUCTO POR ID
    // ============================================
    public function obtenerPorId($id) {
        try {
            $sql = "SELECT p.*, pl.nombre as plataforma_nombre, m.nombre as modo_nombre
                    FROM producto p
                    LEFT JOIN plataforma pl ON p.platform_id = pl.id
                    LEFT JOIN modo_juego m ON p.modo = m.id
                    WHERE p.id = :id";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return null;
        }
    }

    // ============================================
    // OBTENER GÉNEROS DE UN PRODUCTO
    // ============================================
    public function obtenerGeneros($producto_id) {
        try {
            $sql = "SELECT g.* FROM genero g
                    INNER JOIN producto_genero pg ON g.id = pg.id_genero
                    WHERE pg.id_producto = :producto_id";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':producto_id', $producto_id, PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return [];
        }
    }

    // ============================================
    // CALCULAR PRECIO CON DESCUENTO
    // ============================================
    public function calcularPrecioFinal($precio, $descuento) {
        if ($descuento > 0) {
            return $precio - ($precio * $descuento / 100);
        }
        return $precio;
    }

    // ============================================
    // OBTENER PLATAFORMAS
    // ============================================
    public function obtenerPlataformas() {
        try {
            $sql = "SELECT * FROM plataforma ORDER BY nombre";
            $stmt = $this->conexion->prepare($sql);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return [];
        }
    }

}

?>
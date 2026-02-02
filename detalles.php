<?php 
include("includes/a_config.php"); 
require_once __DIR__ . "/controller/ProductoController.php";
require_once __DIR__ . "/controller/CarritoController.php";

// Obtener el ID del producto
$productoId = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if (!$productoId) {
    header("Location: index.php");
    exit();
}

$productoController = new ProductoController();
$producto = $productoController->obtenerPorId($productoId);

// Si no existe el producto, redirigir
if (!$producto) {
    header("Location: index.php");
    exit();
}

// ✅ VARIABLES CON VALORES POR DEFECTO (evita warnings)
$titulo = $producto['titulo'] ?? 'Producto sin título';
$cover = $producto['cover'] ?? 'assets/img/placeholder.png';
$descripcion = $producto['descripcion'] ?? 'Sin descripción disponible';
$precio = $producto['precio'] ?? 0;
$descuento = $producto['descuento'] ?? 0;
$stock = $producto['stock'] ?? 0;
$plataformaNombre = $producto['plataforma_nombre'] ?? 'Sin plataforma';
$modoNombre = $producto['modo_nombre'] ?? 'Varios modos';
$fechaLanzamiento = $producto['fecha_lanzamiento'] ?? null;

// Calcular precio final con descuento
$precioFinal = $productoController->calcularPrecioFinal($precio, $descuento);
$precioOriginal = $precio;
$descuentoTexto = $descuento > 0 ? '-' . $descuento . '%' : '';

// Verificar si el usuario está logueado y si el producto está en el carrito
$idUsuario = $_SESSION['usuario_id'] ?? null;
$enCarrito = false;
if ($idUsuario) {
    $carritoController = new CarritoController();
    $enCarrito = $carritoController->productoEnCarrito($idUsuario, $productoId);
}

// Obtener géneros del producto
$generosProducto = $productoController->obtenerGenerosProducto($productoId);
$generosTexto = !empty($generosProducto) ? implode(', ', array_column($generosProducto, 'nombre')) : 'Sin especificar';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($titulo); ?> - Kairos</title>
    <?php include("includes/head-tag-contents.php"); ?>
</head>

<body>
    <!-- Header -->
    <header>
        <?php include("includes/navigation.php"); ?>
        <?php include("includes/carrito.php"); ?>
    </header>

    <!-- Main Content -->
    <main class="details-main">
        <div class="container-fluid">
            <div class="details-container">

                <!-- SECCIÓN SUPERIOR: IMAGEN + INFO DEL JUEGO -->
                <div class="row g-3 mb-4">
                    <!-- IMAGEN DEL PRODUCTO -->
                    <div class="col-12 col-lg-4">
                        <div class="details-image">
                            <img src="<?php echo htmlspecialchars($cover); ?>"
                                alt="<?php echo htmlspecialchars($titulo); ?>"
                                onerror="this.src='https://placehold.co/400x550/1c0538/ffffff?text=<?php echo urlencode($titulo); ?>'">

                            <!-- Badge de descuento (si existe) -->
                            <?php if ($descuentoTexto): ?>
                            <div class="details-discount-badge">
                                <?php echo $descuentoTexto; ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- INFO DEL PRODUCTO -->
                    <div class="col-12 col-lg-8">
                        <div class="details-info">
                            <h1 class="details-title"><?php echo htmlspecialchars($titulo); ?></h1>

                            <div class="details-meta">
                                <p><strong>Género:</strong> <?php echo htmlspecialchars($generosTexto); ?></p>
                                <p><strong>Modo:</strong> <?php echo htmlspecialchars($modoNombre); ?></p>
                                <?php if (!empty($fechaLanzamiento)): ?>
                                <p><strong>Lanzamiento:</strong>
                                    <?php echo date('d/m/Y', strtotime($fechaLanzamiento)); ?></p>
                                <?php endif; ?>
                                <?php if (!empty($plataformaNombre)): ?>
                                <p><strong>Plataforma:</strong>
                                    <?php echo htmlspecialchars($plataformaNombre); ?></p>
                                <?php endif; ?>
                            </div>

                            <div class="details-description">
                                <p><?php echo nl2br(htmlspecialchars($descripcion)); ?></p>
                            </div>

                            <div class="details-price-section">
                                <?php if ($descuento > 0): ?>
                                <!-- Precio con descuento -->
                                <div class="d-flex align-items-center gap-2 mb-2">
                                    <span class="text-decoration-line-through text-muted" style="font-size: 1.2rem;">
                                        <?php echo number_format($precioOriginal, 2); ?>€
                                    </span>
                                    <div class="details-price"><?php echo number_format($precioFinal, 2); ?>€</div>
                                </div>
                                <?php else: ?>
                                <!-- Precio normal -->
                                <div class="details-price"><?php echo number_format($precioFinal, 2); ?>€</div>
                                <?php endif; ?>

                                <!-- Botón añadir al carrito -->
                                <?php if ($stock > 0): ?>
                                <?php if ($idUsuario): ?>
                                <?php if ($enCarrito): ?>
                                <!-- Ya está en el carrito -->
                                <button class="details-add-btn" style="background: #10b981; cursor: default;" disabled>
                                    ✓ YA ESTÁ EN TU CARRITO
                                </button>
                                <a href="zona_pago.php" class="btn btn-primary w-100 mt-2">
                                    IR AL CARRITO
                                </a>
                                <?php else: ?>
                                <!-- Botón para añadir -->
                                <button class="details-add-btn btn-add-to-cart-detalle"
                                    data-product-id="<?php echo $productoId; ?>"
                                    data-product-name="<?php echo htmlspecialchars($titulo); ?>">
                                    AÑADIR AL CARRITO
                                </button>
                                <?php endif; ?>
                                <?php else: ?>
                                <!-- No está logueado -->
                                <a href="login.php" class="details-add-btn"
                                    style="text-decoration: none; display: block; text-align: center;">
                                    INICIA SESIÓN PARA COMPRAR
                                </a>
                                <?php endif; ?>
                                <?php else: ?>
                                <!-- Sin stock -->
                                <button class="details-add-btn" disabled
                                    style="opacity: 0.5; cursor: not-allowed; background: #666;">
                                    PRODUCTO AGOTADO
                                </button>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SECCIÓN DE REQUISITOS DEL SISTEMA -->
                <div class="row mb-3">
                    <div class="col-12">
                        <h2 class="requirements-title">REQUISITOS DEL SISTEMA</h2>
                    </div>
                </div>

                <div class="row g-3">
                    <!-- REQUISITOS MÍNIMOS -->
                    <div class="col-12 col-md-6">
                        <div class="requirements-card">
                            <h3 class="requirements-subtitle">MÍNIMOS</h3>
                            <ul class="requirements-list">
                                <li><strong>SO:</strong> Windows 10/11 64-bit</li>
                                <li><strong>Procesador:</strong> Intel i5-6600K / AMD Ryzen 5 1600</li>
                                <li><strong>Memoria:</strong> 8 GB RAM</li>
                                <li><strong>Gráficos:</strong> GTX 1050 Ti / RX 570</li>
                                <li><strong>Almacenamiento:</strong> 60 GB libres</li>
                            </ul>
                        </div>
                    </div>

                    <!-- REQUISITOS RECOMENDADOS -->
                    <div class="col-12 col-md-6">
                        <div class="requirements-card">
                            <h3 class="requirements-subtitle">RECOMENDADOS</h3>
                            <ul class="requirements-list">
                                <li><strong>SO:</strong> Windows 11 64-bit</li>
                                <li><strong>Procesador:</strong> Intel i7-8700 / Ryzen 5 3600</li>
                                <li><strong>Memoria:</strong> 16 GB RAM</li>
                                <li><strong>Gráficos:</strong> RTX 3060 / RX 6600 XT</li>
                                <li><strong>Almacenamiento:</strong> 80 GB SSD</li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <?php include("includes/footer.php"); ?>
    </footer>

    <script src="js/scripts.js"></script>
</body>

</html>
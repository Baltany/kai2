<?php include("includes/a_config.php"); 
require_once __DIR__ . "/controller/ProductoController.php";

$productoController = new ProductoController();
// PlayStation tiene ID 2 en la BD (según tu insert)
$productos = $productoController->obtenerPorPlataforma(2);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Playstation - Kairos</title>
    <?php include("includes/head-tag-contents.php"); ?>
</head>

<body>
    <!-- Header -->
    <header>
        <?php include("includes/navigation.php"); ?>
        <?php include("includes/carrito.php"); ?>
    </header>

    <!-- Main Content -->
    <main id="main-content">
        <section class="hero-banner">
            <!-- Contenedor del video -->
            <div class="banner-video-container">
                <!-- Video HTML5 sin controles por defecto -->
                <video class="banner-video" id="miVideo" muted loop playsinline poster="assets/img/banner-poster.jpg">
                    <source src="assets/video/play.mp4" type="video/mp4">
                    <img src="https://placehold.co/1200x400/6f12e0/ffffff?text=Banner+Kairos" alt="Banner Kairos"
                        class="banner-video">
                </video>

                <!-- Overlay oscuro -->
                <div class="banner-overlay"></div>

                <!-- Controles personalizados -->
                <div class="video-controles">
                    <!-- Botón Play/Pausa -->
                    <button class="control-btn control-play" id="btnPlayPausa" title="Play/Pausa">
                        <svg viewBox="0 0 24 24" width="24" height="24">
                            <path d="M8 5v14l11-7z" fill="currentColor" />
                        </svg>
                    </button>

                    <!-- Barra de progreso -->
                    <div class="progreso-container">
                        <div class="progreso-barra" id="progresoBarra">
                            <div class="progreso-relleno" id="progresoRelleno"></div>
                            <div class="progreso-handle" id="progresoHandle"></div>
                        </div>
                    </div>

                    <!-- Tiempo actual / Tiempo total -->
                    <span class="tiempo-video" id="tiempoVideo">00:00 / 00:00</span>

                    <!-- Botón Volumen -->
                    <button class="control-btn control-volumen" id="btnVolumen" title="Volumen">
                        <svg viewBox="0 0 24 24" width="20" height="20">
                            <path
                                d="M3 9v6h4l5 5V4L7 9H3zm13.5 3c0-1.77-1.02-3.29-2.5-4.03v8.05c1.48-.73 2.5-2.26 2.5-4.02zM14 3.23v2.06c2.89.86 5 3.54 5 6.71s-2.11 5.85-5 6.71v2.06c4.01-.91 7-4.49 7-8.77s-2.99-7.86-7-8.77z"
                                fill="currentColor" />
                        </svg>
                    </button>

                    <!-- Control de volumen -->
                    <input type="range" class="control-volumen-slider" id="volumenSlider" min="0" max="100" value="100"
                        title="Volumen">

                    <!-- Botón Pantalla completa -->
                    <button class="control-btn control-pantalla-completa" id="btnPantallaCompleta"
                        title="Pantalla completa">
                        <svg viewBox="0 0 24 24" width="20" height="20">
                            <path d="M7 14H5v5h5v-2H7v-3zm-2-4h2V7h3V5H5v5zm12 7h-3v2h5v-5h-2v3zM14 5v2h3v3h2V5h-5z"
                                fill="currentColor" />
                        </svg>
                    </button>
                </div>

                <!-- Contenido sobre el video (estilo Steam) -->
                <div class="banner-content">
                    <div class="banner-text">
                        <h1 class="banner-title">KAIROS</h1>
                        <p class="banner-subtitle">Tu tienda de videojuegos favorita</p>
                    </div>
                </div>
            </div>
        </section>



        <!-- Productos Grid -->
        <section class="productos-section">
            <div class="container-fluid">
                <div class="row g-5 justify-content-center">
                    <?php 
                    if (!empty($productos)) {
                        foreach ($productos as $producto) {
                            $precioFinal = $productoController->calcularPrecioFinal($producto['precio'], $producto['descuento']);
                            $descuentoTexto = $producto['descuento'] > 0 ? '-' . $producto['descuento'] . '%' : '';
                            ?>
                    <div class="col-12 col-sm-4 col-lg-3">
                        <?php 
                                $platformImage = $producto['cover'];
                                $productImage = $producto['cover'];
                                $discount = $descuentoTexto;
                                $price = number_format($precioFinal, 2) . '€';
                                $platformName = $producto['plataforma_nombre'] ?? 'Sin plataforma';
                                $productName = $producto['titulo'];
                                $productId = $producto['id'];
                                include("includes/product-card.php"); 
                                ?>
                    </div>
                    <?php
                        }
                    } else {
                        echo '<div class="col-12 text-center"><p>No hay productos disponibles para esta plataforma</p></div>';
                    }
                    ?>
                </div>
            </div>
        </section>

    </main>

    <!-- Footer -->
    <footer>
        <?php include("includes/footer.php"); ?>
    </footer>

    <script src="js/scripts.js"></script>
</body>

</html>
<?php 
include("includes/a_config.php"); 
require_once __DIR__ . "/controller/ProductoController.php";

$productoController = new ProductoController();

// Detectar si hay un filtro de plataforma
$platformId = isset($_GET['platform']) ? (int)$_GET['platform'] : null;

// Si hay plataforma seleccionada, obtener esos productos. Si no, obtener todos
if ($platformId) {
    $productos = $productoController->obtenerPorPlataforma($platformId);
    // Obtener nombre de la plataforma para el título
    $plataformas = $productoController->obtenerPlataformas();
    $nombrePlataforma = '';
    foreach ($plataformas as $plat) {
        if ($plat['id'] == $platformId) {
            $nombrePlataforma = $plat['nombre'];
            break;
        }
    }
} else {
    $productos = $productoController->obtenerTodos();
    $nombrePlataforma = '';
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kairos - Tienda de Productos Digitales</title>
    <?php include("includes/head-tag-contents.php"); ?>
</head>

<!-- Header -->
<header>
    <?php include("includes/navigation.php"); ?>
    <?php include("includes/carrito.php"); ?>
    <?php include("includes/valoracion.php"); ?>
</header>

<!-- Main Content -->
<main id="main-content">
    <section class="hero-banner">
        <!-- Contenedor del video -->
        <div class="banner-video-container">
            <!-- Video HTML5 sin controles por defecto -->
            <video class="banner-video" id="miVideo" muted loop playsinline poster="assets/img/banner-poster.jpg" aria-label="Tráiler promocional de videojuegos">
                <source src="assets/video/trailergta.mp4" type="video/mp4">
                <p>Tu navegador no soporta video HTML5. <a href="assets/video/trailergta.mp4">Descargar el vídeo</a>.</p>
            </video>

            <!-- Overlay oscuro -->
            <div class="banner-overlay"></div>

            <!-- Controles personalizados -->
            <div class="video-controles">
                <!-- Botón Play/Pausa -->
                <button class="control-btn control-play" id="btnPlayPausa" aria-label="Reproducir o pausar vídeo">
                    <svg viewBox="0 0 24 24" width="24" height="24" aria-hidden="true">
                        <path d="M8 5v14l11-7z" fill="currentColor" />
                    </svg>
                </button>

                <!-- Barra de progreso -->
                <div class="progreso-container" role="progressbar" aria-label="Progreso del vídeo">
                    <div class="progreso-barra" id="progresoBarra">
                        <div class="progreso-relleno" id="progresoRelleno"></div>
                        <div class="progreso-handle" id="progresoHandle"></div>
                    </div>
                </div>

                <!-- Tiempo actual / Tiempo total -->
                <span class="tiempo-video" id="tiempoVideo">00:00 / 00:00</span>

                <!-- Botón Volumen -->
                <button class="control-btn control-volumen" id="btnVolumen" aria-label="Activar o silenciar volumen">
                    <svg viewBox="0 0 24 24" width="20" height="20" aria-hidden="true">
                        <path
                            d="M3 9v6h4l5 5V4L7 9H3zm13.5 3c0-1.77-1.02-3.29-2.5-4.03v8.05c1.48-.73 2.5-2.26 2.5-4.02zM14 3.23v2.06c2.89.86 5 3.54 5 6.71s-2.11 5.85-5 6.71v2.06c4.01-.91 7-4.49 7-8.77s-2.99-7.86-7-8.77z"
                            fill="currentColor" />
                    </svg>
                </button>

                <!-- Control de volumen -->
                <label for="volumenSlider" class="visually-hidden">Control de volumen</label>
                <input type="range" class="control-volumen-slider" id="volumenSlider" min="0" max="100" value="100"
                    aria-label="Control de volumen">

                <!-- Botón Pantalla completa -->
                <button class="control-btn control-pantalla-completa" id="btnPantallaCompleta"
                    aria-label="Pantalla completa">
                    <svg viewBox="0 0 24 24" width="20" height="20" aria-hidden="true">
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
            <!-- Título si hay filtro activo -->
            <?php if ($nombrePlataforma): ?>
            <div class="filtro-activo-header">
                <h2 class="filtro-titulo">Juegos de <?php echo htmlspecialchars($nombrePlataforma); ?></h2>
                <a href="index.php" class="btn-volver">← Volver a todos los productos</a>
            </div>
            <?php endif; ?>

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
                        echo '<div class="col-12 text-center"><p class="no-productos">No hay productos disponibles</p></div>';
                    }
                    ?>
            </div>
        </div>
    </section>



    <!-- Sección del Juego Interactivo -->
    <section class="juego-section">
        <div class="container-fluid">
            <h2 class="juego-titulo">🎮 Juega y Diviértete 🎮</h2>
            <p class="juego-descripcion">Atrapa los videojuegos que caen y demuestra tus habilidades</p>

            <div class="juego-iframe-container">
                <iframe class="juego-iframe" src="juegoRa3/juego.php" title="Juego Tienda de Videojuegos"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture">
                </iframe>
            </div>
        </div>
    </section>

    <!-- Sección Ubicación -->
    <section class="ubicacion-section">
        <div class="ubicacion-contenedor">
            <!-- Información de contacto -->
            <div class="ubicacion-info">
                <h2 class="ubicacion-subtitulo">Dónde nos encontramos</h2>

                <div class="info-item">
                    <h3>📍 Dirección</h3>
                    <p>Calle Principal, 123<br>
                        28001 Madrid, España</p>
                </div>

                <div class="info-item">
                    <h3>📞 Teléfono</h3>
                    <p><a href="tel:+34912345678">+34 91 234 56 78</a></p>
                </div>

                <div class="info-item">
                    <h3>✉️ Email</h3>
                    <p><a href="mailto:info@kairos.com">info@kairos.com</a></p>
                </div>

                <div class="info-item">
                    <h3>🕐 Horario</h3>
                    <p>Lunes a Viernes: 10:00 - 21:00<br>
                        Sábado: 10:00 - 22:00<br>
                        Domingo: 12:00 - 20:00</p>
                </div>
            </div>

            <!-- Google Maps IFRAME -->
            <div class="ubicacion-mapa">
                <iframe class="google-maps-iframe"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3037.2508915848996!2d-3.7033400234510095!3d40.41678134230269!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2sKairos%20-%20Tienda%20de%20Videojuegos!5e0!3m2!1ses!2ses!4v1234567890123"
                    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                    title="Ubicación de Kairos">
                </iframe>
            </div>
        </div>
    </section>
</main>

<!-- Footer -->
<footer>
    <?php include("includes/footer.php"); ?>
</footer>

<script src="js/scripts.js"></script>
<?php 
    require_once __DIR__ . "/cookie_manager.php";

    // Modal de aceptación de cookies (solo después de login)
    echo CookieManager::generarModalCookies();
    ?>
</body>

</html>
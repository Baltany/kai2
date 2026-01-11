<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kairos - Tienda de Productos Digitales</title>
    <?php include("includes/head-tag-contents.php"); ?>
</head>
<body>
    <!-- Header -->
    <header>
        <?php include("includes/navigation.php"); ?>
        <?php include("includes/carrito.php"); ?>
    </header>

    <!-- Main Content -->
    <main>
        <!-- Banner/Hero Section -->

        <section class="hero-banner">
            <!-- Contenedor del video de YouTube -->
            <div class="banner-video-container">
                <!-- Video de YouTube responsive tipo Steam -->
                <iframe class="banner-youtube" 
src="https://www.youtube.com/embed/QdBZY2fkU-0?autoplay=1&mute=1&l?autoplay=1&mute=1&loop=1&playlist=QdBZY2fkU-0&controls=0&modestbranding=1oop=1&playlist=QdBZY2fkU-0&controls=0&modestbranding=1"                    frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen
                    title="Kairos - Tienda de Videojuegos">
                </iframe>

                <!-- Overlay oscuro para mejorar legibilidad del contenido -->
                <div class="banner-overlay"></div>

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
                    <!-- Producto 1 -->
                    <div class="col-12 col-sm-4 col-lg-3">
                        <?php 
                        $platformImage = 'assets/img/fc26.jpg';
                        $productImage = 'assets/img/fc26.jpg';
                        $discount = '-30%';
                        $price = '39.99€';
                        $platformName = 'Steam';
                        include("includes/product-card.php"); 
                        ?>
                    </div>

                    <!-- Producto 2 -->
                    <div class="col-12 col-sm-4 col-lg-3">
                        <?php 
                        $platformImage = 'assets/img/fc26.jpg';
                        $productImage = 'assets/img/fc26.jpg';
                        $discount = '-30%';
                        $price = '39.99€';
                        $platformName = 'Steam';
                        include("includes/product-card.php"); 
                        ?>
                    </div>

                    <!-- Producto 3 -->
                    <div class="col-12 col-sm-4 col-lg-3">
                        <?php 
                        $platformImage = 'assets/img/fc26.jpg';
                        $productImage = 'assets/img/fc26.jpg';
                        $discount = '-30%';
                        $price = '39.99€';
                        $platformName = 'Steam';
                        include("includes/product-card.php"); 
                        ?>
                    </div>

                    <!-- Producto 4 -->
                    <div class="col-12 col-sm-4 col-lg-3">
                        <?php 
                        $platformImage = 'assets/img/fc26.jpg';
                        $productImage = 'assets/img/fc26.jpg';
                        $discount = '-30%';
                        $price = '39.99€';
                        $platformName = 'Steam';
                        include("includes/product-card.php"); 
                        ?>
                    </div>

                    <!-- Producto 5 -->
                    <div class="col-12 col-sm-4 col-lg-3">
                        <?php 
                        $platformImage = 'assets/img/fc26.jpg';
                        $productImage = 'assets/img/fc26.jpg';
                        $discount = '-30%';
                        $price = '39.99€';
                        $platformName = 'Steam';
                        include("includes/product-card.php"); 
                        ?>
                    </div>

                    <!-- Producto 6 -->
                    <div class="col-12 col-sm-4 col-lg-3">
                        <?php 
                        $platformImage = 'assets/img/fc26.jpg';
                        $productImage = 'assets/img/fc26.jpg';
                        $discount = '-30%';
                        $price = '39.99€';
                        $platformName = 'Steam';
                        include("includes/product-card.php"); 
                        ?>
                    </div>

                    <!-- Producto 7 -->
                    <div class="col-12 col-sm-4 col-lg-3">
                        <?php 
                        $platformImage = 'assets/img/fc26.jpg';
                        $productImage = 'assets/img/fc26.jpg';
                        $discount = '-30%';
                        $price = '39.99€';
                        $platformName = 'Steam';
                        include("includes/product-card.php"); 
                        ?>
                    </div>

                    <!-- Producto 8 -->
                    <div class="col-12 col-sm-4 col-lg-3">
                        <?php 
                        $platformImage = 'assets/img/fc26.jpg';
                        $productImage = 'assets/img/fc26.jpg';
                        $discount = '-30%';
                        $price = '39.99€';
                        $platformName = 'Steam';
                        include("includes/product-card.php"); 
                        ?>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sección del Juego Interactivo -->
        <section class="juego-section">
            <div class="container-fluid">
                <h2 class="juego-titulo">🎮 Juega y Diviértete 🎮</h2>
                <p class="juego-descripcion">Atrapa los videojuegos que caen y demuestra tus habilidades</p>
                
                <div class="juego-iframe-container">
                    <iframe class="juego-iframe" 
                        src="juegoRa3/juego.php" 
                        title="Juego Tienda de Videojuegos"
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
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade"
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
</body>
</html>
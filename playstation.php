<?php include("includes/a_config.php"); ?>
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
    <main>
        <!-- Banner/Hero Section -->
        <section class="hero-banner">
            <!-- Contenedor del video de YouTube -->
            <div class="banner-video-container">
                <!-- Video de YouTube responsive tipo Steam -->
                <iframe class="banner-youtube" 
src="https://www.youtube.com/embed/1BU4VXofbQk?autoplay=1&mute=1"                    frameborder="0" 
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
                        $platformImage = 'assets/img/pslogo.png';
                        $productImage = 'assets/img/pslogo.png';
                        $discount = '-25%';
                        $price = '49.99€';
                        $platformName = 'Nintendo';
                        include("includes/product-card.php"); 
                        ?>
                    </div>

                    <!-- Producto 2 -->
                    <div class="col-12 col-sm-4 col-lg-3">
                        <?php 
                        $platformImage = 'assets/img/pslogo.png';
                        $productImage = 'assets/img/pslogo.png';
                        $discount = '-25%';
                        $price = '49.99€';
                        $platformName = 'Nintendo';
                        include("includes/product-card.php"); 
                        ?>
                    </div>

                    <!-- Producto 3 -->
                    <div class="col-12 col-sm-4 col-lg-3">
                        <?php 
                        $platformImage = 'assets/img/pslogo.png';
                        $productImage = 'assets/img/pslogo.png';
                        $discount = '-25%';
                        $price = '49.99€';
                        $platformName = 'Nintendo';
                        include("includes/product-card.php"); 
                        ?>
                    </div>

                    <!-- Producto 4 -->
                    <div class="col-12 col-sm-4 col-lg-3">
                        <?php 
                        $platformImage = 'assets/img/pslogo.png';
                        $productImage = 'assets/img/pslogo.png';
                        $discount = '-25%';
                        $price = '49.99€';
                        $platformName = 'Nintendo';
                        include("includes/product-card.php"); 
                        ?>
                    </div>

                    <!-- Producto 5 -->
                    <div class="col-12 col-sm-4 col-lg-3">
                        <?php 
                        $platformImage = 'assets/img/pslogo.png';
                        $productImage = 'assets/img/pslogo.png';
                        $discount = '-25%';
                        $price = '49.99€';
                        $platformName = 'Nintendo';
                        include("includes/product-card.php"); 
                        ?>
                    </div>

                    <!-- Producto 6 -->
                    <div class="col-12 col-sm-4 col-lg-3">
                        <?php 
                        $platformImage = 'assets/img/pslogo.png';
                        $productImage = 'assets/img/pslogo.png';
                        $discount = '-25%';
                        $price = '49.99€';
                        $platformName = 'Nintendo';
                        include("includes/product-card.php"); 
                        ?>
                    </div>

                    <!-- Producto 7 -->
                    <div class="col-12 col-sm-4 col-lg-3">
                        <?php 
                        $platformImage = 'assets/img/pslogo.png';
                        $productImage = 'assets/img/pslogo.png';
                        $discount = '-25%';
                        $price = '49.99€';
                        $platformName = 'Nintendo';
                        include("includes/product-card.php"); 
                        ?>
                    </div>

                    <!-- Producto 8 -->
                    <div class="col-12 col-sm-4 col-lg-3">
                        <?php 
                        $platformImage = 'assets/img/pslogo.png';
                        $productImage = 'assets/img/pslogo.png';
                        $discount = '-25%';
                        $price = '49.99€';
                        $platformName = 'Nintendo';
                        include("includes/product-card.php"); 
                        ?>
                    </div>
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
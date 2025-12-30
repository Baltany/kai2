<?php 
// ARCHIVO: xbox.php
include("includes/a_config.php"); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xbox - Kairos</title>
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
            <img src="assets/img/placeholder.png" 
                 onerror="this.src='https://placehold.co/1200x400/6f12e0/ffffff?text=Banner+Xbox'" 
                 alt="Banner Xbox"
                 class="banner-img">
        </section>

        <!-- Productos Grid -->
        <section class="productos-section">
            <div class="container-fluid">
                <div class="row g-5 justify-content-center">
                    <!-- Producto 1 -->
                    <div class="col-12 col-sm-4 col-lg-3">
                        <?php 
                        $platformImage = 'assets/img/steam.png';
                        $productImage = 'assets/img/steam.png';
                        $discount = '-20%';
                        $price = '59.99€';
                        $platformName = 'Xbox';
                        include("includes/product-card.php"); 
                        ?>
                    </div>

                    <!-- Producto 2 -->
                    <div class="col-12 col-sm-4 col-lg-3">
                        <?php 
                        $platformImage = 'assets/img/steam.png';
                        $productImage = 'assets/img/steam.png';
                        $discount = '-20%';
                        $price = '59.99€';
                        $platformName = 'Xbox';
                        include("includes/product-card.php"); 
                        ?>
                    </div>

                    <!-- Producto 3 -->
                    <div class="col-12 col-sm-4 col-lg-3">
                        <?php 
                        $platformImage = 'assets/img/steam.png';
                        $productImage = 'assets/img/steam.png';
                        $discount = '-20%';
                        $price = '59.99€';
                        $platformName = 'Xbox';
                        include("includes/product-card.php"); 
                        ?>
                    </div>

                    <!-- Producto 4 -->
                    <div class="col-12 col-sm-4 col-lg-3">
                        <?php 
                        $platformImage = 'assets/img/steam.png';
                        $productImage = 'assets/img/steam.png';
                        $discount = '-20%';
                        $price = '59.99€';
                        $platformName = 'Xbox';
                        include("includes/product-card.php"); 
                        ?>
                    </div>

                    <!-- Producto 5 -->
                    <div class="col-12 col-sm-4 col-lg-3">
                        <?php 
                        $platformImage = 'assets/img/steam.png';
                        $productImage = 'assets/img/steam.png';
                        $discount = '-20%';
                        $price = '59.99€';
                        $platformName = 'Xbox';
                        include("includes/product-card.php"); 
                        ?>
                    </div>

                    <!-- Producto 6 -->
                    <div class="col-12 col-sm-4 col-lg-3">
                        <?php 
                        $platformImage = 'assets/img/steam.png';
                        $productImage = 'assets/img/steam.png';
                        $discount = '-20%';
                        $price = '59.99€';
                        $platformName = 'Xbox';
                        include("includes/product-card.php"); 
                        ?>
                    </div>

                    <!-- Producto 7 -->
                    <div class="col-12 col-sm-4 col-lg-3">
                        <?php 
                        $platformImage = 'assets/img/steam.png';
                        $productImage = 'assets/img/steam.png';
                        $discount = '-20%';
                        $price = '59.99€';
                        $platformName = 'Xbox';
                        include("includes/product-card.php"); 
                        ?>
                    </div>

                    <!-- Producto 8 -->
                    <div class="col-12 col-sm-4 col-lg-3">
                        <?php 
                        $platformImage = 'assets/img/steam.png';
                        $productImage = 'assets/img/steam.png';
                        $discount = '-20%';
                        $price = '59.99€';
                        $platformName = 'Xbox';
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
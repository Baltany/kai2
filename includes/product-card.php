<?php
// Variables por defecto si no se pasan desde la página
$platform = $platform ?? 'steam';
$platformImage = $platformImage ?? 'assets/img/platforms/steam.png';
$productImage = $productImage ?? 'assets/img/products/default.png';
$discount = $discount ?? '-30%';
$price = $price ?? '39.99€';
$platformName = $platformName ?? 'Steam';
?>

<div class="product-card">
    <div class="product-card-inner">
        <div class="product-card-media">
            <!-- Logo de la plataforma -->
            <div class="product-card-platform">
                <img src="<?php echo $platformImage; ?>" alt="<?php echo $platformName; ?>">
            </div>
            
            <!-- Descuento -->
            <div class="product-card-discount">
                <?php echo $discount; ?>
            </div>
            
            <!-- Imagen del producto -->
            <img class="product-card-cover"
                 src="<?php echo $productImage; ?>"
                 onerror="this.src='https://placehold.co/200x200/5e3a8b/ffffff?text=<?php echo $platformName; ?>'"
                 alt="Producto <?php echo $platformName; ?>">
        </div>

        <div class="product-card-bottom">
            <div class="product-card-price">
                <?php echo $price; ?>
            </div>
            <a class="product-card-button" href="detalles.php">
                AÑADIR AL CARRITO
            </a>
        </div>
    </div>
</div>
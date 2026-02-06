<?php
// Variables por defecto si no se pasan desde la página
$platform = $platform ?? 'steam';
$platformImage = $platformImage ?? 'assets/img/platforms/steam.png';
$productImage = $productImage ?? 'assets/img/products/default.png';
$discount = $discount ?? '-30%';
$price = $price ?? '39.99€';
$platformName = $platformName ?? 'Steam';
$productName = $productName ?? 'Producto';
$productId = $productId ?? '#';
?>
<div class="product-card">
    <div class="product-card-inner">
        <!-- Imagen clickeable que lleva a detalles -->
        <a href="detalles.php?id=<?php echo $productId; ?>" class="product-card-media-link">
            <div class="product-card-media">
                <!-- Logo de la plataforma -->
                <div class="product-card-platform">
                    <img src="<?php echo $platformImage; ?>" alt="<?php echo $platformName; ?>">
                </div>

                <!-- Descuento -->
                <?php if (!empty($discount) && $discount !== ''): ?>
                <div class="product-card-discount">
                    <?php echo $discount; ?>
                </div>
                <?php endif; ?>

                <!-- Imagen del producto -->
                <img class="product-card-cover" src="<?php echo $productImage; ?>"
                    onerror="this.src='https://placehold.co/200x200/5e3a8b/ffffff?text=<?php echo urlencode($productName); ?>'"
                    alt="<?php echo $productName; ?>">
            </div>
        </a>

        <div class="product-card-bottom">
            <div class="product-card-price">
                <?php echo $price; ?>
            </div>

            <!-- Botón Valorar -->
            <button class="product-card-button btn-valorar"
                onclick="abrirModalValoracion(<?php echo $productId; ?>, '<?php echo htmlspecialchars($productName); ?>')">
                ⭐ VALORAR
            </button>


            <!-- Botón añadir al carrito -->
            <button class="product-card-button btn-add-to-cart" data-product-id="<?php echo $productId; ?>"
                data-product-name="<?php echo htmlspecialchars($productName); ?>">
                🛒 AÑADIR AL CARRITO
            </button>
        </div>
    </div>
</div>
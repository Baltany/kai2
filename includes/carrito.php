<?php
// includes/carrito.php - Offcanvas Bootstrap (abre de derecha a izquierda)
?>

<!-- Offcanvas Carrito (se abre de derecha a izquierda) -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="cartModal" aria-labelledby="cartModalLabel">
    <!-- Header -->
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="cartModalLabel">Tu Carrito</h5>
        <button type="button" id="closeCartModal" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Cerrar"></button>
    </div>

    <!-- Body - Lista de productos -->
    <div class="offcanvas-body">
        <div class="product-list" id="productList">
            
            <!-- Producto 1 -->
            <div class="list-group-item elemento-carrito" data-product-id="1" data-price="99">
                <div class="d-flex gap-3">
                    <!-- Imagen -->
                    <div class="flex-shrink-0">
                        <img src="assets/img/fc26.jpg" alt="EA Sports FC 26" 
                             class="car-tula rounded" style="width: 70px; height: 70px; object-fit: cover;">
                    </div>
                    
                    <!-- Información -->
                    <div class="flex-grow-1">
                        <h6 class="mb-1 producto-title">EA Sports FC 26</h6>
                        <p class="mb-0 product-price">99€</p>
                    </div>
                    
                    <!-- Acciones: Cantidad + Eliminar -->
                    <div class="d-flex align-items-center gap-2">
                        <!-- Control de cantidad -->
                        <div class="item-quantity">
                            <button class="quantity-btn decrement-btn" aria-label="Disminuir cantidad">−</button>
                            <span class="quantity-display" data-quantity>1</span>
                            <button class="quantity-btn increment-btn" aria-label="Aumentar cantidad">+</button>
                        </div>
                        
                        <!-- Botón eliminar -->
                        <button class="btn btn-sm remove-item-btn" aria-label="Eliminar producto">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Producto 2 -->
            <div class="list-group-item elemento-carrito" data-product-id="2" data-price="49">
                <div class="d-flex gap-3">
                    <div class="flex-shrink-0">
                        <img src="assets/img/fc26.jpg" alt="God of War" 
                             class="car-tula rounded" style="width: 70px; height: 70px; object-fit: cover;">
                    </div>
                    
                    <div class="flex-grow-1">
                        <h6 class="mb-1 producto-title">God of War</h6>
                        <p class="mb-0 product-price">49€</p>
                    </div>
                    
                    <div class="d-flex align-items-center gap-2">
                        <div class="item-quantity">
                            <button class="quantity-btn decrement-btn" aria-label="Disminuir cantidad">−</button>
                            <span class="quantity-display" data-quantity>2</span>
                            <button class="quantity-btn increment-btn" aria-label="Aumentar cantidad">+</button>
                        </div>
                        
                        <button class="btn btn-sm remove-item-btn" aria-label="Eliminar producto">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Producto 3 -->
            <div class="list-group-item elemento-carrito" data-product-id="3" data-price="19">
                <div class="d-flex gap-3">
                    <div class="flex-shrink-0">
                        <img src="assets/img/fc26.jpg" alt="The Witcher 3" 
                             class="car-tula rounded" style="width: 70px; height: 70px; object-fit: cover;">
                    </div>
                    
                    <div class="flex-grow-1">
                        <h6 class="mb-1 producto-title">The Witcher 3</h6>
                        <p class="mb-0 product-price">19€</p>
                    </div>
                    
                    <div class="d-flex align-items-center gap-2">
                        <div class="item-quantity">
                            <button class="quantity-btn decrement-btn" aria-label="Disminuir cantidad">−</button>
                            <span class="quantity-display" data-quantity>1</span>
                            <button class="quantity-btn increment-btn" aria-label="Aumentar cantidad">+</button>
                        </div>
                        
                        <button class="btn btn-sm remove-item-btn" aria-label="Eliminar producto">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Footer - Subtotal y botones -->
    <div class="offcanvas-footer">
        <div class="w-100">
            <!-- Subtotal -->
            <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="subtotal-text">Subtotal:</span>
                <span class="subtotal-price" id="subtotalPrice">0€</span>
            </div>

            <!-- Botones -->
            <div class="d-grid gap-2">
                <a href="zonadepago.php" class="btn btn-primary btn-lg fw-bold">
                    COMPRAR
                </a>
                <button type="button" class="btn btn-outline-secondary btn-lg fw-bold" id="removeAllItems">
                    ELIMINAR TODOS
                </button>
            </div>
        </div>
    </div>
</div>
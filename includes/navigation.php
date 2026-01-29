<nav class="kairos-header fixed-top">
    <div class="kairos-header-container">

        <!-- Logo -->
        <a class="kairos-logo" href="index.php">
            <img src="assets/img/logo150.png" alt="Kairos Logo">
        </a>

        <!-- Barra grande: menú + buscador + lupa -->
        <div class="kairos-bar">
            <div class="kairos-menu-wrapper dropdown">
                <button class="kairos-menu-btn dropdown-toggle" type="button" id="kairosMenuDropdown"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-bars"></i>
                </button>

                <ul class="dropdown-menu kairos-menu-dropdown" aria-labelledby="kairosMenuDropdown">
                    <li><a class="dropdown-item" href="steam.php">Steam</a></li>
                    <li><a class="dropdown-item" href="playstation.php">PlayStation</a></li>
                    <li><a class="dropdown-item" href="xbox.php">Xbox</a></li>
                    <li><a class="dropdown-item" href="nintendo.php">Nintendo</a></li>
                    <li><a class="dropdown-item" href="plataformas.php">Otros</a></li>
                </ul>
            </div>

            <div class="kairos-search">
                <input type="text" placeholder="Busca tus juegos favoritos...">
            </div>

            <button class="kairos-search-btn" type="button">
                <i class="fas fa-search"></i>
            </button>
        </div>

        <!-- Barra pequeña: usuario + carrito -->
        <div class="kairos-actions-bar">
            <button class="kairos-action-btn" type="button" onclick="window.location.href='login.php'">
                <i class="fas fa-user"></i>
            </button>
            <a class="kairos-action-btn" href="logout.php">
                <i class="bi bi-box-arrow-right"></i>
            </a>
            <a class="kairos-action-btn" href="wishlist.php">
                <i class="fas fa-star"></i>
            </a>
            <a class="kairos-action-btn" href="recibos.php">
                <i class="fas fa-receipt"></i>
            </a>
            <a class="kairos-action-btn" href="devoluciones.php">
                <i class="fas fa-box-open"></i>
            </a>
            <button class="kairos-action-btn" type="button" id="openCartModal" title="Carrito">
                <i class="fas fa-shopping-cart"></i>
            </button>
        </div>

    </div>
</nav>
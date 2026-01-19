-- ============================================
-- CREAR TABLAS
-- ============================================

-- ROLES
CREATE TABLE roles (
    id_rol INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50) UNIQUE NOT NULL,
    descripcion VARCHAR(255)
);

-- USUARIOS
CREATE TABLE usuarios (
    id_usuario INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    apellido1 VARCHAR(100) NOT NULL,
    apellido2 VARCHAR(100),
    email VARCHAR(100) UNIQUE NOT NULL,
    fecha_nacimiento DATE NOT NULL,
    pais VARCHAR(100) NOT NULL,
    codigo_postal VARCHAR(10) NOT NULL,
    telefono VARCHAR(15) NOT NULL,
    id_rol INT NOT NULL DEFAULT 3,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    activo BOOLEAN DEFAULT TRUE,
    FOREIGN KEY (id_rol) REFERENCES roles(id_rol)
);

-- PLATAFORMAS
CREATE TABLE plataformas (
    id_plataforma INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50) UNIQUE NOT NULL,
    descripcion VARCHAR(255)
);

-- JUEGOS
CREATE TABLE juegos (
    id_juego INT PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(150) NOT NULL,
    descripcion TEXT,
    precio DECIMAL(10, 2) NOT NULL,
    id_plataforma INT NOT NULL,
    stock INT NOT NULL DEFAULT 0,
    imagen VARCHAR(255),
    fecha_lanzamiento DATE,
    FOREIGN KEY (id_plataforma) REFERENCES plataformas(id_plataforma)
);

-- CONTENIDOS (Noticias/Artículos)
CREATE TABLE contenidos (
    id_contenido INT PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(200) NOT NULL,
    texto LONGTEXT NOT NULL,
    imagen VARCHAR(255),
    id_usuario INT NOT NULL,
    fecha_publicacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    fecha_actualizacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    estado VARCHAR(50) DEFAULT 'borrador',
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario) ON DELETE CASCADE
);

-- VALORACIONES
CREATE TABLE valoraciones (
    id_valoracion INT PRIMARY KEY AUTO_INCREMENT,
    id_contenido INT NOT NULL,
    id_usuario INT NOT NULL,
    puntuacion INT NOT NULL CHECK (puntuacion >= 1 AND puntuacion <= 5),
    comentario TEXT,
    fecha_valoracion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_contenido) REFERENCES contenidos(id_contenido) ON DELETE CASCADE,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario) ON DELETE CASCADE,
    UNIQUE(id_contenido, id_usuario)
);

-- CARRITO
CREATE TABLE carrito (
    id_carrito INT PRIMARY KEY AUTO_INCREMENT,
    id_usuario INT NOT NULL,
    id_juego INT NOT NULL,
    cantidad INT NOT NULL DEFAULT 1,
    fecha_agregado TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario) ON DELETE CASCADE,
    FOREIGN KEY (id_juego) REFERENCES juegos(id_juego) ON DELETE CASCADE,
    UNIQUE(id_usuario, id_juego)
);

-- WISHLIST
CREATE TABLE wishlist (
    id_wishlist INT PRIMARY KEY AUTO_INCREMENT,
    id_usuario INT NOT NULL,
    id_juego INT NOT NULL,
    fecha_agregado TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario) ON DELETE CASCADE,
    FOREIGN KEY (id_juego) REFERENCES juegos(id_juego) ON DELETE CASCADE,
    UNIQUE(id_usuario, id_juego)
);

-- PEDIDOS
CREATE TABLE pedidos (
    id_pedido INT PRIMARY KEY AUTO_INCREMENT,
    id_usuario INT NOT NULL,
    total DECIMAL(10, 2) NOT NULL,
    estado VARCHAR(50) DEFAULT 'pendiente',
    fecha_pedido TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario) ON DELETE CASCADE
);

-- DETALLES PEDIDOS
CREATE TABLE detalles_pedidos (
    id_detalle INT PRIMARY KEY AUTO_INCREMENT,
    id_pedido INT NOT NULL,
    id_juego INT NOT NULL,
    cantidad INT NOT NULL,
    precio_unitario DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (id_pedido) REFERENCES pedidos(id_pedido) ON DELETE CASCADE,
    FOREIGN KEY (id_juego) REFERENCES juegos(id_juego) ON DELETE CASCADE
);

-- RECIBOS
CREATE TABLE recibos (
    id_recibo INT PRIMARY KEY AUTO_INCREMENT,
    id_pedido INT NOT NULL UNIQUE,
    numero_recibo VARCHAR(50) UNIQUE NOT NULL,
    fecha_emision TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    metodo_pago VARCHAR(50),
    FOREIGN KEY (id_pedido) REFERENCES pedidos(id_pedido) ON DELETE CASCADE
);

-- DEVOLUCIONES
CREATE TABLE devoluciones (
    id_devolucion INT PRIMARY KEY AUTO_INCREMENT,
    id_pedido INT NOT NULL,
    razon VARCHAR(255) NOT NULL,
    estado VARCHAR(50) DEFAULT 'solicitada',
    fecha_solicitud TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    fecha_procesado TIMESTAMP,
    FOREIGN KEY (id_pedido) REFERENCES pedidos(id_pedido) ON DELETE CASCADE
);

-- COOKIES (Registro de consentimiento)
CREATE TABLE cookies (
    id_cookie INT PRIMARY KEY AUTO_INCREMENT,
    id_usuario INT,
    tipo VARCHAR(50) NOT NULL,
    valor VARCHAR(50) NOT NULL,
    fecha_aceptacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario) ON DELETE CASCADE
);

-- NEWSLETTER
CREATE TABLE newsletter (
    id_newsletter INT PRIMARY KEY AUTO_INCREMENT,
    id_usuario INT NOT NULL,
    suscrito BOOLEAN DEFAULT TRUE,
    fecha_suscripcion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario) ON DELETE CASCADE,
    UNIQUE(id_usuario)
);

-- ÍNDICES PARA OPTIMIZAR BÚSQUEDAS
CREATE INDEX idx_usuarios_email ON usuarios(email);
CREATE INDEX idx_usuarios_username ON usuarios(username);
CREATE INDEX idx_usuarios_rol ON usuarios(id_rol);
CREATE INDEX idx_juegos_plataforma ON juegos(id_plataforma);
CREATE INDEX idx_contenidos_usuario ON contenidos(id_usuario);
CREATE INDEX idx_contenidos_estado ON contenidos(estado);
CREATE INDEX idx_valoraciones_contenido ON valoraciones(id_contenido);
CREATE INDEX idx_valoraciones_usuario ON valoraciones(id_usuario);
CREATE INDEX idx_carrito_usuario ON carrito(id_usuario);
CREATE INDEX idx_wishlist_usuario ON wishlist(id_usuario);
CREATE INDEX idx_pedidos_usuario ON pedidos(id_usuario);
CREATE INDEX idx_recibos_pedido ON recibos(id_pedido);
CREATE INDEX idx_devoluciones_pedido ON devoluciones(id_pedido);
CREATE INDEX idx_newsletter_usuario ON newsletter(id_usuario);

-- ============================================
-- INSERTAR DATOS DE PRUEBA
-- ============================================

-- ROLES
INSERT INTO roles (nombre, descripcion) VALUES 
('administrador', 'Acceso total al sistema y backend'),
('editor', 'Puede crear y editar contenidos'),
('valorador', 'Solo puede valorar contenidos');

-- USUARIOS (Contraseñas hasheadas con password_hash)
INSERT INTO usuarios (username, password, nombre, apellido1, apellido2, email, fecha_nacimiento, pais, codigo_postal, telefono, id_rol) VALUES
('admin', '$2y$10$PZJh0K8e9s2wH7Q5mV3N0OqWxY1Z2A3B4C5D6E7F8G9H0I1J2K3L4', 'Admin', 'Sistema', 'Principal', 'admin@tienda.com', '1990-01-15', 'España', '28001', '600123456', 1),
('editor_juan', '$2y$10$PZJh0K8e9s2wH7Q5mV3N0OqWxY1Z2A3B4C5D6E7F8G9H0I1J2K3L4', 'Juan', 'García', 'López', 'juan@tienda.com', '1992-05-20', 'España', '08002', '601234567', 2),
('usuario_maria', '$2y$10$PZJh0K8e9s2wH7Q5mV3N0OqWxY1Z2A3B4C5D6E7F8G9H0I1J2K3L4', 'María', 'Rodríguez', 'Martínez', 'maria@email.com', '1995-11-10', 'España', '46001', '602345678', 3),
('usuario_carlos', '$2y$10$PZJh0K8e9s2wH7Q5mV3N0OqWxY1Z2A3B4C5D6E7F8G9H0I1J2K3L4', 'Carlos', 'López', 'García', 'carlos@email.com', '1988-03-25', 'España', '41001', '603456789', 3),
('usuario_ana', '$2y$10$PZJh0K8e9s2wH7Q5mV3N0OqWxY1Z2A3B4C5D6E7F8G9H0I1J2K3L4', 'Ana', 'Fernández', 'Sánchez', 'ana@email.com', '1998-07-14', 'España', '29001', '604567890', 3);

-- PLATAFORMAS
INSERT INTO plataformas (nombre, descripcion) VALUES
('Xbox Series X', 'Consola de última generación de Microsoft'),
('PlayStation 5', 'Consola de última generación de Sony'),
('Nintendo Switch', 'Consola híbrida de Nintendo'),
('PC', 'Juegos para ordenador personal');

-- JUEGOS
INSERT INTO juegos (titulo, descripcion, precio, id_plataforma, stock, imagen, fecha_lanzamiento) VALUES
('Starfield', 'Juego de exploración espacial de Bethesda', 59.99, 1, 15, 'starfield.jpg', '2023-09-06'),
('Final Fantasy XVI', 'RPG de acción de Square Enix', 69.99, 2, 20, 'ff16.jpg', '2023-06-22'),
('The Legend of Zelda: Tears of the Kingdom', 'Aventura épica en Hyrule', 59.99, 3, 25, 'zelda.jpg', '2023-05-12'),
('Baldur\'s Gate 3', 'RPG por turnos de Larian Studios', 59.99, 4, 30, 'bg3.jpg', '2023-08-03'),
('Elden Ring', 'Action RPG de FromSoftware', 59.99, 2, 18, 'elden.jpg', '2022-02-25'),
('Cyberpunk 2077', 'Juego de rol futurista', 39.99, 1, 12, 'cyberpunk.jpg', '2020-12-10');

-- CONTENIDOS (Noticias/Artículos)
INSERT INTO contenidos (titulo, texto, imagen, id_usuario, estado) VALUES
('Elden Ring: Guía de inicio', '<p>Elden Ring es un juego desafiante. Aquí te damos algunos consejos para empezar.</p><p>Lo más importante es explorar y aprender de tus errores.</p>', 'elden-guide.jpg', 2, 'publicado'),
('Starfield ya disponible', '<p>Microsoft ha lanzado Starfield, su nuevo juego de exploración espacial.</p><p>Es un título ambicioso con miles de planetas por descubrir.</p>', 'starfield-news.jpg', 2, 'publicado'),
('PlayStation 5: Mejores juegos 2024', '<p>Descubre los mejores juegos exclusivos de PlayStation 5 en este año.</p><p>Incluye Final Fantasy XVI, Ghost of Yotei y más.</p>', 'ps5-best.jpg', 2, 'publicado'),
('Baldur\'s Gate 3: 200 horas de contenido', '<p>Larian Studios confirma que el juego tiene más de 200 horas de contenido.</p><p>Una aventura épica que te mantendrá ocupado durante meses.</p>', 'bg3-content.jpg', 2, 'publicado');

-- VALORACIONES
INSERT INTO valoraciones (id_contenido, id_usuario, puntuacion, comentario) VALUES
(1, 3, 5, 'Excelente guía, muy útil para comenzar'),
(1, 4, 4, 'Buena información, espero más detalles'),
(2, 3, 5, 'Starfield es increíble, gran noticia'),
(2, 5, 4, 'Interesante, pero algo corta la noticia'),
(3, 4, 5, 'Las recomendaciones son correctas'),
(4, 3, 4, '200 horas es mucho, ¡me encanta!');

-- CARRITO
INSERT INTO carrito (id_usuario, id_juego, cantidad) VALUES
(3, 1, 1),
(3, 2, 1),
(4, 5, 1);

-- WISHLIST
INSERT INTO wishlist (id_usuario, id_juego) VALUES
(3, 3),
(3, 4),
(4, 2),
(5, 6);

-- PEDIDOS
INSERT INTO pedidos (id_usuario, total, estado) VALUES
(3, 129.98, 'completado'),
(4, 59.99, 'completado'),
(5, 39.99, 'pendiente');

-- DETALLES PEDIDOS
INSERT INTO detalles_pedidos (id_pedido, id_juego, cantidad, precio_unitario) VALUES
(1, 1, 1, 59.99),
(1, 2, 1, 69.99),
(2, 5, 1, 59.99),
(3, 6, 1, 39.99);

-- RECIBOS
INSERT INTO recibos (id_pedido, numero_recibo, metodo_pago) VALUES
(1, 'REC-2024-001', 'tarjeta_credito'),
(2, 'REC-2024-002', 'paypal'),
(3, 'REC-2024-003', 'tarjeta_credito');

-- DEVOLUCIONES
INSERT INTO devoluciones (id_pedido, razon, estado) VALUES
(1, 'Producto defectuoso', 'aprobada');

-- COOKIES
INSERT INTO cookies (id_usuario, tipo, valor) VALUES
(3, 'analytics', 'aceptado'),
(3, 'marketing', 'rechazado'),
(4, 'analytics', 'aceptado'),
(5, 'marketing', 'aceptado');

-- NEWSLETTER
INSERT INTO newsletter (id_usuario, suscrito) VALUES
(3, TRUE),
(4, TRUE),
(5, FALSE);
<?php
session_start();
include("php/database.php");

// Verificación de sesión y rol
if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'user') {
    header('Location: login.php');
    exit();
}

// Obtener datos del usuario si es necesario
$user = $_SESSION['user'];

// Aquí puedes añadir más consultas a la base de datos para obtener productos, historial, etc.
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard de Usuario - Productos Gimnasio</title>
    <link rel="stylesheet" href="css/style_gym.css">
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>

    <header>
        <h1>Bienvenido, <?php echo htmlspecialchars($user); ?> al Panel de Usuario</h1>
        <nav>
            <ul>
                <li><a href="productos.php">Productos</a></li>
                <li><a href="carrito.php">Carrito</a></li>
                <li><a href="perfil.php">Perfil</a></li>
                <li><a href="logout.php">Cerrar Sesión</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="productos-destacados">
            <h2>Productos Destacados</h2>
            <div class="grid-productos">
                <!-- Aquí puedes hacer un loop de PHP para mostrar los productos destacados de la base de datos -->
                <?php
                // Ejemplo estático de productos
                $productos = [
                    ['nombre' => 'Mancuernas 10kg', 'precio' => 25, 'imagen' => 'img/mancuernas.jpg'],
                    ['nombre' => 'Cinta de correr', 'precio' => 150, 'imagen' => 'img/cinta_correr.jpg'],
                    ['nombre' => 'Ropa deportiva', 'precio' => 20, 'imagen' => 'img/ropa.jpg']
                ];
                foreach ($productos as $producto) {
                    echo "
                    <div class='producto'>
                        <img src='{$producto['imagen']}' alt='{$producto['nombre']}'>
                        <h3>{$producto['nombre']}</h3>
                        <p>Precio: \${$producto['precio']}</p>
                        <button>Añadir al Carrito</button>
                    </div>
                    ";
                }
                ?>
            </div>
        </section>

        <section class="carrito">
            <h2>Tu Carrito</h2>
            <p>Aquí verás los productos que has añadido a tu carrito.</p>
            <a href="carrito.php" class="boton-carrito">Ver Carrito</a>
        </section>

        <section class="perfil">
            <h2>Tu Perfil</h2>
            <p>Gestiona tu información personal y compras.</p>
            <a href="perfil.php" class="boton-perfil">Ir al Perfil</a>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 - Tienda de Productos de Gimnasio</p>
    </footer>

</body>
</html>

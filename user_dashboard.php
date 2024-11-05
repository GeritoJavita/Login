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


// Consulta para obtener todos los productos
$query = "SELECT * FROM productos";
$result = $conn->query($query);
$productos = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $productos[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard de Usuario - Productos Gimnasio</title>
    <link rel="stylesheet" href="css/style_gym.css">
    <link rel="stylesheet" href="css/style_index.css">
</head>
<body>

    <header>
        <h1>Bienvenido, <?php echo htmlspecialchars($user); ?></h1>
        <nav>
            <ul>
                <li><a href="productos.php">Productos</a></li>
                <li><a href="carrito.php">Carrito</a></li>
                <li><a href="perfil.php">Perfil</a></li>
                <li><a href="logout.php">Cerrar Sesión</a></li>
            </ul>
        </nav>
    </header>

    

    <main class="main-content">
        <section class="welcome-section">
            <h1>Bienvenidos a GYM | BRO</h1>
            <p>Descubre los mejores productos para mantenerte en forma y llevar una vida saludable.</p>
            <a href="productos.php" class="cta-btn">Ver Productos</a>
        </section>

        <section class="productos-destacados">
            <h2>Productos Destacados</h2>
            <div class="grid-productos">
                <?php foreach ($productos as $producto): ?>
                    <div class="producto">
                        <img src="<?php echo $producto['imagen']; ?>" alt="<?php echo $producto['nombre']; ?>">
                        <h3><?php echo $producto['nombre']; ?></h3>
                        <p>Precio: $<?php echo $producto['precio']; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <section class="sobre-nosotros">
            <h2>Sobre Nosotros</h2>
            <p>Somos una empresa dedicada a ofrecer los mejores productos deportivos para que puedas mantenerte en forma, con una amplia gama de artículos diseñados para cubrir todas tus necesidades de entrenamiento.</p>
            <a href="sobre_nosotros.php" class="cta-btn">Conoce más</a>
        </section>
    </main>

    <footer class="footer">
        <p>&copy; 2024 GYM | BRO. Todos los derechos reservados.</p>
        <div class="social-media">
            <a href="#"><img src="img/facebook_icon.png" alt="Facebook"></a>
            <a href="#"><img src="img/instagram_icon.png" alt="Instagram"></a>
            <a href="#"><img src="img/twitter_icon.png" alt="Twitter"></a>
        </div>
    </footer>


</body>
</html>

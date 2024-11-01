<?php



?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador - Dashboard</title>
    <link rel="stylesheet" href="css/style_admin.css">
    <link rel="stylesheet" href="css/style_index.css">
</head>
<body>

<header>
    <h1>Bienvenido, Administrador</h1>
    <nav>
        <ul>
            <li><a href="administrar_productos.php">Administrar Productos</a></li>
            <li><a href="administrar_usuarios.php">Administrar Usuarios</a></li>
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
                <!-- Ejemplo de productos destacados, puedes hacer un loop PHP aquí si los productos vienen de la base de datos -->
                <div class="producto">
                    <img src="img/mancuernas.jpg" alt="Mancuernas">
                    <h3>Mancuernas 10kg</h3>
                    <p>Precio: $25</p>
                </div>
                <div class="producto">
                    <img src="img/cinta_correr.jpg" alt="Cinta de correr">
                    <h3>Cinta de correr</h3>
                    <p>Precio: $150</p>
                </div>
                <div class="producto">
                    <img src="img/ropa.jpg" alt="Ropa deportiva">
                    <h3>Ropa deportiva</h3>
                    <p>Precio: $20</p>
                </div>
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

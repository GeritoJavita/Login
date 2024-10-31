<?php
session_start();
include("php/database.php");

if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit();
}

$result = $conn->query("SELECT * FROM usuarios");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador - Dashboard</title>
    <link rel="stylesheet" href="css/style_admin.css">
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

<main>
    <section class="admin-acciones">
        <h2>Acciones Administrativas</h2>
        <div class="botones-admin">
            <a href="administrar_productos.php" class="boton-admin">Administrar Productos</a>
            <a href="administrar_usuarios.php" class="boton-admin">Administrar Usuarios</a>
        </div>
    </section>

    <section class="usuarios-registrados">
        <h2>Usuarios Registrados</h2>
        <ul>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <li><?= htmlspecialchars($row['username']) ?> - <?= htmlspecialchars($row['role']) ?></li>
            <?php } ?>
        </ul>
        <a href="register.php" class="boton-agregar">Agregar Usuario</a>
    </section>
</main>

<footer>
    <p>&copy; 2024 - Panel de Administración</p>
</footer>

</body>
</html>

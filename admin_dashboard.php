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
    <link rel="stylesheet" href="css/styles_global.css">
</head>
<body>
    <h2>Panel de Administración</h2>
    <h3>Usuarios Registrados:</h3>
    <ul>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <li><?= $row['username'] ?> - <?= $row['role'] ?></li>
        <?php } ?>
    </ul>
    <a href="register.php">Agregar Usuario</a>
    <a href="php/logout.php">Cerrar Sesión</a>
</body>
</html>

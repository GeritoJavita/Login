<?php
session_start();
include ("php/database.php");

if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit();
}

$result = $conn->query("SELECT username FROM users");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h2>Bienvenido al Dashboard</h2>
    <h3>Usuarios Registrados:</h3>
    <ul>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <li><?= $row['username'] ?></li>
        <?php } ?>
    </ul>
    <a href="logout.php">Cerrar Sesión</a>
</body>
</html>

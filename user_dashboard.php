<?php
session_start();
include("php/database.php");

if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'user') {
    header('Location: login.php');
    exit();
}

// Aquí puedes añadir más funcionalidades para el usuario
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario - Dashboard</title>
    <link rel="stylesheet" href="css/styles_global.css">
</head>
<body>
    <h2>Bienvenido al Dashboard del Usuario</h2>
    <a href="/php/logout.php">Cerrar Sesión</a>
</body>
</html>

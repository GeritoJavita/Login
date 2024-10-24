<?php
include('php/database.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);


    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);


    if ($stmt->execute()) {
        echo "Usuario agregado correctamente";
    } else {
        echo "Error al agregar el usuario: " . $stmt->error;
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="css/styles_global.css"> 
</head>
<body>

<h2>Registro</h2>
<!-- Agregar el método POST al formulario -->
<form method="POST">
    <input type="text" name="username" placeholder="Usuario" required>
    <input type="password" name="password" placeholder="Contraseña" required>
    <button type="submit">Registrarse</button>
    <!-- Botón para volver al inicio del sitio -->
<button type="submit" >
    <a href="index.php">Volver Inicio</a>
</button>
</form>



<!-- Manejo de errores (si es necesario) -->
<?php if (isset($error)) echo "<p>$error</p>"; ?>
</body>
</html>

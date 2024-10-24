<?php
session_start();
include ('php/database.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare ("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);

    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();


    if ($user && password_verify($password, $user['password'])){
        $_SESSION['user'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        header('Location: dashboard.php');
        exit;
    } else {
        $error = "Usuario o contraseña incorrectos";
    }

}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/styles_global.css"> 
<body>
    <h2>Iniciar Sesión</h2>
    <form>
        <input type="text" name="username" placeholder="Usuario"> </input>
        
        <input type="password" name="password" placeholder="Contraseña"> </input>
        <button type="submit">Login</button>
        <button type="submit" >
    <a href="index.php">Volver Inicio</a>
</button>
    </form>
    <?php if (isset($error)) echo "<p>$error</p>"; ?>
</body>
</html>
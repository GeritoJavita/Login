<?php
session_start();
include("php/database.php");

// Verificar si el usuario ha iniciado sesión y tiene un ID en la sesión
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['id'];  // Obtener el ID del usuario logueado

// Consulta para obtener el nombre de usuario actual
$query = "SELECT username FROM usuarios WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$usuario = $result->fetch_assoc();

// Verificar si se encontró el usuario
if (!$usuario) {
    echo "Error: Usuario no encontrado.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];

    // Validar que el campo no esté vacío y no exceda los 50 caracteres
    if (!empty($username) && strlen($username) <= 50) {
        $update_query = "UPDATE usuarios SET username = ? WHERE id = ?";
        $update_stmt = $conn->prepare($update_query);
        $update_stmt->bind_param("si", $username, $user_id);
        $update_stmt->execute();

        header("Location: perfil.php");
        exit();
    } else {
        $error_message = "El nombre de usuario no puede estar vacío y debe tener un máximo de 50 caracteres.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<section class="perfil-usuario">
    <h2>Editar Perfil</h2>
    <form action="editar_usuario.php?id=<?php echo $user_id; ?>" method="POST">
        <label for="username">Nombre de Usuario:</label>
        <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($usuario['username']); ?>" required>
        
        <!-- Mostrar mensaje de error si hay uno -->
        <?php if (isset($error_message)): ?>
            <p class="error"><?= $error_message ?></p>
        <?php endif; ?>

        <button type="submit">Guardar Cambios</button>
    </form>
</section>
</body>
</html>

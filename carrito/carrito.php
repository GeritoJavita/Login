<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['user'])) {
    header('Location: ../login/login.php');
    exit();
}

// Obtener el carrito de la sesión
$carrito = isset($_SESSION['carrito']) ? $_SESSION['carrito'] : [];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras - GYM | BRO</title>
    <link rel="stylesheet" href="../css/style_gym.css">
    <link rel="stylesheet" href="../css/style_index.css">
</head>
<body>

    <header>
        <nav>
            <ul>
                <li><a href="../user/productos.php">Productos</a></li>
                <li><a href="carrito.php">Carrito</a></li>
                <li><a href="../user/perfil.php">Perfil</a></li>
                <li><a href="../logout.php">Cerrar Sesión</a></li>
            </ul>
        </nav>
    </header>

    <main class="main-content">
        <h1>Tu Carrito de Compras</h1>

        <?php if (!empty($carrito)): ?>
            <table>
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Total</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($carrito as $item): ?>
                        <tr>
                            <td><?php echo $item['nombre']; ?></td>
                            <td><?php echo $item['cantidad']; ?></td>
                            <td>$<?php echo $item['precio']; ?></td>
                            <td>$<?php echo $item['precio'] * $item['cantidad']; ?></td>
                            <td>
                                <form action="eliminar_carrito.php" method="POST">
                                    <input type="hidden" name="producto_id" value="<?php echo $item['id']; ?>">
                                    <button type="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <a href="pagar.php" class="cta-btn">Proceder al Pago</a>
        <?php else: ?>
            <p>Tu carrito está vacío.</p>
        <?php endif; ?>
    </main>

</body>
</html>

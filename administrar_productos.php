<?php
include('php/database.php');

$result = $conn->query("SELECT * FROM productos");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Productos</title>
    <link rel="stylesheet" href="css/crud_productos.css">
</head>
<body>
    <div class="container">
        <h2>Listado de Productos</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($producto = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $producto['id']; ?></td>
                    <td><?php echo $producto['nombre']; ?></td>
                    <td><?php echo $producto['descripcion']; ?></td>
                    <td><?php echo $producto['precio']; ?></td>
                    <td><?php echo $producto['stock']; ?></td>
                    <td>
                        <a href="editar_producto.php?id=<?php echo $producto['id']; ?>">Editar</a> |
                        <a href="eliminar_producto.php?id=<?php echo $producto['id']; ?>" onclick="return confirm('¿Seguro que deseas eliminar este producto?')">Eliminar</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <a href="agregar_producto.php">Agregar Nuevo Producto</a>
    </div>
</body>
</html>

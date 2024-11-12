<?php
require_once __DIR__ . '/functions.php';

if (!isset($_GET['_id'])) {
    header("Location: index.php");
    exit;
}

$proceso = obtenerProductosPorId($_GET['_id']);

if (!$proceso) {
    header("Location: index.php?mensaje=Tarea no encontrada");
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar que todas las variables estén definidas
    if (isset($_POST['nombre'], $_POST['precio'], $_POST['descripcion'], $_POST['categoria'])) {
        $count = actualizarProductos($_GET['_id'], $_POST['nombre'], $_POST['precio'], $_POST['descripcion'], $_POST['categoria']);
        if ($count > 0) {
            header("Location: index.php?mensaje=Proceso actualizada con éxito");
            exit;
        } else {
            $error = "No se pudo actualizar el proceso.";
        }
    } else {
        $error = "Faltan datos requeridos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Editar Producto</h1>

        <?php if (!empty($error)): ?>
            <div class="error"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <form method="POST">
            <label>Nombre: <input type="text" name="nombre" value="<?php echo htmlspecialchars($proceso['nombre']); ?>" required></label>
            <label>Precio: <input type="text" name="precio" value="<?php echo htmlspecialchars($proceso['precio']); ?>" required></label>
            <label>Descripcion: <input type="text" name="descripcion" value="<?php echo htmlspecialchars($proceso['descripcion']); ?>" required></label>
            <label>Categoria: <input type="text" name="categoria" value="<?php echo htmlspecialchars($proceso['categoria']); ?>" required></label>
       

            <input type="submit" value="Actualizar Producto">
        </form>

        <a href="index.php" class="button">Volver a la lista de productos</a>
    </div>
</body>
</html>
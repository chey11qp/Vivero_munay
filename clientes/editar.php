<?php
require_once __DIR__ . '/functions.php';

if (!isset($_GET['_id'])) {
    header("Location: index.php");
    exit;
}

$proceso = obtenerProcesosPorId($_GET['_id']);

if (!$proceso) {
    header("Location: index.php?mensaje=Tarea no encontrada");
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar que todas las variables estén definidas
    if (isset($_POST['nombre'], $_POST['correo'], $_POST['telefono'], $_POST['direccion'])) {
        $count = actualizarProcesos($_GET['_id'], $_POST['nombre'], $_POST['correo'], $_POST['telefono'], $_POST['direccion']);
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
    <title>Editar Proceso</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Editar Proceso</h1>

        <?php if (!empty($error)): ?>
            <div class="error"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <form method="POST">
            <label>Nombre: <input type="text" name="nombre" value="<?php echo htmlspecialchars($proceso['nombre']); ?>" required></label>
            <label>Correo: <input type="text" name="correo" value="<?php echo htmlspecialchars($proceso['correo']); ?>" required></label>
            <label>Telefono: <input type="text" name="telefono" value="<?php echo htmlspecialchars($proceso['telefono']); ?>" required></label>
            <label>Direccion: <textarea name="direccion" required><?php echo htmlspecialchars($proceso['direccion']); ?></textarea></label>

            <input type="submit" value="Actualizar Ciente">
        </form>

        <a href="index.php" class="button">Volver a la lista de procesos</a>
    </div>
</body>
</html>
<?php
require_once __DIR__ . '/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = crearPocesos($_POST['nombre'], $_POST['correo'], $_POST['telefono'], $_POST['direccion']);
    if ($id) {
        header("Location: index.php?mensaje=proceso creada con éxito");
        exit;
    } else {
        $error = "No se pudo crear la proceso.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nuevo Cliente</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Agregar Nuevo Cliente</h1>

        <?php if (isset($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="POST">
            <label>Nombre: <input type="text" name="nombre" required></label>
            <label>Correo: <input type="text" name="correo" required></label>
            <label>Telefono: <input type="text" name="telefono" required></label>
            <label>Direccion: <textarea name="direccion" required></textarea></label>
           
    <form onsubmit="event.preventDefault(); calificarCliente();">
        
        <br>
        <h3>Seleccione la calificación:</h3>
        <label>
            <input type="checkbox" name="calificacion" value="Cliente VIP"> Cliente VIP
        </label>
        <br>
        <label>
            <input type="checkbox" name="calificacion" value="Cliente Frecuente"> Cliente Frecuente
        </label>
        <br>
        <label>
            <input type="checkbox" name="calificacion" value="Cliente Ocasional"> Cliente Ocasional
        </label>
        <br>
        <button type="submit">Calificar</button>
            <input type="submit" value="Agregar Cliente">
        </form>

        <form action="index.php" method="get">
            <input type="submit" value="Volver a la lista de procesos" class="button">
        </form>

    </div>
</body>
</html>
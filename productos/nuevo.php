<?php
require_once __DIR__ . '/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = crearProductos($_POST['nombre'], $_POST['precio'], $_POST['descripcion'], $_POST['categoria']);
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
    <title>Agregar Nuevo Producto</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Agregar Nuevo Producto</h1>

        <?php if (isset($error)): ?>
    <div class="error"><?php echo $error; ?></div>
<?php endif; ?>

<form method="POST">
    <label>Nombre: <input type="text" name="nombre" required></label>
    <label>Precio: <input type="text" name="precio" required></label>
    <label>Descripcion: <input type="text" name="descripcion" required></label>
    <label>Categoria: <input type="text" name="categoria" required></label>
 
    <input type="submit" value="Agregar Producto">
</form>

<a href="index.php" class="button">Volver a la lista de preductos</a>

</div>
</body>
</html>



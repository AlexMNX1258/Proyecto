<?php
    require_once __DIR__ .'/includes/functions.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $libro = obtenerLibroPorId($id);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $titulo = $_POST['titulo'];
        $autor = $_POST['autor'];
        $fechaPublicacion = $_POST['fechaPublicacion'];
        $disponible = isset($_POST['disponible']) ? true : false;

        editarLibro($id, $titulo, $autor, $fechaPublicacion, $disponible);
        
        $mensaje = "Libro editado correctamente.";
        header("Location: index.php?mensaje=" . urlencode($mensaje));
        exit;
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/styles.css">
    <title>Editar Libro</title>
</head>
<body>
    <div class="container">
        <h1>Editar Libro</h1>
        <form action="editar_libro.php" method="POST">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($libro['_id']); ?>">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" value="<?php echo htmlspecialchars($libro['titulo']); ?>" required>
            <br>
            <label for="autor">Autor:</label>
            <input type="text" name="autor" value="<?php echo htmlspecialchars($libro['autor']); ?>" required>
            <br>
            <label for="fechaPublicacion">Fecha de Publicación:</label>
            <input type="date" name="fechaPublicacion" value="<?php echo formatDate($libro['fechaPublicacion']); ?>" required>
            <br>
            <label for="disponible">Disponible:</label>
            <input type="checkbox" name="disponible" <?php echo $libro['disponible'] ? 'checked' : ''; ?>>
            <br>
            <button type="submit">Actualizar Libro</button>
        </form>
    </div>
</body>
</html>

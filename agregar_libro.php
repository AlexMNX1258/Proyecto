<?php
    require_once __DIR__ .'/includes/functions.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $titulo = $_POST['titulo'];
        $autor = $_POST['autor'];
        $fechaPublicacion = $_POST['fechaPublicacion'];
        $disponible = isset($_POST['disponible']) ? true : false;


        // Aquí puedes agregar la función para guardar el nuevo libro
        agregarLibro($titulo, $autor, $fechaPublicacion, $disponible, $stock);
        
        $mensaje = "Libro agregado correctamente.";
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
    
    <title>Agregar Nuevo Libro</title>
</head>
<body>
    <div class="container">
        <h1>Agregar Nuevo Libro</h1>
        <form action="agregar_libro.php" method="POST">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" required>
            <br>
            <label for="autor">Autor:</label>
            <input type="text" name="autor" required>
            <br>
            <label for="fechaPublicacion">Fecha de Publicación:</label>
            <input type="date" name="fechaPublicacion" required>
            <br>
            <label for="disponible">Disponible:</label>
            <input type="checkbox" name="disponible">
            <br>
        
            <button type="submit">Agregar Libro</button>
        </form>
    </div>
</body>
</html>

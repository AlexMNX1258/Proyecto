<?php
    require_once __DIR__ .'/includes/functions.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        eliminarLibro($id);
        $mensaje = "Libro eliminado correctamente.";
        header("Location: index.php?mensaje=" . urlencode($mensaje));
        exit;
    } else {
        $mensaje = "No se ha especificado el libro a eliminar.";
        header("Location: index.php?mensaje=" . urlencode($mensaje));
        exit;
    }
?>

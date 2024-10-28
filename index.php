<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/styles.css">

    <title>Lista de Libros</title>
</head>
<body>
    <div class="container">
        <h1>Lista de Libros</h1>
        <?php if (isset($_GET['mensaje'])): ?>
            <p><?php echo htmlspecialchars($_GET['mensaje']); ?></p>
        <?php endif; ?>
        <div class="button" name="button">
            <a href="agregar_libro.php" class="button">Agregar Libro</a>
        </div>
        
        <table>
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Fecha de Publicación</th>
                    <th>Disponible</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    require_once __DIR__ .'/includes/functions.php';
                    $libros = obtenerLibros();
                    foreach ($libros as $libro):
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($libro['titulo']); ?></td>
                    <td><?php echo htmlspecialchars($libro['autor']); ?></td>
                    <td><?php echo formatDate($libro['fechaPublicacion']); ?></td>
                    <td><?php echo $libro['disponible'] ? 'Sí' : 'No'; ?></td>
                    <td class="actions">
                        <a href="editar_libro.php?id=<?php echo $libro['_id']; ?>" class="button">Editar</a>
                        <a href="eliminar_libro.php?id=<?php echo $libro['_id']; ?>" class="button" onclick="return confirm('¿Estás seguro de que quieres eliminar este libro?');">Eliminar</a>
                    
                        
                    </td>
                       
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

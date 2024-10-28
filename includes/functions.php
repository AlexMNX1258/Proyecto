<?php
    require_once __DIR__ .'/../config/database.php';

    function obtenerLibros() {
        global $booksCollection;
        return $booksCollection->find();
    }

    function formatDate($date) {
        return $date->toDateTime()->format('Y-m-d');
    }

    function eliminarLibro($id) {
        global $booksCollection;
        $booksCollection->deleteOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
    }

    function obtenerLibroPorId($id) {
        global $booksCollection;
        return $booksCollection->findOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
    }

    function editarLibro($id, $titulo, $autor, $fechaPublicacion, $disponible, $stock) {
        global $booksCollection;
        $booksCollection->updateOne(
            ['_id' => new MongoDB\BSON\ObjectId($id)],
            ['$set' => [
                'titulo' => $titulo,
                'autor' => $autor,
                'fechaPublicacion' => new MongoDB\BSON\UTCDateTime((new DateTime($fechaPublicacion))->getTimestamp() * 1000),
                'disponible' => $disponible,
                'stock' => $stock
            ]]
        );
    }

    
    function agregarLibro($titulo, $autor, $fechaPublicacion, $disponible, $stock) {
        global $booksCollection;
        $booksCollection->insertOne([
            'titulo' => $titulo,
            'autor' => $autor,
            'fechaPublicacion' => new MongoDB\BSON\UTCDateTime((new DateTime($fechaPublicacion))->getTimestamp() * 1000),
            'disponible' => $disponible,
            'stock' => $stock // Agrega el stock aquí
        ]);
    }
    
?>

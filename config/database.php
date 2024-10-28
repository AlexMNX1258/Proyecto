<?php
    require_once __DIR__.'/../vendor/autoload.php';
    $mongoClient = new MongoDB\Client("mongodb+srv://admin:6BWgP0vxXHTMF6tF@cluster0.oeps0.mongodb.net/?retryWrites=true&w=majority&appName=Cluster0");
    $database = $mongoClient->selectDatabase('biblioteca');
    $booksCollection = $database->libros;
?>

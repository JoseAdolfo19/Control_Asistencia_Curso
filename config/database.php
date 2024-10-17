<?php
require_once __DIR__ .'/../vendor/autoload.php';
$mongoClient = new MongoDB\Client("mongodb+srv://Adolfo:OHeAC5eCAzSdKoqo@cluster0.7ri0x.mongodb.net/?retryWrites=true&w=majority&appName=Cluster0");
$database = $mongoClient -> selectDatabase('asistencia');
$tasksCollection = $database -> asistencias ;
?>

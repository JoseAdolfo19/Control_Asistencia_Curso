<?php
require_once __DIR__ . '/../config/database.php';

function sanitizeInput($input)
{
    return htmlspecialchars(strip_tags(trim($input)));
}

function formatDate($date)
{
    return $date->toDateTime()->format('Y-m-d');
}

$db;

// Agregar Estudiante
function agregarEstudiante($nombre, $apellido, $correo, $curso){
    global $tasksCollection;
    $resultado = $tasksCollection-> insertOne([
        'nombre' => sanitizeInput($nombre),
        'apellido' => sanitizeInput($apellido),
        'correo' => sanitizeInput($correo),
        'curso' =>sanitizeInput($curso)
    ]);
   return $resultado -> getInsertedId();
}

// Actualizar Información del Estudiante
function actualizarEstudiante($id, $nombre, $apellido, $correo, $curso){
    global $tasksCollection;
    $resultado = $tasksCollection -> updateOne(
        ['_id' => new MongoDB\BSON\ObjectId($id)],
        ['$set' => [
            'nombre' => sanitizeInput($nombre) ,
            'apellido' => sanitizeInput($apellido),
            'correo' => sanitizeInput($correo),
            'curso' => sanitizeInput($curso)
        ]]
        );
    return $resultado -> getModifiedCount();
}

// Eliminar Estudiante
function eliminarEstudiante($id){
    global $tasksCollection;
    $resultado = $tasksCollection->deleteOne(['_id'=> new MongoDB\BSON\ObjectId($id)]);
    return $resultado -> getDeletedCount();
}
// Buscar Estudiante por Nombre
function obtenerEstudiantePorId($id) {
    global $tasksCollection;
    return $tasksCollection->findOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
}

// Obtener Asistencia de un Estudiante
function obtenerAsistenciaEstudiante()
{
    global $tasksCollection;
    return $tasksCollection-> find();
}


?>
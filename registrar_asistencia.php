<?php
require_once __DIR__ . '/includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = agregarEstudiante($_POST['nombre'], $_POST['apellido'], $_POST['correo'], $_POST['curso']);
    if ($id) {
        header("Location: index.php?mensaje=Estudiante agregado(a) con éxito");
        exit;
    } else {
        $error = "No se pudo agregar al estudiante.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nuevo Estudiante al Curso</title>
    <link rel="stylesheet" href="public/css/styles.css">
</head>

<body>
    <div class="container">
       <center><h1>Agregar Nuevo Estudiante al Curso</h1> 
        <?php if (isset($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
        <form method="POST">
            <label>Nombre: <input type="text" name="nombre" required></label><br><br>
            <label>Apellidos: <input type="text" name="apellido" required></label><br><br>
            <label>Correo: <input type="email" name="correo" required></label><br><br>
            <label>Curso: <input type="text" name="curso" required></label><br><br>
            <input type="submit" value="Agregar Nuevo Estudiante"><br><br>
        </form>
        <a href="index.php" class="button">Volver a la lista de alumnos</a></center>
    </div>
</body>

</html>
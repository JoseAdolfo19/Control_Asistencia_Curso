<?php
require_once __DIR__ . '/includes/functions.php';
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}
$estudiante = obtenerEstudiantePorId($_GET['id']);

if (!$estudiante) {
    header("Location: index.php?mensaje=Estudiante no encontrado ");
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $count = actualizarEstudiante($_GET['id'], $_POST['nombre'], $_POST['apellido'], $_POST['correo'], $_POST['curso']);
    if ($count > 0) {
        header("Location: index.php?mensaje=Estudiante actualizado con éxito");
        exit;
    } else {
        $error = "No se pudo actualizar al estudiante.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Estudiante</title>
    <link rel="stylesheet" href="public/css/styles.css">
</head>

<body>
    <div class="container">
        <center><h1>Editar Estudiante</h1>
        <?php if (isset($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
        <form method="POST">
            <label>Nombre: <input type="text" name="nombre" <?php echo htmlspecialchars($estudiante['nombre']); ?> required></label><br><br>
            <label>Apellido: <input type="text" name="apellido" <?php echo htmlspecialchars($estudiante['apellido']); ?> ></label><br><br>
            <label>Correo: <input type="email" name="correo" <?php echo htmlspecialchars($estudiante['correo']); ?> ></label><br><br>
            <label>Curso: <input type="text" name="curso" <?php echo htmlspecialchars($estudiante['curso']); ?> ></label><br><br>
            <input type="submit" value="Actualizar Estudiante"><br><br>
        </form>
        <a href="index.php" class="button">Volver a la lista de alumnos</a></center>
    </div>
</body>

</html>
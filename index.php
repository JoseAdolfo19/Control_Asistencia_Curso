<?php
require_once __DIR__ . '/includes/functions.php';
if (isset($_GET['accion']) && $_GET['accion'] === 'eliminar' && isset($_GET['id'])) {
    $count = eliminarEstudiante($_GET['id']);
    $mensaje = $count > 0 ? "Asistencia eliminada con éxito." : "No se pudo eliminar la Asistencia.";
}
$asistencias = obtenerAsistenciaEstudiante();

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Asistencia</title>
    <link rel="stylesheet" href="public/css/styles.css">
</head>

<body>
    <div class="container">
        <center><h1>Gestión de Asistencia De Cursos</h1></center>

        <?php if (isset($mensaje)): ?>
            <div class="<?php echo $count > 0 ? 'success' : 'error'; ?>">
                <?php echo $mensaje; ?>
            </div>
        <?php endif; ?>

        <center><h2>Lista de Asistencia </h2>
       <table border="1">
            <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Correo</th>
                <th>Curso</th>
                <th>Editar/Eliminar</th>
                <!--<th>Estado De Asistencia</th>-->
                
        
            </tr>
            <?php foreach ($asistencias as $asistencia): ?>
                <tr>
                    <td><?php echo htmlspecialchars($asistencia['nombre']); ?></td>
                    <td><?php echo htmlspecialchars($asistencia['apellido']); ?></td>
                    <td><?php echo htmlspecialchars($asistencia['correo']);?></td>
                    <td><?php echo htmlspecialchars($asistencia['curso']);?></td>
                    <td class="actions">
                        <a href="editar_asistencia.php?id=<?php echo $asistencia['_id']; ?>" class="button">Editar</a>
                        <a href="index.php?accion=eliminar&id=<?php echo $asistencia['_id']; ?>" class="button" onclick="return confirm('¿Estás seguro de que quieres eliminar esta asistencia?');">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <a href="registrar_asistencia.php" class="button">Agregar Nueva Asistencia al Curso</a></center> 

    </div>
    </div>
</body>

</html>
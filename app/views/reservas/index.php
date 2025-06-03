<!DOCTYPE html>
<html>
<head>
    <title>Mis Reservas</title>
    <link rel="stylesheet" href="public/css/estilos.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
    <h2>Reservas</h2>
    <a href="index.php?r=nueva_reserva">Crear nueva reserva</a><br><br>
    <table border="1">
        <tr><th>Yate</th><th>Fecha</th><th>Acciones</th></tr>
        <?php foreach ($reservas as $r): ?>
        <tr>
            <td><?php echo $r['nombre_yate']; ?></td>
            <td><?php echo $r['fecha_reserva']; ?></td>
            <td>
                <a href="index.php?r=editar_reserva&id=<?php echo $r['id']; ?>">Editar</a> |
                <a href="index.php?r=eliminar_reserva&id=<?php echo $r['id']; ?>">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br><a href="index.php?r=perfil">Volver al perfil</a>
</body>
</html>

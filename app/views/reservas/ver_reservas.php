<link rel="stylesheet" href="public/css/estilos.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<h2>Mis Reservas</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Yate</th>
        <th>Fecha</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($reservas as $reserva): ?>
    <tr>
        <td><?= $reserva['id'] ?></td>
        <td><?= $reserva['nombre_yate'] ?></td>
        <td><?= $reserva['fecha_reserva'] ?></td>
        <td>
            <a href="index.php?r=editar_reserva&id=<?= $reserva['id'] ?>">Editar</a> |
            <a href="index.php?r=eliminar_reserva&id=<?= $reserva['id'] ?>" onclick="return confirm('¿Eliminar esta reserva?')">Eliminar</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<a href="index.php?r=perfil">Volver al perfil</a>

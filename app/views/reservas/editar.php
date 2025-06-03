<!DOCTYPE html>
<html>
<head>
    <title>Editar Reserva</title>
    <link rel="stylesheet" href="public/css/estilos.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
    <h2>Editar Reserva</h2>
    <form method="post" action="index.php?r=actualizar_reserva">
        <input type="hidden" name="id" value="<?php echo $reserva['id']; ?>">
        <input type="text" name="nombre_yate" value="<?php echo $reserva['nombre_yate']; ?>" required>
        <input type="date" name="fecha_reserva" value="<?php echo $reserva['fecha_reserva']; ?>" required>
        <button type="submit">Actualizar</button>
    </form>
    <a href="index.php?r=reservas">Volver</a>
</body>
</html>

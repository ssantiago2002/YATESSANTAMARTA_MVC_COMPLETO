<!DOCTYPE html>
<html>
<head>
    <title>Nueva Reserva</title>
    <link rel="stylesheet" href="public/css/estilos.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
    <h2>Nueva Reserva</h2>
    <form method="post" action="index.php?r=guardar_reserva">
        <input type="text" name="nombre_yate" placeholder="Nombre del yate" required>
        <input type="date" name="fecha_reserva" required>
        <button type="submit">Reservar</button>
    </form>
    <a href="index.php?r=reservas">Volver</a>
</body>
</html>

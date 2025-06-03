<link rel="stylesheet" href="public/css/estilos.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<h2>Editar Reserva</h2>

<form method="post" action="index.php?r=actualizar_reserva">
    <input type="hidden" name="id" value="<?php echo $reserva['id']; ?>">

    <label>Nombre del Yate:</label>
    <input type="text" name="nombre_yate" value="<?php echo htmlspecialchars($reserva['nombre_yate']); ?>" required>

    <label>Fecha de la Reserva:</label>
    <input type="date" name="fecha_reserva" value="<?php echo $reserva['fecha_reserva']; ?>" required>

    <button type="submit">Actualizar Reserva</button>
</form>

<a href="index.php?r=ver_reservas">Cancelar</a>

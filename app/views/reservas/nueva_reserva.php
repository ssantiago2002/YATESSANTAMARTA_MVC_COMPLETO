<link rel="stylesheet" href="public/css/estilos.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<h2>Nueva Reserva de Yate</h2>
<form method="post" action="index.php?r=crear_reserva">
    <input type="text" name="nombre_yate" placeholder="Nombre del Yate" required>
    <input type="date" name="fecha_reserva" required>
    <button type="submit">Reservar</button>
</form>
<a href="index.php?r=perfil">Volver al perfil</a>

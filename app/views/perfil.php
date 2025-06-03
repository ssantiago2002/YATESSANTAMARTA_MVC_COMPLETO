
<link rel="stylesheet" href="public/css/estilos.css">
<h2>Bienvenido, <?php echo htmlspecialchars($usuario['nombre']); ?></h2>
<a href="index.php?r=cerrar_sesion">Cerrar sesión</a><br>
<a href="index.php?r=nueva_reserva">Reservar Yate</a><br>
<a href="index.php?r=ver_reservas">Ver mis Reservas</a><br>
<a href="#" onclick="mostrarFormulario()">Cambiar Contraseña</a><br>
<a href="index.php?r=eliminar_cuenta" onclick="return confirm('¿Estás seguro de eliminar tu cuenta?')">Eliminar Cuenta</a>

<div id="formularioContrasena" style="display:none; margin-top: 10px;">
    <form method="post" action="index.php?r=cambiar_contrasena">
        <input type="password" name="nueva_contrasena" placeholder="Nueva contraseña" required>
        <button type="submit">Actualizar</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function mostrarFormulario() {
        document.getElementById('formularioContrasena').style.display = 'block';
    }
</script>

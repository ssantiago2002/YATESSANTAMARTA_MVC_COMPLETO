<link rel="stylesheet" href="public/css/estilos.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<h2>Registro</h2>
<form method="post" action="index.php?r=registrar">
    <input type="text" name="nombre" placeholder="Nombre" required>
    <input type="text" name="correo" placeholder="Correo" required>
    <input type="password" name="contrasena" placeholder="Contraseña" required>
    <button type="submit">Registrarse</button>
</form>
<a href="index.php?r=login">Volver al login</a>

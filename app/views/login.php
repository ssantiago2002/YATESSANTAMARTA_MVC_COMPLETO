<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="public/css/estilos.css">
<h2>Iniciar Sesión</h2>
<form method="post" action="index.php?r=validar_login">
    <input type="text" name="correo" placeholder="Correo" required>
    <input type="password" name="contrasena" placeholder="Contraseña" required>
    <button type="submit">Entrar</button>
</form>
<a href="index.php?r=registro">Registrarse</a><br>
<a href="index.php?r=inicio" style="display:inline-block; margin-top: 20px; text-decoration:none; background:#007BFF; color:white; padding:10px 15px; border-radius:5px;">← Volver a la página principal</a>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Yates Santa Mata, la mejor agencia en renta de embarciones santa marta y cartagena colombia.">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="styles.css">
    <script registro.js></script>
    <link rel="stylesheet" href="styles.Registro.css">
    <link rel="canonical" href="https://www.yatessantamarta.co">
   </head>

  
  <body>
    
    <div class="contenedor">

        <form id="form-validation" novalidate>
            <div class="form-group">
                <span>Nombre</span>
                <input type="text" placeholder="Ingrese Nombre" required>
                <small>Por favor ingrese Nombre</small>
            </div>

            <div class="form-group">
                <span>Apellido</span>
                <input type="text" placeholder="Ingrese Primer Apellido" required>
                <small>Por favor ingrese el Apellido</small>
            </div>

            <div class="form-group">
                <span>Segundo Apellido</span>
                <input type="text" placeholder="Ingrese Segundo Apellido" required>
                <small>Por favor ingrese el Segundo Apellido</small>
            </div>

            <div class="form-group">
                <span>Identificacion</span>
                <input type="text" placeholder="Ingrese su Identificacion" required>
                <small>Por favor ingrese el Segundo Apellido</small>
            </div>

            <div class="form-group">
                <span>Email</span>
                <input type="email" placeholder="Ingrese Email" required>
                <small>Por favor ingrese el correo</small>
            </div>

            <div class="form-group">
                <span>Usuario</span>
                <input type="text" placeholder="Ingrese Usuario" required>
                <small>Por favor ingrese el Usuario</small>
            </div>

            <div class="form-group">
                <span>Telefono</span>
                <input type="number" placeholder="Ingrese Telefono" required>
                <small>Por favor ingrese el Telefono</small>
            </div>

            <div class="form-group">
                <span>Fecha de Nacimiento</span>
                <input type="number" placeholder="Ingrese Fecha de Nacimiento" required>
                <small>Por favor ingrese la Fecha de Nacimiento</small>
            </div>

            <div class="form-group">
                <span>Direccion</span>
                <input type="text" placeholder="Ingrese Direccion" required>
                <small>Por favor ingrese la Direccion</small>
            </div>

            <div class="form-group">
                <span>Contraseña</span>
                <input type="password" placeholder="Ingrese Contraseña" required>
                <small>Por favor ingrese la Contraseña</small>
            </div>

            <div class="form-group">
                <span>Confirmar Contraseña</span>
                <input type="password" placeholder="Ingrese Confirmar Contraseña" required>
                <small>Por favor Confirmar la Contraseña</small>
            </div>

            <div class="form-group">
                <span>Codigo</span>
                <input type="password" placeholder="Ingrese Codigo" required>
                <small>Por favor ingrese el Codigo</small>
            </div>

            <div class="button">
                <input type="submit" value="Registrarse" required>
            </div>
            <br>
        </form> <a href="Login.html">Iniciar Sesion</a>

    </div>

    <script>
        const addform = document.getElementById
            ("form-validation");
        addform.addEventListener("submit", (e) => {
            if (addform.checkVisibility() === false) {
                e.preventDefault();
                e.stopPropagation();
                addform.classList.add("was-validated");
                return false
            }
        })
    </script>

</body>

</html>
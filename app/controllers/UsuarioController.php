<?php
require_once dirname(__DIR__) . '/../config/database.php';

class UsuarioController
{
    private $conn;

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->conectar();
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function login()
    {
        include 'app/views/login.php';
    }

    public function validarLogin()
    {
        $correo = $_POST['correo'];
        $contrasena = $_POST['contrasena'];

        $stmt = $this->conn->prepare("SELECT * FROM usuarios WHERE correo = ?");
        $stmt->execute([$correo]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($contrasena, $usuario['contrasena'])) {            
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['nombre'] = $usuario['nombre']; 

            header("Location: index.php?r=perfil");
        } else {
            echo "<!DOCTYPE html>
            <html lang='es'>
            <head>
                <meta charset='UTF-8'>
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            </head>
            <body>
                <script>
                    Swal.fire({
                        title: 'Error',
                        text: 'Correo o contraseña incorrectos.',
                        icon: 'error'
                    }).then(() => {
                        window.location.href = 'index.php?r=login';
                    });
                </script>
            </body>
            </html>";
        }
    }

    public function registro()
    {
        include 'app/views/registro.php';
    }

    public function registrar()
    {
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);

        $stmt = $this->conn->prepare("INSERT INTO usuarios (nombre, correo, contrasena) VALUES (?, ?, ?)");
        $stmt->execute([$nombre, $correo, $contrasena]);

        echo "<!DOCTYPE html>
        <html lang='es'>
        <head>
            <meta charset='UTF-8'>
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        </head>
        <body>
            <script>
                Swal.fire({
                    title: 'Registro exitoso',
                    text: 'Ahora puedes iniciar sesión.',
                    icon: 'success'
                }).then(() => {
                    window.location.href = 'index.php?r=login';
                });
            </script>
        </body>
        </html>";
    }

    public function perfil()
    {
        if (!isset($_SESSION['usuario_id'])) {
            header("Location: index.php?r=login");
            exit;
        }

        $stmt = $this->conn->prepare("SELECT * FROM usuarios WHERE id = ?");
        $stmt->execute([$_SESSION['usuario_id']]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        include 'app/views/perfil.php';
    }

    public function cerrarSesion()
    {
        session_destroy();
        header("Location: index.php");
    }

    public function cambiarContrasena()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario_id = $_SESSION['usuario_id'];
            $nueva_contrasena = password_hash($_POST['nueva_contrasena'], PASSWORD_DEFAULT);

            $sql = "UPDATE usuarios SET contrasena = ? WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$nueva_contrasena, $usuario_id]);

            echo "<!DOCTYPE html>
            <html lang='es'>
            <head>
                <meta charset='UTF-8'>
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            </head>
            <body>
                <script>
                    Swal.fire({
                        title: 'Contraseña actualizada',
                        text: 'Tu contraseña ha sido cambiada exitosamente.',
                        icon: 'success'
                    }).then(() => {
                        window.location.href = 'index.php?r=perfil';
                    });
                </script>
            </body>
            </html>";
            exit;
        }

        include 'app/views/usuarios/cambiar_contrasena.php';
    }

    public function eliminarCuenta()
    {
        if (!isset($_SESSION['usuario_id'])) {
            header("Location: index.php?r=login");
            exit;
        }

        $usuario_id = $_SESSION['usuario_id'];

        // Elimina las reservas del usuario
        $stmt1 = $this->conn->prepare("DELETE FROM reservas WHERE usuario_id = ?");
        $stmt1->execute([$usuario_id]);

        // Elimina la cuenta del usuario
        $stmt2 = $this->conn->prepare("DELETE FROM usuarios WHERE id = ?");
        $stmt2->execute([$usuario_id]);

        session_destroy();

        echo "<!DOCTYPE html>
        <html lang='es'>
        <head>
            <meta charset='UTF-8'>
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        </head>
        <body>
            <script>
                Swal.fire({
                    title: 'Cuenta eliminada',
                    text: 'Tu cuenta y reservas han sido eliminadas.',
                    icon: 'info'
                }).then(() => {
                    window.location.href = 'index.php?r=login';
                });
            </script>
        </body>
        </html>";
        exit;
    }
}

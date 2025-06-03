<?php
require_once dirname(__DIR__) . '/../config/database.php';

class ReservaController
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

    private function alertAndRedirect($mensaje, $tipo, $url)
    {
        echo "
        <!DOCTYPE html>
        <html lang='es'>
        <head>
            <meta charset='UTF-8'>
            <title>Redirigiendo...</title>
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        </head>
        <body>
            <script>
                Swal.fire({
                    icon: '$tipo',
                    title: '$mensaje',
                    showConfirmButton: false,
                    timer: 2000
                }).then(() => {
                    window.location.href = '$url';
                });
            </script>
        </body>
        </html>
        ";
    }

    public function formularioReserva()
    {
        if (!isset($_SESSION['usuario_id'])) {
            header("Location: index.php?r=login");
            exit;
        }
        include 'app/views/reservas/nueva_reserva.php';
    }

    public function crearReserva($nombre_yate, $fecha_reserva)
    {
        $usuario_id = $_SESSION['usuario_id'];

        $sql = "INSERT INTO reservas (nombre_yate, fecha_reserva, usuario_id) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$nombre_yate, $fecha_reserva, $usuario_id]);

        $this->alertAndRedirect('Reserva creada con éxito', 'success', 'index.php?r=ver_reservas');
    }

    public function verReservas()
    {
        if (!isset($_SESSION['usuario_id'])) {
            header("Location: index.php?r=login");
            exit;
        }

        $sql = "SELECT * FROM reservas WHERE usuario_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$_SESSION['usuario_id']]);
        $reservas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        include 'app/views/reservas/ver_reservas.php';
    }

    public function formularioEditar($id)
    {
        if (!isset($_SESSION['usuario_id'])) {
            header("Location: index.php?r=login");
            exit;
        }

        $stmt = $this->conn->prepare("SELECT * FROM reservas WHERE id = ? AND usuario_id = ?");
        $stmt->execute([$id, $_SESSION['usuario_id']]);
        $reserva = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$reserva) {
            $this->alertAndRedirect('Reserva no encontrada o no autorizada.', 'error', 'index.php?r=ver_reservas');
            return;
        }

        include 'app/views/reservas/editar_reserva.php';
    }

    public function actualizarReserva($id, $nombre_yate, $fecha_reserva)
    {
        if (!isset($_SESSION['usuario_id'])) {
            header("Location: index.php?r=login");
            exit;
        }

        $sql = "UPDATE reservas SET nombre_yate = ?, fecha_reserva = ? WHERE id = ? AND usuario_id = ?";
        $stmt = $this->conn->prepare($sql);
        if ($stmt->execute([$nombre_yate, $fecha_reserva, $id, $_SESSION['usuario_id']])) {
            $this->alertAndRedirect('Reserva actualizada con éxito.', 'success', 'index.php?r=ver_reservas');
        } else {
            $this->alertAndRedirect('Error al actualizar la reserva.', 'error', 'index.php?r=ver_reservas');
        }
    }

    public function eliminarReserva($id)
    {
        if (!isset($_SESSION['usuario_id'])) {
            header("Location: index.php?r=login");
            exit;
        }

        $sql = "DELETE FROM reservas WHERE id = ? AND usuario_id = ?";
        $stmt = $this->conn->prepare($sql);
        if ($stmt->execute([$id, $_SESSION['usuario_id']])) {
            $this->alertAndRedirect('Reserva eliminada con éxito.', 'success', 'index.php?r=ver_reservas');
        } else {
            $this->alertAndRedirect('Error al eliminar la reserva.', 'error', 'index.php?r=ver_reservas');
        }
    }
}

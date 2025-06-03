<?php
require_once 'app/controllers/UsuarioController.php';
require_once 'app/controllers/ReservaController.php';

$ruta = $_GET['r'] ?? 'inicio';
$usuarioController = new UsuarioController();
$reservaController = new ReservaController();

switch ($ruta) {
    case 'login':
        $usuarioController->login();
        break;


    case 'validar_login':
        $usuarioController->validarLogin();
        break;
    case 'registro':
        $usuarioController->registro();
        break;
    case 'registrar':
        $usuarioController->registrar();
        break;
    case 'perfil':
        $usuarioController->perfil();
        break;
    case 'cerrar_sesion':
        $usuarioController->cerrarSesion();
        break;
    case 'cambiar_contrasena':
        $usuarioController->cambiarContrasena();
        break;
    case 'eliminar_cuenta':
        $usuarioController->eliminarCuenta();
        break;
    case 'nueva_reserva':
        $reservaController->formularioReserva();
        break;
    case 'crear_reserva':
        $reservaController->crearReserva($_POST['nombre_yate'], $_POST['fecha_reserva']);
        break;
    case 'ver_reservas':
        $reservaController->verReservas();
        break;
    case 'editar_reserva':
        $reservaController->formularioEditar($_GET['id']);
        break;
    case 'actualizar_reserva':
        $reservaController->actualizarReserva($_POST['id'], $_POST['nombre_yate'], $_POST['fecha_reserva']);
        break;
    case 'eliminar_reserva':
        $reservaController->eliminarReserva($_GET['id']);
        break;
    case 'inicio':
        include 'app/views/inicio.php';
        break;

    default:
        echo "Ruta no válida.";
        break;
}

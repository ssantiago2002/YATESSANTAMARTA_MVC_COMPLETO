<?php
require_once '../app/controllers/UsuarioController.php';
require_once '../app/controllers/ReservaController.php';

$ruta = $_GET['r'] ?? 'inicio';

switch ($route) {
    // USUARIO
    case 'login':
        (new UsuarioController())->login();
        break;

    case 'inicio':
        include '../public/vistas_html/Index.html';
        break;


    case 'validar_login':
        (new UsuarioController())->validarLogin();
        break;

    case 'registro':
        (new UsuarioController())->registro();
        break;

    case 'registrar':
        (new UsuarioController())->registrar();
        break;

    case 'perfil':
        (new UsuarioController())->perfil();
        break;

    case 'cerrar_sesion':
        (new UsuarioController())->cerrarSesion();
        break;

    case 'cambiar_contrasena':
        (new UsuarioController())->cambiarContrasena();
        break;

    case 'eliminar_cuenta':
        (new UsuarioController())->eliminarCuenta();
        break;

    // RESERVAS
    case 'crear_reserva':
        (new ReservaController())->crearReserva($_POST['nombre_yate'], $_POST['fecha_reserva']);
        break;

    case 'ver_reservas':
        (new ReservaController())->verReservas();
        break;

    case 'editar_reserva':
        (new ReservaController())->editarReserva($_GET['id']);
        break;

    case 'actualizar_reserva':
        (new ReservaController())->actualizarReserva($_POST['id'], $_POST['nombre_yate'], $_POST['fecha_reserva']);
        break;

    case 'eliminar_reserva':
        (new ReservaController())->eliminarReserva($_GET['id']);
        break;

    default:
        echo "Ruta no válida.";
        break;
}

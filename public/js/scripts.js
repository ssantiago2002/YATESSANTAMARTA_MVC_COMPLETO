document.addEventListener("DOMContentLoaded", () => {
    // Mostrar alerta al eliminar reserva
    const eliminarLinks = document.querySelectorAll(".eliminar-reserva");
    eliminarLinks.forEach(link => {
        link.addEventListener("click", (e) => {
            const confirmar = confirm("¿Estás seguro de que deseas eliminar esta reserva?");
            if (!confirmar) {
                e.preventDefault();
            }
        });
    });

    // Mostrar mensaje cuando se cambia contraseña
    const cambioForm = document.getElementById("form-cambiar-contrasena");
    if (cambioForm) {
        cambioForm.addEventListener("submit", () => {
            alert("Contraseña cambiada correctamente");
        });
    }
});

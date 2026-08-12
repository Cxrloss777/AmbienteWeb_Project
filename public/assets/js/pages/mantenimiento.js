const botonMantenimiento = document.querySelector("#boton-mantenimiento");
const mensajeMantenimiento = document.querySelector("#mensaje-mantenimiento");

botonMantenimiento.addEventListener("click", validarMantenimiento);

function validarMantenimiento(event) {
    const residente = document.querySelector("#residente").value.trim();
    const categoria = document.querySelector("#categoria").value;
    const descripcion = document.querySelector("#descripcion").value.trim();
    const fecha = document.querySelector("#fecha").value;

    if (
        residente === "" ||
        categoria === "" ||
        descripcion === "" ||
        fecha === ""
    ) {
        event.preventDefault();

        mostrarMensajeMantenimiento(
            "Debe llenar todos los espacios obligatorios.",
            "danger"
        );
    }
}

function mostrarMensajeMantenimiento(texto, tipo) {
    mensajeMantenimiento.textContent = texto;
    mensajeMantenimiento.className = "alert alert-" + tipo;
}
const botonRegistrar = document.querySelector("#boton-registrar");
const mensajeVisitante = document.querySelector("#mensaje-visitante");

botonRegistrar.addEventListener("click", validarVisitante);

function validarVisitante(event) {
    const nombre = document.querySelector("#nombre").value.trim();
    const cedula = document.querySelector("#cedula").value.trim();
    const visitado = document.querySelector("#visitado").value.trim();
    const vivienda = document.querySelector("#vivienda_id").value;
    const fecha = document.querySelector("#fecha").value;
    const hora = document.querySelector("#hora").value;
    const cantidad = document.querySelector("#cantidad").value;

    if (
        nombre === "" ||
        cedula === "" ||
        visitado === "" ||
        vivienda === "" ||
        fecha === "" ||
        hora === ""
    ) {
        event.preventDefault();

        mostrarMensajeVisitante(
            "Debe llenar todos los espacios obligatorios.",
            "danger"
        );

    } else if (cantidad <= 0) {

        event.preventDefault();

        mostrarMensajeVisitante(
            "La cantidad de personas debe ser mayor que cero.",
            "danger"
        );
    }
}

function mostrarMensajeVisitante(texto, tipo) {
    mensajeVisitante.textContent = texto;
    mensajeVisitante.className = "alert alert-" + tipo;
}
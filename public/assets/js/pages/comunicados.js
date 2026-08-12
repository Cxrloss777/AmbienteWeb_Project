const botonPublicar = document.querySelector("#boton-publicar");
const mensajeComunicado = document.querySelector("#mensaje-comunicado");

botonPublicar.addEventListener("click", validarComunicado);

function validarComunicado(event) {
    const titulo = document.querySelector("#titulo").value.trim();
    const contenido = document.querySelector("#contenido").value.trim();
    const fecha = document.querySelector("#fecha").value;

    if (
        titulo === "" ||
        contenido === "" ||
        fecha === ""
    ) {
        event.preventDefault();

        mostrarMensajeComunicado(
            "Debe llenar todos los espacios obligatorios.",
            "danger"
        );
    }
}

function mostrarMensajeComunicado(texto, tipo) {
    mensajeComunicado.textContent = texto;
    mensajeComunicado.className = "alert alert-" + tipo;
}
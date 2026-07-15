const botonReservar = document.querySelector("#boton-reservar");
const mensajeReserva = document.querySelector("#mensaje-reserva");
const fechaReserva = document.querySelector("#fecha");

const hoy = new Date();
let mesActual = hoy.getMonth() + 1;
let diaActual = hoy.getDate();

if (mesActual < 10) {
    mesActual = "0" + mesActual;
}

if (diaActual < 10) {
    diaActual = "0" + diaActual;
}

const fechaActual = hoy.getFullYear() + "-" + mesActual + "-" + diaActual;
fechaReserva.min = fechaActual;

botonReservar.addEventListener("click", validarReserva);

function validarReserva() {
    const nombre = document.querySelector("#nombre").value.trim();
    const contacto = document.querySelector("#contacto").value.trim();
    const vivienda = document.querySelector("#vivienda-reserva").value.trim();
    const area = document.querySelector("#area").value;
    const fecha = fechaReserva.value;
    const personas = document.querySelector("#personas").value;
    const horaInicio = document.querySelector("#hora-inicio").value;
    const horaFin = document.querySelector("#hora-fin").value;

    if (
        nombre === "" ||
        contacto === "" ||
        vivienda === "" ||
        area === "" ||
        fecha === "" ||
        personas === "" ||
        horaInicio === "" ||
        horaFin === ""
    ) {
        mostrarMensajeReserva("Debe llenar todos los espacios obligatorios.", "danger");
    } else if (
        contacto.includes("@") === false ||
        contacto.includes(".") === false ||
        contacto.includes(" ") === true
    ) {
        mostrarMensajeReserva("Debe ingresar un correo electrónico válido.", "danger");
    } else if (personas <= 0) {
        mostrarMensajeReserva("El número de personas debe ser mayor que cero.", "danger");
    } else if (fecha < fechaActual) {
        mostrarMensajeReserva("La fecha no puede ser anterior a la fecha actual.", "danger");
    } else if (horaFin <= horaInicio) {
        mostrarMensajeReserva("La hora de finalización debe ser posterior a la hora de inicio.", "danger");
    } else {
        const partesFecha = fecha.split("-");
        const fechaFormato = partesFecha[2] + "/" + partesFecha[1] + "/" + partesFecha[0];

        mensajeReserva.innerHTML =
            "Reservación realizada correctamente.<br>" +
            "Área: " + area + "<br>" +
            "Fecha: " + fechaFormato + "<br>" +
            "Horario: " + horaInicio + " - " + horaFin;

        mensajeReserva.className = "alert alert-success";
        botonReservar.disabled = true;
        botonReservar.textContent = "Reserva Completada";
    }
}

function mostrarMensajeReserva(texto, tipo) {
    mensajeReserva.textContent = texto;
    mensajeReserva.className = "alert alert-" + tipo;
}

const formularioReserva = document.querySelector("#formulario-reserva");
const fechaReserva = document.querySelector("#fecha");
const areaReserva = document.querySelector("#area_id");
const personasReserva = document.querySelector("#personas");
const horaInicio = document.querySelector("#hora_inicio");
const horaFin = document.querySelector("#hora_fin");
const mensajeReserva = document.querySelector("#mensaje-reserva");
const capacidadArea = document.querySelector("#capacidad-area");

if (fechaReserva) {
    const hoy = new Date();
    const anio = hoy.getFullYear();
    const mes = String(hoy.getMonth() + 1).padStart(2, "0");
    const dia = String(hoy.getDate()).padStart(2, "0");
    fechaReserva.min = `${anio}-${mes}-${dia}`;
}

function actualizarCapacidad() {
    if (!areaReserva || !capacidadArea) {
        return;
    }

    const opcion = areaReserva.options[areaReserva.selectedIndex];
    const capacidad = opcion ? opcion.dataset.capacidad : "";

    if (capacidad) {
        capacidadArea.textContent = `Capacidad máxima: ${capacidad} personas.`;
        personasReserva.max = capacidad;
    } else {
        capacidadArea.textContent = "";
        personasReserva.removeAttribute("max");
    }
}

if (areaReserva) {
    areaReserva.addEventListener("change", actualizarCapacidad);
    actualizarCapacidad();
}

if (formularioReserva) {
    formularioReserva.addEventListener("submit", function (event) {
        mensajeReserva.classList.add("d-none");

        if (horaFin.value <= horaInicio.value) {
            event.preventDefault();
            mensajeReserva.textContent = "La hora de finalización debe ser posterior a la hora de inicio.";
            mensajeReserva.classList.remove("d-none");
            return;
        }

        const opcion = areaReserva.options[areaReserva.selectedIndex];
        const capacidad = opcion ? parseInt(opcion.dataset.capacidad || "0") : 0;
        const personas = parseInt(personasReserva.value || "0");

        if (capacidad > 0 && personas > capacidad) {
            event.preventDefault();
            mensajeReserva.textContent = `El área seleccionada permite un máximo de ${capacidad} personas.`;
            mensajeReserva.classList.remove("d-none");
        }
    });
}

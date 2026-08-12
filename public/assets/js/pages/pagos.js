document.addEventListener("DOMContentLoaded", function () {
    const formulario = document.querySelector("#formulario-pago");

    if (!formulario) {
        return;
    }

    const botonPagar = document.querySelector("#boton-pagar");
    const mensajePago = document.querySelector("#mensaje-pago");
    const titular = document.querySelector("#titular");
    const numeroTarjeta = document.querySelector("#numero-tarjeta");
    const vencimiento = document.querySelector("#vencimiento");
    const cvv = document.querySelector("#cvv");

    numeroTarjeta.addEventListener("input", function () {
        let numero = numeroTarjeta.value.replace(/\D/g, "");
        numero = numero.substring(0, 16);
        numeroTarjeta.value = numero.replace(/(.{4})/g, "$1 ").trim();
    });

    cvv.addEventListener("input", function () {
        cvv.value = cvv.value.replace(/\D/g, "").substring(0, 4);
    });

    formulario.addEventListener("submit", function (event) {
        event.preventDefault();

        const tarjeta = numeroTarjeta.value.replace(/\s/g, "");
        const fechaActual = new Date();
        const mesActual = String(fechaActual.getMonth() + 1).padStart(2, "0");
        const vencimientoMinimo = fechaActual.getFullYear() + "-" + mesActual;

        if (
            titular.value.trim() === "" ||
            tarjeta === "" ||
            vencimiento.value === "" ||
            cvv.value.trim() === ""
        ) {
            mostrarMensaje("Debe completar todos los datos ficticios de la tarjeta.", "danger");
            return;
        }

        if (tarjeta.length !== 16 || isNaN(tarjeta)) {
            mostrarMensaje("El número de tarjeta debe contener 16 dígitos.", "danger");
            return;
        }

        if (cvv.value.length !== 3 && cvv.value.length !== 4) {
            mostrarMensaje("El código CVV debe contener 3 o 4 dígitos.", "danger");
            return;
        }

        if (vencimiento.value < vencimientoMinimo) {
            mostrarMensaje("La tarjeta ficticia debe tener una fecha de vencimiento válida.", "danger");
            return;
        }

        /*
         * Los campos de tarjeta NO tienen atributo name en el HTML.
         * Por eso el navegador no los envía al servidor.
         * Solamente se envía el identificador de la cuota que se va a marcar como pagada.
         */
        botonPagar.disabled = true;
        botonPagar.textContent = "Procesando simulación...";

        formulario.submit();
    });

    function mostrarMensaje(texto, tipo) {
        mensajePago.textContent = texto;
        mensajePago.className = "alert alert-" + tipo;
    }
});

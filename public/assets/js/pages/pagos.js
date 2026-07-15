const botonPagar = document.querySelector("#boton-pagar");
const mensajePago = document.querySelector("#mensaje-pago");
const numeroTarjeta = document.querySelector("#numero-tarjeta");

numeroTarjeta.addEventListener("input", function () {
    let numero = numeroTarjeta.value.replace(/\D/g, "");
    numero = numero.substring(0, 16);
    numeroTarjeta.value = numero.replace(/(.{4})/g, "$1 ").trim();
});

botonPagar.addEventListener("click", validarPago);

function validarPago() {
    const residente = document.querySelector("#residente").value.trim();
    const vivienda = document.querySelector("#vivienda").value.trim();
    const concepto = document.querySelector("#concepto").value;
    const monto = document.querySelector("#monto").value;
    const titular = document.querySelector("#titular").value.trim();
    const tarjeta = numeroTarjeta.value.replace(/\s/g, "");
    const vencimiento = document.querySelector("#vencimiento").value;
    const cvv = document.querySelector("#cvv").value.trim();

    if (
        residente === "" ||
        vivienda === "" ||
        concepto === "" ||
        monto === "" ||
        titular === "" ||
        tarjeta === "" ||
        vencimiento === "" ||
        cvv === ""
    ) {
        mostrarMensaje("Debe llenar todos los espacios.", "danger");
    } else if (monto <= 0) {
        mostrarMensaje("El monto debe ser mayor que cero.", "danger");
    } else if (tarjeta.length !== 16 || isNaN(tarjeta)) {
        mostrarMensaje("El número de tarjeta debe contener 16 dígitos.", "danger");
    } else if ((cvv.length !== 3 && cvv.length !== 4) || isNaN(cvv)) {
        mostrarMensaje("El código CVV debe contener 3 o 4 dígitos.", "danger");
    } else {
        const montoFormato = Number(monto).toLocaleString("es-CR");
        const ultimosDigitos = tarjeta.substring(12);

        mensajePago.innerHTML =
            "Pago completado correctamente.<br>" +
            "Monto: ₡" + montoFormato + "<br>" +
            "Tarjeta terminada en: " + ultimosDigitos;

        mensajePago.className = "alert alert-success";
        botonPagar.disabled = true;
        botonPagar.textContent = "Pago Completado";
    }
}

function mostrarMensaje(texto, tipo) {
    mensajePago.textContent = texto;
    mensajePago.className = "alert alert-" + tipo;
}

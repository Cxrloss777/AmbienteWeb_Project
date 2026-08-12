document.addEventListener("DOMContentLoaded", function () {

    const botonDescargar = document.getElementById("descargar-pdf");
    const recibo = document.getElementById("recibo-pago");

    if (!botonDescargar || !recibo) {
        return;
    }

    botonDescargar.addEventListener("click", function () {

        if (!window.jspdf || !window.jspdf.jsPDF) {
            alert("No se pudo cargar el generador de PDF.");
            return;
        }

        const { jsPDF } = window.jspdf;

        const numero = recibo.dataset.numero || "RECIBO";
        const fecha = recibo.dataset.fecha || "";
        const residente = recibo.dataset.residente || "";
        const cedula = recibo.dataset.cedula || "";
        const vivienda = recibo.dataset.vivienda || "";
        const concepto = recibo.dataset.concepto || "";
        const metodo = recibo.dataset.metodo || "";
        const monto = recibo.dataset.monto || "0";

        const pdf = new jsPDF({
            orientation: "portrait",
            unit: "mm",
            format: "a4"
        });

        const izquierda = 22;
        const derecha = 188;

        pdf.setFont("helvetica", "bold");
        pdf.setFontSize(20);
        pdf.text("ResidenciaNet", 105, 25, { align: "center" });

        pdf.setFont("helvetica", "normal");
        pdf.setFontSize(11);
        pdf.text("RECIBO DE PAGO", 105, 33, { align: "center" });

        pdf.setLineWidth(0.4);
        pdf.line(izquierda, 40, derecha, 40);

        pdf.setFontSize(10);

        pdf.setFont("helvetica", "bold");
        pdf.text("Numero de recibo:", izquierda, 51);

        pdf.setFont("helvetica", "normal");
        pdf.text(numero, izquierda + 38, 51);

        pdf.setFont("helvetica", "bold");
        pdf.text("Fecha de pago:", 123, 51);

        pdf.setFont("helvetica", "normal");
        pdf.text(fecha, 151, 51);

        pdf.line(izquierda, 59, derecha, 59);

        let y = 70;

        function agregarCampo(etiqueta, valor) {

            pdf.setFont("helvetica", "bold");
            pdf.text(etiqueta, izquierda, y);

            pdf.setFont("helvetica", "normal");

            const lineas = pdf.splitTextToSize(String(valor), 120);
            pdf.text(lineas, izquierda + 42, y);

            y += Math.max(10, lineas.length * 5 + 5);
        }

        agregarCampo("Residente:", residente);
        agregarCampo("Cedula:", cedula);
        agregarCampo("Vivienda:", vivienda);
        agregarCampo("Concepto:", concepto);
        agregarCampo("Metodo:", metodo);
        agregarCampo("Estado:", "PAGADO");

        y += 2;

        pdf.line(izquierda, y, derecha, y);

        y += 14;

        pdf.setFont("helvetica", "normal");
        pdf.setFontSize(10);
        pdf.text("TOTAL PAGADO", izquierda, y);

        pdf.setFont("helvetica", "bold");
        pdf.setFontSize(16);
        pdf.text("CRC " + monto, derecha, y, { align: "right" });

        y += 8;

        pdf.setLineWidth(0.7);
        pdf.line(izquierda, y, derecha, y);

        pdf.setFont("helvetica", "normal");
        pdf.setFontSize(9);

        pdf.text(
            "Comprobante generado por ResidenciaNet",
            105,
            275,
            { align: "center" }
        );

        const nombreArchivo =
            numero.replace(/[^a-zA-Z0-9_-]/g, "_") + ".pdf";

        pdf.save(nombreArchivo);
    });
});

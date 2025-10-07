function verificarEdad() {
    const fechaInput = document.getElementById("fechaNacimiento").value;
    const datosResponsable = document.getElementById("datosResponsable");

    if (!fechaInput) return;

    const hoy = new Date();
    const nacimiento = new Date(fechaInput);
    let edad = hoy.getFullYear() - nacimiento.getFullYear();
    const m = hoy.getMonth() - nacimiento.getMonth();

    if (m < 0 || (m === 0 && hoy.getDate() < nacimiento.getDate())) {
        edad--;
    }

    if (edad < 18) {
        datosResponsable.classList.remove("hidden");
    } else {
        datosResponsable.classList.add("hidden");
    }
}

window.verificarEdad = verificarEdad;

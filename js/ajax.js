const formularios_ajax = document.querySelectorAll(".FormularioAjax");

function enviar_formulario_ajax(e) {
    e.preventDefault();

    let enviar = confirm("¿Quieres guardar los datos?");

    if (enviar) {
        let data = new FormData(this);
        let method = this.getAttribute("method");
        let action = this.getAttribute("action");
        
        let config = {
            method: method,
            mode: "cors",
            cache: "no-cache",
            body: data
        };

        fetch(action, config)
        .then(respuesta => respuesta.text()) // <--- CAMBIO: text() en lugar de json()
        .then(respuesta => {
            // Buscamos el contenedor donde se mostrará la alerta
            let contenedor = document.querySelector(".form-rest");
            if (contenedor) {
                contenedor.innerHTML = respuesta;
                // Si el registro fue exitoso, opcionalmente puedes limpiar el form:
                // if(respuesta.includes("alert-success")) { this.reset(); }
            } else {
                alert("Error: No se encontró el contenedor .form-rest en el HTML");
            }
        })
        .catch(error => {
            console.error('Error fatal:', error);
        });
    }
}

formularios_ajax.forEach(formulario => {
    formulario.addEventListener("submit", enviar_formulario_ajax);
});




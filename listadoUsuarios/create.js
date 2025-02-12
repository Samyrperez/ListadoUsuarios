
document.addEventListener('DOMContentLoaded', function () {

    //-----------CREATE----------------
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById("saveForm").addEventListener("submit", function (event) {
            event.preventDefault();
    
            let formData = new FormData(this);
    
            fetch("create.php", { // Asegúrate de que la ruta sea correcta
                method: "POST",
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message); // Muestra el mensaje del servidor
                if (data.status === "success") {
                    this.reset(); // Limpia el formulario si todo salió bien
                    cargarUsuarios(); // Recarga la tabla con los nuevos datos
                }
            })
            .catch(error => console.error("Error:", error));
        });
    });
    
    

});


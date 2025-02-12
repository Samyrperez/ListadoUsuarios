document.addEventListener('DOMContentLoaded', function() {
    cargarUsuarios();
});

function cargarUsuarios(){
    fetch("read.php")
        .then(response => response.json()) //Convertir a json
        .then(data => {
            let tbody = document.querySelector("#dataTable tbody");
            tbody.innerHTML = ""; // Limpiar la tabal antes de insertar los datos

            data.forEach(usuario => {
                let fila = document.createElement("tr");
                fila.innerHTML = `
                    <td>${usuario.id}</td>
                    <td>${usuario.cedula}</td>
                    <td>${usuario.nombre}</td>
                    <td>${usuario.edad}</td>
                    <td>${usuario.ciudad}</td>
                    <td>${usuario.estado}</td>
                    <td>
                        <button onclick="editarUsuario(${usuario.id})">Editar</button>
                        <button onclick="eliminarUsuario(${usuario.id})">Eliminar</button>
                    </td>
                `;
                tbody.appendChild(fila);

            });
        })
        .catch(error => console.error("Error al obtener los datos:" , error));
}


/*
- fetch("read.php"):
Hace una petición HTTP GET a read.php para obtener los datos de la base de datos.
fetch() es una función nativa de JavaScript que nos permite hacer solicitudes HTTP (GET, POST, etc.).

- .then(response => response.json()):
Cuando la petición se completa, fetch() devuelve una promesa, que contiene la respuesta del servidor.
response.json() convierte esa respuesta en un formato JSON que JavaScript pueda entender.

- document.querySelector("#dataTable tbody"):
Seleccionamos el <tbody> de la tabla donde se insertarán los datos.
tbody.innerHTML = "";:
Limpiamos cualquier contenido previo de la tabla antes de agregar nuevos datos.
¿Por qué lo usamos?
Evitamos que los datos se dupliquen cada vez que cargarUsuarios() es ejecutada.

data.forEach(usuario => { ... }):
data es un array de objetos JSON que nos envió read.php.
Con forEach(), recorremos cada usuario dentro de data.
*/


document.addEventListener('DOMContentLoaded', function () {

    //-----------CREATE----------------
    document.getElementById("saveForm").addEventListener("submit", function (event) {
        event.preventDefault();

        let formData = new FormData(this);

        fetch("create.php", {
            method: "POST",
            body: formData
        })
            .then(response => response.json())  // Convertir la respuesta a JSON
            .then(data => {
                alert(data.message); // Muestra el mensaje de éxito o error
                if (data.status === "success") {
                    this.reset(); // Limpia el formulario si todo salió bien
                    cargarUsuarios(); // Recarga la tabla con los nuevos datos
                }
            })
            .catch(error => console.error("Error", error));
    });
});


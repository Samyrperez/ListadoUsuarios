document.addEventListener('DOMContentLoaded', function() {
    cargarUsuarios();
});

// --------------READ-------------------
function cargarUsuarios(){
    fetch("read.php")
        .then(response => response.json()) //Convertir a json
        .then(data => { // data es un array de objetos JSON que nos envió read.php.
            let tbody = document.querySelector("#dataTable tbody");
            tbody.innerHTML = ""; // Limpiar la tabal antes de insertar los datos

            if (data.length === 0) {
                let fila = document.createElement("tr");
                fila.innerHTML = `<td colspan="7" style="text-align: center; font-weight: bold;">No hay datos disponibles</td>`;
                tbody.appendChild(fila);
                return;
            }

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
                        <button onclick="editarUsuario(${usuario.id})"><img src='./image/edit.png'</button>
                        <button onclick="eliminarUsuario(${usuario.id})"><img src='./image/delete.png'></button>
                    </td>
                `;
                tbody.appendChild(fila);

            });
        })
        .catch(error => console.error("Error al obtener los datos:" , error));
}


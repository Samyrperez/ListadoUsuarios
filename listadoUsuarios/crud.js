document.addEventListener('DOMContentLoaded', function (){

    // Función read
    function all(id, nombre) {
        // Contruir la url con los parametros
        let url = `read.php?id=${$encodeURIComponent(id)}&nombre=${encodeURIComponent(nombre)}`;

        // Realizar la petición con fetch (ajax)
        fetch(url, {method: 'GET'})
            .then(response=> {
                if (!response.ok) {
                    throw new Error('Error en la solicitud');	
                }
                return response.text(); // Convertir la respuesta a texto
            })
            .then(data => {
                document.querySelector('#dataTable tbody').innerHTML = data; // Insertar la respuesta en la tabla
            })
            .catch(() =>{
                document.querySelector('#searchResult').innerHTML = 'Error en la solicitud';
            });
    }

    // Evento para el formulario de búsqueda
    document.querySelector('#searchForm').addEventListener('submit', function (event) {
        event.preventDefault();
        let id = document.querySelector('#id').value;
        let nombre = document.querySelector('#nombre').value;
        all(id, nombre);
    });

    document.querySelector('#reload').addEventListener("click", function(){
        all();
    });


    // CREATE
    document.querySelector('#createForm').addEventListener('submit', function (event) {
        event.preventDefault();
        let formData = new FormData(this);

        fetch('create.php', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Error en la solicitud');
            }
            return response.text();
        })
        .then(data => {
            document.querySelector('#createResult').innerHTML = data;
            // Opcional: recargar la lista de usuarios después de crear uno nuevo
            all();
        })
        .catch(() => {
            document.querySelector('#createResult').innerHTML = 'Error en la solicitud';
        });
    });


});
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./image/crud.css?=v<?php echo time(); ?>">
    <title>Listado de Usuarios</title>
    <link rel="shortcut icon" href="./image/Person.png" type="image/x-icon">
</head>
<body>
    <div class="title">
        <h1>Listado De Usuarios</h1>
    </div>

    <div class="container-query">

        <div class="query">

            <form action="read.php"  id="searchForm" method="get">
                <label for="id">Código: </label>
                <input type="number" name="id" id="id" placeholder="Código del producto">

                <label for="name">Nombre: </label>
                    <input type="text" name="nombre" id="nombre" placeholder="Nombre">

                <button type="submit"><img src="./image/search.png" alt="">Buscar</button>
            </form>

        </div>

    </div>

    <div class="container">
            <div class="container-table">
                <table id="dataTable">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Cedula</th>
                            <th>Nombre</th>
                            <th>Edad</th>
                            <th>Ciudad</ht>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Aquí se cargan los datos con AJAX y read.php
                    -->
                    </tbody>
                </table>

                <button id="reload">Recargar Usuarios</button>
            </div>

            <div class="create">
                <form action="#" method="POST" id="saveForm">
                <input type="hidden" name="idUpdate" id="idUpdate" value="">
                <!-- type="hidden"  oculto -->

                <label for="cedula">Cedula</label>
                <input type="text" id="cedula" name="cedula" required>
                <br>

                <label for="nameUsuario">Nombre del usuario:</label>
                <textarea id="nameUsuario" name="nameUsuario" required></textarea>
                <br>

                <label for="edad">Edad:</label>
                <input type="number" id="edad" name="edad" min="1" required>
                <br>

                <label for="ciudad">Ciudad: </label>
                <input type="text" name="ciudad" id="ciudad" require>
                <br>

                <label for="estado">Estado:</label>
                
                <br>
                <select id="estado" name="estado" >
                    <option value="Disponible">Disponible</option>
                    <option value="No Disponible">No Disponible</option>
                </select>

                <label for="categoria">Categoría:</label>
                <input type="text" id="categoria" name="categoria" required>
                <br>


                <br>
                <button type="submit">Crear Usuario</button>
                
                </form>
            </div>

        </div>
</body>
</html>
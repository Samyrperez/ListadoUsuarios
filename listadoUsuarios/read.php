<?php

include 'conexion.php';

// Capturar los datos del formulario
$id = isset($_GET['id']) ? intval($_GET['id']) : null;
$nombre = isset($_GET['nombre']) ? $conn->real_escape_string($_GET['nombre']) : null;

// Construir y ejecutar la consulta
$sql = "SELECT * FROM lista_usuarios WHERE 1";

// Condiciones según los datos recibidos
// si recibe los dos campos concatena= SELECT * FROM listado_productos WHERE 1 + AND id = $id + AND nombre LIKE '%$nombre%'

// Si solo recibe el id:  SELECT * FROM listado_productos WHERE 1 + AND id = $id
if ($id) {
    $sql .= " AND id = $id";
}
// Si solo recibe el nombre:  SELECT * FROM listado_productos WHERE 1 + AND nombre LIKE '%$nombre%'
if ($nombre) {
    $sql .= " AND nombre LIKE '%$nombre%'";
}

// Ejecutar la consulta
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) 
{
    while ($row = $result->fetch_assoc()) 
    {
        echo "<tr>
        <td id='id_{$row['id']}'>{$row['id']}</td>
        <td id='cedula_{$row['id']}'>{$row['cedula']}</td>
        <td id='nombre_{$row['id']}'>{$row['nombre']}</td>
        <td id='edad_{$row['id']}'>{$row['edad']}</td>
        <td id='ciudad_{$row['id']}'>{$row['ciudad']}</td>
        <td id='estado_{$row['id']}'>{$row['estado']}</td>
        <td id='fecha_{$row['id']}'>{$row['fecha']}</td>
        <td>
            <button class='btn-edit' data-id='{$row['id']}'><img src='./image/edit.png'></button>
            <button class='btn-delete' data-id='{$row['id']}'><img src='./image/delete.png'></button>
        </td>
        </tr>
        ";
    }
} else {
    echo "<tr><td colspan='8'>No se encontraron resultados</td></tr>";
}
$conn->close();

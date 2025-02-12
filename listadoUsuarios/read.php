<?php

include 'db.php';

$sql = "SELECT * FROM lista_usuarios";
$result = $conn->query($sql);

$usuarios = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $usuarios[] = $row; // Guardar cada fila en el array
    }
}

echo json_encode($usuarios);


$conn->close();

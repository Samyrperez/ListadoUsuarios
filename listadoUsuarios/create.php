<?php

include 'conexion.php';

// 1. Capturar los datos del formulario
if ($_SERVER['RESQUEST_METHOD'] === 'POST') {
    $cedula = $_POST['cedula'];
    $nameUsuario = $_POST['nameUsuario'];
    $edad = $_POST['edad'];
    $ciudad = $_POST['ciudad'];
    $estado = $_POST['estado'];
    $fecha = date('Y-m-d H:i:s');

    // 2.Contruir y ejecutar la consulta
    // 2.1. Validar si los campos estan completos
    if (!empty($cedula) && 
    !empty($nameUsuario) &&
    !empty($edad) &&
    !empty($ciudad) &&
    !empty($estado)) {

        $sql = "INSERT INTO usuarios (cedula, nameUsuario, edad, ciudad, estado, fecha) VALUES ('$cedula', '$nameUsuario', '$edad', '$ciudad', '$estado', '$fecha')";

        if ($conn->query($sql) === TRUE) {
            echo "Nuevo registro creado";
        } else {
            echo "error " . $sql . "<br>" . $conn->error;
        } 
    } else {
        echo "Todos los campos son obligatorios";
    }
    
} else {
    echo "Error en el metodo de envio";
}
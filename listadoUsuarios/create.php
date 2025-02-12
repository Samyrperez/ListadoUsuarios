<?php
include 'db.php';

// 1. Capturar los datos del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cedula = trim($_POST['cedula']);
    $nameUsuario = trim($_POST['nameUsuario']);
    $edad = intval($_POST['edad']);
    $ciudad = trim($_POST['ciudad']);
    $estado = trim($_POST['estado']);
    $fecha = date('Y-m-d H:i:s');

    // 2. Validar que los campos no estén vacíos
    if (!empty($cedula) && !empty($nameUsuario) && !empty($edad) && !empty($ciudad) && !empty($estado)) {

        // 3. Insertar en la base de datos
        $sql = "INSERT INTO lista_usuarios (cedula, nombre, edad, ciudad, estado, fecha) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssisss", $cedula, $nameUsuario, $edad, $ciudad, $estado, $fecha);

        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "Usuario creado correctamente."]);
        } else {
            echo json_encode(["status" => "error", "message" => "Error al guardar el usuario."]);
        }

        $stmt->close();
        $conn->close();
    } else {
        echo json_encode(["status" => "error", "message" => "Todos los campos son obligatorios."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Método no permitido."]);
}

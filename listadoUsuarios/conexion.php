<?php

$servername = "localhost";
$username= "root";
$password = "";
$dbname ="usuario";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die ("Connexion fallida: " . $conn->connect_error); 
}

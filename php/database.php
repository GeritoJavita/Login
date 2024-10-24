<?php

$servername = 'localhost';
$username = 'root'; 
$password = '';
$dbname = 'test';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die('Error en la conexión: ' . $conn->connect_error);
}
else{
    echo "Conectado correctamente a la base de datos";
}
?>


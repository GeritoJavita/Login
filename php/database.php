<?php

$host = 'localhost';
$username = 'root'; 
$password = '';
$dbname = 'test';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die('Error en la conexión: ' . $conn->connect_error);
}

?>


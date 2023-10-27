<?php
// Establecer la cabecera de respuesta para indicar que estamos respondiendo con JSON.
header("Content-Type: application/json");

// Conectar a la base de datos MySQL (Asegúrate de tener los datos de conexión correctos).
$host = "localhost";
$usuario = "u895534236_ocontreras";
$contrasena = "fjz6GG5l7ly{";
$base_de_datos = "u895534236_inscripciones";

$conexion = new mysqli($host, $usuario, $contrasena, $base_de_datos);

// Verificar la conexión.
if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}

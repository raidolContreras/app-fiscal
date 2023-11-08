<?php

require_once 'controller/controller.php';

// Ruta para obtener todos los títulos y sus capítulos, secciones, artículos y párrafos asociados.

if (isset($_GET['resource'])) {

    if ($_GET['resource'] === 'titles') {

        header("Content-Type: application/json");
        $titles = ControllerApi::titles(null,null);

    }else {

        require 'inexistente.html';

    }

} elseif (isset($_GET['reglament'])) {

    header("Content-Type: application/json");
    $titles = ControllerApi::titles('Reglamento',$_GET['reglament']);

} elseif(isset($_GET['register'])){

    header("Content-Type: application/json");
    $name = $_GET['name'] ?? null;
    $email = $_GET['email'] ?? null;
    $password = $_GET['password'] ?? null;

    if (empty($name)) {
        echo json_encode(['error' => 'Nombre vacío']);
    }
    if (empty($email)) {
        echo json_encode(['error' => 'Email vacío']);
    }
    if (empty($password)) {
        echo json_encode(['error' => 'Contraseña vacía']);
    }
    $registrar = ControllerApi::createUser($name, $email, $password);
    echo $registrar;

}elseif(isset($_GET['login'])){

    header("Content-Type: application/json");
    $email = $_GET['email'] ?? null;
    $password = $_GET['password'] ?? null;

    if (empty($email)) {
        echo json_encode(['error' => 'Email vacío']);
    }
    if (empty($password)) {
        echo json_encode(['error' => 'Contraseña vacía']);
    }
    $registrar = ControllerApi::loginUser($email, $password);
    echo $registrar;

}elseif(isset($_GET['data'])){

    header("Content-Type: application/json");
    $email = $_GET['email'] ?? null;

    if (empty($email)) {
        echo json_encode(['error' => 'Email vacío']);
    }
    $registrar = ControllerApi::loadData($email);
    echo $registrar;

}else {

    require 'base.html';

}
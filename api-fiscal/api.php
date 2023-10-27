<?php

require_once 'controller/controller.php';
// Ruta para obtener todos los títulos y sus capítulos, secciones, artículos y párrafos asociados.
if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    header("Content-Type: application/json");

    if (isset($_GET['resource']) && $_GET['resource'] === 'titles') {
        $titles = ControllerApi::titles(null,null);
    } elseif (isset($_GET['resource']) && $_GET['resource'] === 'title' && isset($_GET['reglament'])) {
        $titles = ControllerApi::titles('Reglamento',$_GET['reglament']);
    }
    
}
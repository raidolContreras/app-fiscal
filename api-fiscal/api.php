<?php
header("Content-Type: application/json");
require_once 'controller/controller.php';
// Ruta para obtener todos los títulos y sus capítulos, secciones, artículos y párrafos asociados.
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['resource']) && $_GET['resource'] === 'titles') {
    $titles = ControllerApi::titles();
}
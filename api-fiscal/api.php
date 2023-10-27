<?php

require_once 'controller/controller.php';

// Ruta para obtener todos los títulos y sus capítulos, secciones, artículos y párrafos asociados.

if (isset($_GET['resource'])) {

    if ($_GET['resource'] === 'titles') {

        header("Content-Type: application/json");
        $titles = ControllerApi::titles(null,null);

    } elseif ($_GET['resource'] === 'title' && isset($_GET['reglament'])) {

        header("Content-Type: application/json");
        $titles = ControllerApi::titles('Reglamento',$_GET['reglament']);

    } else {

        require 'inexistente.html';

    }

} else {

    require 'base.html';

}
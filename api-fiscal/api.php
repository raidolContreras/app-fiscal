<?php
require_once 'controller/controller.php'
// Ruta para obtener todos los títulos y sus capítulos, secciones, artículos y párrafos asociados.
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['resource']) && $_GET['resource'] === 'titles') {
    // Consulta para seleccionar todos los títulos con sus capítulos, secciones, artículos y párrafos asociados.
    $sql = "SELECT t.idTitles, t.name_title, t.status_title, t.type_title, t.Admin_idAdmin,
                   c.idChapters, c.name_Chapter,
                   s.idSections, s.name_section,
                   a.idArticles, a.name_article,
                   p.idParagraph, p.paragraph, p.position
            FROM app_titles t
            LEFT JOIN app_chapter c ON t.idTitles = c.Title_idTitles
            LEFT JOIN app_sections s ON c.idChapters = s.Chapter_idChapters
            LEFT JOIN app_articles a ON (a.Title_idTitles = t.idTitles OR a.Chapter_idChapters = c.idChapters) AND (a.Section_idSections = s.idSections OR a.Section_idSections IS NULL)
            LEFT JOIN app_paragraph p ON a.idArticles = p.articles_idArticles";

    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        $datos = array();

        while ($fila = $resultado->fetch_assoc()) {
            $tituloId = $fila['idTitles'];
            $capituloId = $fila['idChapters'];
            $seccionId = $fila['idSections'];
            $articuloId = $fila['idArticles'];
            $parrafoId = $fila['idParagraph'];

            // Agrupa los datos por título, capítulo, sección, artículo y párrafo.
            $datos[$tituloId]['name_title'] = $fila['name_title'];
            $datos[$tituloId]['status_title'] = $fila['status_title'];
            $datos[$tituloId]['type_title'] = $fila['type_title'];
            $datos[$tituloId]['Admin_idAdmin'] = $fila['Admin_idAdmin'];

            if ($capituloId) {
                $datos[$tituloId]['capitulos'][$capituloId]['name_Chapter'] = $fila['name_Chapter'];

                if ($seccionId) {
                    $datos[$tituloId]['capitulos'][$capituloId]['secciones'][$seccionId]['name_section'] = $fila['name_section'];

                    if ($articuloId) {
                        $datos[$tituloId]['capitulos'][$capituloId]['secciones'][$seccionId]['articulos'][$articuloId]['name_article'] = $fila['name_article'];

                        if ($parrafoId) {
                            $datos[$tituloId]['capitulos'][$capituloId]['secciones'][$seccionId]['articulos'][$articuloId]['parrafos'][$parrafoId] = array(
                                'paragraph' => $fila['paragraph'],
                                'position' => $fila['position']
                            );
                        }
                    }
                }
            }
        }

        echo json_encode($datos);
    } else {
        echo json_encode(array('mensaje' => 'No se encontraron registros de títulos.'));
    }
}

// Otras rutas y operaciones CRUD (actualizar y eliminar) pueden agregarse de manera similar aquí.

// Cerrar la conexión a la base de datos.
$conexion->close();

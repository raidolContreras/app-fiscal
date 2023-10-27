<?php 

require_once 'conection.php';

class ModelsApi{

    static public function titles(){
        // Consulta para seleccionar todos los títulos con sus capítulos, secciones, artículos y párrafos asociados.
        $sql = "SELECT t.idTitles, t.name_title, t.status_title, t.type_title, t.Admin_idAdmin,
                       c.idChapters, c.name_Chapter,
                       s.idSections, s.name_section,
                       a.idArticles, a.name_article,
                       p.idParagraph, p.paragraph, p.position
                FROM app_titles t
                LEFT JOIN app_chapter c ON t.idTitles = c.Title_idTitles
                LEFT JOIN app_sections s ON c.idChapters = s.Chapter_idChapters
                LEFT JOIN app_articles a ON (a.Title_idTitles = t.idTitles OR a.Chapter_idChapters = c.idChapters) AND (a.Section_idSections = s.idSections OR a.Section_idSections = 0)
                LEFT JOIN app_paragraph p ON a.idArticles = p.articles_idArticles";

        $stmt = Conexion::conectar()->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);  // Devuelve los resultados como un array asociativo

        $stmt->close();
        $stmt = null;
    }
}

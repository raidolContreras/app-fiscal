<?php 

require_once 'conection.php';

class ModelsApi{

    static public function titles($item, $value){
        if ($item == null && $value == null) {

            $sql = "SELECT t.idTitles, t.name_title, t.status_title, t.type_title,
                           cv.idCover, cv.name_cover AS cover_name
                    FROM app_titles t
                    LEFT JOIN app_covers cv ON t.idTitles = cv.Title_idTitles";

            $stmt = Conexion::conectar()->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $sql = "SELECT t.idTitles, t.name_title, t.status_title, t.type_title, t.Admin_idAdmin,
                           c.idChapters, c.name_Chapter,
                           s.idSections, s.name_section,
                           a.idArticles, a.name_article,
                           p.idParagraph, p.paragraph, p.position,
                           cv.idCover, cv.name_cover AS cover_name
                    FROM app_titles t
                    LEFT JOIN app_chapter c ON t.idTitles = c.Title_idTitles
                    LEFT JOIN app_sections s ON c.idChapters = s.Chapter_idChapters
                    LEFT JOIN app_articles a ON (a.Title_idTitles = t.idTitles OR a.Chapter_idChapters = c.idChapters) AND (a.Section_idSections = s.idSections OR a.Section_idSections = 0)
                    LEFT JOIN app_paragraph p ON a.idArticles = p.articles_idArticles
                    LEFT JOIN app_covers cv ON t.idTitles = cv.Title_idTitles
                    WHERE t.type_title = :type_title AND t.idTitles = :idTitles";

            $stmt = Conexion::conectar()->prepare($sql);
            $stmt->bindParam(':type_title', $item, PDO::PARAM_STR);
            $stmt->bindParam(':idTitles', $value, PDO::PARAM_INT);

            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        $stmt->close();
        $stmt = null;
    }

    static public function createUser($name,$email,$password){
        $sql = "INSERT INTO app_user(name, email, password) VALUES (:name, :email, :password)";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        if($stmt->execute()){
            return 'Usuario creado con éxito';
        }else{
            return 'Error: Correo ya existente';
        }
    }
}

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
            $sql = "SELECT t.idTitles, t.name_title, t.status_title, t.type_title, c.idChapters As idChapter , c.name_Chapter, co.idCover, co.name_cover As cover_name, c.Title_idTitles As chapter_title
                    FROM app_titles t
                    LEFT JOIN app_chapter c ON t.idTitles = c.Title_idTitles
                    LEFT JOIN app_covers co ON co.Title_idTitles = t.idTitles
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

    static public function createUser($name, $email, $password) {
        try {
            $sql = "INSERT INTO app_user(name, email, password) VALUES (:name, :email, :password)";
            $stmt = Conexion::conectar()->prepare($sql);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    
            if ($stmt->execute()) {
                return 'Usuario creado con éxito';
            } else {
                return 'Error inesperado al crear el usuario';
            }
        } catch (PDOException $e) {
            if ($e->errorInfo[1] === 1062) {
                return 'El correo electrónico ya está registrado';
            } else {
                return 'Error inesperado: ' . $e->getMessage();
            }
        }
    }

    static public function getUserByEmail($email){
        try {
            $sql = "SELECT * FROM app_user WHERE email = :email";
            $stmt = Conexion::conectar()->prepare($sql);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetch();

        } catch (PDOException $e){

        }
    }

    static public function sections($capituloId){
        try{
            $sql = "SELECT s.idSections AS idSection, s.name_section
                    FROM app_sections s
                    WHERE s.Chapter_idChapters = :capituloId";

            $stmt = Conexion::conectar()->prepare($sql);
            $stmt->bindParam(':capituloId', $capituloId, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetchAll();

        } catch (PDOException $e){

        }
    }

    static public function articlesSections($sectionId){
        try{
            $sql = "SELECT a.idArticles AS idArticle, a.name_article
                    FROM app_articles a
                    WHERE a.Section_idSections = :sectionId";

            $stmt = Conexion::conectar()->prepare($sql);
            $stmt->bindParam(':sectionId', $sectionId, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetchAll();

        } catch (PDOException $e){

        }
    }

    static public function paragraphsArticles($articleId){
        try{
            $sql = "SELECT p.idParagraph , p.paragraph
                    FROM app_paragraph p
                    WHERE p.articles_idArticles = :articleId
                    ORDER BY p.position";

            $stmt = Conexion::conectar()->prepare($sql);
            $stmt->bindParam(':articleId', $articleId, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetchAll();

        } catch (PDOException $e){

        }
    }
    
}

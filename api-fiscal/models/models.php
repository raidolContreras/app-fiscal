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


    static public function articlesChapters($capituloId){
        try{
            $sql = "SELECT a.idArticles AS idArticle, a.name_article
                    FROM app_articles a
                    WHERE a.Chapter_idChapters = :capituloId AND a.Section_idSections = 0";

            $stmt = Conexion::conectar()->prepare($sql);
            $stmt->bindParam(':capituloId', $capituloId, PDO::PARAM_INT);
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

    static public function updateUser($idUser, $firstname, $lastname, $birthday, $phone){
        try{
            $sql = "UPDATE app_user
                    SET name = :firstname, lastname = :lastname, birthday = :birthday, phone = :phone 
                    WHERE idUsers = :idUser";

            $stmt = Conexion::conectar()->prepare($sql);
            $stmt->bindParam(':idUser', $idUser, PDO::PARAM_INT);
            $stmt->bindParam(':firstname', $firstname, PDO::PARAM_STR);
            $stmt->bindParam(':lastname', $lastname, PDO::PARAM_STR);
            $stmt->bindParam(':birthday', $birthday, PDO::PARAM_STR);
            $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);

            if ($stmt->execute()) {
                return 'Datos actualizados con éxito';
            } else {
                return 'Error inesperado al actualizar los datos';
            }

        } catch (PDOException $e){
            if ($e->errorInfo[1] === 1062) {
                return 'El usuario no existe';
            } else {
                return 'Error inesperado: ' . $e->getMessage();
            }
        }
    }

    static public function search($search){
        $sql = "SELECT t.idTitles, t.name_title, a.idArticles, a.name_article, p.idParagraph, p.paragraph
                FROM app_titles t
                LEFT JOIN app_articles a ON a.Title_idTitles = t.idTitles
                JOIN app_paragraph p ON p.articles_idArticles = a.idArticles
                WHERE p.paragraph LIKE :search";

        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->bindParam(':search', '%'.$search.'%', PDO::PARAM_STR);
        return $stmt->fetchAll();
    }
    
}

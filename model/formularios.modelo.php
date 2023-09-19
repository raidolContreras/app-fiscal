<?php
require_once "conexion.php";

class ModeloFormularios{

	static public function mdlRegistrarReglamentos($Reglamento){
		$pdo =Conexion::conectar();
		$sql = "INSERT INTO app_titles(name_title, type_title, Admin_idAdmin) VALUES (:name_title,'Reglamento',:Admin_idAdmin)";

		$stmt = $pdo->prepare($sql);
		$stmt->bindParam(':name_title', $Reglamento, PDO::PARAM_STR);
		$stmt->bindParam(':Admin_idAdmin', $_SESSION['idAdmin'], PDO::PARAM_INT);

		if ($stmt->execute()) {
			return "ok"; //obtener el ID del empleado recién insertado
		}else{
			return 'error';
		}

		$stmt->close();
		$stmt = null;
	}

	static public function mdlVerReuniones(){
		$sql = "SELECT * FROM app_titles WHERE type_title = 'Reglamento'";

		$stmt = Conexion::conectar()->prepare($sql);
		$stmt->execute();

		return $stmt->fetchAll();
		$stmt->close();
		$stmt = null;

	}

	static public function mdlVerReunion($idTitle){
		$sql = "SELECT
					t.name_title AS NombreDelTitulo,
					COUNT(DISTINCT c.idChapters) AS NumeroDeCapitulos,
					COUNT(DISTINCT s.idSections) AS NumeroDeSecciones,
					COUNT(DISTINCT a.idArticles) AS NumeroDeArticulos
				FROM
					app_titles t
				LEFT JOIN
					app_chapter c ON t.idTitles = c.Title_idTitles
				LEFT JOIN
					app_sections s ON t.idTitles = s.Title_idTitles
				LEFT JOIN
					app_articles a ON t.idTitles = a.Title_idTitles
				WHERE
					t.idTitles = $idTitle;";
					
		$stmt = Conexion::conectar()->prepare($sql);
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();
		$stmt = null;

	}

	static public function mdlVerCapitulos($reglament){
		$sql = "SELECT * FROM app_chapter WHERE Title_idTitles = :Title_idTitles";

		$stmt = Conexion::conectar()->prepare($sql);
		$stmt->bindParam(':Title_idTitles', $reglament, PDO::PARAM_STR);
		$stmt->execute();

		return $stmt->fetchAll();
		$stmt->close();
		$stmt = null;

	}

	static public function mdlVerCapitulo($idChapters){
		$sql = "SELECT
					COUNT(DISTINCT s.idSections) AS NumeroDeSecciones,
					COUNT(DISTINCT a.idArticles) AS NumeroDeArticulos
				FROM
					app_chapter c
				LEFT JOIN
					app_sections s ON c.idChapters = s.Chapter_idChapters
				LEFT JOIN
					app_articles a ON c.idChapters = a.Chapter_idChapters
				WHERE
					c.idChapters = $idChapters;";
					
		$stmt = Conexion::conectar()->prepare($sql);
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();
		$stmt = null;

	}
	
	static public function mdlRegistrarCapitulos($capitulo,$Reglamento){
		$pdo =Conexion::conectar();
		$sql = "INSERT INTO app_chapter(name_Chapter, Title_idTitles, Admin_idAdmin) VALUES (:name_Chapter,:Title_idTitles,:Admin_idAdmin)";

		$stmt = $pdo->prepare($sql);
		$stmt->bindParam(':name_Chapter', $capitulo, PDO::PARAM_STR);
		$stmt->bindParam(':Title_idTitles', $Reglamento, PDO::PARAM_INT);
		$stmt->bindParam(':Admin_idAdmin', $_SESSION['idAdmin'], PDO::PARAM_INT);

		if ($stmt->execute()) {
			return "ok"; //obtener el ID del empleado recién insertado
		}else{
			return 'error';
		}

		$stmt->close();
		$stmt = null;
	}

	static public function mdlVerSecciones($reglament, $chapter){
		$sql = "SELECT * FROM app_sections WHERE Title_idTitles = :Title_idTitles AND Chapter_idChapters = :Chapter_idChapters";

		$stmt = Conexion::conectar()->prepare($sql);
		$stmt->bindParam(':Title_idTitles', $reglament, PDO::PARAM_INT);
		$stmt->bindParam(':Chapter_idChapters', $chapter, PDO::PARAM_INT);
		$stmt->execute();

		return $stmt->fetchAll();
		$stmt->close();
		$stmt = null;

	}

	static public function mdlVerSeccion($idSections){
		$sql = "SELECT
					COUNT(DISTINCT a.idArticles) AS NumeroDeArticulos
				FROM
				  app_sections s
				LEFT JOIN
				  app_articles a ON s.idSections = a.Section_idSections
				WHERE
				  s.idSections = $idSections;";
					
		$stmt = Conexion::conectar()->prepare($sql);
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();
		$stmt = null;

	}
	
	static public function mdlRegistrarSections($section,$reglament,$chapter){
		$pdo =Conexion::conectar();
		$sql = "INSERT INTO app_sections(name_section, Title_idTitles, Chapter_idChapters, Admin_idAdmin) VALUES (:name_section,:Title_idTitles,:Chapter_idChapters,:Admin_idAdmin)";

		$stmt = $pdo->prepare($sql);
		$stmt->bindParam(':name_section', $section, PDO::PARAM_STR);
		$stmt->bindParam(':Title_idTitles', $reglament, PDO::PARAM_INT);
		$stmt->bindParam(':Chapter_idChapters', $chapter, PDO::PARAM_INT);
		$stmt->bindParam(':Admin_idAdmin', $_SESSION['idAdmin'], PDO::PARAM_INT);

		if ($stmt->execute()) {
			return "ok"; //obtener el ID del empleado recién insertado
		}else{
			return 'error';
		}

		$stmt->close();
		$stmt = null;
	}

	static public function mdlVerArticulos($reglament,$chapter,$section){
		$sql = "SELECT * FROM app_articles WHERE Title_idTitles = :Title_idTitles AND Chapter_idChapters = :Chapter_idChapters AND Section_idSections = :Section_idSections";

		$stmt = Conexion::conectar()->prepare($sql);
		$stmt->bindParam(':Title_idTitles', $reglament, PDO::PARAM_INT);
		$stmt->bindParam(':Chapter_idChapters', $chapter, PDO::PARAM_INT);
		$stmt->bindParam(':Section_idSections', $section, PDO::PARAM_INT);
		$stmt->execute();

		return $stmt->fetchAll();
		$stmt->close();
		$stmt = null;

	}
	
	static public function mdlRegistrarArticles($article,$section,$reglament,$chapter){
		$pdo =Conexion::conectar();
		$sql = "INSERT INTO app_articles(name_article, Title_idTitles, Chapter_idChapters, Section_idSections, Admin_idAdmin) VALUES (:name_article,:Title_idTitles,:Chapter_idChapters,:Section_idSections,:Admin_idAdmin)";

		$stmt = $pdo->prepare($sql);
		$stmt->bindParam(':name_article', $article, PDO::PARAM_STR);
		$stmt->bindParam(':Title_idTitles', $reglament, PDO::PARAM_INT);
		$stmt->bindParam(':Chapter_idChapters', $chapter, PDO::PARAM_INT);
		$stmt->bindParam(':Section_idSections', $section, PDO::PARAM_INT);
		$stmt->bindParam(':Admin_idAdmin', $_SESSION['idAdmin'], PDO::PARAM_INT);

		if ($stmt->execute()) {
			return "ok"; //obtener el ID del empleado recién insertado
		}else{
			return 'error';
		}

		$stmt->close();
		$stmt = null;
	}
	/*---------- Fin de ModeloFormularios ---------- */
}
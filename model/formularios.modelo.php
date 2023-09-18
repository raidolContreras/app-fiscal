<?php
require_once "conexion.php";

class ModeloFormularios{
	/*---------- Función hecha para registrar a los empleados---------- */
	static public function mdlRegistrarReglamentos($Reglamento){
		$pdo =Conexion::conectar();
		$sql = "INSERT INTO app_titles(name_title, type_title, Admin_idAdmin) VALUES (:name_title,'Reglamento',1)";

		$stmt = $pdo->prepare($sql);
		$stmt->bindParam(':name_title', $Reglamento, PDO::PARAM_STR);

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
					SUM(CASE WHEN a.Section_idSections IS NOT NULL THEN 1 ELSE 0 END) AS NumeroDeArticulos
				FROM
					app_titles t
				LEFT JOIN
					app_chapter c ON t.idTitles = c.Title_idTitles
				LEFT JOIN
					app_sections s ON c.idChapters = s.Chapter_idChapters
				LEFT JOIN
					app_articles a ON s.idSections = a.Section_idSections
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
					SUM(CASE WHEN a.Section_idSections IS NOT NULL THEN 1 ELSE 0 END) AS NumeroDeArticulos
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
	/*---------- Fin de ModeloFormularios ---------- */
}
<?php
require_once "conexion.php";

class ModeloAdmin{

	static public function mdlVerAdmin($tabla, $item, $valor){

		if ($item == null && $valor == null) {
			$sql = "SELECT * FROM $tabla";
			$stmt = Conexion::conectar()->prepare($sql);

			$stmt->execute();

			return $stmt->fetchAll();
		}else{
			$sql = "SELECT * FROM $tabla WHERE email = :$item OR username = :$item;";
			$stmt = Conexion::conectar()->prepare($sql);
			$stmt->bindParam(':'.$item, $valor);

			$stmt->execute();

			return $stmt->fetch();
		}

		$stmt->close();
		$stmt = null;

	}

	/*---------- Fin de ModeloFormularios ---------- */
}
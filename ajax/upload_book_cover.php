<?php
require_once "../controller/formularios.controlador.php";
require_once "../model/formularios.modelo.php";

if (isset($_POST['upload_photo'])) {
	
	$idTitle = $_POST['upload_photo'];
	$foto_reglamento = $_POST['foto_reglamento'];

	if (!empty($_FILES['file']['name'])) {
		$targetDir = "../assets/images/covers/".$foto_reglamento. "/";
		
		// Verificar si la carpeta no existe
		if (!file_exists($targetDir)) {
			// Crear la carpeta
			mkdir($targetDir, 0777, true); // Los permisos 0777 aseguran que la carpeta tenga todos los permisos
		}

		// Obtener la lista de archivos en la carpeta
        $existingFiles = scandir($targetDir);

        // Eliminar archivos existentes en la carpeta
        foreach ($existingFiles as $file) {
            if ($file != "." && $file != "..") {
                unlink($targetDir . $file);
            }
        }
		
		$fileName = $foto_reglamento . "." . pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION); // Usar $foto_reglamento como nuevo nombre
		
		$targetFilePath = $targetDir . $fileName;
		$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
		
		$uploadOk = 1;
		$i = 1;
		
		// Verificar si el archivo ya existe y renombrarlo si es necesario
		while (file_exists($targetFilePath)) {
			$fileName = $foto_reglamento . "($i)." . $fileType;
			$targetFilePath = $targetDir . $fileName;
			$i++;
		}

		// Verificar el tamaño máximo del archivo (10MB)
		if ($_FILES["file"]["size"] > 10 * 1024 * 1024) {
			echo "error_tamano";
			$uploadOk = 0;
		}

		// Verificar los tipos de archivo permitidos (.jpg, .jpeg, .png)
		$allowedExtensions = array("jpg", "jpeg", "png");
		if (!in_array($fileType, $allowedExtensions)) {
			echo "error_tipo";
			$uploadOk = 0;
		}

		if ($uploadOk == 0) {
			echo "error";
		} else {
			// Mover el archivo cargado al directorio de destino
			if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
				$data = array(
					"Title_idTitles" => $idTitle,
					"name_cover" => $fileName
				);
				$registrarDocumentos = ControladorFormularios::ctrRegistrarCover($data);
				echo $registrarDocumentos;
			} else {
				echo "error";
			}
		}
	} else {
		echo "error";
	}

}
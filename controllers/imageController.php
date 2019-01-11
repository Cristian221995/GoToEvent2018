<?php

namespace controllers;
use models\Image as Image;

class ImageController{

    function __construct(){

    }

    public function subirImage($image, $carpeta)
	{
		if (!empty($image)) {
				$imageDirectory = ROOT . $carpeta . '/';
				if (!file_exists($imageDirectory)) {
					mkdir($imageDirectory);
				}
				if ($image['name'] != '') {
					$extensionesPermitidas = array('png', 'jpg');
					$tamanioMaximo = 5000000;
					$nombreArchivo = basename($image['name']);
					$file = $imageDirectory . $nombreArchivo;
					$fileExtension = pathinfo($file, PATHINFO_EXTENSION);
					if (in_array($fileExtension, $extensionesPermitidas)) {
						if ($image['size'] < $tamanioMaximo) {
							if (move_uploaded_file($image["tmp_name"], $file)) {
								$ruta = $carpeta . '/' . $nombreArchivo;
							} else
								throw new Exception("Error al mover la imagen.");
						} else
							throw new Exception("Error, Se excedio el tamaño permitido.");
					} else
						throw new Exception("Error, formato de imagen no permitida.");
				} else
					throw new Exception("Error, pongale un nombre a la imagen.");
        }
        return $ruta;
	}
}

?>
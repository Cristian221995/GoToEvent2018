<?php 
namespace models;
use Exception as Exception;

class Image
{
	private $direccion;
	public function subirImage($image, $carpeta)
	{
        //$carpetas = array("Perfiles", "Productos");
        echo "hola";
		if (!empty($image)) {
                echo "ENTRE!";
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
								$this->direccion = $ruta;
							} else
								throw new Exception("Error al mover la imagen.");
						} else
							throw new Exception("Error, Se excedio el tamaño permitido.");
					} else
						throw new Exception("Error, formato de imagen no permitida.");
				} else
					throw new Exception("Error, pongale un nombre a la imagen.");
		} else
			$this->direccion = null;
	}
	public function getDireccion()
	{
		return $this->direccion;
	}
	public function setDireccion($newVal)
	{
		return $this->direccion = $newVal;
	}
}
?>
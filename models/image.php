<?php 
namespace models;
use Exception as Exception;

class Image
{
	private $direccion;

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
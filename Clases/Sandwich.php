<?php
class Sandwich{
	private $codigo;
	private $nombre;
	private $precio;
    

	public function Sandwich($codigo,$nombre,$precio){
		$this->codigo = $codigo;
		$this->nombre = $nombre;
		$this->precio = $precio;
	}

	public function getCodigo(){
            return $this->codigo;
	}

	public function getNombre(){
            return $this->nombre;
	}

	public function getPrecio(){
            return $this->precio;
	}
}
?>
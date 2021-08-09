<?php
 class Tamanos{
   private $codigo;
   private $nombre;

   public function Tamanos($codigo,$nombre){
 		$this->codigo = $codigo;
 		$this->nombre = $nombre;
 		}

    public function getCodigo(){
              return $this->codigo;
  	}

  	public function getNombre(){
              return $this->nombre;
  	}


 }

 ?>

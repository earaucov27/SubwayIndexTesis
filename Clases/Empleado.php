<?php
class Empleado{
	private $codigo;
	private $nombre;
    private $rut;
    private $contrasena;
    private $correo;

	public function Empleado($codigo,$nombre,$rut,$contrasena,$correo){
		$this->codigo = $codigo;
		$this->nombre = $nombre;
		$this->rut = $rut;
        $this->contrasena = $contrasena;
 		$this->correo = $correo;
	}

	public function getCodigo(){
            return $this->codigo;
	}

	public function getNombre(){
            return $this->nombre;
	}

	public function getRut(){
            return $this->rut;
	}

	public function getContrasena(){
            return $this->contrasena;
	}

        public function getCorreo(){
            return $this->correo;
        }
}
?>
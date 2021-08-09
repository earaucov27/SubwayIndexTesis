<?php
class Administrador{
	private $email;
	private $nombre;
	private $apellido;
  	private $contrasena;
	private $respuesta;

	public function Administrador($email,$nombre,$apellido,$contrasena,$respuesta){
		$this->email = $email;
		$this->nombre = $nombre;
		$this->apellido = $apellido;
        $this->contrasena = $contrasena;
 		$this->respuesta = $respuesta;
	}

	public function getEmail(){
            return $this->email;
	}

	public function getNombre(){
            return $this->nombre;
	}

	public function getApellido(){
            return $this->apellido;
	}

	public function getContrasena(){
            return $this->contrasena;
	}

        public function getRespuesta(){
            return $this->respuesta;
        }
}
?>

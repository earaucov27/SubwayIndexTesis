<?php
class Usuario{
	private $codigousuario;
	private $email;
	private $nombre;
	private $apellido;
    private $contrasena;
	private $direccion;
	private $respuesta;

	public function Usuario($codigousuario,$email,$nombre,$apellido,$contrasena,$direccion,$respuesta){
		$this->codigousuario = $codigousuario;
		$this->email = $email;
		$this->nombre = $nombre;
		$this->apellido = $apellido;
        $this->contrasena = $contrasena;
		$this->direccion = $direccion;
 		$this->respuesta = $respuesta;
	}

	public function getCodigousuario(){
		return $this->codigousuario;
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

	public function getDireccion(){
            return $this->direccion;
	}

    public function getRespuesta(){
        return $this->respuesta; 
    }
}
?>
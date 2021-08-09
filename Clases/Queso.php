<?php

class Queso {
    private $CodigoQue;
    private $NombreQue;
    private $EstadoQue;


    function __construct($CodigoQue, $NombreQue, $EstadoQue) {
        $this->CodigoQue = $CodigoQue;
        $this->NombreQue = $NombreQue;
        $this->EstadoQue = $EstadoQue;
    }

    function getCodigoQue() {
        return $this->CodigoQue;
    }

    function getNombreQue() {
        return $this->NombreQue;
    }
    
    function getEstadoQue() {
        return $this->EstadoQue;
    }
}
 ?>

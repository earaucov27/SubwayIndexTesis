<?php

class Salsas {
    private $CodigoSal;
    private $NombreSal;
    private $EstadoSal;

    function __construct($CodigoSal, $NombreSal, $EstadoSal) {
        $this->CodigoSal = $CodigoSal;
        $this->NombreSal = $NombreSal;
        $this->EstadoSal = $EstadoSal;
    }

    function getCodigoSal() {
        return $this->CodigoSal;
    }

    function getNombreSal() {
        return $this->NombreSal;
    }

    function getEstadoSal() {
        return $this->EstadoSal;
    }

}

 ?>

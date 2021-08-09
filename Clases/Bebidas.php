<?php

class Bebidas {
    private $CodigoBeb;
    private $NombreBeb;
    private $PrecioBeb;
    private $EstadoBeb;

    function __construct($CodigoBeb, $NombreBeb, $PrecioBeb,$EstadoBeb) {
        $this->CodigoBeb = $CodigoBeb;
        $this->NombreBeb = $NombreBeb;
        $this->PrecioBeb = $PrecioBeb;
        $this->EstadoBeb = $EstadoBeb;
    }

    function getCodigoBeb() {
        return $this->CodigoBeb;
    }

    function getNombreBeb() {
        return $this->NombreBeb;
    }

    function getPrecioBeb() {
        return $this->PrecioBeb;
    }

    function getEstadoBeb() {
        return $this->EstadoBeb;
    }
}

 ?>

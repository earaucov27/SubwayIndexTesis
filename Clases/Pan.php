<?php

class Pan {
    private $CodigoPan;
    private $NombrePan;
    private $EstadoPan;

    function __construct($CodigoPan, $NombrePan, $EstadoPan) {
        $this->CodigoPan = $CodigoPan;
        $this->NombrePan = $NombrePan;
        $this->EstadoPan = $EstadoPan;
    }

    function getCodigoPan() {
        return $this->CodigoPan;
    }

    function getNombrePan() {
        return $this->NombrePan;
    }

    function getEstadoPan() {
        return $this->EstadoPan;
    }
}

 ?>

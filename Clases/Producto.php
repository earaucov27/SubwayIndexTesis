<?php

class Producto {
    private $CodigoPro;
    private $NombrePro;
    private $PrecioPro15;
    private $PrecioPro30;


    function __construct($CodigoPro, $NombrePro, $PrecioPro15, $PrecioPro30) {
        $this->CodigoPro = $CodigoPro;
        $this->NombrePro = $NombrePro;
        $this->PrecioPro15 = $PrecioPro15;
        $this->PrecioPro30 = $PrecioPro30;
    }

    function getCodigoPro() {
        return $this->CodigoPro;
    }

    function getNombrePro() {
        return $this->NombrePro;
    }

    function getPrecioPro15() {
        return $this->PrecioPro15;
    }

    function getPrecioPro30() {
        return $this->PrecioPro30;
    }
}

 ?>

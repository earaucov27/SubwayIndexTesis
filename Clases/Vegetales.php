<?php

class Vegetales {
    private $CodigoVeg;
    private $NombreVeg;

    function __construct($CodigoVeg, $NombreVeg) {
        $this->CodigoVeg = $CodigoVeg;
        $this->NombreVeg = $NombreVeg;
    }

    function getCodigoVeg() {
        return $this->CodigoVeg;
    }

    function getNombreVeg() {
        return $this->NombreVeg;
    }

}

 ?>

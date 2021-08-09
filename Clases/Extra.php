<?php

class Extra {
    private $CodigoExt;
    private $NombreExt;
    private $PrecioExt;
    private $PrecioExt1;
    private $EstadoExt;

    function __construct($CodigoExt, $NombreExt, $PrecioExt, $PrecioExt1,$EstadoExt) {
        $this->CodigoExt = $CodigoExt;
        $this->NombreExt = $NombreExt;
        $this->PrecioExt = $PrecioExt;
        $this->PrecioExt1 = $PrecioExt1;
        $this->EstadoExt = $EstadoExt;
    }

    function getCodigoExt() {
        return $this->CodigoExt;
    }

    function getNombreExt() {
        return $this->NombreExt;
    }

    function getPrecioExt() {
        return $this->PrecioExt;
    }

    function getPrecioExt1() {
        return $this->PrecioExt1;
    }

    function getEstadoExt() {
        return $this->EstadoExt;
    }
}

 ?>

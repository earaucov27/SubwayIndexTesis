<?php

class Aguas {
    private $CodigoAgu;
    private $NombreAgu;
    private $PrecioAgu;
    private $EstadoAgu;

    function __construct($CodigoAgu, $NombreAgu, $PrecioAgu,$EstadoAgu) {
        $this->CodigoAgu = $CodigoAgu;
        $this->NombreAgu = $NombreAgu;
        $this->PrecioAgu = $PrecioAgu;
        $this->EstadoAgu = $EstadoAgu;
    }

    function getCodigoAgu() {
        return $this->CodigoAgu;
    }

    function getNombreAgu() {
        return $this->NombreAgu;
    }

    function getPrecioAgu() {
        return $this->PrecioAgu;
    }

    function getEstadoAgu() {
        return $this->EstadoAgu;
    }
}

 ?>

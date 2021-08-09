<?php

class Jugos {
    private $CodigoJug;
    private $NombreJug;
    private $PrecioJug;
    private $EstadoJug;

    function __construct($CodigoJug, $NombreJug, $PrecioJug, $EstadoJug) {
        $this->CodigoJug = $CodigoJug;
        $this->NombreJug = $NombreJug;
        $this->PrecioJug = $PrecioJug;
        $this->EstadoJug = $EstadoJug;
    }

    function getCodigoJug() {
        return $this->CodigoJug;
    }

    function getNombreJug() {
        return $this->NombreJug;
    }

    function getPrecioJug() {
        return $this->PrecioJug;
    }

    function getEstadoJug() {
        return $this->EstadoJug;
    }
}

 ?>

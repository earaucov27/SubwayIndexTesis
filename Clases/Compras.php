<?php

class Compras {
    private $CodigoCom;
    private $TamanoCom;
    private $NombreSan;
    private $NombrePan;
    private $NombreQue;
    private $NombreExt;
    private $NombreVeg;
    private $NombreSal;
    private $NombreBeb;
    private $NombreAgu;
    private $NombreJug;
    private $NombreUsu;
    private $EstadoPro;




    function __construct($CodigoCom, $TamanoCom, $NombreSan, $NombrePan, $NombreQue, $NombreExt, $NombreVeg, $NombreSal, $NombreBeb, $NombreAgu, $NombreJug,$NombreUsu,$EstadoPro){
        $this->CodigoCom = $CodigoCom;
        $this->TamanoCom = $TamanoCom;
        $this->NombreSan = $NombreSan;
        $this->NombrePan = $NombrePan;
        $this->NombreQue = $NombreQue;
        $this->NombreExt = $NombreExt;
        $this->NombreVeg = $NombreVeg;
        $this->NombreSal = $NombreSal;
        $this->NombreBeb = $NombreBeb;
        $this->NombreAgu = $NombreAgu;
        $this->NombreJug = $NombreJug;
        $this->NombreUsu = $NombreUsu;
        $this->EstadoPro = $EstadoPro;
        
    }

    function getCodigoCom() {
        return $this->CodigoCom;
    }

    function getTamanoCom() {
        return $this->TamanoCom;
    }

    function getNombreSan() {
        return $this->NombreSan;
    }

    function getNombrePan() {
        return $this->NombrePan;
    }
    function getNombreQue() {
        return $this->NombreQue;
    }
    function getNombreExt() {
        return $this->NombreExt;
    }
    function getNombreVeg() {
        return $this->NombreVeg;
    }
    function getNombreSal() {
        return $this->NombreSal;
    }
    function getNombreBeb() {
        return $this->NombreBeb;
    }
    function getNombreAgu() {
        return $this->NombreAgu;
    }
    function getNombreJug() {
        return $this->NombreJug;
    }
    function getNombreUsu() {
        return $this->NombreUsu;
    }
    function getEstadoPro() {
        return $this->EstadoPro;
    }

    
    
    }
 ?>

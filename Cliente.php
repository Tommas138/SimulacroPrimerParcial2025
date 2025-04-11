<?php

Class Cliente {
    private $nombre;
    private $apellido;
    private $estado;
    private $tipoDocumento;
    private $documento;


    public function __construct($nombre, $apellido, $estado, $tipoDocumento, $documento) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->estado = $estado;
        $this->tipoDocumento = $tipoDocumento;
        $this->documento = $documento;
    }

    public function __toString() {
        return
        "El nombre del Cliente es: " . $this->getNombre() . "\n" . 
        "El apellido es: " . $this->getApellido() . "\n" . 
        "Estado dado de Baja? " . $this->getEstado()  . "\n" . 
        "DNI: " . $this->getTipoDocumento() . ": " . $this->getDocumento(); 
    }
    
    public function getNombre() {
        return $this->nombre; 
    }
    public function getApellido() {
        return $this->apellido; 
    }
    public function getEstado() {
        return $this->estado; 
    }
    public function getTipoDocumento() {
        return $this->tipoDocumento; 
    }
    public function getDocumento() {
        return $this->documento; 
    }

    public function setNombre($value) {
        $this->nombre =$value; 
    }
    public function setApellido($value) {
        $this->apellido = $value; 
    }
    public function setEstado($value) {
        $this->estado = $value; 
    }
    public function setTipoDocumento($value) {
        $this->tipoDocumento = $value; 
    }
    public function setDocumento($value) {
        $this->documento = $value; 
    }

}
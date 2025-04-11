<?php

Class Venta {
    private $numero;
    private $fecha;
    private $ObjCliente;
    private $ColeccionMotos;
    private $precioFinal;

    public function __construct($numero, $fecha, $ObjCliente, $ColeccionMotos, $precioFinal) {
        $this->numero = $numero;
        $this->fecha = $fecha;
        $this->ObjCliente = $ObjCliente;
        $this->ColeccionMotos = $ColeccionMotos;
        $this->precioFinal = $precioFinal;
    }

    public function __toString() {
        return 
        "Numero de venta: " . $this->getNumero() . "\n" . 
        "Fecha: " . $this->getFecha() . "\n" . 
        "Referencia al cliente: " . $this->getObjCliente() . "\n" . 
        "Referencia a coleccion de motos: " . $this->mostrarColeccionMotos  () . "\n" . 
        "Precio final: " . $this->getPrecioFinal() . "\n";
    }

    public function getNumero() {
        return $this->numero;
    }
    public function getFecha() {
        return $this->fecha;
    }
    public function getObjCliente() {
        return $this->ObjCliente;
    }
    public function getColeccionMotos() {
        return $this->ColeccionMotos;
    }
    public function getPrecioFinal() {
        return $this->precioFinal;
    }

    public function setNumero($value) {
        $this->numero = $value;
    }
    public function setFecha($value) {
        $this->fecha = $value;
    }
    public function setObjCliente($value) {
        $this->ObjCliente = $value;
    }
    public function setColeccionMotos($value) {
        $this->ColeccionMotos = $value;
    }
    public function setPrecioFinal($value) {
        $this->precioFinal = $value;
    }

    public function mostrarColeccionMotos() {
        $cadena = "";
        $coleccion = $this->getColeccionMotos();
        foreach ($coleccion as $moto) {
            $cadena .= $moto;
        }
        return $cadena;
    }
    public function incorporarMoto($objMoto) {
        $coleccionDeMotos = $this->getColeccionMotos();
        if ($objMoto->getActiva()) {
            array_push($coleccionDeMotos, $objMoto);
            $precioFinal = $this->getPrecioFinal() + $objMoto->darPrecioVenta();
            $this->setPrecioFinal($precioFinal);
            $this->setColeccionMotos($coleccionDeMotos);
        }
    }
}
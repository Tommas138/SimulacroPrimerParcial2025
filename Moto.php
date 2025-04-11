<?php


Class Moto {
    private $codigo;
    private $costo;
    private $anio_fabricacion;
    private $descripcion;
    private $porcentajeIncrementoAnual;
    private $activa;


    public function __construct($codigo, $costo, $anio_fabricacion, $descripcion, $porcentajeIncrementoAnual, $activa) { 
        $this->codigo = $codigo;
        $this->costo = $costo;
        $this->anio_fabricacion = $anio_fabricacion;
        $this->descripcion = $descripcion;
        $this->porcentajeIncrementoAnual = $porcentajeIncrementoAnual;
        $this->activa = $activa;
    }

    public function __toString() {
        return
        "Codigo de la moto: " . $this->getCodigo() . "\n" . 
        "Costo: " . $this->getCosto() . "\n" . 
        "Año de Fabricacion: " . $this->getAnio_fabricacion() . "\n" . 
        "Descripcion: " . $this->getDescripcion() . "\n" . 
        "Porcentaje de Incremento Anual: " . $this->getPorcentajeIA() . "\n" . 
        "Esta la moto activa? " . $this->getActiva() . "\n";
     }

    public function getCodigo() {
        return $this->codigo;
    }
    public function getCosto() {
        return $this->costo;
    }
    public function getAnio_fabricacion() {
        return $this->anio_fabricacion;
    }
    public function getDescripcion() {
        return $this->descripcion;
    }
    public function getPorcentajeIA() {
        return $this->porcentajeIncrementoAnual;
    }
    public function getActiva() {
        return $this->activa;
    }

    public function setCodigo($value) {
        $this->codigo = $value;
    }
    public function setCosto($value) {
        $this->costo = $value;
    }
    public function setAnio_fabricacion($value) {
        $this->anio_fabricacion = $value;
    }
    public function setDescripcion($value) {
        $this->descripcion = $value;
    }
    public function setPorcentajeIA($value) {
        $this->porcentajeIncrementoAnual = $value;
    }
    public function setActiva($value) {
        $this->activa = $value;
    }


    public function darPrecioVenta() {
        $precioVenta = -1;
        if ($this->getActiva()) {
            $costoMoto = $this->getCosto();
            $anio_fabricacion = intval($this->getAnio_fabricacion());
            $porc_inc_anual = floatval($this->getPorcentajeIA());
            $anioActual = intval(date('Y'));
        $anio = $anioActual - $anio_fabricacion;
        $precioVenta = $costoMoto + ($costoMoto * ($anio * ($porc_inc_anual / 100)));
    }
        return $precioVenta;
    }
}
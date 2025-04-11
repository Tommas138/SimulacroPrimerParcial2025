<?php

Class Empresa {
    private $denominacion;
    private $direccion;
    private $coleccionClientes;
    private $coleccionMotos;
    private $coleccionVentas;

    public function __construct($denominacion, $direccion, $coleccionClientes, $coleccionMotos, $coleccionVentas) {
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->coleccionClientes = $coleccionClientes;
        $this->coleccionMotos = $coleccionMotos;
        $this->coleccionVentas = $coleccionVentas;
    }

    public function __toString() {
        return 
        "Denominacion: " . $this->getDenominacion() . "\n" . 
        "Direccion: " . $this->getDireccion() . "\n" . 
        "Coleccion de clientes: " . $this->mostrarColeccion($this->getColeccionClientes()) . "\n" . 
        "Coleccion de motos: " . $this->mostrarColeccion($this->getColeccionMotos()) . "\n" . 
        "Coleccion de ventas: " . $this->mostrarColeccion($this->getColeccionVentas()) . "\n";
    }

    public function mostrarColeccion($coleccion) {
        $cadenaColeccion = " ";
        foreach ($coleccion as $objeto) {
            $cadenaColeccion .= $objeto;
        }
        return $cadenaColeccion;
    }

    public function getDenominacion() {
        return $this->denominacion;
    }
    public function getDireccion() {
        return $this->direccion;
    }
    public function getColeccionClientes() {
        return $this->coleccionClientes;
    }
    public function getColeccionMotos() {
        return $this->coleccionMotos;
    }
    public function getColeccionVentas() {
        return $this->coleccionVentas;
    }

    public function setDenominacion($value) {
        $this->denominacion = $value;
    }
    public function setDireccion($value) {
        $this->direccion = $value;
    }
    public function setColeccionClientes($value) {
        $this->coleccionClientes = $value;
    }
    public function setColeccionMotos($value) {
        $this->coleccionMotos = $value;
    }
    public function setColeccionVentas($value) {
        $this->coleccionVentas = $value;
    }


    public function retornarMoto($codigoMoto) {
        $coleccionMotos = $this->getColeccionMotos();
        $objMotoCoincidente = null;
        $i = 0;
        while ($i < count ($coleccionMotos) && !$objMotoCoincidente) {
            $moto = $coleccionMotos[$i];
            if ($moto->getCodigo() == $codigoMoto) {
                $objMotoCoincidente = $moto;
            }
            $i++;
        }
        return $objMotoCoincidente;
    }

    public function getNumeroVenta() {
        $coleccionVentas = $this->getColeccionVentas();
        $numeroVenta = count ($coleccionVentas) + 1;
        return $numeroVenta;

    }
    public function registrarVenta($colCodigosMoto, $objCliente) {
        $importeFinalVenta = 0;
        if ($objCliente->getEstado()) {
            $nuevaVenta = new Venta($this->getNumeroVenta(), date("Y-m-d"), $objCliente, [], $importeFinalVenta);
            foreach ($colCodigosMoto as $moto) {
                $objetoMoto = $this->retornarMoto($moto);
                if ($objetoMoto) {
                    $nuevaVenta->incorporarMoto($objetoMoto);
                }
            }
            $importeFinalVenta = $nuevaVenta->getPrecioFinal();
            if ($importeFinalVenta > 0) {
                $coleccionVentas = $this->getColeccionVentas();
                $coleccionVentas[] = $nuevaVenta;
                $this->setColeccionVentas($coleccionVentas);
            }
        }
        return $importeFinalVenta;
    }

    public function retornarVentasXCliente($tipo, $numdoc) {
        $coleccionVentas = $this->getColeccionVentas();
        $ventasRealizadasCliente = [];

        foreach ($coleccionVentas as $venta) {
            if ($venta->getObjCliente()->getTipoDocumento() == $tipo && $venta->getObjCliente()->getDocumento() == $numdoc && $venta->getPrecioFinal() != 0) {
                $ventasRealizadasCliente[] = $venta;
            }
        }
    return $ventasRealizadasCliente;
    }
    
}
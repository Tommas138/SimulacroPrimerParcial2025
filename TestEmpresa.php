<?php

include_once "Cliente.php";
include_once 'Empresa.php';
include_once 'Moto.php';
include_once 'Venta.php';


$objCliente1 = new Cliente("Pedro", "Gomez", true, "Cuil", "23-44901234-3");
$objCliente2 = new Cliente("Dana", "Garcia", true, "DNI", "45719193");

$moto1 = new Moto("11", 2230000, 2022, "Benelli Imperiale 400", 85, true);
$moto2 = new Moto("12", 584000, 2021, "Zanella Zr 150 Ohc", 70, true);
$moto3 = new Moto("13", 999900, 2023, "Zanella Patagonian Eagle 250", 55, false);

$coleccionMotos = [$moto1, $moto2, $moto3];
$coleccionClientes = [$objCliente1, $objCliente2];
$objEmpresa = new Empresa("Alta Gama", "Av Argentina 123", $coleccionClientes, $coleccionMotos, []);

echo "Importe final de la venta: ". $objEmpresa->registrarVenta([11,12,13], $objCliente2) . "\n";

echo "Importe final de la venta: ". $objEmpresa->registrarVenta([0], $objCliente2) . "\n";

echo "Importe final de la venta: ".  $objEmpresa->registrarVenta([2], $objCliente2) . "\n";

$resultadoVentas1 = $objEmpresa->retornarVentasXCliente($objCliente1->getTipoDocumento(), $objCliente1->getDocumento());

if (count($resultadoVentas1)>0) {
    foreach ($resultadoVentas1 as $venta) {
        echo $venta;
    }
} else {
    echo "No se encontraron ventas \n";
}

$resultadoVentas2 = $objEmpresa->retornarVentasXCliente($objCliente2->getTipoDocumento(), $objCliente2->getDocumento());

if (count($resultadoVentas2)> 0) {
    foreach ($resultadoVentas2 as $venta) {
        echo $venta;
    }
} else {
    echo "No se encontraron ventas \n";
}

echo $objEmpresa;


<?php

include_once 'financiera.php';
include_once 'couta.php';
include_once 'persona.php';
include_once 'prestamo.php';

$objFinanciera1 = new Financiera("Money", "Av.Argentina 1234");
$objPersona1 = new Persona("Pepe", "Flores", 46611466, "Bs As 12", "dir@gmail.com", 299444567, 40000);
$objPersona2 = new Persona("Luis", "Suarez", 42221423, "Bs As 123", "dir@gmail.com", 29931232, 4000);
$objPersona3 = new Persona("Luis", "Suarez", 42221423, "Bs As 123", "dir@gmail.com", 29931232, 4000);
$objPrestamo1 = new Prestamo(1, 50000, 5, 0.1, $objPersona1);
$objPrestamo2 = new Prestamo(2, 10000, 4, 0.1, $objPersona2);
$objPrestamo3 = new Prestamo(3, 10000, 2, 0.1, $objPersona3);

$objFinanciera1->incorporarPrestamo($objPrestamo1);
$objFinanciera1->incorporarPrestamo($objPrestamo2);
$objFinanciera1->incorporarPrestamo($objPrestamo3);

$objCuota = $objFinanciera1->informarCuotaPagar(2);
if($encontrado !== false && $objCuota !== null){
    echo $objCuota;
} else {
    echo"No hay coutas para pagar";
}
echo $objFinanciera1;
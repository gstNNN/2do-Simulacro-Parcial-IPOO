<?php

include_once 'financiera.php';
include_once 'cuota.php';
include_once 'persona.php';
include_once 'prestamo.php';

//Creo la financiera
$objFinanciera = new Financiera("Money", "Av.Argentina 1234"); //1
//Creo las personas
$objPersona1 = new Persona("Pepe", "Flores", 46611466, "Bs As 12", "dir@gmail.com", 299444567, 40000);   //2
$objPersona2 = new Persona("Luis", "Suarez", 42221423, "Bs As 123", "dir@gmail.com", 29931232, 4000);    //2
$objPersona3 = new Persona("Luis", "Suarez", 42221423, "Bs As 123", "dir@gmail.com", 29931232, 4000);    //2
//Creo los prestamos
$objPrestamo1 = new Prestamo(1, 50000, 5, 0.1, $objPersona1);
$objPrestamo2 = new Prestamo(2, 10000, 4, 0.1, $objPersona2);
$objPrestamo3 = new Prestamo(3, 10000, 2, 0.1, $objPersona3);
//Incorporo prestamos
$objFinanciera->incorporarPrestamo($objPrestamo1);//3
$objFinanciera->incorporarPrestamo($objPrestamo2);//3
$objFinanciera->incorporarPrestamo($objPrestamo3);//3
//Muestro financiera.
echo $objFinanciera . "\n";//4

//Otorgo el prestamo si califican 
$objFinanciera->otorgarPrestamoSiCalifica(); 
echo $objFinanciera . "\n";    

$objCuota = $objFinanciera->informarCuotaPagar(2);//7

if($objCuota !== null){
    echo $objCuota;
} else {
    echo"No hay cuotas para pagar \n";
}

if($objCuota !== null){
    echo $objCuota->darMontoFinalCuota();
} else {
    echo"No hay cuotas para pagar \n";
} 

$objCuota->setCancelada(true);

$objCuota = $objFinanciera->informarCuotaPagar(2);

if($objCuota !== null){
    echo "\n" . $objCuota . "\n";
} else {
    echo"No hay cuotas para pagar \n";
}

if($objCuota !== null){
    echo $objCuota->darMontoFinalCuota() . "\n";
} else {
    echo"No hay cuotas para pagar\n";
} 

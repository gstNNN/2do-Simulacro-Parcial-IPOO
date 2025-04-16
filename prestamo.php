<?php

class Prestamo{
    private $identificacion;
    private $fechaOtorgamiento;
    private $monto;
    private $cantidadCuotas;
    private $tasaDeInteres;
    private $coleccionCuotas = [];
    private $refPersona;
    
    //metodo constructor
    public function __construct( $identificacion, $monto,  $cantidadCuotas,  $tasaDeInteres, $refPersona)
    {$this->identificacion = $identificacion; $this->fechaOtorgamiento = date("Y-m-d");
    $this->monto = $monto;$this->cantidadCuotas = $cantidadCuotas;$this->tasaDeInteres = $tasaDeInteres;
    $this->refPersona = $refPersona;
}
	
    //metodos de acceso(getters)
    public function getIdentificacion() {return $this->identificacion;}

	public function getFechaOtorgamiento() {return $this->fechaOtorgamiento;}

	public function getMonto() {return $this->monto;}

	public function getCantidadCuotas() {return $this->cantidadCuotas;}

	public function getTasaDeInteres() {return $this->tasaDeInteres;}

	public function getRefPersona() {return $this->refPersona;}

	public function getColeccionCuotas() {return $this->coleccionCuotas;}

    //metodos de acceso(setter)
	public function setIdentificacion( $identificacion): void {$this->identificacion = $identificacion;}

	public function setFechaOtorgamiento( $fechaOtorgamiento): void {$this->fechaOtorgamiento = $fechaOtorgamiento;}

	public function setMonto( $monto): void {$this->monto = $monto;}

	public function setCantidadCuotas($cantidadCuotas): void {$this->cantidadCuotas = $cantidadCuotas;}

	public function setTasaDeInteres( $tasaDeInteres): void {$this->tasaDeInteres = $tasaDeInteres;}

	public function setRefPersona( $refPersona): void {$this->refPersona = $refPersona;}

    private function calcularInteresPrestamo($numCuota){
        $cantCuotas = $this->getCantidadCuotas();
        $montoTotal = $this->getMonto();
        $tasaInteres = $this->getTasaDeInteres(); 
        $valorCuota = $montoTotal / $cantCuotas;
        $saldoDeudor = $valorCuota * (($numCuota - 1) * $tasaInteres);
        return $saldoDeudor;
    }

    public function otorgarPrestamo(){
        $this->setFechaOtorgamiento(date("Y-m-d"));
        for($i = 1; $i <= $this->getCantidadCuotas(); $i++){
            $cuota = $this->getMonto() / $this->getCantidadCuotas();
            $interes = $this->calcularInteresPrestamo($i);
            $cuotas = new Cuota($i,$cuota, $interes);
            $this->coleccionCuotas[] = $cuotas;
        }
        return $this->coleccionCuotas;
    }

    public function darSiguienteCuotaPagar(){
        $cuotaPagar = null;
        $i = 0;
        while($cuotaPagar == null && $i < $this->getCantidadCuotas()){
            $cuotaActual = $this->getColeccionCuotas()[$i];
            if($cuotaActual->getCancelada() == false){
                $cuotaPagar = $cuotaActual;
            }
            $i++;
        }
        return $cuotaPagar;
    }

    public function toString_(){
        return 
        "Identificacion: " . $this->getIdentificacion() . "\n" .
        "Fecha Otorgamiento: " . $this->getFechaOtorgamiento() . "\n" .
        "Monto: " . $this->getMonto() . "\n" .
        "Cantidad Cuotas: " . $this->getCantidadCuotas() . "\n" .
        "Tasa de Interes: " . $this->getTasaDeInteres() . "\n" .
        "Persona: " . $this->getRefPersona() . "\n";
    }
}

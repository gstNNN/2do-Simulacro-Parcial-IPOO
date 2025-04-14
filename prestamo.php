<?php

class Prestamo{
    private $identificacion;
    private $fechaOtorgamiento;
    private $monto;
    private $cantidadCoutas;
    private $tasaDeInteres;
    private $coleccionCuotas;
    private $refPersona;
    
    //metodo constructor
    public function __construct( $identificacion, $monto,  $cantidadCoutas,  $tasaDeInteres, $coleccionCuotas, $refPersona)
    {$this->identificacion = $identificacion;$this->monto = $monto;$this->cantidadCoutas = [];$this->tasaDeInteres = $tasaDeInteres;
    $this->refPersona = $refPersona;
}
	
    //metodos de acceso(getters)
    public function getIdentificacion() {return $this->identificacion;}

	public function getFechaOtorgamiento() {return $this->fechaOtorgamiento;}

	public function getMonto() {return $this->monto;}

	public function getCantidadCoutas() {return $this->cantidadCoutas;}

	public function getTasaDeInteres() {return $this->tasaDeInteres;}

	public function getRefPersona() {return $this->refPersona;}

	public function getColeccionCuotas() {return $this->coleccionCoutas;}

    //metodos de acceso(setter)
	public function setIdentificacion( $identificacion): void {$this->identificacion = $identificacion;}

	public function setFechaOtorgamiento( $fechaOtorgamiento): void {$this->fechaOtorgamiento = $fechaOtorgamiento;}

	public function setMonto( $monto): void {$this->monto = $monto;}

	public function setCantidadCoutas( $cantidadCoutas): void {$this->cantidadCoutas = $cantidadCoutas;}

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
        for($i = 1; $i <= $this->getCantidadCoutas(); $i++){
            $couta = $this->getMonto / $this->getCantidadCoutas();
            $interes = calcularInteresPrestamo($i);
            $cuotas = new Cuota($i,$cuota, $interes);
            $coleccionCuotas[] = $cuotas;
        }
        return $coleccionCuotas;
    }

    public function darSiguienteCuotaPagar(){
        $cuotaPagar = null;
        $i = 0;
        while($cuotaPagar == null && $i < $this->cantCuotas()){
            $cuotaActual = $this->getColeccionCuotas[$i];
            if($cuotaActual->getCancelada() == false){
                $coutaPagar = $coutaActual;
            }
            $i++;
        }
        return $cuotaPagar;
    }

    public function toString_(){
        return 
        "Identificacion: " . $this->getIdentificacion . "\n" .
        "Fecha Otorgamiento: " . $this->getFechaOtorgamiento . "\n" .
        "Monto: " . $this->getMonto . "\n" .
        "Cantidad Cuotas: " . $this->getCantidadCoutas . "\n" .
        "Tasa de Interes: " . $this->getTasaDeInteres . "\n" .
        "Persona: " . $this->getRefPersona . "\n";
    }
}

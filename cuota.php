<?php

class Cuota {
    private $numero;
    private $montoCuota;
    private $montoInteres;
    private $cancelada;

    //metodo constructor
    public function __construct($numero,  $montoCuota,  $montoInteres){
    $this->numero = $numero;
    $this->montoCuota = $montoCuota;
    $this->montoInteres = $montoInteres;
    $this->cancelada = false;
}
    
    //metodos de acceso(getters)
    public function getNumero() {return $this->numero;}

	public function getMontoCuota() {return $this->montoCuota;}

	public function getMontoInteres() {return $this->montoInteres;}

	public function getCancelada() {return $this->cancelada;}

    //metodos de acceso(setters)
	public function setNumero( $numero): void {$this->numero = $numero;}

	public function setMontoCuota( $montoCuota): void {$this->montoCuota = $montoCuota;}

	public function setMontoInteres( $montoInteres): void {$this->montoInteres = $montoInteres;}

	public function setCancelada($estado) {
        $this->cancelada = $estado;
    }

    public function __toString(){
        return 
        "\nDetalles de la Cuota:\n" . 
        "---------------------------------\n" . 
        "Número de Cuota: " . $this->getNumero() . "\n" . 
        "Monto de la Cuota: $" . $this->getMontoCuota() . "\n" . 
        "Monto de Interés: $" . $this->getMontoInteres() . "\n" . 
        "---------------------------------\n";
    }

    public function darMontoFinalCuota(){
        return "Monto final de la Cuota:" . $this->getMontoCuota() + $this->getMontoInteres() . "\n---------------------------------\n" ;
    }

}
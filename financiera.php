<?php 

class Financiera{
    private $denominacion;
    private $direccion;
    private $colPrestamo = [];

    //metodo constructor
    public function __construct( $denominacion,  $direccion){$this->denominacion = $denominacion;$this->direccion = $direccion;}
	
    //metodos de acceso(getters)
    public function getDenominacion() {return $this->denominacion;}

	public function getDireccion() {return $this->direccion;}

	public function getColPrestamo() {return $this->colPrestamo;}

    //metodos de acceso (setters)
	public function setDenominacion( $denominacion): void {$this->denominacion = $denominacion;}

	public function setDireccion( $direccion): void {$this->direccion = $direccion;}

	public function setColPrestamo( $colPrestamo): void {$this->colPrestamo = $colPrestamo;}

	public function incorporarPrestamo($newPrestamo){
        $this->colPrestamo [] = $newPrestamo; //Añadimos el prestamo al array
    }

    public function otorgarPrestamoSiCalifica(){
        foreach($this->colPrestamo() as $newPrestamo){ 
            if($this->colPrestamo() == []){ //Validamos que el array este vacio
                $califica = $this->getMonto() / $this->cantidadCuotas;
                $neto40 = $this->getMonto * 0.40; //Saco el 40% del total neto.
                if($califica < $neto40){ //Si es menor al 40% otorgo el prestamo.
                    otorgarPrestamo($newPrestamo);
                }
            }
        }
    }
    public function informarCuotaPagar($idPrestamo){
        $encontrado = false;
        $cantidadCol = count($this->colPrestamo());
        $i = 0;
        while($encontrado == false && $i < $cantidadCol){
            if($this->colPrestamo[$i] == $idPrestamo){
                $coutaPagar = darSiguienteCuotaPagar();
                $encontrado = true;
            }
        $i++;
        }
    return $coutaPagar;
    }
    public function toString(){
        return 
        "Denominacion: " . $this->getDenominacion() . "/n" .
        "Direccion: " . $this->getDireccion() . "/n" . 
        "Prestamos Otorgados: " . count($this->getColPrestamo()) . "/n";
    }
}
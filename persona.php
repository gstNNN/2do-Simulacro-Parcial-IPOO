<?php

class Persona{

    private $nombre;
    private $apellido;
    private $dni;
    private $direccion;
    private $mail;
    private $telefono;
    private $neto;


    //metodo constructor
    public function __construct( $nombre,  $apellido,  $dni,  $direccion,  $mail,  $telefono,  $neto){$this->nombre = $nombre;$this->apellido = $apellido;$this->dni = $dni;$this->direccion = $direccion;$this->mail = $mail;$this->telefono = $telefono;$this->neto = $neto;}

    //getters (metodo de acceso)
    public function getNombre() {return $this->nombre;}

	public function getApellido() {return $this->apellido;}

	public function getDni() {return $this->dni;}

	public function getDireccion() {return $this->direccion;}

	public function getMail() {return $this->mail;}

	public function getTelefono() {return $this->telefono;}

	public function getNeto() {return $this->neto;}

    //setters(metodo de acceso)
	public function setNombre( $nombre): void {$this->nombre = $nombre;}

	public function setApellido( $apellido): void {$this->apellido = $apellido;}

	public function setDni( $dni): void {$this->dni = $dni;}

	public function setDireccion( $direccion): void {$this->direccion = $direccion;}

	public function setMail( $mail): void {$this->mail = $mail;}

	public function setTelefono( $telefono): void {$this->telefono = $telefono;}

	public function setNeto( $neto): void {$this->neto = $neto;}

	//metodo toString_
    public function toString_(){
        return "Nombre: " . $this->getNombre . "\n" . 
        "Apellido: " . $this->getApellido . "\n" . 
        "DNI: " .$this->getDni .  "\n" . 
        "Direccion: " . $this->getDireccion . "\n" .
        "Mail: " . $this->getMail . "\n" . 
        "Telefono: " . $this->getTelefono . "\n" . 
        "Neto: " . $this->getNeto . "\n";  
    }
}
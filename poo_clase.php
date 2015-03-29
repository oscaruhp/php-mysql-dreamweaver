<?php

class Persons{
	// Atributos
	private $Nombre;
	private $Edad;
	
	// Contructor
	public function Persons(){
		$this->Edad=25;
		$this->Nombre="Nombre Del Objeto";
	}
	// Métodos de la clase persona get/set
	public function setNombre($valorNombre){
		$this->Nombre=$valorNombre;
		}
	public function setEdad($valorEdad){
		$this->Edad=$valorEdad;
	}
	public function getNombre(){
		return $this->Nombre;
	}
	public function getEdad(){
		return $this->Edad;
	}
}
class Estudiante extends Persons{
	//Atributos
	private $carrera;
	private $matricula;
	// constructor
	public function Estudiante(){
		}
	// Métodos de la clase Estudiante
	public function setCarrera($valorCarrera){
		$this->carrera=$valorCarrera;
		}
	public function setMatricula($valorMatricula){
		$this->matricula=$valorMatricula;
		}
	public function getCarrera(){
		return $this->carrera;
		}
	public function getMatricula(){
		return $this->matricula;
		}
}

?>

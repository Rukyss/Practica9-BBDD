<?php

class Usuario{

    private $id;
    private $nombre;
    private $usuario;
    private $email;
    private $contrasena;


    public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function getUsuario(){
		return $this->usuario;
	}

	public function setUsuario($usuario){
		$this->usuario = $usuario;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getcontrasena(){
		return $this->contrasena;
	}

	public function setcontrasena($contrasena){
		$this->contrasena = $contrasena;
	}
}
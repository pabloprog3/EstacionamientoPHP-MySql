<?php

class Usuario {

	public $usuario;
	public $clave;
	public $perfil;
	
	// public function __construct($u, $p)
	// {
	// 	$this->usuario = $u;
	// 	$this->perfil = $p;
	// }


public function GetUsuario()
{
	return $this->usuario;
}

public function GetClave()
{
	return $this->clave;
}

public function GetPerfil()
{
	return $this->perfil;
}

public function SetUsuario($valor)
{
	$this->usuario = $valor;
}

public function SetClave($valor)
{
	$this->clave = $valor;
}

public function SetPerfil($valor)
{
	$this->perfil = $valor;
}


}


?>
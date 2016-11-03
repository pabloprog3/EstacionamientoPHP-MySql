<?php

class Usuario {

	$usuario;
	$perfil;
	
	function __construct($u, $p)
	{
		$this->usuario = $u;
		$this->perfil = $p;
	}
}

public function GetUsuario()
{
	return $this->usuario;
}

public function GetPerfil()
{
	return $this->perfil;
}

public function SetUsuario($valor)
{
	$this->usuario = $valor;
}

public function SetPerfil($valor)
{
	$this->perfil = $valor;
}


public static function TraerUnUsuario($id)
{
	$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	$consulta = $objetoAccesoDato->RetornarConsulta("SELECT id_patente, correo, clave, perfil FROM proveedores WHERE numero = :numero ");
	$consulta->bindValue(':numero', $numero, PDO::PARAM_INT);
	$consulta->execute();
	$userBuscado= $consulta->fetchObject('Proveedor');
	return $userBuscado;	
}

public static function TraerTodosLosUsuarios($id)
{
	
}







?>
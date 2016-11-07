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


public static function TraerUnUsuario($id)
{
	$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	$consulta = $objetoAccesoDato->RetornarConsulta("SELECT id_patente, correo, clave, perfil FROM usuarios WHERE id_patente = :numero ");
	$consulta->bindValue(':numero', $id, PDO::PARAM_INT);
	$consulta->execute();
	$userBuscado= $consulta->fetchObject('Usuario');
	return $userBuscado;	
}

public static function TraerTodosLosUsuarios()
{
	$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	$consulta =$objetoAccesoDato->RetornarConsulta("SELECT id_usuario, correo, clave, perfil FROM usuarios");
	$consulta->execute();			
 	return $consulta->fetchAll(PDO::FETCH_CLASS, "Usuario");
}




}


?>
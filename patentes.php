<?php

class Patente
{
	
	public $patente;
	public $fechaIngreso;
	public $id;


	public function GetPatente()
	{
		return $this->patente;
	}

	public function GetFecha()
	{
		return $this->fechaIngreso;
	}

	public function GetID()
	{
		return $this->id;
	}



	public function SetPatente($valor)
	{
		$this->patente = $valor;
	}

	public function SetFecha($valor)
	{
		$this->fechaIngreso = $valor;
	}

	public function SetID($valor)
	{
		$this->id = $valor;
	}



	public function __construct($numero=NULL)
	{
		if($numero != NULL)
		{
			$obj = Patente::TraerUnUsuario($numero);
			$this->pat	ente = $obj->numero;	
		}		
	}		
	

	public static function TraerUnaPatente($id)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta = $objetoAccesoDato->RetornarConsulta("SELECT id_patente, patente, ingreso FROM autos WHERE id_patente = :numero ");
		$consulta->bindValue(':numero', $id, PDO::PARAM_INT);
		$consulta->execute();
		$patenteBuscado= $consulta->fetchObject('Patente');
		return $patenteBuscado;				
	}

	public static function TraerTodasPatentes($id)
	{
		
	}


	public function Insertar()
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta = $objetoAccesoDato->RetornarConsulta("INSERT INTO autos (patente, ingreso) values (:patente, :ingreso)");
		$consulta->bindValue(':patente',$this->patente, PDO::PARAM_STR);
		$consulta->bindValue(':ingreso', $this->fechaIngreso, PDO::PARAM_STR);

		$consulta->execute();
	}

	public function Modificar()
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("UPDATE autos SET patente=:patente, ingreso=:ingreso WHERE id_patente=:numero");
		$consulta->bindValue(':patente',$this->patente, PDO::PARAM_STR);
		$consulta->bindValue(':ingreso', $this->fechaIngreso, PDO::PARAM_STR);
		$consulta->bindValue(':numero',$this->id, PDO::PARAM_INT);
		$consulta->execute();		
	}

	public static function Borrar($id)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("DELETE FROM proveedores WHERE id_patente = :numero");	
		$consulta->bindValue(':numero', $id, PDO::PARAM_INT);		
		$consulta->execute();
		return $consulta->rowCount();
	}

}

















?>
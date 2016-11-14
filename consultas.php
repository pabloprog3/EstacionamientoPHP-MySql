<?php

include 'Conexion.php';

class Consultas
{


	public static function cargarUsuarios()
	{	
		$rows = null;

		$objPDO = new AccesoPDO();
 		$conexion = $objPDO->getConexion();
 		$sql = "select * from usuarios";

 		$statementPDO = $conexion->prepare($sql);
 		$statementPDO->execute();

 		while ($resultado = $statementPDO->fetch()) 
 		{
 			$rows[]= $resultado;
 		}

 		return $rows;
	}


	public static function insertarUsuarios($correo, $clave, $perfil)
	{	
		$PDO = new AccesoPDO();
		$conexion = $PDO->getConexion();

		$sql = "insert into usuarios (correo, clave, perfil) values (:unCorreo, :unaClave, :unPerfil)";

		$statementPDO = $conexion->prepare($sql);
		$statementPDO->bindParam(':unCorreo', $correo);
		$statementPDO->bindParam(':unaClave', $clave);
		$statementPDO->bindParam(':unPerfil', $perfil);

		if (!$statementPDO) 
		{
			return "Error al crear el registro";	
		}
		else
		{
			$statementPDO->execute();
			return "Registro creado con exito";
		}

	}

	public static function sacarUsuario($id)
	{
		$PDO = new AccesoPDO();
		$conexion = $PDO->getConexion();
		$sql = "delete from usuarios where id_usuario = :id";
		$statementPDO = $conexion->prepare($sql);
		$statementPDO->bindParam(":id", $id);

		if (!$statementPDO) 
		{
			return "Se produjo un error al sacar la Patente. Avise a su Administrador";
		}
		else
		{
			$statementPDO->execute();
		}
	}




	public function insertarPatente($patente)
	{
		$fecha = date('d-m-Y H:i:u');
		$PDO = new AccesoPDO();
		$conexion = $PDO->getConexion();

		$sql = "insert into autos (patente, ingreso) values (:patente, :fecha)";

		$statementPDO = $conexion->prepare($sql);
		$statementPDO->bindParam(':patente', $patente);
		$statementPDO->bindParam(':fecha', $fecha);

		if (!$statementPDO) 
		{
			return "Error al crear el registro";	
		}
		else
		{
			$statementPDO->execute();
			return "Registro creado con exito";
		}

	}



	public static function cargarPatentes()
	{
		$rows=null;
		$PDO = new AccesoPDO();
		$conexion = $PDO->getConexion();
		$sql = "select id_patente as ID, patente as PATENTE, ingreso as INGRESO from autos";
		$statementPDO = $conexion->prepare($sql);
		$statementPDO->execute();

		while ($resultado = $statementPDO->fetch()) 
		{
			$rows[] = $resultado;
		}

		return $rows;
	}


	public static function sacarPatente($patente)
	{
		//$fechaEgreso = time();

		$PDO = new AccesoPDO();
		$conexion = $PDO->getConexion();
		$sql = "delete from autos where id_patente = :patente";
		$statementPDO = $conexion->prepare($sql);
		$statementPDO->bindParam(":patente", $patente);

		if (!$statementPDO) 
		{
			return "Se produjo un error al sacar la Patente. Avise a su Administrador";
		}
		else
		{
			$statementPDO->execute();
		}
	}

	public static function traerFecha($id)
	{
		
		$PDO = new AccesoPDO();
		$conexion = $PDO->getConexion();
		$sql = "select ingreso from autos where id_patente = :idPatente";
		$resultado;

		$statementPDO = $conexion->prepare($sql);
		$statementPDO->bindParam(":idPatente", $id);

		$statementPDO->execute();

		return $resultado[] = $statementPDO->fetch();

	}












}









?>
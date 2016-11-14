<?php

include 'Conexion.php';

class Consultas
{


	public static function cargarUsuarios()
	{	
		$rows = null;

		$objPDO = new AccesoPDO();
 		$conexion = $objPDO->getConexion();
 		$sql = "select correo, clave, perfil from usuarios";

 		$statementPDO = $conexion->prepare($sql);
 		$statementPDO->execute();

 		while ($resultado = $statementPDO->fetch()) 
 		{
 			$rows[]= $resultado;
 		}

 		return $rows;
	}















	public function insertarPatente($patente, $fechaIngreso)
	{
		$PDO = new AccesoPDO();
		$conexion = $PDO->getConexion();

		$sql = "insert into autos (patente, ingreso) values (:patente, :fecha)";

		$statementPDO = $conexion->prepare($sql);
		$statementPDO->bindParam(':patente', $patente);
		$statementPDO->bindParam('fecha', $fechaIngreso);

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
		$sql = "select patente as PATENTE, ingreso as INGRESO from autos";
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
		$fechaEgreso = time();

		var_dump($fechaEgreso);

		$PDO = new AccesoPDO();
		$conexion = $PDO->getConexion();
		$sql = "delete from autos where patente = :patente";
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












}









?>
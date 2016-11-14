<?php

class AccesoPDO
{
	
	public function getConexion()
	{
		$user = "u165823463_pablo";
		$pass = "utnfra2003";
		$host = "mysql.hostinger.com.ar";
		$db = "estacionamiento";

		$conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);

		return $conn;	
	}




}//fin de la clase














?>

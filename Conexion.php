<?php

class AccesoPDO
{
	
	public function getConexion()
	{
		$user = "u165823463_pablo";
		$pass = "8YgOfJB73z";
		$host = "mysql.hostinger.com.ar";
		$db = "u165823463_estac";

		$conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);

		return $conn;	
	}




}//fin de la clase














?>

<?php

class AccesoPDO
{
	
	public function getConexion()
	{
		$user = "root";
		$pass = "";
		$host = "localhost";
		$db = "estacionamiento";

		$conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);

		return $conn;	
	}




}














?>

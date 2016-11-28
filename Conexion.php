<?php

class AccesoPDO
{
	
	public function getConexion()
	{
		$user ="root";         //"u165823463_pablo";
		$pass ="";        //"8YgOfJB73z";
		$host ="localhost";       //"mysql.hostinger.com.ar";
		$db ="estacionamiento";        //"u165823463_estac";

		$conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);

		return $conn;	
	}




}//fin de la clase














?>

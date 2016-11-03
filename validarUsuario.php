<?php

$usuario = $_POST['usuario'];
$clave = $_POST['clave'];

//var_dump($_POST);

$conn = mysql_connect('localhost', 'root','');
$enlace = mysql_select_db('estacionamiento', $conn);
$sql = "SELECT correo, clave FROM usuarios";


$registros = mysql_query($sql);

$encontrado = false;

while ($fila=mysql_fetch_array($registros, MYSQL_BOTH)) 
{
	if ($fila['correo'] == $usuario && $fila['clave'] == $clave) 
	{
		$encontrado = true;
		break;
	}
}


if($encontrado == true)
{
	echo "verdadero";
}

?>
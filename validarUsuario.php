<?php

$usuario = $_POST["usuario"];
$cookie = $_POST["sicookie"];


include 'consultas.php';


$clave = $_POST["clave"];
$encontrado = 0;
$perfil ="";



 $consulta = Consultas::cargarUsuarios();


 foreach ($consulta as $i)
  {
 	if ($i["correo"] == $usuario && $i["clave"] == $clave) 
 	{
 		$nombre = $i['nombre'];

 		if(!(isset($COOKIE['nombre']) && $cookie=='n'))
 			setcookie('nombre', "$nombre", time()+3600);

 		$encontrado = 1;
 		$perfil=$i["perfil"];
 		break;
 	}
 }



 if ($encontrado == 1) 
 {
 	echo  "$perfil-$nombre";

 }
 else
 	echo "Usuario no encontrado";


?>
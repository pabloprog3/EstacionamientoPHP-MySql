<?php

include 'consultas.php';
//include 'usuarios.php';

//var_dump($_POST);	



$usuario = $_POST["usuario"];
$clave = $_POST["clave"];
$encontrado = 0;
$perfil ="";



 $consulta = Consultas::cargarUsuarios();


 foreach ($consulta as $i)
  {
 	if ($i["correo"] == $usuario || $i["clave"] == $clave) 
 	{
 		$encontrado = 1;
 		$perfil=$i["perfil"];
 		break;
 	}
 }



 if ($encontrado == 1) 
 	echo  "$perfil";
 else
 	echo "Usuario no encontrado";


?>
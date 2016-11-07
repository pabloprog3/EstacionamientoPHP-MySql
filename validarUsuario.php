<?php

include 'AccesoPDO.php';
include 'usuarios.php';

$usuario = $_POST['usuario'];
$clave = $_POST['clave'];
$encontrado = 'aaa';

//var_dump($_POST);

	$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	$consulta =$objetoAccesoDato->RetornarConsulta("SELECT id_usuario, correo, clave, perfil FROM usuarios");
	$consulta->execute();	

 	$consulta->fetch(PDO::FETCH_ASSOC);

 foreach ($consulta as $i)
  {
 	if ($i['correo'] == $usuario || $i['clave'] == $clave) 
 	{
 		$encontrado = 'bbb';
 		break;
 	}
 }

echo "$encontrado";

?>
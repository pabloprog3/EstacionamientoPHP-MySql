<?php

include 'consultas.php';
include 'patentes.php';


$queHago=$_POST['queHacer'];

switch ($queHago) 
{
	case 'autos':
					//$listaAutos = array();
					$listaAutos = Consultas::cargarPatentes();

					echo "<table class='table table-hover' align='center'>

						<tr>
							<td style='color:white' id='patenteTH' align='center'>Patente</th>
							<td style='color:white' id='ingresoTH' align='center'>Hora de Ingreso</td>
							<td align='center'><input type='button' class='btn btn-default form-control' id='alta' value='Ingresar Auto' onClick='ingresarAuto()'></td>
						</tr>";

						foreach ($listaAutos as $auto) 
						{
							echo "<tr class='success'>";
							echo "<td align='center'>".$auto['PATENTE']."</td>";
							echo "<td align='center'>".$auto['INGRESO']."</td>";
							echo "<td><input type='button' value='SACAR' onClick='sacarAuto(".$auto['ID'].")' class='btn btn-success'></td>";
							echo "</tr>";							
						
						}

					"</table>";

					break;



	case 'sacarAuto': 
			 $patente = $_POST['id'];
			 $fechaIngreso = Consultas::traerFecha($patente);

			// var_dump($fechaIngreso);

			 $costo=Patente::CalcularMonto($fechaIngreso);

			 Consultas::sacarPatente($patente);
			 
			  
			  echo "$costo";

			 break;


	case 'insertarPatente':
				$patente = $_POST['patente'];
				$fecha = date('d-m-Y y:i:s');
				//echo "$fecha";
				$retorno = Consultas::insertarPatente($patente, $fecha);

				return $retorno;


	case 'usuarios':
			$listaUsuarios = Consultas::cargarUsuarios();

					echo "<table class='table table-hover' align='center'>

						<tr>
							<td style='color:white' id='patenteTH' align='center'>Correo</th>
							<td style='color:white' id='ingresoTH' align='center'>Perfil</td>
							<td align='center'><input type='button' class='btn btn-default form-control' id='alta' value='Ingresar Usuario' onClick='ingresarUsuario()'></td>
						</tr>";

						foreach ($listaUsuarios as $user) 
						{
							echo "<tr class='success'>";
							echo "<td align='center'>".$user['correo']."</td>";
							echo "<td align='center'>".$user['clave']."</td>";
							echo "<td><input type='button' value='BORRAR' onClick='sacarUsuario(".$user['id_usuario'].")' class='btn btn-success'></td>";
							echo "</tr>";							
						
						}

					"</table>";
			break;

	case 'insertarUsuarios':
				$correo=$_POST['correo'];
				$clave=$_POST['clave'];
				$perfil=$_POST['perfil'];

				$retorno = Consultas::insertarUsuarios($correo, $clave, $perfil);

				return $retorno;


		break;

	
	case 'sacarUsuario':
			$id=$_POST['id'];
			Consultas::sacarUsuario($patente);

		break;



}






?>


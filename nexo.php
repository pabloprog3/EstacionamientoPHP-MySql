<?php

include 'consultas.php';
include 'patentes.php';

	// $perfil = $_POST['perfil'];

	// 			if(!isset($_COOKIE['perfil']))
	// 			{
	//  					 setcookie('perfil', $perfil);					

	// 			}


$queHago=$_POST['queHacer'];

switch ($queHago) 
{
	case 'autos':
					$listaAutos = Consultas::cargarPatentes();
					if ($listaAutos == -1) 
					{
						echo "<p class='claseP'>No hay ninguna patente registrada en el Sistema</p><br>
						<input type='button' class='btn btn-primary' value='Ingresar Patente' align='center' onClick='ingresarAuto()'>";
					}
					else
					{

						echo "<br><br><div class='table table-responsive table-hover'>
						<table class='table table-striped table-bordered' align='center'>';

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
						
						echo "</div>";
				}

					break;



	case 'sacarAuto': 
			 $patente = $_POST['id'];
			 $fechaIngreso = Consultas::traerFecha($patente);

			// var_dump($fechaIngreso);

			 if (Patente::CalcularMonto($fechaIngreso) == -1)
			 {
			 	echo "No ha pasado más de un minuto desde que ingreso el auto";
			 }
			 else
			{
			 $costo=Patente::CalcularMonto($fechaIngreso);
			 Consultas::sacarPatente($patente);
			 echo "$costo";
			}

			 break;


	case 'insertarPatente':
				$patente = $_POST['patente'];

				if(Consultas::verificarPatente($patente) == 1)
				{
					return -1;
				}
				else{
						Consultas::insertarPatente($patente);
					}

				//return $retorno;


	case 'usuarios':
			$listaUsuarios = Consultas::cargarUsuarios();

					echo "<table class='table table-responsive table-hover' align='center'>

						<tr>
							<td style='color:white' id='patenteTH' align='center'>Correo</td>
							<td style='color:white' id='ingresoTH' align='center'>Clave</td>
							<td style='color:white' id='ingresoTH' align='center'>Perfil</td>
							<td align='center'><input type='button' class='btn btn-default form-control' id='alta' value='Ingresar Usuario' onClick='ingresarUsuario()'></td>
						</tr>";

						foreach ($listaUsuarios as $user) 
						{
							if ($user['correo'] == 'admin1@hotmail.com' || $user['correo']=='user1@gmail.com') {
								echo "<tr class='danger'>";
								echo "<td align='center'>".$user['correo']."</td>";
								echo "<td align='center'>".$user['clave']."</td>";
								echo "<td align='center'>".$user['perfil']."</td>";
								echo "<td></td>";
								echo "<td></td>";
								echo "</tr>";
							}else{							
								echo "<tr class='success'>";
								echo "<td align='center'>".$user['correo']."</td>";
								echo "<td align='center'>".$user['clave']."</td>";
								echo "<td align='center'>".$user['perfil']."</td>";
								echo "<td><input type='button' value='BORRAR' onClick='sacarUsuario(".$user['id_usuario'].")' class='btn btn-success'></td>";
								echo "<td><input type='button' value='MODIFICAR' onClick='modificarUsuario(".$user['id_usuario'].")' class='btn btn-warning'></td>";
								echo "</tr>";
							}						
						
						}

					"</table>";
			break;

	case 'insertarUsuarios':
				//var_dump($_POST);
				$correo=$_POST['correo'];
				$clave=$_POST['password'];
				$perfil=$_POST['perfil'];


			    Consultas::insertarUsuarios($correo, $clave, $perfil);

		break;

	
	case 'sacarUsuario':
			$id=$_POST['id'];
			Consultas::sacarUsuario($id);

		break;


	case 'modificar':
				$id=$_POST['id'];
				$dato = Consultas::traerUsuario($id);
				//var_dump($dato);
				$objJson=json_encode($dato);

				echo $objJson;

		break;

	case 'modificarBD':
				
				$id=$_POST['id'];
				$correo=$_POST['correo'];
				$clave=$_POST['clave'];
				$perfil=$_POST['perfil'];

				Consultas::modificarUsuario($id, $correo, $clave, $perfil);

		break;



}






?>


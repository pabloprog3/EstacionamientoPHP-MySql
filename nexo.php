<?php

//include 'Conexion.php';
include 'consultas.php';

//var_dump($_POST);

$queHago=$_POST['queHacer'];

switch ($queHago) 
{
	case 'autos':
					$listaAutos = array();
					$listaAutos = Consultas::cargarPatentes();
					//var_dump($listaAutos);

					echo "<table class='table table-hover' align='center'>

						<tr>
							<td style='color:white' id='patenteTH' align='center'>Patente</th>
							<td style='color:white' id='ingresoTH' align='center'>Hora de Ingreso</th>
						</tr>";



						foreach ($listaAutos as $auto) 
						{
							//$idPatente = $auto['PATENTE'];
							echo "<tr class='success'>";
							echo "<td align='center'>".$auto['PATENTE']."</td>";
							echo "<td align='center'>".$auto['INGRESO']."</td>";
							echo "<td><input type='button' value='SACAR' onClick='sacarAuto('".$auto['PATENTE'].")' class='btn btn-success'></td>";
							echo "</tr>";							
						}

					"</table>";

					break;



	case 'sacarAuto': 
			 $patente = $_POST['id'];
			 var_dump($_POST);
			 Consultas::sacarAuto($id);

			 break;

}






?>


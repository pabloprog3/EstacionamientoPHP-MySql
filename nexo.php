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
							<td style='color:white' id='ingresoTH' align='center'>Hora de Ingreso</th>
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


}






?>


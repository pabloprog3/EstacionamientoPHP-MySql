<?php
include 'consultas.php';
?>


<body>
	<form>
	<div id="botonesADM">
		<input type="button" class="btn btn-warning btn-block" value="Administrar Empleadosss" onClick="formEmp()" id='btnEmp'>
		<input type="button" class="btn btn-warning btn-block" value="Administrar Autos" onClick="formAutos()" id='btnAut'>
		<input type="text"  class="text-success form-control" placeholder="Valor Del Estacionamiento" id="cobro" disabled hidden> 
		
	</div>

	<div id="botonSeleccionado">

	</div>

	<div id="formularioInsertar">


	</div>


	</form>

	<br><br>

	<input type="text" class='btn btn-danger'  value='Deslogearse' onClick='volverIndice()'> 
	<br><br>
<!-- 
	<?php
	//if (Consultas::cargarPatentes() == -1) 
	
		//echo "<input type='button' class='btn btn-info' value='Ingresar Patente' onClick='ingresarAuto()'>";
	
	?> -->

	


</body>


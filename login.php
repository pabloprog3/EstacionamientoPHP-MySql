
<form method="post">

	<div class="form-group"  style="width:250px">
		<h2>ESTACIONAMIENTO UTN-FRA</h2>
		
		<p id="mensajeError"></p>
		<br>
		<input type="text" class="form-control" name="correo" id="correo" placeholder="Correo Electrónico">
		<br>
		<input type="password" class="form-control" name="clave" id="clave" placeholder="Clave">
		<br>
		<input type="checkbox" class="checkbox-inline" name="recordarme" id="recordarme" checked>Recordarme
		<br><br>
		<input  type="button" class="btn btn-primary" name="usuario" id="usuario" value="Test usuario" onclick="CargarUsuario()">
		<input  type="button" class="btn btn-primary" name="admin" id="admin" value="Test admin" onclick="CargarAdmin()">
		<br><br>
		<input type="button" class="btn btn-primary btn-block" name="Ingresar" id="Ingresar" value="Ingresar" onclick="ingresar()">
		<br>
		
	</div>

</form>
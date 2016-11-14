$(document).ready(function () {
	
});


function CargarUsuario () {
	$('#correo').val('testing1@hotmail.com');
	$('#clave').val('1234');
	$('#mensajeError').html("");
}

function CargarAdmin () {
	$('#correo').val('admin1@hotmail.com');
	$('#clave').val('4321');
	$('#mensajeError').html("");
}

function ingresar () 
{
	if ( $('#correo').val() == "" || $('#clave').val() == "" ) 
	 	$('#mensajeError').html('Falta completar 1 o más dato para ingresar al Sistema');
	 else
	 {
	 	var usuario = $('#correo').val();
	 	var clave = $('#clave').val();

	 	$.ajax({
		type:"post",
		url:"validarUsuario.php",
		data:{usuario:usuario, clave:clave},	
		success: function (resp) 
				{
					if (resp == "admin") {
						$('#login').hide();
						$('#perfil').load("formIngreso.php");


					};
				}
		});

	 }
	 
}


function formAutos()
{
	var queHago = "autos";

	$.ajax({
		type:"post",
		url:"nexo.php",
		data:{queHacer:queHago},	
		success: function (resp) 
				{
					$('#botonSeleccionado').html(resp);
				}
		});

}


function formEmp () 
{
	// body...
}


function ingresarAuto () 
{

//	location.href = "insertarPatente.html";

	$('#formularioInsertar').load('insertarPatente.html');		
	$('#ingresarAuto').style.display='block';					

}	

function sacarAuto (idpatente) 
{
	var queHago = "sacarAuto";
	var egreso = Date();

	$.ajax({
		type:"post",
		url:"nexo.php",
		data:{queHacer:queHago, id:idpatente, egreso:egreso},	
		success: function (resp) 
				{
					document.getElementById('cobro').style.display='block';	
					$('#cobro').val('Monto a pagar: $' + resp);
					$('#cobro').fadeOut(2500);
					formAutos();					
				}
		});

}

function insertarPatente ()
{
	var queHago = "insertarPatente";
	var patente = $('#patente').val();

	$.ajax({
		type:"post",
		url:"nexo.php",
		data:{queHacer:queHago, patente:patente},	
		success: function (resp) 
				{
					formAutos();
					$('#ingresarAuto').remove('div');					
				}
		});
}


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
	 	var clave = $('#clave').val;

	 	validar(usuario, clave);

	 	// if(validar(usuario, clave))
	 	// 	 	$.ajax({
	 	// 				async:true,
	 	// 				type:'post',
	 	// 				url:'nexo.php',
	 	// 				timeout:10000,
	 	// 				data:{usuario:usuario, clave:clave}

	 	// 		});
	 }
	 
}


function validar (usuario, clave)
{

	var usuario = $('#correo').val();
	 	var clave = $('#clave').val;

	$.ajax({
		type:"post",
		url:"validarUsuario.php",
		data:{usuario:usuario, clave:clave},	
		success: function (resp) {
					alert(resp);
				}
		});

	// }).success(function (datos)
	// 		{ 
	// 			//$('#mensajeError').html(datos.responseText);
	// 			alert(datos.responseText);
	// 		});
		
}
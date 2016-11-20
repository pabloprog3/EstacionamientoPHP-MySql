$(document).ready(function () {
	
});

function volverIndice () {
	//alert('volver');
	window.location = "index.php";
}

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

function ingresar() 
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
					//alert(resp);

					if (resp == "admin") 
					{
						$('#login').hide();
						$('#perfil').load("formIngreso.php");

					}
					else{
						$('#login').hide();
						$('#perfil').load("formIngreso.php");
						//$('#formIngreso').('#btnEmp').remove();

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
	var queHago = "usuarios";


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



function ingresarUsuario()
{
	$('#formularioInsertar').load('insertarUsuarios.html');		
	//$('#usuario').style.display='block';	

}

function insertarUsuarios() 
{

  var queHago = "insertarUsuarios";
  var correo = $('#correoIngreso').val();
  var password = $('#pass').val();
  var perfil= $("input[name='perfil']:checked").val();

	$.ajax({
		type:"post",
		url:"nexo.php",
		data:{queHacer:queHago, correo:correo, password:password, perfil:perfil},	
		success: function (resp) {
			formEmp();
		}					

		});
}


function sacarUsuario(idusuario)
{
	var queHago = "sacarUsuario";

	$.ajax({
		type:"post",
		url:"nexo.php",
		data:{queHacer:queHago, id:idusuario},	
		success: function (resp) 
				{	
					$('#usuario').remove('div');				
					formEmp	();
					//$('#usuario').style.display='none';					
				}
		});

}


function modificarUsuario(usuario)
{
	var queHago = "modificar";

	$.ajax({
		type:"post",
		url:"nexo.php",
		data:{queHacer:queHago, id:usuario},
		dataType: "json",
		beforeSend: function () {
			$('#formularioInsertar').load('insertarUsuarios.html');
		},	
		success: function (data) 
				{	
					//console.log(data);
					 $('#correoIngreso').val(data[0].correo);
					 $('#pass').val(data[0].clave);

					 
					 
					 modificarBD(usuario);

					 //$("input[name='perfil']:checked") = data[0].perfil;
					 // var perfil = data[0].perfil;
					 // document.getElementById(perfil).checked = true;

					 //.val(data[0].perfil);
					// $('#pass').val(usuario.clave);
					// $("input[name='perfil']:checked").val(usuario.perfil);				
				},

			error: function (mensaje) {
				console.info(mensaje);
			}
		});
}

function modificarBD(id)
{
	var queHago = "modificarBD";

	$.ajax({
		type:"post",
		url:"nexo.php",
		data:{queHacer:queHago, id:id},

		success: function (data) 
				{	
					formEmp();		
				},

			error: function (mensaje) {
				console.info(mensaje);
			}
		});

}




function ingresarAuto () 
{

//	location.href = "insertarPatente.html";
	$('#usuario').remove('div');	
	$('#formularioInsertar').load('insertarPatente.html');
	$('#patente').focus();		
					

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
					//$('#cobro').fadeOut(4500);
					formAutos();					
				}
		});

}

function insertarPatente ()
{
	var queHago = "insertarPatente";
	var patente = $('#patente').val();

	if (patente == "") 
	{
		//alert("No esta ingresando ninguna patente");
		$('#patente').val('ERROR - INGRESE NUEVAMENTE LA PATENTE');
	}
	else
	{

		$.ajax({
			type:"post",
			url:"nexo.php",
			data:{queHacer:queHago, patente:patente},	
			success: function (resp) 
					{
					formAutos();
					$('#ingresarAuto').remove('div');
					if (resp == -1)
							alert("La patente" + patente + " ya se encuentra en el Sistema");
					}
									
					
		});
	}
}


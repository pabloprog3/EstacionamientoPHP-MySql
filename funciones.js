$(document).ready(function () {
	
});

function volverIndice () {
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
	{
	 	$('#mensajeError').html('Falta completar 1 o más dato para ingresar al Sistema');
	 }
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

					$('#footter').html("<input type='button' class='btn btn-danger btn-block' value='Deslogearse' onClick='volverIndice()' id='deslogin'>");
					
					if (resp == "admin") 
					{
						$('#login').hide();
						$('#perfil').load("formIngreso.php");
					}
				}

		});

	}
	 
}


function formAutos()
{
	var queHago = "autos";

	$('#usuario').remove();
	
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

	$('#ingresarAuto').remove();

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
			$('#usuario').remove();
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
					//$('#usuario').remove('div');				
					formEmp	();
										
				}
		});

}


function cancelar()
{
	$('#usuario').remove();
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

					 $('#guardarUser').attr('value', 'Guardar Cambios');
					 $('#guardarUser').attr('onClick', 'modificarBD(id)');
					 
					 
					 //modificarBD(usuario);
				
					 //$("input[name='perfil']:checked").val(data[0].perfil);
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
	var correo = $('#correoIngreso').val();
  	var password = $('#pass').val();
  	var perfil= $("input[name='perfil']:checked").val();

	$.ajax({
		type:"post",
		url:"nexo.php",
		data:{queHacer:queHago, id:id, correo:correo, clave:password, perfil:perfil},

		success: function () 
				{	
					formEmp();
					$('#usuario').remove();		
				},

			error: function (mensaje) {
				console.info(mensaje);
			}
		});

}


function ingresarAuto () 
{
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
	var caracterGuion = patente.indexOf('-');

	if (patente == "" || (caracterGuion == -1 || caracterGuion !=3)) 
	{
		$('#patente').val('ERROR - INGRESE NUEVAMENTE LA PATENTE CON EL FORMATO XXX(X=letra)-YYY(Y=numero)');
		$('#patente').on('click', function () {
			$(this).val("");
		});
	}
	else
	{
		var primerosTesCaracteres=patente.substring(0, 3); //el caracter 3 queda excluido
		var ultimosTresCaracteres=patente.substring(4);

		if(verSiNumeros(patente) != 1)//typeof(primerosTesCaracteres) != 'string' || typeof(ultimosTresCaracteres) != 'number')
		{
			$('#patente').val('ERROR - INGRESE NUEVAMENTE LA PATENTE CON EL FORMATO XXX(X=letra)-YYY(Y=numero)');
			$('#patente').on('click', function () {$(this).val("");});
		
		}
		else{
			$.ajax({
				type:"post",
				url:"nexo.php",
				data:{queHacer:queHago, patente:patente},	
				success: function (resp) 
						{
						formAutos();
						$('#ingresarAuto').remove();	
						if (resp == -1)
							alert("La patente" + patente + " ya se encuentra en el Sistema");
						}
									
					
			});
		}
	}
}


function verSiNumeros (patente) 
{
	var numeros="0123456789";
	var flag;

   for(i=4; i<patente.length; i++){
      if (numeros.indexOf(patente.charAt(i),0)!=-1){
         return 1;
      }
   }
   return 0;
}	



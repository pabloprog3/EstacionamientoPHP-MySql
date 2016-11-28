var id_usuario;

$(document).ready(function () {
});

function volverIndice () {

	$.ajax({
		type:"post",
		url:"nexo.php",
		data:{queHacer:'deslogearse'},	
		success: function (resp) 
				{
					$('#msg').html('Usuario deslogeado exitosamente. Se ha borrado la cookie');
					window.location = "index.php";
				}

		});


}

function CargarUsuario () {
	$('#correo').val('user1@gmail.com');
	$('#clave').val('5555');
	$('#mensajeError').html("");
}

function CargarAdmin () {
	$('#correo').val('admin1@hotmail.com');
	$('#clave').val('4321');
	$('#mensajeError').html("");
}

function ingresar() 
{

	var correo = $('#correo').val();
	var pass = $('#clave').val();

	if ( $('#correo').val() == "" || $('#clave').val() == "" ) 
	{
	 	$('#mensajeError').html('Correo o Contraseña incorrectos. Por favor, intente nuevamente');
	}

	 else
	{
	 	var usuario = $('#correo').val();
	 	var clave = $('#clave').val();
	 	var sicookie='';

	 	if ($('#recordarme').is(':checked'))
	 		sicookie = 's';
	 	else
	 		sicookie = 'n';

	 	$.ajax({
		type:"post",
		url:"validarUsuario.php",
		data:{usuario:usuario, clave:clave, sicookie:sicookie},	
		success: function (resp) 
				{
					var respSeparada = resp.split('-');
					var nombre = respSeparada[1];
					var perfil = respSeparada[0];

					$('#footter').html("<input type='button' class='btn btn-danger btn-block' value='Deslogearse' onClick='volverIndice()' id='deslogin'>");
					
					if (perfil == "admin") 
					{
						$('#login').hide();
						$('#perfil').load("formIngresoAdmin.php");
					}
					if(perfil == "usuario")
					{
						$('#login').hide();
						$('#perfil').load("formIngresoUser.php");

					}

					$('#msg').html("login: " + nombre);
					$('#msg').append("         Perfil: " + perfil);
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
  var nombre = $('#nombre').val();
  var sueldo = $('#selectSueldo').val();

  sueldo = parseInt(sueldo);

  //var focalizar = $("#msg").position().top;
  
  if(validarCamposVacios() == -1)
  	alert("No se han completado todos los campos requeridos");
  else if(validCorreo(correo) == 0)
 {
	alert('No se ha ingresado un correo válido');
 }
 else if(validPassword(password) == -1)
 {
	alert('Se ha excedido la cantidad máxima de caracteres permitidos para la contraseña');
 }
 else if(validarSoloLetras(nombre) == -1)
 {
 	alert('el nombre no puede contener numeros');
 }
 else if(validarRadioCheck() == false)
 	alert('Debe seleccionar un perfil para ingresar un nuevo usuario');

 else
	{
  
  	    enviarFoto(nombre);

		$.ajax({
			type:"post",
			url:"nexo.php",
			data:{queHacer:queHago, correo:correo, password:password, perfil:perfil, nombre:nombre, sueldo:sueldo},	
			success: function (resp) {
			
				formEmp();
			}					

			});

		cancelar();
	}
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

    id_usuario = usuario;


    $('#formularioInsertar').load('insertarUsuarios.html');


	$.ajax({
		type:"post",
		url:"nexo.php",
		data:{queHacer:queHago, id:usuario},
		dataType: "json",
		beforeSend: function () {
			
			                    	
		},	
		success: function (data) 
				{	
					 					
					 $('#correoIngreso').val(data[0].correo);
					 $('#pass').val(data[0].clave);

					 $('#nombre').val(data[0].nombre);
					 $('#nombre').attr('disabled',true);

					 $('#selectSueldo').val(data[0].sueldo);

					 $('#foto').hide();

					 if(data[0].perfil == 'usuario')
					 	$('#testing').attr('checked', true);

					 
					 if(data[0].perfil == 'admin')
					 	$('#admini').attr('checked', true);


					 $('#guardarUser').attr('value', 'Guardar Cambios');
					 $('#guardarUser').attr('onClick', 'modificarBD()');
					 			
				},

			error: function (mensaje) {
				//alert(mensaje);
			}
		});


}

function modificarBD()
{
	var queHago = "modificarBD";

	var correo = $('#correoIngreso').val();
	var password = $('#pass').val();
	var perfil= $("input[name='perfil']:checked").val();
  	var nombre=$('#nombre').val();
  	var sueldo=$('#selectSueldo').val();

  	//enviarFoto(nombre);
  

	$.ajax({
		type:"post",
		url:"nexo.php",
		data:{queHacer:queHago, id:id_usuario, clave:password, correo:correo, perfil:perfil, nombre:nombre, sueldo:sueldo},
		
		beforeSend: function () {
			enviarFoto(nombre);
		},

		success: function () 
				{	
					formEmp();
				},

		error: function (mensaje) {
				alert(mensaje);
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
					$('#cobro').fadeOut(7500);
					formAutos();
					
					var focalizar = $("#botonesADM").position().top;
					$('html,body').animate({scrollTop: focalizar}, 400);					
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


function enviarFoto (nombre) 
{
	var foto=$('#foto').val();
	
	var archivo = $("#foto")[0];


	var formData = new FormData();
	formData.append("foto",archivo.files[0]);
	formData.append("queHacer", "subirFoto");
	formData.append("nombre", nombre);

	$.ajax({
        type: 'post',
        url: 'nexo.php',
        dataType: "json",
		cache: false,
		contentType: false,
		processData: false,
        data: formData,
        async: true,

		success: function (objJson) {

		 return;
		}
	});

}




/*      VALIDACIONES   DE LOS CAMPOS        */


function validCorreo (correo) 
{
	//valida correo correcto
	var indice = correo.indexOf('@');

	if(indice == -1)
		return 0;
	else
		return 1;
}

function validPassword (pass) {

	//valida la longitud de password no mayor a 10 caracteres
	if (pass.length >= 10) 
	{
		return -1;
	}
}

function validarCamposVacios () 
{
	//valida que se ingresen datos en todos los textbox

	var bandera=1;

	 $("#formUsuario").find(':input').each(function() {
         var elemento= this;
         if (elemento.value == "") 
         {
         	bandera=-1;
         }
    
        });

	          return bandera;
}


function validarSoloLetras (nombre) 
{

	//valida que el textbox nombre no se haya ingresado algun numero

	var arrayNombre = nombre.split('');
	var flag=1;

	for (var i = 0; i <= nombre.length - 1; i++) 
	{
		if(!isNaN(arrayNombre[i]))
			return -1;
	}

	if (flag == 1) 
	{
		return 1;
	}
}

function validarRadioCheck ()
{
	//valida que este seleccionado algun perfil
	opciones = document.getElementsByName("perfil");

	var seleccionado = false;
	for(var i=0; i<opciones.length; i++) 
	{    
  		if(opciones[i].checked) 
  		{
   			seleccionado = true;
    		break;
  		}
	}
 
	if(!seleccionado) {
  		return false;
	}
}



			
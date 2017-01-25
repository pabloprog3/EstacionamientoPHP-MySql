<!DOCTYPE HTML>

<head>
	<meta charset="UTF-8">

	<link rel="stylesheet" type="text/css" href="css/estilo.css">
        <link rel="icon" type="image/png" href="fotos/icono.png" />

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">



	<script type="text/javascript" src="controlador/funciones.js"></script>
	

	<title>
		Estacionamiento 2016
	</title>
</head>
<body id='principal'>

       <div id='git' class='container'>
              <h2 id='msg'>

              	<?php
              	if (!isset($_COOKIE['nombre'])) 
              	{
              		echo "Para iniciar sesion, ingrese sus datos";
              	}
              	?>

              </h2>
       </div>

	<div id='login' style="width:300px">
		<?php include 'vista/login.php' ?>

	</div>

	<div id='perfil'>

	</div>


</body>

<div class='container'>
<footer id='footter'>
</div>	
</footer>

</html>					
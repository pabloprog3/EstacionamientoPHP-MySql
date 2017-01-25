<?php


class Usuario {

	public $usuario;
	public $clave;
	public $perfil;
	
	// public function __construct($u, $p)
	// {
	// 	$this->usuario = $u;
	// 	$this->perfil = $p;
	// }


public function GetUsuario()
{
	return $this->usuario;
}

public function GetClave()
{
	return $this->clave;
}

public function GetPerfil()
{
	return $this->perfil;
}

public function SetUsuario($valor)
{
	$this->usuario = $valor;
}

public function SetClave($valor)
{
	$this->clave = $valor;
}

public function SetPerfil($valor)
{
	$this->perfil = $valor;
}


public static function Subir($name)
	{
		$retorno["Exito"] = TRUE;

		//INDICO CUAL SERA EL DESTINO DEL ARCHIVO SUBIDO
		//$archivoTmp = date("Ymd_His") . ".jpg";
		$destino = "fotos/".$name.".jpg";
		
		$tipoArchivo = pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION);

		//VERIFICO EL TAMAÑO MAXIMO QUE PERMITO SUBIR
		if ($_FILES["foto"]["size"] > 5000000) {
			$retorno["Exito"] = FALSE;
			$retorno["Mensaje"] = "El fotoarchivo es demasiado grande. Verifique!!!";
			return $retorno;
		}

		//OBTIENE EL TAMAÑO DE UNA IMAGEN, SI EL ARCHIVO NO ES UNA
		//IMAGEN, RETORNA FALSE
		$esImagen = getimagesize($_FILES["foto"]["tmp_name"]);

		if($esImagen === FALSE) {//NO ES UNA IMAGEN
			$retorno["Exito"] = FALSE;
			$retorno["Mensaje"] = "Solo se permiten imagenes.";
			return $retorno;
		}
		else {// ES UNA IMAGEN

			//SOLO PERMITO CIERTAS EXTENSIONES
			if($tipoArchivo != "jpg" && $tipoArchivo != "jpeg" && $tipoArchivo != "gif"
				&& $tipoArchivo != "png") {
				$retorno["Exito"] = FALSE;
				$retorno["Mensaje"] = "Solamente son permitidas imagenes con extensi&oacute;n JPG, JPEG, PNG o GIF.";
				return $retorno;
			}
		}
		
		if (!move_uploaded_file($_FILES["foto"]["tmp_name"], $destino)) {

			$retorno["Exito"] = FALSE;
			$retorno["Mensaje"] = "Ocurrio un error al subir el archivo. No pudo guardarse.";
			return $retorno;
		}
		else{
			$retorno["Mensaje"] = "Archivo subido exitosamente!!!"; 
			//$retorno["Html"] = "<img src='".$destino."' width='25px' height='25px' />";
			//$retorno["PathTemporal"] = $destino;
			
			return $retorno;
		}
	}

}


?>
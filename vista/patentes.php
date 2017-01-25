<?php

class Patente
{
	
	//date_default_timezone_set('America/Argentina');

	public $patente;
	public $fechaIngreso;
	public $id;


	public function GetPatente()
	{
		return $this->patente;
	}

	public function GetFecha()
	{
		return $this->fechaIngreso;
	}

	public function GetID()
	{
		return $this->id;
	}



	public function SetPatente($valor)
	{
		$this->patente = $valor;
	}

	public function SetFecha($valor)
	{
		$this->fechaIngreso = $valor;
	}


	public static function CalcularMonto($fechaDeIngreso)
	{
		$fechaEgreso = date('Y/m/d H:i:s');

		 $valorHoras=null;
		 $valorMinutos=null;
		 $fechaDeIngreso = $fechaDeIngreso['ingreso'];


		 $fechaING = new DateTime("$fechaDeIngreso");
		 $fechaEgreso = new DateTime("$fechaEgreso");

		 $diff = $fechaEgreso->diff($fechaING, true);

		 $horasPasadas = $diff->format('%H');
		 $minutosPasados = $diff->format('%i');



		 if($horasPasadas >= 1)
		 	$valorHoras = $horasPasadas * 150;
		 if ($minutosPasados>=1) 
		 {
		 	$valorMinutos = $minutosPasados * 4;
		 }

		
			return number_format($valorMinutos + $valorHoras, 2);

	}
}

















?>
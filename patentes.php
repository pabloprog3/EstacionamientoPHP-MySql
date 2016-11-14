<?php

class Patente
{
	
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
		$fechaEgreso = time();
		$fechaDeIngreso = date('d-m-Y y:i:s');
		$segundos = floor((strtotime($fechaDeIngreso) - strtotime($fechaEgreso)) % 60); //obtiene los segundos

		//return $minutos;

		return number_format(abs($cobro = $segundos * 3), 2); //valor del segundo $3
	}





}

















?>
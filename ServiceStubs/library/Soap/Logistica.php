<?php

class DadosFrete{
	/** @var integer */
	public $erro;
	/** @var float */
	public $frete;
	/** @var integer */
	public $prazo;
}

class DadosTransporte extends DadosFrete{
	
	/** @var integer */
	public $codRastreamento;
}

class DadosRastreamento{

	/** @var integer */
	public $erro;
	/** @var string */
	public $situacao;
	/** @var integer */
	public $codRastreamento;
	/** @var string */
	public $urlRastreamento;
	/** @var integer */
	public $status;
}

class Soap_Logistica{

	/**
	 *
	 * @param integer $peso
	 * @param float $volume
	 * @param integer $cep
	 * @param integer $meio
	 * @param integer $notafiscal
	 * @return DadosTransporte
	 *
	 */
	public function transporte($peso, $volume, $cep, $meio, $notafiscal){
		return new DadosTransporte;
	}

	/**
	 *
	 * @param integer $codRastreamento
	 * @param integer $id_status
	 * @return DadosRastreamento
	 *
	 */
	public function acompanhar($codRastreamento, $id_status){
		return new DadosRastreamento;
	}

	/**
	 *
	 * @param integer $peso
	 * @param float $volume
	 * @param integer $cep
	 * @param integer $meio
	 * @return DadosFrete
	 *
	 */
	public function calculaFrete($peso, $volume, $cep, $meio){
		return new DadosFrete;
	}
}

?>

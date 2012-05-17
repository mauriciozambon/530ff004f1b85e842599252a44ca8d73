<?php

class Data{
	/** @var string */
	public $cep = '';
	/** @var string */
	public $logradouro = '';
	/** @var string */
	public $complemento;
	/** @var string */
	public $bairro = '';
	/** @var string */
	public $numero = '';
	/** @var string */
	public  $cidade = '';
	/** @var string */
	public $estado = '';
	/** @var string */
	public $pais = '';
}


class Soap_Endereco{

	/**
	 * List test
	 *
	 * @param Data $endereco
	 * @return boolean
	 */
	public function validaEndereco($endereco){
		return true;	
	}

	/**
	 * @param string $cep
	 * @return Data[]
	 */
	public function enderecoPorCep($cep){
		$e1 = new Data;
		$e2 = new Data;

		return array($e1, $e2);
	}

	/**
	 * @param string $end
	 * @return Data[]
	 */
	public function enderecoPorEnd($endereco){
		$e1 = new Data;
		$e2 = new Data;

		return array($e1, $e2);
	}
}

?>

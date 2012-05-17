<?php

class DadosCliente{
	/**
	 * @var string
	 */
	public $cpf = '000.000.000-00';
	/**
	 * @var string
	 */
	public $nome = 'foo';
	/**
	 * @var string
	 */
	public $dataNasc = '21/12/2012';
	/**
	 * @var string
	 */
	public $dataCadastro = '01/01/2012' ;
	/**
	 * @var string
	 */
	public $rg = '00.000.000-0';
	/**
	 * @var string
	 */
	public $cep = '00000-000';
	/**
	 * @var integer
	 */
	public $numero = 0;
	/**
	 * @var string
	 */
	public $complemento = 'baz';
	/**
	 * @var string
	 */
	public $potencialDeCompra = '';
	/**
	 * @var string
	 */
	public $email = 'foo@baz.com';
}

class Soap_Cliente{
	/**
	 * @param string $cpf
	 * @return boolean
	 */
	public function func1($cpf){
		//$ret = new DadosCliente;
		return true;
	}

	/**
	 * @param string $cpf
	 * @param string $campo
	 * @return boolean
	 */
	public function func2($cpf, $campo){
		//$ret = new DadosCliente;
		return true;
	}
}

?>

<?php

class DadosProtCredito{
	/** @var string */
	public $situacao = 'situacao';
	/** @var integer */
	public $codigo_retorno = 0;
	/** @var string */
	public $msg_retorno = 'msg';
}

class Soap_Credito{

	/**
	 * @param string $id
	 * @return DadosProtCredito
	 */
	public function consultaCPF($id){
		return new DadosProtCredito;
	}
}

?>

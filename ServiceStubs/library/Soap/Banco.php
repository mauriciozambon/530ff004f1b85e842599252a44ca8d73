<?php

class Soap_Banco{

	/**
	 *Register new payment request by deposit
	 *
	 * @param integer $agencia
	 * @param integer $conta
	 * @param float $valor
	 * @return integer
	 *
	 */
	public function deposito($agencia, $conta, $valor){
		return 10;
	}

	/**
	 *Register new payment request by deposit
	 *
	 * @param integer $agencia
	 * @param integer $conta
	 * @param float $valor
	 * @return integer
	 *
	 */
	public function boleto($agencia, $conta, $valor){
		return 11;
	}
	
	/**
	 *Register new payment request by deposit
	 *
	 * @param integer $agencia
	 * @param integer $conta
	 * @param float $valor
	 * @return integer
	 *
	 */
	public function transferencia($agencia, $conta, $valor){
		return 12;
	}

	/**
	 *Register new payment request by deposit
	 *
	 * @param integer $id
	 * @return string
	 *
	 */
	public function status($id){
		if($id % 2){
			return 'S05_R1';
		}
		else{
			return 'S05_R2';
		}
	}

	/**
	 *Register new payment request by deposit
	 *
	 * @param integer $id
	 * @return integer
	 *
	 */
	public function cancela($id){
		return 1;
	}
}

?>

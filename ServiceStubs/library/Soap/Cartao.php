<?php

class DadosCartao{

	/** @var string */
	public $bandeira;

	/** @var integer */
	public $quantidade_max_parcelas;

	/** @var float */
	public $juros;
}

class Soap_Cartao{

	/**
	 * @return DadosCartao[] 
	 */
	public function listaCartoes(){
		$c1 = new DadosCartao;
		$c1->bandeira = 'primeira';
		$c2 = new DadosCartao;
		$c2->bandeira = 'segunda';

		$ret = array($c1, $c2);
		return $ret;
	}

	/**
	 * @param float $valor_compra
	 * @param string $nome_titular
	 * @param string $bandeira_cartao
	 * @param string $numero_cartao
	 * @param string $data_validade
	 * @param string $codigo_seguranca
	 * @param string $quantidade_parcelas
	 * @return integer
	 */
	public function pagamento($valor_compra, $nome_titular, $bandeira_cartao, $numero_cartao, $data_validade, $codigo_seguranca, $quantidade_parcelas){
		return 1;
	}


}

?>

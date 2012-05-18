<?php

class RetProduto{
	/**
	 * @var integer
	 */
	public $id = 0;

	/**
	 * @var string
	 */
	public $nome = '';

	/**
	 * @var integer
	 */
	public $quantidade = 0;

	/**
	 * @var float
	 */
	public $preco = 0.0;
}


class Soap_Estoque{
	/**
	 *
	 * Returns product's info
	 *
	 * @param string $nome
	 * @param integer $id
	 * @return RetProduto
	 *
	 */
	public function gerenciarProduto($nome, $id){
		$prod = new RetProduto;
		if(isset($nome)){
			$prod->nome = $nome;
		}
		if(isset($id)){
			$prod->id = $id;
		}

		return $prod;
	}

	/**
	 * Adds a product to the stock
	 *
	 * @param integer $id
	 * @param integer $quantidade
	 * @return boolean
	 */
	public function adicionaProduto($id, $quantidade){
		return true;
	}

	/**
	 * Removes a product from the stock
	 *
	 * @param integer $id
	 * @param integer $quantidade
	 * @return boolean
	 */
	public function removerProduto($id, $quantidade){
		return true;
	}


}

?>

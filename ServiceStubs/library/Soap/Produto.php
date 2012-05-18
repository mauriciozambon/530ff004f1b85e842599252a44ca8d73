<?php

class categoria{
	/** @var integer */
	public $id;
	/** @var string  */
	public $nome;
	/** @var integer */
	public $id_pai;
}

class DadosFisicos{
	/** @var float */
	public $peso;
	/** @var float */
	public $comprimento;
	/** @var float */
	public $largura;
	/** @var float */
	public $altura;
}

class DadosProduto extends DadosFisicos{
	/** @var integer */
	public $id;
	/** @var string */
	public $nome;
	/** @var integer */
	public $categoria_id;
	/** @var string */
	public $categoria_nome;
	/** @var integer */
	public $subcategoria_id;
	/** @var string */
	public $subcategoria_nome;
	/** @var integer */
	public $marca_id;
	/** @var string */
	public $marca_nome;
	/** @var string */
	public $especificacao;
}

class Soap_Produto{

	/**
	 * @param integer $id
	 * @return DadosProduto
	 */
	public function detalhes($id){
		return new DadosProduto;
	}

	/**
	 * @param integer $id
	 * @return DadosFisicos
	 */
	public function detalhesSimplificado($id){
		return new DadosFisicos;
	}

	/**
	 * @return Categoria[]
	 */
	public function listarCategorias(){
		$c1 = new Categoria;
		$c2 = new Categoria;
		return array($c1, $c2);
	}

	/**
	 * @param integer $categoria_id
	 * @param integer $marca_id
	 * @return DadosProduto[]
	 */
	public function buscaAvancada($categoria_id, $marca_id){
		$p1 = new DadosProduto;
		$p2 = new DadosProduto;
		return array($p1, $p2);
	}
}

?>

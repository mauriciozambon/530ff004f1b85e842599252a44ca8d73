<?php

class DadosCriacao{
	/** @var string */
	public $idChamado;
	/** @var string */
	public $data;
}

class Alteracoes{
	/** @var integer */
	public $tipo;
	/** @var string */
	public $descricao;
	/** @var string */
	public $data;
	/** @var integer */
	public $status;
}

class DadosChamadoSimples{
	/** @var string */
	public $idChamado;
	/** @var string */
	public $data;
	/** @var string */
	public $descricao;
	/** @var integer */
	public $tipoChamado;
	/** @var integer */
	public $ultimoStatus;
}

class DadosChamado{
	/** @var string */
	public $idSolicitante;
	/** @var string */
	public $data;
	/** @var string */
	public $descricao;
	/** @var string */
	public $idProduto;
	/** @var string */
	public $idPedido;
	/** @var integer */
	public $tipoChamado;
	/** @var integer */
	public $ultimoStatus;
	/** @var Alteracoes[] */
	public $alteracoes;
}

class Soap_Atendimento{

	/**
	 * @param string $idSolicitante
	 * @param string $descricao
	 * @param string $idProduto
	 * @param string $idPedido
	 * @param integer $tipoChamado
	 * @param string $idCliente
	 * @return DadosCriacao
	 */
	public function abrir_chamado($idSolicitante, $descricao, $idProduto, $idPedido, $tipoChamado, $idCliente){
		return new DadosCriacao;
	}

	/**
	 * @param string $idCliente
	 * @param string $idChamado
	 * @return DadosChamado
	 */ 
	public function consultar_chamado($idCliente, $idChamado){
		return new DadosChamado;
	}

	/** 
	 * @param string $idChamado
	 * @param integer $tipo
	 * @param string $descricao
	 * @param string $idCliente
	 * @param integer $status
	 * @return boolean
	 */
	public function alterar_chamado($idChamado, $tipo, $descricao, $idCliente, $status){
		return true;
	}

	/**
	 * @param string $idUsuario
	 * @param integer $tipoChamado
	 * @param string $idCliente
	 * @return DadosChamadoSimples[]
	 */
	public function consultar_chamados_por_usuario($idUsuario, $tipoChamado, $idCliente){
		$d1 = new DadosChamadoSimples;
		$d2 = new DadosChamadoSimples;
		return array($d1, $d2);
	}
	
	/**
	 * @param integer $tipoChamado
	 * @param string $idCliente
	 * @return DadosChamadoSimples[]
	 */
	public function consultar_chamados_por_tipo($tipoChamado, $idCliente){
		$d1 = new DadosChamadoSimples;
		$d2 = new DadosChamadoSimples;
		return array($d1, $d2);
	}
}

?>

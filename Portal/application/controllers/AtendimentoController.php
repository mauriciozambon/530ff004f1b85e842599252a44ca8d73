<?php

class AtendimentoController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
               
        $reqData = array( "Descricao" => "Pedido", 
                          "IdCliente" => "00000000-0000-0000-0000-000000000007",
                          "IdPedido" => "pedido_1",
                          "IdProduto" => "produto_1",
                          "IdSolicitante" => "solicitante_1",
                          "TipoChamado" => "0");
        $id = Helpers_Connector::requestSoapService('atendimento', 'Abrir_Chamado', array(array('chamado' => $reqData)));
        var_dump($id);
    }

}


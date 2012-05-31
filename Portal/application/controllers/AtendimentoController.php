<?php

class AtendimentoController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        $authenticated = Helpers_Session::getInstance()->getSessVar("authenticated");
        if (!$authenticated) {
            $this->_helper->redirector('index', 'login');
        }

        //$id = Helpers_Connector::requestSoapService('atendimento', 'Abrir_Chamado', array('Abrir_Chamado' => array("Descricao" => "CHAMADO DE TESTE","IdCliente" => 00000000-0000-0000-0000-000000000007,"IdPedido"=> "10","IdProduto" => "23","IdSolicitante" => "44", "TipoChamado" => "1")));
        //$id = Helpers_Connector::requestSoapService('atendimento', 'Abrir_Chamado', array('Abrir_Chamado' => array("IdCliente" => "00000000-0000-0000-0000-000000000007", "TipoChamado" => 1)));
        $client = new Zend_Soap_Client("http://mc747atendimento.no-ip.org:2121/AtendimentoCliente.AtendimentoCliente.svc?wsdl",
                        array('soap_version' => SOAP_1_1));
        $id = $client->Abrir_Chamado(array('Abrir_Chamado' => array("Descricao" => "1", "IdCliente" => 00000000 - 0000 - 0000 - 0000 - 000000000007, "IdPedido" => "1", "IdProduto" => "1", "IdSolicitante" => "1", "TipoChamado" => 1)));
        var_dump($id);
    }

}


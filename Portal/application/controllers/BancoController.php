<?php

class BancoController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        // action body
    }

    public function depositoAction() {
        // action body
        $params = array('agencia' => 7,
            'conta' => 74774701,
            'valor' => 100);
        $result = Helpers_Connector::requestSoapService('banco', 'PagarViaDepositoBancario', array('PagarViaDepositoBancario' => $params));
        var_dump($result);
    }

    public function transferenciaAction() {
        // action body
    }

    public function statusAction() {
        // action body
        $params = array('idPagamento' => 178);
        $result = Helpers_Connector::requestSoapService('banco', 'VerificaStatusPagamento', array('VerificaStatusPagamento' => $params));
        var_dump($result);
    }

    public function cancelarAction() {
        // action body
    }

    public function boletoAction() {
        $preco = Helpers_Session::getInstance()->getSessVar('preco_produto');
        $frete = Helpers_Session::getInstance()->getSessVar('preco_frete');
        $params = array('agencia' => '001',
                        'conta' => '111.222.333-0',
                        'valor' => $preco + $frete);
        $result = Helpers_Connector::requestSoapService('banco', 'PagarViaBoletoBancario', array('PagarViaBoletoBancario' => $params));
        $this->view->assign('pagto', $result);
    }
}


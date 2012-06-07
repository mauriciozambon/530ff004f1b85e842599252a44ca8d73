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
        $params = array('agencia' => 1,
            'conta' => 12,
            'valor' => 123.1);
        $result = Helpers_Connector::requestSoapService('banco2', 'PagarViaDepositoBancario', array('PagarViaDepositoBancario' => $params));
        var_dump($result);
    }

    public function transferenciaAction() {
        // action body
    }

    public function statusAction() {
        // action body
    }

    public function cancelarAction() {
        // action body
    }

    public function boletoAction() {
        if ($this->getRequest()->isPost()) {
            $params = array('agencia' => $this->_request->getParam('agencia'),
                'conta' => $this->_request->getParam('conta'),
                'valor' => $this->_request->getParam('valor'));
            $result = Helpers_Connector::requestSoapService('banco', 'PagarViaBoletoBancario', array('PagarViaBoletoBancario' => $params));

            $redirector = $this->getHelper('redirector');
            $redirector->gotoUrl("/compra/sucesso/");
        }
    }

}


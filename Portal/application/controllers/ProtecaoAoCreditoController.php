<?php

class ProtecaoAoCreditoController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function consultaAction()
    {
        $cpf = $this->_request->getParam('cpf');
        if (!is_null($cpf)) {
            var_dump(Helpers_Connector::requestSoapService('protecao', 'consultaCPF', array($cpf)));
        } else {
            $this->view->assign('Produto não encontrado.');
        }
    }


}




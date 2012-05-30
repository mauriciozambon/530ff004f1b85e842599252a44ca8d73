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
        var_dump($cpf);
        if (!is_null($cpf)) {
            //PORQUICE INFINITA
            var_dump(Helpers_Connector::requestSoapService('protecao', 'consultaCPF', array('consultaCPF' => array("CPF" => $cpf))));
        } else {
            $this->view->assign('Produto não encontrado.');
        }
    }


}




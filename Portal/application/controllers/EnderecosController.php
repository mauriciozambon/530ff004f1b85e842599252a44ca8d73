<?php

class EnderecosController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function cepAction()
    {
        $cep = $this->_request->getParam('cep');
        if (!is_null($cep)) {
            var_dump(Helpers_Connector::requestSoapService('enderecos', 'CepAddress', array($cep)));
        } else {
            $this->view->assign('Endereçoc não encontrado.');
        }
        
    }

    public function procurarAction()
    {
        $query = $this->_request->getParam('query');
        if (!is_null($query)) {
            var_dump(Helpers_Connector::requestSoapService('enderecos', 'SearchAddress', array($query)));
        } else {
            $this->view->assign('Endereçoc não encontrado.');
        }
    }
    
    

}






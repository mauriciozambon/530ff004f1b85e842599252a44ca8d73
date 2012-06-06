<?php

class CCController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function listaCartoesAction()
    {

            //var_dump(Helpers_Connector::requestSoapService('cc', 'validaCompra', array(10, "Joao", "visa", "1234.1234.1234.1234", "12/12", 123, 1)));
            var_dump(Helpers_Connector::requestSoapService('cc', 'listaCartoes'));  

    }

    public function comprarAction()
    {
        if ($this->getRequest()->isPost()) {
            $total = Helpers_Session::getInstance()->getSessVar('preco_produto') + Helpers_Session::getInstance()->getSessVar('preco_frete');
            $params = $this->_request->getParams();
           $aprovado = Helpers_Connector::requestSoapService('cc', 'validaCompra', array((float)($total), $params['titular'], $params['bandeira'], $params['numero'], $params['validade'], (float)($params['codigo']), (float)($params['parcelas'])));
            var_dump($total);
            var_dump($params['titular']);
            var_dump($params['bandeira']);
            var_dump($params['numero']);
            var_dump($params['validade']);
            var_dump($params['codigo']);
            var_dump((float)($params['parcelas']));
        }
    }


}






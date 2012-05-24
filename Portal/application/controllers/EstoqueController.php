<?php

class EstoqueController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function produtoInfoAction()
    {
        $id = $this->_request->getParam('id');
        if (!is_null($id)) {
            var_dump(Helpers_Connector::requestSoapService('estoque', 'returnProductInfo', array(array('ID' => $id))));
        } else {
            $this->view->assign('Produto não encontrado.');
        }
    }


}




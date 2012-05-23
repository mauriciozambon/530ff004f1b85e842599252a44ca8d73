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

            var_dump(Helpers_Connector::requestSoapService('cc', 'validaCompra', array(10, "Joao", "visa", "1234.1234.1234.1234", "12/12", "123", 1)));

    }


}




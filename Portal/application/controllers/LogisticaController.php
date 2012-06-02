<?php

class LogisticaController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function statusAction()
    {
        // action body
        $params = array('cod_rastr' => '1',
                        'id_status' => '1');
        $result = Helpers_Connector::requestSoapService('logistica', 'checkStatus', array($params));
        print_r($result);

    }

    public function calculaAction()
    {
        // action body
        $params = array('peso' => '1',
                        'volume' => '1',
                        'cep' => '12000111',
                        'modo_entrega' => '1');
        $result = Helpers_Connector::requestSoapService('logistica', 'calculaFrete', array($params));
        print_r($result);

    }

    public function freteAction()
    {
        // action body
        $params = array('peso' => '1',
                        'volume' => '1',
                        'cep' => '12000111',
                        'meio' => '1',
                        'id_NotaFiscal' => '1');
        $result = Helpers_Connector::requestSoapService('logistica', 'webserviceTransporte', array($params));
        print_r($result);

    }


}



<?php

class BancoController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function depositoAction()
    {
        // action body
        $result = Helpers_Connector::requestSoapService('banco', 'PagarViaDepositoBancario', array('PagarViaDepositoBancario' => array('agencia'=>123,'conta'=>123,'valor'=>10.50)));
        //$client = new SoapClient("http://www.mc747.homologa.isat.com.br/BancoService.svc?wsdl");
        //$result = $client->PagarViaDepositoBancario(array('agencia'=>1,'conta'=>1,'valor'=>1));
        var_dump($result);
    }

    public function boletoAction()
    {
        // action body
    }

    public function transferenciaAction()
    {
        // action body
    }

    public function statusAction()
    {
        // action body
    }

    public function cancelarAction()
    {
        // action body
    }
}
















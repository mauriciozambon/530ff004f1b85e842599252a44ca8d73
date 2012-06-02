<?php

class ClienteController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function buscainformacaoAction()
    {
        // action body
        $params = array("CPF" => "44587629405", "Campo" => "nome");
        $result = Helpers_Connector::requestSoapService('clientes','buscaInformacaoCliente',array($params));
        print_r($result);
    }

    public function buscainformacoesAction()
    {
        // action body
        $params = array("CPF" => "44587629405");

        $result = Helpers_Connector::requestSoapService('clientes', 'buscaInformacoesCliente', array($params));
        print_r($result);
    }

    public function potcompraAction()
    {
        // action body
        $params = array("CPF" => "44587629405");
        $result = Helpers_Connector::requestSoapService('clientes', 'buscaPotencialCliente', array($params));
        print_r($result);
    }


}








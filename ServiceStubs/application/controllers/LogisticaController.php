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

	public function soapAction(){
		$this->getHelper('viewRenderer')->setNoRender(true);
		$server = new Zend_Soap_Server(Helpers_Config::get()->logistica->server->wsdl);
		$server->setClass(Helpers_Config::get()->logistica->server->class);
		$server->handle();
	}   

	public function wsdlAction(){
		$this->getHelper('viewRenderer')->setNoRender(true);
		$wsdl = new Zend_Soap_AutoDiscover('Zend_Soap_Wsdl_Strategy_ArrayOfTypeSequence');
		$wsdl->setClass(Helpers_Config::get()->logistica->server->class);
		$wsdl->setUri(Helpers_Config::get()->logistica->server->uri);
		$wsdl->handle();
	}  

}






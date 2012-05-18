<?php

class EnderecoController extends Zend_Controller_Action
{

	public function init()
	{
		/* Initialize action controller here */
		ini_set( "soap.wsdl_cache_enabled", "0" );
	}

	public function indexAction()
	{
		// action body
		try {
			$client = new Zend_Soap_Client(Helpers_Config::get()->endereco->server->wsdl);
			if($this->_request->getParam("p") == 1){
				print_r("com parametro");
				$result = $client->useService(1);
			}
			else{
				print_r("sem parametro");
				$result = $client->useService(2);
			}
			print_r ( $result );
		} catch ( SoapFault $s ) { 
			die ( 'ERROR: [' . $s->faultcode . '] ' . $s->faultstring );
		} catch ( Exception $e ) { 
			die ( 'ERROR: ' . $e->getMessage () );
		}     
	}

	public function soapAction(){
		$this->getHelper('viewRenderer')->setNoRender(true);
		$server = new Zend_Soap_Server(Helpers_Config::get()->endereco->server->wsdl);
		$server->setClass(Helpers_Config::get()->endereco->server->class);
		$server->handle();
	}   

	public function wsdlAction(){
		$this->getHelper('viewRenderer')->setNoRender(true);
		$wsdl = new Zend_Soap_AutoDiscover();
		$wsdl->setOperationBodyStyle(array('use' => 'literal'));
		$wsdl->setComplexTypeStrategy('Zend_Soap_Wsdl_Strategy_ArrayOfTypeSequence');
		$wsdl->setClass(Helpers_Config::get()->endereco->server->class);
		$wsdl->setUri(Helpers_Config::get()->endereco->server->uri);
		$wsdl->handle();
	}   
}


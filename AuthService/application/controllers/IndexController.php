<?php

class IndexController extends Zend_Controller_Action {
	
	public function init() {
		/*
		 * Initialize action controller here
		 */
		ini_set ( "soap.wsdl_cache_enabled", "0" );
	}
	
	public function indexAction() {
		
		/*try {
			$client = new Zend_Soap_Client ( Helpers_Config::get ()->soap->server->wsdl );
			$result = $client->authenticate ($this->_request->getParam("cpf"), $this->_request->getParam("password") );
			
			print_r ( $result );
		} catch ( SoapFault $s ) {
			die ( 'ERROR: [' . $s->faultcode . '] ' . $s->faultstring );
		} catch ( Exception $e ) {
			die ( 'ERROR: ' . $e->getMessage () );
		}*/
	}
	
	public function soapAction() {
		// disable layouts and renderers
		$this->getHelper ( 'viewRenderer' )->setNoRender ( true );
		
		// initialize server and set URI
		$server = new Zend_Soap_Server ( Helpers_Config::get ()->soap->server->wsdl );
		
		// set SOAP service class
		$server->setClass ( Helpers_Config::get ()->soap->server->class );
		
		// handle request
		$server->handle ();
	}
	
	public function wsdlAction() {
		// disable layouts and renderers
		$this->getHelper ( 'viewRenderer' )->setNoRender ( true );
		
		// set up WSDL auto-discovery
		$wsdl = new Zend_Soap_AutoDiscover ();
		
		// attach SOAP service class
		$wsdl->setClass ( Helpers_Config::get ()->soap->server->class );
		
		// set SOAP action URI
		$wsdl->setUri ( Helpers_Config::get ()->soap->server->uri );
		
		// handle request
		$wsdl->handle ();
	}

}






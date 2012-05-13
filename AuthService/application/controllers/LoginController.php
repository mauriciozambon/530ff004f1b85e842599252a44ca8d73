<?php

class LoginController extends Zend_Controller_Action {
	
	public function init() {
		/*
		 * Initialize action controller here
		 */
		error_reporting ( E_ALL );
		ini_set ( 'display_errors', '1' );
	}
	
	public function indexAction() {
		// action body
	}
	
	public function authenticateAction() {
		// disable layouts and renderers
		$this->getHelper('viewRenderer')->setNoRender(true);
		
		// initialize server and set URI
		$server = new Zend_Soap_Server(null, 
										array('uri' => Helpers_Config::get()->soap->server->uri));
		
		// set SOAP service class
		$server->setClass(Helpers_Config::get()->soap->server->class);
		
		// handle request
		$server->handle();
	}
	
	/*
	 * Verify if user and password match.
	 */
	private function verifyUserPassword($user, $password) {
		return true;
	}

}






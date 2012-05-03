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
		if ($this->_request->getMethod () == 'GET') {
			$user = $this->_request->getParam ( 'user' );
			$password = $this->_request->getParam ( 'password' );
			
			/*
			 * response['error'] 			string 
			 * response['authenticated']	boolean
			 */
			$response = array ();
			$response ['error'] = null;
			
			if (is_null ( $user ) || is_null ( $password )) {
				$response ['error'] = "Missing user and/or password";
			} else {
				if ($this->verifyUserPassword ( $user, $password )) {
					$response ['authenticated'] = true;
				} else {
					$response ['error'] = "Wrong user/password";
				}
			}
		}
		
		$this->view->assign ( 'response', json_encode ( $response ) );
	}
	
	/*
	 * Verify if user and password match.
	 */
	private function verifyUserPassword($user, $password) {
		return true;
	}

}






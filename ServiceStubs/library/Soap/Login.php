<?php

class Soap_Login {
	
	/**
	 * Tries to authenticate given a CPF and a password
	 *
	 * @param string $cpf      	
	 * @param string $password
	 * @return string boolean
	 */
	public function authenticate($cpf, $password) {
		$db = Zend_Registry::get ( 'Zend_Db' );
		$sql = "SELECT * FROM auth WHERE cpf = '$cpf' and password = '$password'";
		$result = $db->fetchAll ( $sql );
		if (count ( $result ) != 1) {
			$result = 'Invalid user/password';
		} else {
			$result = true;
		}
		return $result;
	}
}

?>
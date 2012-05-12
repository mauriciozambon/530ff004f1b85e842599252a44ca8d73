<?php

class AuthManager{
	public function isAuthentic($cpf, $password){
		if(strcasecmp($cpf,"troll") != 0){
			return "false";
		}
		else{
			return "true";
		}
	}
}

ini_set('soap.wsdl_cache_enabled', "0");

$server = new SoapServer("auth.wsdl");
$server->setClass('AuthManager');
$server->handle();

?>

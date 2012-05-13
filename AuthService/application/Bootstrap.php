<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	/*public function _initRequest()
	{
	    $this->bootstrap('frontController');
	    $front = $this->getResource('frontController');
	    $front->setRequest(new Zend_Controller_Request_Http());

	    $request = $front->getRequest();
	
		var_dump($request->getParams());
	}*/
	
	protected function _initDatabase()
	{
		$db = new Zend_Db_Adapter_Pdo_Mysql(array(
				'host'     => 'dbmy0057.whservidor.com',
				'username' => 'scipsych_3',
				'password' => 'projetomc747',
				'dbname'   => 'scipsych_3'
		));
		Zend_Registry::set('Zend_Db', $db);
	}

}


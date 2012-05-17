<?php

class Helpers_Config {
	
	private static $instance;
	const FILE = 'soap_config.ini';
	
	private function __construct() {
	}
	
	static private function getInstance() {
		if (! isset ( self::$instance )) {
			self::$instance = new self ();
		}
	}
	
	public static function get() {
		self::getInstance();
		
		$filename = APPLICATION_PATH . '/configs/' . self::FILE;
		if (file_exists ( $filename )) {
			$config = new Zend_Config_Ini ( $filename );
			
			return $config;
		}
		return null;
	}
}

?>

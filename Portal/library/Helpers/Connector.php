<?php

class Helpers_Connector {
	
	private static $instance;
	
	private function __construct() {
	}
	
	static private function getInstance() {
		if (! isset ( self::$instance )) {
			self::$instance = new self ();
		}
	}
	
	/**
	 * Send a request to a service using SOAP
	 *
	 * @param string $service_name       	
	 * @param array $parameters       	
	 * @return array
	 */
	public function requestSoapService($service_name, $function_name, $parameters) {
		self::getInstance();
		
		try {
			$client = new Zend_Soap_Client ( Helpers_Config::get ()->service->$service_name->wsdl );
			
			$params = '';
			if (count ( $parameters ) > 0) {
				foreach ( $parameters as $param ) {
					$params .= "$param, ";
				}
			}
			$result = $client->$function_name ( $params );
			
			return $result;
		} catch ( SoapFault $s ) {
			die ( 'ERROR: [' . $s->faultcode . '] ' . $s->faultstring );
		} catch ( Exception $e ) {
			die ( 'ERROR: ' . $e->getMessage () );
		}
	}
}

?>
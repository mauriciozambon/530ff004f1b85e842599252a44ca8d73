<?php

class Helpers_Connector {

    private static $instance;

    private function __construct() {
        
    }

    static private function getInstance() {
        if (!isset(self::$instance)) {
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
    public function requestSoapService($service_name, $function_name, $parameters = array()) {
        self::getInstance();

        try {
            /* if (!is_null(Helpers_Config::get()->service->$service_name->soap)) {
              $client = new Zend_Soap_Client(null, array('uri' => Helpers_Config::get()->service->$service_name->soap,
              'location' => Helpers_Config::get()->service->$service_name->soap));
              } else { */
            if (!is_null(Helpers_Config::get()->service->$service_name->soap->version)) {
                $client = new Zend_Soap_Client(Helpers_Config::get()->service->$service_name->wsdl,
                                array('soap_version' => SOAP_1_1));
            } else {
                $client = new Zend_Soap_Client(Helpers_Config::get()->service->$service_name->wsdl);
            }
            //}

            $result = $client->__call($function_name, $parameters);
            
            return $result;
        } catch (SoapFault $s) {
            die('ERROR: [' . $s->faultcode . '] ' . $s->faultstring);
        } catch (Exception $e) {
            die('ERROR: ' . $e->getMessage());
        }
    }

}

?>
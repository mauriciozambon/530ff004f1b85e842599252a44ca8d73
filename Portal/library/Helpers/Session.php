<?php
require_once ("Zend/Session.php");

class Helpers_Session {

	protected static $_instance;
	public $namespace = null;
	
	private function __construct() {
		/*
		 * Explicitly start the session
		 */
		Zend_Session::start ();
		
		/*
		 * Create our Session namespace - using 'Default' namespace
		 */
		$this->namespace = new Zend_Session_Namespace ();
		
		/**
		 * Check that our namespace has been initialized - if not, regenerate
		 * the session id
		 * Makes Session fixation more difficult to achieve
		 */
		if (! isset ( $this->namespace->initialized )) {
			Zend_Session::regenerateId ();
			$this->namespace->initialized = true;
		}
	}
	
	/**
	 * Implementation of the singleton design pattern
	 */
	public static function getInstance() {
		if (null === self::$_instance) {
			self::$_instance = new self ();
		}
		
		return self::$_instance;
	}
	
	/**
	 * Public method to retrieve a value stored in the session
	 * return $default if $var not found in session namespace
	 * 
	 * @param string $var        	
	 * @param string $default        	
	 * @return string
	 */
	public function getSessVar($var, $default = null) {
		return (isset ( $this->namespace->$var )) ? $this->namespace->$var : $default;
	}
	
	/**
	 * Public function to save a value to the session
	 * 
	 * @param string $var      	
	 * @param $value
	 */
	public function setSessVar($var, $value) {
		if (! empty ( $var ) && ! empty ( $value )) {
			$this->namespace->$var = $value;
		}
	}
}

?>
<?php
	/**
	* 
	*/
	class kioskApi extends apiModule
	{
		
		function __construct($args = array('' => '')) {
  			parent::__construct();
		}

		public function defaultApi($value) {

		}
	}

	$api->registerApi('kioskApi', 'kiosk');
?>
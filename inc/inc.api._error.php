<?php
	
	include_once 'inc.api._module.php';

	/**
	* Just an example
	*/
	class errorApi extends apiModule	{

		function __construct($args = array('' => '')) {
  			parent::__construct($args);
		}

		public function defaultApi($value) {

			$this->content['error'] = method_exists($value, 'getMessage')
				? call_user_method('getMessage', $value)
				: print_r($value, true);

		}

		public function getJs(){}
	}



	API::registerAPi('errorApi', 'error');
?>
<?php

/**
* 
*/
abstract class OutputModule {
	var $args;
	function __construct($args = array()) {
		$this->args = $args;
	}

	abstract public function reply();

	public function setArgument($key, $value) {
		$this->args[$key] = $value;
	}
}

?>
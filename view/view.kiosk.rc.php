<?php

include_once 'view._module.php';

/**
* 
*/
class KioskRCView extends ViewModule {

	public function update() {
		$today        = new DateTime();
		$historicDate = $GLOBALS['historicDate'];
		$lang         = $GLOBALS['lang'];
		$db           = $GLOBALS['db'];

		$today       ->setTime(0,0,0);
		$historicDate->sub($GLOBALS['config']['historic_arrivals_interval']);

		//print_r($_COOKIE);

		//USER DATA
		
		$this->setContent('initial_time'   , time());

		//$tpl->draw('start');
	}

	public function hello($value='')
	{
		return "hello " . $value;
	}
}

View::registerView('KioskRCView', 'kioskrc', 'kioskrc');
/*
//TIMING

*/

?>
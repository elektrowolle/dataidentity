<?php

include_once 'view._module.php';

/**
* 
*/
class DefaultView extends ViewModule {

	public function update() {
		$today        = new DateTime();
		$historicDate = $GLOBALS['historicDate'];
		$lang         = $GLOBALS['lang'];
		$db           = $GLOBALS['db'];

		$today       ->setTime(0,0,0);
		$historicDate->sub($GLOBALS['config']['historic_arrivals_interval']);

		//print_r($_COOKIE);

		//USER DATA
		$isCheckedIn = isset($this->cookies['lastCheckedIn']) && $this->cookies['lastCheckedIn'] > $today;

		$this->setContent('isCheckedIn',      $isCheckedIn);
		$this->setContent('isArrived',        !empty($_COOKIE['isArrived']) && $_COOKIE['isArrived']);
		$this->setContent('locationIsNeeded', !$isCheckedIn);
		$this->setContent('isKioskMode',      !empty($_GET['kioskMode']) && $_GET['kioskMode'] == 'true');
		$this->setContent('user_name',        !empty($_COOKIE['name']) ? $_COOKIE['name'] : $lang['_name_request']);

		//Arrivals
		$todayArrivalQuery = $db
			->{'\'whosthere.sqlite.visitorLog\''}()
			->where('time > ' . $today->getTimestamp());

		$today_arrivals = queryToArray($todayArrivalQuery);

		$formerArrivalsQuery = $db
			->{'\'whosthere.sqlite.visitorLog\''}()
			->where('time < ' . $today->getTimestamp() . ' AND time > ' . $historicDate->getTimestamp());

		$former_arrivals = queryToArray($formerArrivalsQuery);


		$this->setContent('today_arrivals' , $today_arrivals);
		$this->setContent('former_arrivals', $former_arrivals);
		$this->setContent('initial_time'   , time());

		//$tpl->draw('start');
	}
}

View::registerView('DefaultView', 'default', 'default');
/*
//TIMING

*/

?>
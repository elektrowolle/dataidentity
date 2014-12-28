<?php
include "conf.php";
include_once 'view/view.class.php';

//RESET
if (isset($_GET['mode']) && $_GET['mode'] == 'resetCookie') {
	$_COOKIE = null;
}

$view;

try {
	$viewMode = isset($_GET['view']) ? $_GET['view'] : '';
	$viewArgs = isset($_GET['args']) ? json_decode($_GET['args'], true) : array();
	$view = new View($viewMode, $viewArgs); 
} catch (Exception $e) {
	$view = new View();
}

$view->draw($tpl);
?>

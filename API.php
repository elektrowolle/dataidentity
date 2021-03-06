<?php
include_once 'conf.php';

include_once 'inc/inc.api.class.php';

//Arrivals
$args         = array();
$output       = 'html';
$requestedApi = '';
$request      = '';
$content      = '';
$api_success  = false;

foreach ($_GET as $key => $value) {
	if(
		$key != 'requestedApi' &&
		$key != 'output'       &&
		$key != 'args'         &&
		$key != 'version'      &&
		$key != 'request'
		)
	$args[$key] = $value;
}

if (!empty($_GET['requestedApi'])) 
	$requestedApi = $_GET['requestedApi'];

if(!empty($_GET['output']))
	$output = $_GET['output'];

if(!empty($_GET['args']))
	$args = $_GET['args'];

if(!empty($_GET['request']))
	$request = $_GET['request'];




if (!empty($_POST['requestedApi'])) 
	$requestedApi = $_POST['requestedApi'];

if(!empty($_POST['output']))
	$output = $_POST['output'];

if(!empty($_POST['args']))
	$args = $_POST['args'];

if(!empty($_POST['request']))
	$request = $_POST['request'];



$api = new API($tpl, $output);


if($config['debug']) 
	if(isDebug()){
		error_log(
			"API REQUEST GET:" . 
			print_r($_GET, true)
		);
		error_log(
			"API REQUEST POST:" . 
			print_r($_POST, true)
		);
		
		error_log(
			"API REQUEST ARGS:" . 
			print_r($args, true)
		);
	}


try{
	$api->askApi($requestedApi, $request, $args);
}catch(Excetion $e){
	$api->get('error', print_r($e, true)); 
}

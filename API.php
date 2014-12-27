<?php
include_once("notorm/NotORM.php");
///API.php

// $SQL = 
// 	'CREATE TABLE IF NOT EXISTS "dataset" ( '
// 	. 'id INTEGER PRIMARY KEY AUTOINCREMENT, '
// 	. 'name TEXT NOT NULL, '

// 	. 'CREATE TABLE IF NOT EXISTS "attribute" ( '
// 	. 'id INTEGER PRIMARY KEY AUTOINCREMENT, '
// 	. 'name TEXT NOT NULL, '
	
// 	. 'CREATE TABLE IF NOT EXISTS "data" ( '
// 	. 'id INTEGER PRIMARY KEY AUTOINCREMENT, '
// 	. 'dataset_id INTEGER NOT NULL, '
// 	. 'attribute_id INTEGER NOT NULL, '
// 	. 'value TEXT NOT NULL, '
// 	. 'time INTEGER NOT NULL); '
// ;

$pdo = new PDO("mysql:host=localhost;dbname=di", "root", "root");
$db = new NotORM($pdo);

$dataset   = $db->{"dataset"};
$attribute = $db->{"attribute"};
$data      = $db->{"data"};

$request = $_POST["request"];
$args    = json_decode($_POST["args"]);

$result = array();
$result["data"]    = array();
$result["status"]  = "Unknown Condition";

switch ($request) {
	case 'write':
		write();
		break;
	
	case 'read':
		read();
		break;
}

echo json_encode($result);


function read()
{
	// example args:
	// {"set":31}

		$set = $dataset[$args["set"]];

		$data = $dataset->$data();

		foreach ($data as $key => $value) {
			$name = (string) $value->$attribute["name"];

			$result["data"][] = array($name => $value[value]);
		}

		$result["status"] = "Data available";
}

function write(){
	//JSON for example like
	// {
	// "one": "54",
	// "two": "12",
	// "three": "73",
	// "four": "30",
	// "five": "20"
	// }
	// or 
    // {"set": 1, "data":[
	// "one": "54",
	// "two": "12",
	// "three": "73",
	// "four": "30",
	// "five": "20"]
	// }

	$newData = array();

	if(isset($args["set"])){
		$id      = $args["set"];
		$newData = $args["data"];
		$setId     = $dataset[$id];
	}else {
		$newData = $args;
		$set     = $dataset->insert_update();
		$setId      = (string) $set;
	}

	foreach ($newData as $key => $value) {
		$attributeRow = $attribute->where("name", $key);
		if(count($attributeRow) == 0){
			$attributeRow = $attribute->insert_update(
				array('name' => $key)
				);
		}else{
			$attributeRow->fetch();
		}
		$attributeId = (string) $attributeRow;

		$dataRow = $data->where(
			array('dataset_id' => $setId, 
				'attribute_id' => $attributeId)
			)->fetch();

		$dataRow["value"] = $value;
		$dataRow->update();
	}


	$result["status"] = "Data written";
}

// var api = "API.php";
// //for example:
// // apiRequest("read", {"set":1});
// function apiRequest (request, args) {
// 	var requestAddress = "";

// 		requestAddress = api_adrress 
// 			+ "?requestedApi=" + api
// 			+ "&request=" + request
	
// 	var type =  "post";
// 	var args =  (typeof args != "undefined") ? args : "";

// 	console.debug("Ask[" + type + "]: " + requestAddress);
	
// 	$ajax = $.ajax({
// 		url     : requestAddress,
// 		type    : type,
// 		dataType: json,
// 		data    : {"args": args}
// 		});

// 	$ajax.fail(function (args) {
// 		console.debug("request failed");
// 		console.debug(args);
// 	})
	

// 	return $ajax;
// }
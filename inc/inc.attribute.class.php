<?php
include_once 'inc.__dataRow.class.php';
/**
* 
*/
class Attribute extends __dataRow
{
	var $id;
	var $name;

	function __construct($id)
	{
		# code...
	}

	public function save()
	{
		$row["name"] = $this->name;
	}
}
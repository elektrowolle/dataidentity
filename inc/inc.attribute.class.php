<?php
include_once 'inc.__datarow.class.php';
/**
* 
*/
class Attribute extends __DataRow
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

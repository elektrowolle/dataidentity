<?php
include_once 'inc.__dataRow.class.php';
include_once 'inc.dataset.class.php';
include_once 'inc.attribute.class.php';
/**
* 
*/
class data extends __dataRow
{
	var $id; 
	var $dataset; 
	var $attribute; 
	var $value; 
	var $time; 
	function __construct($id)
	{
		# code...
	}

	public function save()
	{
		$row["dataset"] = $this->dataset->id;
		$row["attribute"] = $this->attribute->id;
		$row["value"] = $this->value;
		$row["time"] = $this->time;
	}
}
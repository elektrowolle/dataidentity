<?php
include_once 'inc.__datarow.class.php';
/**
* 
*/
class Dataset extends __DataRow
{

	static $table = 'di.dataset';

	var $id;
	var $entity;
	var $data = array();

	function __construct($id)
	{

	}

	public function save()
	{
		$row["entity_id"] = $this->entity->id;
		foreach ($data as $key => $value) {
			$value->save();
		}
	}
}
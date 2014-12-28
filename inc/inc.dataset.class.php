<?php
include_once 'inc.__dataRow.class.php';
include_once 'inc.entity.class.php';
include_once 'inc.data.class.php';
/**
* 
*/
class Dataset extends __DataRow
{
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
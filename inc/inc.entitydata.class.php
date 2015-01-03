<?php
include_once 'inc.__datarow.class.php';
/**
* 
*/
class EntityData extends __DataRow
{
	var $id;
	var $entity;
	var $attribute;
	var $defaultValue;

	function __construct($id = null)
	{
		# code...
	}

	static public function makeEntityData($entity_id, $attribute_id, $defaultValue)
	{
		///return new EntityData();
	}

	public function save()
	{
		$row["entity_id"]    = $this->entity   ->id;
		$row["attribute_id"] = $this->attribute->id;
		$row["defaultValue"] = $this->defaultValue;
	}
}

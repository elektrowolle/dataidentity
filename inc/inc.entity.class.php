<?php
include_once 'inc.__dataRow.class.php';
include_once 'inc.entityData.class.php';
/**
* 
*/
class Entity extends __DataRow
{
	var $id;
	var $name;
	var $entityData       = array();

	function __construct($id)
	{
		
	}

	public function addAttribute($attribute_id, $defaultValue)
	{
		$newData = entityData::makeEntityData($this->id, $attribute_id, $defaultValue);
		$this->entityData[$newData->id] = $newData;
	}

	public function removeAttribute($attribute_id)
	{
		$this->entityData[$attribute_id] = null;
	}

	public function save()
	{
		$row["name"] = $this->id;
		foreach ($this->entityData as $key => $value) {
			$value->save();
		}
	}

}
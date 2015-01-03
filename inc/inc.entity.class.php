<?php
include_once 'inc.__datarow.class.php';
/**
* 
*/
class Entity extends __DataRow
{
	static $table = "di.entity";

	var $ormTable;
	var $id;
	var $name;
	var $entityData = array();


	function __construct($id)
	{
		$this->super($id);
		$this->name       = $this->row['name'      ];
		$this->id         = $this->row['id'        ];
		$this->entityData = $this->row['entityData'];
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
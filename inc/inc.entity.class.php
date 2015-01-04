<?php
include_once 'inc.__datarow.class.php';
/**
* 
*/
class Entity extends __DataRow
{
  static $table = "entity";

  var $id;
  var $name;
  var $entityData = array();


  function __construct($id)
  {
    $this->super($id);
    $this->name       = $this->row['name'      ];
    $this->id         = $this->row['id'        ];

    $entityDatas      = $this->row->{EntityData::$table}();

    foreach ($entityDatas as $id => $row) {
      $this->entityData[$id] = new EntityData($id, $this);
    }
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

  function makeNewDataset(){
    $newDataSet = new DataSet(null, this);
    foreach ($this->entityData as $id => $entityData) {
      $newData = new Data(null, $newDataSet, $entityData->attribute);
      $newData->value     = $entityData->defaultValue;
      $newData->time      = time();
      $newData->save();
    }
  }

  public function save()
  {
    $row["name"] = $this->id;
    foreach ($this->entityData as $key => $value) {
      $value->save();
    }
  }

  public function newEmpty(){
    return $this->ormTable->insert(array(
      'name' => null,
    ));
  }

}
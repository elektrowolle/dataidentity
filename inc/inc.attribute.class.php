<?php
include_once 'inc.__datarow.class.php';
/**
* 
*/
class Attribute extends __DataRow
{
  static $table = "attribute";

  var $id;
  var $name;

  function __construct($id)
  {
    $this->super($id);
    $this->name = $this->row["name"];
  }

  public function save()
  {
    $this->row["name"] = $this->name;
    $this->row->update();
  }

  public function delete()
  {
    foreach ($this->row->entityData() as $key => $value) {
      $entityData = new EntityData($key);
      $entityData->delete();
    }
    foreach ($this->row->data() as $key => $value) {
      $data = new Data($key);
      $data->delete();
    }

    $this->row->delete();
  }

  public function asArray()
  {
    $attributeArray = array(
        "id"   => $this->id,
        "name" => $this->name
        );

    return $attributeArray;
  }

  public function newEmpty(){
    return $this->ormTable->insert(array(
      'name' => null,
    ));
  }
}

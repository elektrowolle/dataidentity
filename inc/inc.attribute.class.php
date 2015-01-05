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
    $row["name"] = $this->name;
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

  public function newEmpty(){
    return $this->ormTable->insert(array(
      'name' => null,
    ));
  }
}

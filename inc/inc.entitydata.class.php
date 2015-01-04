<?php
include_once 'inc.__datarow.class.php';
/**
* 
*/
class EntityData extends __DataRow
{ 
  static $table = "entitydata";

  var $entity;
  var $attribute;
  var $defaultValue;

  function __construct($id = null, $entity = null, $attribute = null)
  {
    $this->super($id);
    $this->entity    = $entity == null ?
           new Entity((string) $this->row->entity) :
           $entity;

    $this->attribute = $attribute == null ?
           new Attribute((string) $this->row->attribute) :
           $attribute;

    $this->defaultValue  = $this->row["defaultvalue"];
  }

  public function save()
  {
    $row["entity_id"]    = $this->entity   ->id;
    $this->entity->save();

    $row["attribute_id"] = $this->attribute->id;
    $this->attribute->save();

    $row["defaultvalue"] = $this->defaultValue;
  }

  public function newEmpty(){
    return $this->ormTable->insert(array(
      'dataset_id'   => null, 
      'attribute_id' => null,
      'defaultValue' => null
      ));
  }
}

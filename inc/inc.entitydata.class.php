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
    $this->row->entity    = $this->entity   ->row;
    $this->row->attribute = $this->attribute->row;

    $this->row["defaultvalue"] = $this->defaultValue;
    $this->row->update();
  }

  public function newEmpty(){
    return $this->ormTable->insert(array(
      'entity_id'   => null, 
      'attribute_id' => null,
      'defaultvalue' => null
      ));
  }

  public function asArray()
  {
    return array(
      'id'           => $this->id, 
      'name'         => $this->attribute->name,
      'defaultValue' => $this->defaultValue
    );
  }
}

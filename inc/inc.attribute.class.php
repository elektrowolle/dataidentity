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

  public function newEmpty(){
    return $this->ormTable->insert(array(
      'name' => null,
    ));
  }
}

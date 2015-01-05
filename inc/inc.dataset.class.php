<?php
include_once 'inc.__datarow.class.php';
/**
* 
*/
class Dataset extends __DataRow
{

  static $table = 'dataset';

  var $id;
  var $entity;
  var $data = array();

  function __construct($id = null, $entity = null, $data = null)
  {
    $this->super($id);
    $this->entity = $entity == null ? new Entity((string)$this->row->entity) : $entity;
    if($data == null){
      foreach ($this->row->data() as $id => $dataRow) {
        $this->data[$id] = new Data($id);
      }
      
    }else{
      $this->data = $data;
    }

  }

  public function save()
  {
    $row["entity_id"] = $this->entity->id;
    foreach ($data as $key => $value) {
      $value->save();
    }
  }

  public function delete()
  {
    foreach ($tis->data as $key => $value) {
      $value->delete();
    }
    $this->row->delete();
  }

  public function newEmpty(){
    return $this->ormTable->insert(array(
      'entity_id' => null
      ));
  }
}
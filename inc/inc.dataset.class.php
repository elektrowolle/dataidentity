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
        $this->data[$id] = new Data($id, $this);
      }
      
    }else{
      $this->data = $data;
    }
  }

  public function save()
  {
    $this->row["entity_id"] = $this->entity->id;
    foreach ($this->data as $key => $value) {
      $value->save();
    }
    $this->row->update();
  }

  public function delete()
  {
    foreach ($this->data as $key => $value) {
      $value->delete();
    }
    $this->row->delete();
  }

  public function asArray()
  {
    $data = array();
    foreach ($this->data as $key => $value) {
      $data[$key] = $value->asArray();
    }
    return array(
      'id'     => $this->id, 
      'entity' => $this->entity->asArray(),
      'data'   => $data
    );
  }

  public function newEmpty(){
    return $this->ormTable->insert(array(
      'entity_id' => null
      ));
  }
}
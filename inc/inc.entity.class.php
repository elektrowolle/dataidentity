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
    $newData = new EntityData(
                  null, 
                  $this, 
                  new Attribute($attribute_id)
                  );

    $newData->defaultValue = $defaultValue;
    $newData->save();

    foreach ($this->row->dataset() as $key => $value) {
      $dataset = new Dataset($key);
      $data    = new Data(null, $dataset, $newData->attribute);
      
      $data->time = time();
      $data->save();

      $dataset->data[$data->id] = $data;
    }    
    
    $this->entityData[$newData->id] = $newData;
    return $this->entityData[$newData->id];

  }

  public function removeAttribute($attribute_id)
  {
    $this->entityData[$attribute_id] = null;
  }

  function makeNewDataset(){
    $newDataSet = new DataSet(null, $this);
    foreach ($this->entityData as $id => $entityData) {
      $newData = new Data(null, $newDataSet, $entityData->attribute);
      $newData->value     = $entityData->defaultValue;
      $newData->time      = time();
      $newData->save();
      $newDataSet->data[$newData->id] = $newData;
    }
    return $newDataSet;
  }

  public function save()
  {
    $this->row["name"] = $this->name;
    $this->row->update();

    foreach ($this->entityData as $key => $value) {
      $value->save();
    }
  }

  public function delete()
  {
    foreach ($this->entityData as $key => $value) {
      $value->delete();
    }

    foreach ($this->row->dataset() as $key => $value) {
      $dataset = new DataSet($key);
      $dataset->delete();
    }
    
    $this->row->delete();
  }

  public function newEmpty(){
    return $this->ormTable->insert(array(
      'name' => null,
    ));
  }

  public function asArray()
  {
    $attributes = array();
    foreach ($this->entityData as $key => $value) {
      $attributes[$value->id] = $value->asArray();
    }

    return array(
      'id'         => $this->id, 
      'name'       => $this->name,
      'attributes' => $attributes
    );
  }

}
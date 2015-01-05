<?php
include_once 'inc.__datarow.class.php';
/**
* 
*/
class data extends __DataRow
{
  static $table = "data";

  var $id; 
  var $dataset; 
  var $attribute; 
  var $value; 
  var $time; 

  function __construct($id, $dataset = null, $attribute = null)
  {
    $this->super($id);
    $this->dataset   = $dataset   == null ? new Dataset  ((string) $this->row->dataset  ) : $dataset;
    $this->attribute = $attribute == null ? new Attribute((string) $this->row->attribute) : $attribute;
    $this->value     = $this->row["value"];
    $this->time      = $this->row["time" ];
    
  }

  public function save()
  {
    $this->row->dataset     = $this->dataset  ->row;
    $this->row->attribute   = $this->attribute->row;
    $this->row["value"]     = $this->value;
    $this->row["time"]      = $this->time;
    $this->row->update();
  }

  public function delete()
  {
    $this->row->delete();
  }

  public function newEmpty(){

    return $this->ormTable->insert(array(
      'dataset_id'   => null,
      'attribute_id' => null,
      'value'        => null,
      'time'         => null
      ));
  }
}

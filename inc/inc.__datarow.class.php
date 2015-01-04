<?php
/**
* 
*/
abstract class __DataRow
{
  var $row;
  var $id;
  static $table;

  function __DataRow($id)
  {
    // $this->row = $this->getTable()[$id];

  }

  function super($id = null) {
    $par = get_parent_class($this);
    $className = get_called_class();
    $this->ormTable = $this->getTable();
    
    if(!isset($id) || $id == null){
      error_log("new row");
      $this->row = $this->newEmpty();
      $this->id = (string) $this->row;
    }else{
      error_log("load row");
      $this->id   = $id;
      $this->row  = $this->ormTable[$id];
    }
    // $this->$par($id);

    if(isdebug()) error_log("new " . $className . "@" . $this->id);

  }

  abstract public function save();
  abstract public function newEmpty();

  static public function getAll($where='') {
    $className = get_called_class();
     $class = new ReflectionClass(get_called_class());
    // $dbTable = $class->getMethod('getTable')->invoke(null);
    $dbTable = $className::getTable();
    if($where != '')
      $dbTable = $dbTable->where($where);

    $result = array();

    try {
      foreach ($dbTable as $id => $row) {
        $result[] = ($class->newInstance($id));
      }
    } catch (Exception $e) {
      error_log("catched" . $e);
    }


    return $result;
  }

  static public function getTable() {
    $db = $GLOBALS['db'];
    $className = get_called_class();
    return $db->{$className::$table}();
  }
}
<?php
/**
* 
*/
abstract class __DataRow
{
	var $row;
	static $table;

	function __DataRow($id)
	{
		$className = get_called_class();
		$this->row = $GLOBALS['db']->{"\"" . $className::$table . "\""}()[$id];

	}

	function super($id) {
	    $par = get_parent_class($this);
	    $className = get_called_class();
	    $this->ormTable = $GLOBALS['db']->{"\"" . $className::$table . "\""}();
	    $this->row      = $this->ormTable[$id];
	    $this->$par($id);
    }

	abstract public function save();

	static public function getAll($where='') {
		$class = new ReflectionClass(get_called_class());
		$dbTable = $class->getMethod('getTable')->invoke(null);
		if($where != '')
			$dbTable = $dbTable->where($where);

		$result = array();

		try {
			foreach ($dbTable as $id => $row) {
				$result[] = ($class->newInstance($id));
			}
		} catch (Exception $e) {
			
		}

		

		return $result;
	}

	static public function getTable() {
		$db = $GLOBALS['db'];
		$class = new ReflectionClass(get_called_class());
		$table = (string)$class->getProperty('table')->getValue();
		echo $table;
		return $db->{"\"" . $table . "\""}();
	}
}
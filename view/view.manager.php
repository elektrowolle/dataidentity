<?php
include_once 'view._module.php';
/**
* 
*/
class ManagerView extends ViewModule {
	
	var $entitties;
	var $datasets;
	var $attributes;

	public function update()
	{
		$entities = Entity::getAll();
		$this->setContent('entities', $entities);
	}
}

View::registerView('ManagerView', 'manager', 'manager');

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
		$entities   = Entity::getAll();
		$datasets   = Dataset::getAll();
		$attributes = Attribute::getAll();

		$this->setContent('entities', $entities);
		$this->setContent('attributes', $attributes);
		$this->setContent('datasets', $datasets);
	}
}

View::registerView('ManagerView', 'manager', 'manager');

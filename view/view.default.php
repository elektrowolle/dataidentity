<?php

include_once 'view._module.php';

/**
* 
*/
class DefaultView extends ViewModule {

	public function update() {
		$dataset = new Dataset(142);
		$this->setContent('dataset', $dataset);
	}
}

View::registerView('DefaultView', 'default', 'default');


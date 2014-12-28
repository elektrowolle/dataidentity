<?php

include_once 'inc.api.out._module.php';

class JSonOutput extends OutputModule
{
	public function reply() {
		echo json_encode($this->args['content']['content']);
	}
}

API::registerOutput('JSonOutput', 'json');

?>
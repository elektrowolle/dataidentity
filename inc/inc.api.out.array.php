<?php

include_once 'inc.api.out._module.php';

class ArrayOutput extends OutputModule
{
	public function reply() {
		return $this->content;
	}
}

API::registerOutput('ArrayOutput', 'array');

?>
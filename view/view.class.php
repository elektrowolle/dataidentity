<?php

/**
* 
*/
class View {

	static $views = array();
	static $viewInUse;
	var $view;
	function __construct($viewName ='', $args = '', $update = false) {
		$usedName = ($viewName == '' ? 'default': $viewName);
		$this->view = View::loadView($usedName, $args, $update);


	}

	public function draw($tpl) {
		View::$viewInUse = $this;
		$this->view->draw($tpl);
	}

	static public function registerView($viewClassName='', $name='', $template = 'api') {
		$viewClass = new ReflectionClass($viewClassName);
		View::$views[($name == '') ? $viewClassName : $name]['class']    = $viewClass;
		View::$views[($name == '') ? $viewClassName : $name]['template'] = $template;
	}

	static public function loadView($view, $args, $update) {
		$foundView = View::$views[$view]['class']->newInstance($args, $update, View::$views[$view]['template']);

		$methods = View::$views[$view]['class']->getMethods();
		foreach ($methods as $key => $value) {
			$foundView->addContent($value->getClosure($foundView));
		}

		return $foundView;
	}
}

include_once 'view._views.php';

?>
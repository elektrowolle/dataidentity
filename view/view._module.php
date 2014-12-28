<?php
/**
* 
*/

abstract class ViewModule
{
	var $template;
	var $tplMessage;
	var $content;
	var $args;
	
	var $post;
	var $get;
	var $cookies;

	function __construct($args = array('' => ''), $update = true, $template) {
		$this->content = array();
		$this->args    = $args;

		$this->post     = $GLOBALS['_POST'];
		$this->get      = $GLOBALS['_GET'] ;
		$this->cookies  = isset($GLOBALS['_COOKIES']) ? $GLOBALS['_COOKIES'] : array();
		$this->template = $template; 

		$this->update();
	}

	public function setArgument($key = '', $value='') {
		$this->args[$key] = $value;
	}

	public function getArgument($key) {
		return isset($this->$args[$key]) ? $args[$key] : false;
	}

	public function setContent($key = '', $value='') {
		$this->content[$key] = $value;
	}

	public function addContent($value = '') {
		$this->content[] = $value;
	}

	abstract public function update();

	public function draw($tpl) {
		$template   = isset($this->args['template']  ) ? $this->args['template']   : 'api';
		$tplMessage = isset($this->args['tplMessage']) ? $this->args['tplMessage'] : ''   ;

		$tpl->assign('tplMessage', $tplMessage);
		$tpl->assign($this->content );
		$tpl->draw  ($this->template);
	}
}
?>
<?php

include_once 'inc.api.out._module.php';

class HtmlOutput extends OutputModule {
	function __construct(
				$args       = array(), 
				$template   = 'api', 
				$content    = array(),
				$tplMessage = '') {
		
		parent::__construct($args);

		$this->setArgument('template'  , $template);
		$this->setArgument('content'   , $template);
		$this->setArgument('tplMessage', $template);		
	}

	public function reply() {
		$tpl = $GLOBALS['tpl'];
		return HtmlOutput::htmlOutput(
			$tpl,
			$this->args['template'],
			$this->args['content'],
			$this->args['tplMessage']);
	}

	public function setContent($key, $value='') {
		$this->args['content'][$key] = $value;
	}

	static public function htmlOutput($tpl, $template, $content, $tplMessage){
		setTplMessage($tplMessage);

		if(is_array($content['content'])){
			foreach ($content['content'] as $key => $value) {
				$tpl->assign($key,  $value);

			}

		}else{
			$tpl->assign('content', $content['content']);
		}

		$tpl->assign('api_values', print_r($content, true));

		return $tpl->draw($template);
	}
}

API::registerOutput('HtmlOutput', 'html');

?>
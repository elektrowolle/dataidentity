<?php
	/**
	* 
	*/
	abstract class apiModule
	{
		var $content;
		var $template;
		var $tplMessage;
		
		function __construct($args = array('' => '')) {
  			$this->content    = array();
			$this->template   = 'api';
			$this->tplMessage = '';

			if(!empty($args)) {
				foreach ($args as $key => $value) {
					$this->get($key, $value);
				}
			}
		}

		public function get($request, $args = array())
		{	
			$key   = '';
			$value = '';

			if (empty($request) || $request == '') {
				$this->defaultApi($args);
				return;
			}

			$method = (new ReflectionClass($this))->getMethod($request);
			$method->invoke($this, $args);
		}

		public function setContent($key = '', $value='') {
			$this->content[$key] = $value;
		}

		public function addContent($value = '') {
			$this->content[] = $value;
		}

		public function getContent($key = '') {
			return $this->content[$key];
		}

		abstract public function defaultApi($value);

		public function answer() {
			$ret = array(
				'content'    => $this->content,
				'template'   => $this->template,
				'tplMessage' => $this->tplMessage);
			

			return $ret;
		}

		public function getJs() {
			$className = get_class($this);
			$js = file_get_contents('js/' . $className . '.js');
			return $js;
		}
	}
?>
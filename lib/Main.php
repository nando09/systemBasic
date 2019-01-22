<?php

namespace lib;

class Main{
	private $url;
	private $exploder;
	private $main;
	private $arq;
	private $params;
	private $road;

	public function __construct(){
		$this->setUrl();
		$this->setExploder();
		$this->setMain();
		$this->setArg();
		$this->setParams();
	}

	private function setUrl(){
		$this->url = empty($_GET['url']) ? 'Site' : $_GET['url'];
	}

	private function setExploder(){
		$this->exploder = explode('/',$this->url);
	}

	private function setMain(){
		$this->main = $this->exploder[0];
	}

	private function setArg(){
		$this->arq = (empty($this->exploder[1]) || is_null($this->exploder[1]) || !isset($this->exploder[1]) ? 'home' : $this->exploder[1]);
	}

	private function setParams(){
		$this->params = (empty($this->exploder[2]) || is_null($this->exploder[2]) || !isset($this->exploder[2]) ? '' : $this->exploder[2]);

		$this->params = array(
			'dados' => explode('|', $this->params)
		);

		// print_r($this->params);
		// exit();
	}

	private function setRoad(){
		$this->road = 'view\\' . $this->main . '\\' . $this->arq . '.php';
	}

	private function call(){
		if (file_exists($this->road)) {
			return $this->road;
		}else{
			return 'view/error/404.php';
		}
	}

	public function run(){
		extract($this->params, EXTR_PREFIX_ALL, 'view');
		$this->setRoad();
		include $this->call();
	}
}

<?php

namespace core;
class ROUTING{
	public $status = 0;
	public $site = 'index';

	//list website online.
	private $routing = [
		'index'=>[	'status'=>1],
		'admin'=>[	'status'=>1,
					'ns'=>1,
					'b'=>[	'login' 	=> ['status'=>1],
							'logout' 	=> ['status'=>1]],
					'c'=>[	'pageadd' 	=> ['status'=>1],
							'pagelist' 	=> ['status'=>1],
							'pageedit' 	=> ['status'=>1],
							'pagedelete' 	=> ['status'=>1]]
			]
		];
	private $change = array(
		'indexxx'=>'landingpage');

	public function __construct($site=null){
		//print_r($this->routing); test array routing
		$this->check($site);
	}
	public function check($site=null){
		if(isset($this->routing[$site]) AND $this->routing[$site]['status']==1){

			if(isset($this->change[$site])){
				if(isset($this->routing[$this->change[$site]]) AND $this->routing[$this->change[$site]]['status']==1){
				$this->site=$this->change[$site];
				$this->status = 1;
				}else{
					$this->status = 0;
				}
			}else{
				$this->status = 1;
				$this->site=$site;
			}

		}else{
			$this->status = 0;
		}
		////echo $this->status; test wynik routing
	}
	public function loadB($a2){
		if($this->routing[$this->site]['ns']==1){
			if(isset($this->routing[$this->site]['b']) AND $this->routing[$this->site]['b'][$a2]['status']==1){
				return $a2;
			}
		}
	}
	public function loadC($b,$c){
		if($this->routing[$this->site]['ns']==1){
			if(isset($this->routing[$this->site]['c']) AND $this->routing[$this->site]['c'][$b.$c]['status']==1){
				return $c;
			}
		}
	}

}
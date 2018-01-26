<?php
/*
Author:		Dawid Łęcki
File:		url.php
Update:		26.01.2017
*/
namespace core;
class URL{
	public $site = 'index';
	public $attribution = [];

	public function __construct(){
		if(isset($_GET['a']) AND !empty($_GET['a'])){
			$siteIndex=$this->getClear($_GET['a']);
			$this->site = $siteIndex;
		}else{
			$this->site='index';
		}

		isset($_GET['b'])? $this->addAttribution('b',$this->getClear($_GET['b'])) : $this->addAttribution('b',null);
		isset($_GET['c'])? $this->addAttribution('c',$this->getClear($_GET['c'])) : $this->addAttribution('c',null);
		isset($_GET['d'])? $this->addAttribution('d',$this->getClear($_GET['d'])) : $this->addAttribution('d',null);
		isset($_GET['e'])? $this->addAttribution('e',$this->getClear($_GET['e'])) : $this->addAttribution('e',null);

	}
	private function getClear($get){
		return trim(strip_tags($get));
	}

	private function addAttribution($a,$b){
			$this->attribution[$a]=$b;
	}
	public function change($newSite){
		$this->site = $newSite;
	}
	public function changeAttribute($url,$value){
		$this->attribution[$url] = $value;
	}
	public function link(){

		return [
		"seoIndex"=>"index.php?a=admin",
		"seoPageSetting"=>"index.php?a=admin&b=page",
		"seoPageAdd"=>"index.php?a=admin&b=page&c=add",
		"seoPageEdit"=>"index.php?a=admin&b=page&c=edit&d=",
		"seoPageDelete"=>"index.php?a=admin&b=page&c=delete&d=",
		"seoLogout"=>"index.php?a=admin&b=logout",
		"templatesUrlAdmin"=>"core/admin/templates/assets/"];
	}
 
}

?>
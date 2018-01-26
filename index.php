<?php
session_start();
$timeload=[];
define("CONFIG",'config/');
define("CORE",'core/');
define("EXT",'.php');
//
require_once(CONFIG.'web'.EXT);
require_once(CORE.'config'.EXT);

if(WEBSITESTATUS=='dev'){
	error_reporting(E_ALL);
    ini_set('display_errors', 1);
}


require_once(CORE.'app'.EXT);
//

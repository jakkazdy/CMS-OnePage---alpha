<?php

include('./'.CORE.METHODS.'view'.EXT);
$VIEW=new view\VIEW($DBPDO);

if($ROUTING->site=="admin" && $ROUTING->status==1){
	include('./'.CORE.ADMIN.'/app'.EXT);
}elseif($ROUTING->site=="index" && $ROUTING->status==1){
	include('./'.CORE.VIEW.'/indexNew'.EXT);
}else{
	$VIEW->viewPage('404');

}
/*
if($ROUTING->site=="admin" && $ROUTING->status==1){
	include('./'.CORE.ADMIN.'/app'.EXT);
}elseif($ROUTING->site=="index" && $ROUTING->status==1){
	include('./'.CORE.CONTROLLER.'/page'.EXT);
}else{
	$VIEW->viewPage('404');
}
*/

<?php
$cSMARTY->assign('page', $langFile['page']);
require_once('./'.CORE.ADMIN.METHODS.'/page'.EXT);
$cPAGE=new cPage\PAGE($DBPDO);
$cSMARTY->display(TEMADM.'home.tpl');
//$cSMARTY->display(TEMADM.'page.home.tpl');
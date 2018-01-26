<?php

$cSMARTY=new Smarty;
$cSMARTY->assign('site',$langFile['site']);
$cSMARTY->assign('url',$URL->link());
$cSMARTY->assign('config',[]);
//$cSMARTY->assign('user',$cUSER->downData());

require(CORE.ADMIN.CONTROLLER.'view.again'.EXT);

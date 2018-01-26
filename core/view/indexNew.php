<?php

$cVIEW=new view\VIEW($DBPDO);
$cSMARTY=new Smarty;
$cSMARTY->assign('downListPage', $cVIEW->downListPage(1));

//print_r($cVIEW->qDownSite(1));
$cSMARTY->display('templates/pmz/post.tpl');
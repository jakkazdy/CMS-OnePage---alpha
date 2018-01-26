<?php 
// Routing by jak 
// 07.01.2018

require_once('./'.CORE.METHODS.'routing'.EXT);
require_once('./'.CORE.METHODS.'url'.EXT);

$URL=new core\URL;
$ROUTING=new core\ROUTING;
$ROUTING->check($URL->site);
$page=$ROUTING->site;
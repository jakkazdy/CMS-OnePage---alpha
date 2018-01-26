<?php

require_once(CONTROLLER.'routing'.EXT);
require_once(CONFIG.'database'.EXT);

$DBPDO=new \database\PDO_Connect;

require_once(CONTROLLER.'lang'.EXT);

require_once(CONTROLLER.'view'.EXT);

if(WEBSITESTATUS=='dev'){
	echo'<pre>DEBUGGER APP.php';
	echo 'Test app.php<br/>';
	echo'<br/>URL: <br/>';		print_r($URL);
	echo'<br/>ROUTING: <br/>';	print_r($ROUTING);
	echo'<br/>ROUTING:admin- <br/>';	print_r(new core\ROUTING('admin'));
	echo'<br/>ROUTING:login- <br/>';	print_r(new core\ROUTING('login'));
	echo'<br/>$page: ';	print_r($page);
}
<?php

//import lang
$cSMARTY->assign('login', $langFile['login']);

if($cUSER->status==0){
	if($cUSER->checkLogin($_POST)==true){
		$URL->changeAttribute('b','home');
		//var_dump($URL);
		require(CORE.ADMIN.CONTROLLER.'view.again'.EXT);
	}else{
		$cSMARTY->display(TEMADM.'login.form.tpl');
	}
}else{
	$cSMARTY->display(TEMADM.'non.page.tpl');
}

if(WEBSITESTATUS=='dev'){
	echo'<pre>DEBUGGER LOGIN.php';
	echo'POST: '; print_r($_POST);
	echo'cUSER: '; print_r($cUSER);
	echo'_SESSION: '; print_r($_SESSION);

	echo'</pre>';
}
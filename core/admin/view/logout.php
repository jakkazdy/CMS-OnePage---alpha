<?php

//import lang
$cSMARTY->assign('logout', $langFile['logout']);



if($cUSER->status==1){
	if($cUSER->logout()==true){
		$URL->changeAttribute('b','login');
		require(CORE.ADMIN.CONTROLLER.'view.again'.EXT);
	}else{
		$cSMARTY->display(TEMADM.'non.page.tpl');
	}
}else{
	$URL->changeAttribute('b','login');
		require(CORE.ADMIN.CONTROLL.'view.again'.EXT);
}

if(WEBSITESTATUS=='dev'){
	echo'<pre>DEBUGGER LOGIN.php';
	echo'POST: '; print_r($_POST);
	echo'cUSER: '; print_r($cUSER);
	echo'_SESSION: '; print_r($_SESSION);

	echo'</pre>';
}
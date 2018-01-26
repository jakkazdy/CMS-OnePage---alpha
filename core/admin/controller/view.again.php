<?php
if($cUSER->status==0){
	//dane do logowania
	if($ROUTING->loadB('login')=='login'){
		include_once(CORE.ADMIN.VIEW.'login'.EXT);
	}else{
		
	}
}else{
	switch($URL->attribution['b']){
		case 'home':
			$cSMARTY->display(TEMADM.'home.tpl');
			break;
		case 'page':
			include_once(CORE.ADMIN.CONTROLLER.'page'.EXT);
			include_once(CORE.ADMIN.VIEW.'page'.EXT);
			break;
		case 'logout':
			include_once(CORE.ADMIN.VIEW.'logout'.EXT);
			break;
		default:
			include_once(CORE.ADMIN.VIEW.'home'.EXT);
	}
$cSMARTY->display(TEMADM.'footer.tpl');
}
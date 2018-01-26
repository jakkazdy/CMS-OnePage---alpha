<?php

require_once('./'.CORE.ADMIN.METHODS.'/page'.EXT);
$cPAGE=new cPage\PAGE($DBPDO);
$cSMARTY->assign(
	"comunitty",["status"=>'none',
	"addSucces"=>'']);
if(isset($_POST["submit"]) && isset($URL->attribution['c']) && $ROUTING->loadC($URL->attribution['b'],$URL->attribution['c'])){

	if($URL->attribution['b']=='page' && $URL->attribution['c']=='edit' && (isset($URL->attribution['d']) && is_numeric($URL->attribution['d']))){

		if($cPAGE->editPage()==true){
			$cSMARTY->assign("comunitty",[
				"addSucces"=>$langFile['page']['comunitty']['addSuccesEdit'],
				"status"=>'block']);
		}else{
			$cSMARTY->assign("comunitty",[
				"addSucces"=>$langFile['page']['comunitty']['addNoSuccesEdit'],
				"status"=>'block']);
		}
	}elseif($URL->attribution['b']=='page' && $URL->attribution['c']=='add'){

		if($cPAGE->addPage()==true){
			$cSMARTY->assign("comunitty",[
				"addSucces"=>$langFile['page']['comunitty']['addSucces'],
				"status"=>'block']);
			//echo "Dodano stronę";
		}else{
			$cSMARTY->assign("comunitty",[
				"addSucces"=>$langFile['page']['comunitty']['addNoSucces'],
				"status"=>'block']);
			//echo "Nie dodano";
		}
	}
}


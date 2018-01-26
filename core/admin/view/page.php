<?php
$cSMARTY->assign('page', $langFile['page']);

$cSMARTY->display(TEMADM.'header.tpl');
//$cSMARTY->display(TEMADM.'page.home.tpl');
if(isset($URL->attribution['c']) && $ROUTING->loadC($URL->attribution['b'],$URL->attribution['c'])){
	switch($URL->attribution['c']){
		case 'add':
		$cSMARTY->display(TEMADM.'page.'.$URL->attribution['c'].'.tpl');
		break;
		case 'delete':
		if($cPAGE->deletePage($URL->attribution['d'])){
			$cSMARTY->assign("comunitty",[
				"addSucces"=>$langFile['page']['comunitty']['deleteSucces'],
				"status"=>'block']);
			$cSMARTY->assign('downListPage', $cPAGE->downListPage(1));
			$cSMARTY->display(TEMADM.'page.list.tpl');
		}else{
			$cSMARTY->assign("comunitty",[
				"addSucces"=>$langFile['page']['comunitty']['deleteNoSucces'],
				"status"=>'block']);
			$cSMARTY->assign('downListPage', $cPAGE->downListPage(1));
			$cSMARTY->display(TEMADM.'page.list.tpl');
		}
		break;
		case 'edit':
		//print_r($cPAGE->downPageById($URL->attribution['d']));
		$cSMARTY->assign('formData', $cPAGE->downPageById($URL->attribution['d']));
		$cSMARTY->display(TEMADM.'page.'.$URL->attribution['c'].'.tpl');
		break;
		case 'list':
		$cSMARTY->assign('downListPage', $cPAGE->downListPage(1));
		$cSMARTY->display(TEMADM.'page.list.tpl');
		break;
		default:
		$cSMARTY->display(TEMADM.'page.none.tpl');
	}
}else{
	//echo'<pre>';print_r($cPAGE->downListPage(1));echo'</pre>';
	$cSMARTY->assign('downListPage', $cPAGE->downListPage(1));
	$cSMARTY->display(TEMADM.'page.list.tpl');
}

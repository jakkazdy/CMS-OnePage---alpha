<?php
// View-methods
//07.01.2018

namespace view;
class VIEW{

	private $pdo;
	public $rowCount;
	public $err=[];
	function __construct($pdo){
		$this->pdo=$pdo;
		$this->rowCount=$this->qRowCount();
	}
	public function qRowCount(){
		$q=$this->pdo->query("SELECT * FROM ".PREFIX."site WHERE status=1");
        return $q->rowCount();
	}
	public function downListPage($status){
        //$sql="SELECT * FROM ".PREFIX."site WHERE status='1'";
        if($status==1){
	        return $this->qDownListPage($status);
	    }else{
	    	return false;
	    	$this->err=["Error status! No 1 or int!"];
	    }
    }
    private function qDownListPage($status){
    	$sql="SELECT * FROM ".PREFIX."site WHERE status=:status";
    	$q=$this->pdo->prepare($sql);
    	//echo 'TO JEST NUMER STATUS!: '.$status;
    	$q->execute([':status'=>$status]);
    	//print_r($q->fetchAll());
    	//print_r($q);
    	return $q->fetchAll();
    }

	public function qDownSite($count){
        $q=$this->pdo->query("SELECT * FROM ".PREFIX."site WHERE status=1 LIMIT $count,1");
        return $q->fetch();

        
    }
	public function viewPage($n){
		include('./templates/error/'.$n.'.php');
	}
}
<?php

namespace cPage;
class PAGE{

	private $pdo;
    private $err=[];

	function __construct($pdo){
		$this->pdo=$pdo;
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
    public function downPageById($id=0){
        if($id!==0 && is_numeric($id)){
	        return $this->qDownPageById($id);
	    }else{
	    	$this->err=["Error id! It's dont numeric!"];
	    }
    }
    //nie usuwa, tylko zmienia status na wylaczony. Kwestia bezpieczenstwa
    public function deletePage($id){
            if($this->qDeletePage($id)){
                return true;
            }else{
                $this->err=[$this->pdo->errorInfo()];
                $this->err=[$this->pdo->errorCode()];
				return false;
            }
    }
    function addPage(){
        $pageNameMenu=$_POST['name'];
        $pageNameUrl=str_replace(" ", "-",strtolower($_POST['name']));
        $pageDate=$_POST['date'];
        $pageTitle=$_POST['title'];

        $q=$this->qAddPage($pageNameMenu,$pageNameUrl,$pageDate,$pageTitle);

        if($q===true){
            return true;
        }else{
        	$this->err=['Error settingPagex0002'];
            $this->err=[$this->pdo->errorInfo()];
            $this->err=[$this->pdo->errorCode()];
            return false;
        } 
    }
    function editPage(){
        $pageNameMenu=$_POST['name'];
        $pageNameUrl=str_replace(" ", "-",strtolower($_POST['name']));
        $pageDate=$_POST['date'];
        $pageTitle=$_POST['title'];
		$id=$_POST['formid'];

		$q=$this->qEditPage($pageNameMenu,$pageNameUrl,$pageDate,$pageTitle,$id);

        if($q===true){
            return true;
        }else{
        	$this->err=['Error settingPagex0002'];
            $this->err=[$this->pdo->errorInfo()];
            $this->err=[$this->pdo->errorCode()];
            return false;
        } 
            
    }

	private function qEditPage($pageNameMenu,$pageNameUrl,$pageDate,$pageTitle,$id){
        $sql="UPDATE ".PREFIX."site SET `name`=:name, `name_menu`=:name_menu, `title`=:title, `value`=:value WHERE `id`=:id";
        $send=$this->pdo->prepare($sql);
        return $send->execute([
        	':name'=>$pageNameUrl, 
        	':name_menu'=>$pageNameMenu, 
        	':title'=>$pageTitle, 
        	':value'=>$pageDate,
        	':id'=>$id]);

    }
    private function qAddPage($pageNameMenu,$pageNameUrl,$pageDate,$pageTitle){
        $sql="INSERT INTO ".PREFIX."site(name,name_menu,title,value) VALUES(:name, :name_menu, :title, :value)";
        $send=$this->pdo->prepare($sql);

        return $send->execute([
        	":name"=>$pageNameUrl, 
        	":name_menu"=>$pageNameMenu, 
        	":title"=>$pageTitle, 
        	":value"=>$pageDate]);
    }
        
    private function qDeletePage($id){
        $sql="UPDATE ".PREFIX."site SET status=:status WHERE id=:id";
        $q=$this->pdo->prepare($sql);
        return $q->execute([	'id'=>$id,
        						'status'=>0]);

    }
    private function qDownPageById($id){
    	//echo'OK! jestem tutaj!';
    	$sql="SELECT * FROM ".PREFIX."site WHERE id=:id LIMIT 1";
    	$q=$this->pdo->prepare($sql);
    	$q->execute([':id'=>$id]);
    	//print_r($q->fetch());
    	//echo'OK! tutaj tez!';
    	return $q->fetch();
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
}
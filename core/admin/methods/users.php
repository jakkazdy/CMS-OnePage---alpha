<?php

namespace cUser;
class USER{
	public $status;

    public $userData=[];
	//private $session=[];
	private $sessionKey;
	private $pdo;
    private $err=[];

	function __construct(\database\PDO_Connect $pdo){
		$this->pdo=$pdo;
        //dodaj sprawdzenie czy uzytkownik jest zalogowany
        $this->checkStatus();
    }
    private function checkStatus(){
        if($this->checkIssetSession()==true){
            $q1 = $this->pdo->prepare("SELECT * FROM ".PREFIX."session_key WHERE `key` = :key AND mktime = :mktime AND status = :status");
            $data=[ ":key"=>$_SESSION['key'],
                    ":mktime"=>$_SESSION['mktime'],
                    ":status"=>1];
            $q1->execute($data);
            //check results
            if($q1->rowCount()==1){
                $this->status=1;
            }else{
                $this->status=0;
            }
        }else{
            return false;
        }
    }

    public function checkLogin($p){
        if(isset($p) && (isset($p['username']) && isset($p['password']))){
            if($this->goLogin($p['username'],$p['password'])==true){

            }else{
                $this->err=['Logowanie się nie powiodło','00002'];
                return false;  
            }
            return true;
        }else{
            $this->err=['Brak danych z formularza','00001'];
            return false;
        }
    }
    private function hash($p){
        return $p;
    }
    private function sessionKey(){
        return $this->timeNow();
    }
    private function timeNow()
    {
        $currentHour = date('H');
        $currentMin = date('i');
        $currentSec = date('s');
        $currentMon = date('m');
        $currentDay = date('d');
        $currentYear = date('y');
        return mktime($currentHour, $currentMin, $currentSec, $currentMon, $currentDay, $currentYear);
    }
    private function goLogin($d1,$d2){
        $q1 = $this->pdo->prepare("SELECT * FROM ".PREFIX."users WHERE username = :username AND password = :password");
        $data=[ ":username"=>$d1,
                ":password"=>$d2];
        $q1->execute($data);
        //check results
        if($q1->rowCount()==1){
            //its ok
            $addSession=$this->pdo->prepare("INSERT INTO ".PREFIX."session_key (`key`, status, id_user, try, mktime) VALUES(:key, :status, :id_user, :try,:mktime)");
            $vq1=$q1->fetch();
            $this->sessionKey=$this->sessionKey();
            $mktime=$this->timeNow();
            $data=array(
                "key" => $this->sessionKey,
                "status" => 1,
                "try" => +1,
                "id_user" => $vq1['id'],
                "mktime" =>$mktime);
            $addSession->execute($data);
        
            if($addSession->rowCount()==1){
                //Sessia dodana do bazy
                if($this->addingSession($this->sessionKey,$mktime,$vq1['id'])==true){
                    //poszło dobrze!
                    $this->status=1;
                    return true;

                }else{

                //echo'błąd';
                $this->err=["Błąd przy dodaniu _SESSION",'00003'];  
                return false;
                }
            }else{
                //echo'błąd';
                $this->err=[$this->timeNow(),'00004'];  
                $this->err=[$addSession->errorInfo(),'00005'];
                return false;
            }
            //return true;
        }else{
            //wrong data
            return false;
        }
    }
    private function addingSession($key,$mktime,$id_u){
        $_SESSION=[ "key"=>$key,
                    "mktime"=>$mktime,
                    "id_u"=>$id_u];
        if($this->checkIssetSession()==true){
            return true;
        }else{
            return false;
        }
    }
    private function checkIssetSession(){
        if(!empty($_SESSION['key']) &&
            !empty($_SESSION['mktime']) &&
            !empty($_SESSION['id_u'])){
            return true;
        }else{
            return false;
        }
    }
    public function logout(){
        if($this->status==1){
            $_SESSION['key']=null;
            $_SESSION['mktime']=null;
            $_SESSION['id_u']=null;
            session_destroy();
            $this->status=0;
            return true;
        }
    }
    /*
    function checkSession(){
    	if(isset($_SESSION) && (isset($_SESSION['status']) && is_numeric($_SESSION['status']))){
    		if($_SESSION['status']==0){
    			$this->status=$_SESSION['status'];
    		}elseif($_SESSION['status']==1){
    			$this->status=$_SESSION['status'];
    			$this->sessionKey=$_SESSION['s_k'];
    		}
    	}
    }
    function checkSessionKey(){

    }
    function goLogin(){
    	echo'RUN goLogin';
        $username = $this->clearData($_POST["username"]);
        $password = $this->clearData($_POST["password"]);

        //#dodaj hashowanie hasła

        $passwordHash=$password;

        //#dodaj tworzenie session.

        $hash=md5(mktime().'+'.$passwordHash);

        $addSession=$DBPDO->prepare("INSERT INTO PREFIX.session_key (`key`, status, try, mktime) VALUES(`:key`, :status,:try,:mktime)");
        $data=array(
	    	"key" => $hash,
		    "status" => 0,
		    "try" => +1,
		    "mktime" => mktime()	);
        
        if($addSession->execute($data)){
        	echo'rekord dodany';
        }else{
        	echo'cos poszlo nie tak!';
        }
    }
    function clearData($n){
    	return addslashes(basename(strip_tags($n)));
    }

    function logout(){
    	session_destroy();
    	$this->status=0;
    	$this->sessionKey=0;
    }
    function Login(){
        $username = $_POST["username"];
        $password = $_POST["password"];

        $DBH = new PDO_Connect;

        // Välj felhantering (här felsökningsläge)
        //HAHA! jeszcze to nie mój kod...
        //To troche wyjaśnia poziom.
        $DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );

        // Förbered databasfråga med placeholders (markerade med : i början)
        $STH = $DBH->prepare("SELECT * FROM ".PREFIX."users WHERE username = :username AND password = :password");

        //Ersätt placeholders med värden från variabler
        $STH->bindParam(':username', $username);
        $STH->bindParam(':password', $password);

        $STH->execute();
        $DBH = null;

        if($row = $STH->fetch()){
            $this->status=1;
            $_SESSION["username"] = $row["username"];
            $_SESSION["status"] = 1;
            header("Location: index.php?a=admin");
        }
    }
    */
}
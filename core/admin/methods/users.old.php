<?php

namespace cUser;
class USER{
	public $status;

	private $session=[];
	private $sessionKey;
	private $pdo;

	function __construct(\database\PDO_Connect $pdo){
		$this->pdo=$pdo;

		/*
		if($this->checkSession()==1){
			//Zapisanie nicku użytkownika - its off.
	        //(isset($this-sessionKey) ? $username=$_SESSION['username'] : $username=null);

	        $STH=$this->pdo->query("SELECT * FROM ".PREFIX."users WHERE username='admin' LIMIT 1");
	        $countUser=$STH->rowCount();
	        print_r("Czy jest: ".$countUser);
	        $this->status=$countUser;
		}
		*/
        
    }
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
}
<?php
namespace database;
class PDO_Connect extends \PDO {

    function __construct() {
		$mysql_host = 'localhost'; //lub jakiĹ adres: np sql.nazwa_bazy.nazwa.pl
		$port = '3306'; //domyĹlnie jest to port 3306
		$username = 'root';
		$password = ''; //lol23
		$database = 'pmz'; //'produkty'
        parent::__construct('mysql:host='.$mysql_host.';dbname='.$database.';port='.$port, $username, $password );

        parent::exec("SET NAMES utf8");
    }

    
}
?>
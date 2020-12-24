<?php
namespace ProgrammingTest;

trait traitdatabase
{
    private $username = '';
    private $password = '';
    private $hostname = '127.0.0.1';
	private $dbname   = 'wrentest';


   /**
    * Constructor
    */

   public function __construct(){

   }

   /**
    * Get Database connection
    * 
    * @return PDO connection
    */
	
    public function pdoConnect() {		
		//'\' the beginning backslash means php will look for the pdo class in the global namespace
		$dsn      = 'mysql:dbname='.$this->dbname.';host='.$this->hostname;
		$user     = $this->username;
		$password = $this->password;

		try {
			$pdo = new \PDO($dsn, $user, $password);
			$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
			return $pdo;
		} catch (\PDOException $e) {
			echo 'Connection failed: ' . $e->getMessage();
			exit;
		}		
    }	
}
?>
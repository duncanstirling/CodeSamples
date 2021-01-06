<?php
namespace wrenkitchens;

trait TraitDatabase
{
	private $username = '';
	private $password = '';
	private $hostname = '127.0.0.1';
	private $dbname   = 'wrentest';
	private $db;
	public  $queries;

/**
* Constructor
*/

	public function __construct() {}

/**
* Get Database connection
* 
* @return db connection
*/

	public function pdoConnect()
	{
		if (isset($this->db)) {
			return $this->db;
		} else {		
//'\' the beginning backslash means php will look for the pdo class in the global namespace
			$dsn      = 'mysql:dbname=' . $this->dbname . ';host=' . $this->hostname;
			$user     = $this->username;
			$password = $this->password;

			try {
				$this->db = new \PDO($dsn, $user, $password);
				$this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
				return $this->db;
			} catch (\PDOException $e) {
				echo 'Connection failed: ' . $e->getMessage();
				exit;
			}
		}
	}
}

?>
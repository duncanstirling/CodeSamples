<?php
class Database
{
    protected $username = '';
    protected $password = '';
    protected $hostname = '127.0.0.1';
	protected $dbname   = '';

   /**
    * Constructor
    */

   public function __construct(){
	   //$this->connect();
   }

   /**
    * Get Database connection
    * 
    * @return Mysqli
    */
	
    public function connect() {		
		$mysqli = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);
		if ($mysqli->connect_errno) {
		  echo "Failed to connect to database: " . $mysqli -> connect_error;
		  exit();
		}		
		return $mysqli; 		
    }	
}
?>
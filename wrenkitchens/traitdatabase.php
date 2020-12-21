<?php
trait TraitDatabase
{
    private $username = '';
    private $password = '';
    private $hostname = '127.0.0.1';
	private $dbname   = '';
	
	public $mysqli;

   /**
    * Constructor
    */

   public function __construct(){
   }

   /**
    * Get Database connection
    * 
    * @return Mysqli
    */
	
    public function mysqliConnect() {		
		$mysqli = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);
		if ($mysqli->connect_errno) {
		  echo "Failed to connect to database: " . $mysqli -> connect_error;
		  exit();
		}		
		return $mysqli; 		
    }	
}
?>
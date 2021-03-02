<?php
namespace app;

class Database
{
	private $config;
	private $db;
	
    public function __construct() {
		$this->config = parse_ini_file('config.ini', true);
    }

/**
* Get Database connection
* 
* @return db connection
*/

	public function pdoConnect()
	{
		if (isset($this->config['dbname'])) {
			return $this->db;
		} else {		
			$dsn      = 'mysql:dbname=' . $this->config['dbname'] . ';host=' . $this->config['host'];
			$user     = $this->config['user'];
			$password = $this->config['pass'];

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
	
	protected function save(Query $q) : bool
	{
		return $q->runQuery(Query $q);
	}		

    public function Xsave($fieldsAndValues) {
        /**
         * @MARKER Placeholder code, do not change, outside the scope of the test
         *         Assume this saves the fields given to a timeseries database
         */
        file_put_contents(__DIR__ . '/../test-log.log', 'Database::save [' . json_encode($fieldsAndValues) . ']' . PHP_EOL, FILE_APPEND);
        /**
         * @MARKER-END
         */
    }
}

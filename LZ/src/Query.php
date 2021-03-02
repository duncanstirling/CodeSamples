<?php
namespace app;

spl_autoload_register(function ($class_name) {
    include('..\\'. $class_name . ".php");	
});

class Query {
	
	protected  $queries;

	public function __construct() {}
	
	protected function runQuery(Query $q)
	{
		try {
			$db = new Database;
			$db = $db->pdoConnect();
			$statement = $db->prepare($q->queries);
			$statement->execute();
		} catch (Exception $e) {
			echo 'Code error: ' . $e->getMessage();
			error_log('Log code error to system logger: ' . $e->getMessage(), 0);
			return false;
		}
		return true;
	}
}

?>

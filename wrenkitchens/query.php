<?php
namespace wrenkitchens;

spl_autoload_register(function ($class_name) {
    include('..\\'. $class_name . ".php");	
});

class Query
{
// use traits, assumes PHP7
	use TraitDatabase;

	public function __construct() {
		
	}
	
	public function runQuery(Query $q)
	{
		try {
			$db = $this->pdoConnect();
			$statement = $db->prepare($q->queries);
			$statement->execute();
		} catch (Exception $e) {
			echo 'Wren code error: ' . $e->getMessage();
			error_log('Log Wren code error to system logger: ' . $e->getMessage(), 0);
			error_log('Email Wren code error: ' . $e->getMessage(), 1, "dgstirling@yahoo.co.uk");
			return false;
		}

		return true;
	}
}

?>

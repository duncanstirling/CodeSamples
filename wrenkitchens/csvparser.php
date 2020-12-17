<?php

class CSVProcessor
{
	protected $file;
	protected $db;
	protected $queries;
	protected $testOrProd;

	public function __construct($file, Database $db, $testOrProd)
	{
		$this->file       = $file;
		$this->db         = $db;// Mysqli
		$this->testOrProd = $testOrProd;
	}

	public function processCSV()
	{
		// Open CSV file with read-only mode
		$csvFile = fopen("$this->file", 'r');
		
		// Skip the first line
		fgetcsv($csvFile);
		$lineCount = 1;
		
		// Parse data from CSV file line by line
		$this->queries = "";
		while (($line = fgetcsv($csvFile)) !== FALSE) {
			// Get row data
			$strProductCode  = isset($line[0]) ? addslashes($line[0]) : null;
			$strProductName  = isset($line[1]) ? addslashes($line[1]) : null;
			$strProductDesc  = isset($line[2]) ? addslashes($line[2]) : null;
			$stock           = isset($line[3]) ? addslashes($line[3]) : null;
			$costGB          = isset($line[4]) ? addslashes($line[4]) : null;
			$dtmDiscontinued = isset($line[5]) ? addslashes($line[5]) : null;
			//dtmAdded 
			//stmTimestamp 

			// create query
			$query = "INSERT INTO `tblwrenproductdata`(`strProductName`, `strProductDesc`, `strProductCode`, `dtmAdded`) VALUES ('" . $strProductName . "', '" . $strProductDesc . "', '" . $strProductCode . "', NOW());\n";

			// create multi query
			$this->queries .= $query;
			$lineCount++;
		}
		
		// Close opened CSV file
		fclose($csvFile);

		$return              = array();
		$return['lineCount'] = $lineCount;
		$return['queries']   = $this->queries;
		return $return;
	}

	public function saveCSVtoDB()
	{
		$mysqli = $this->db->connect();
		$mysqli->begin_transaction();

		if ($mysqli->multi_query($this->queries)) {
			$result = $mysqli->store_result();
			if ($mysqli->errno == 0) {
			   
					// First result set or FALSE (if the query didn't return a result set) is stored in $result 
				while ($mysqli->more_results()) {
					if ($mysqli->next_result()) {
						$result = $mysqli->store_result();
						if ($mysqli->errno == 0) {
								// The result set or FALSE (see above) is stored in $result
						} else {
							// Result set read error 
							echo "read error \n";
							break;
						}
					} else {
							// Error in the query 
						echo "error in query \n";
					}
				}
			} else {
					// First result set read error 
				echo "First result set read error \n";
			}
		} else {
				// Error in the first query 
			echo "Error in the first query\n";
		}
		$mysqli->commit();
		$mysqli->close();
		return;
	}
}

//#######################################################
//                PROCESS THE CSV FILE


// parameters passed at command line
$file       = isset($_SERVER["argv"][1]) ? $_SERVER["argv"][1] : "stock.csv";
$testOrProd = isset($_SERVER["argv"][2]) ? $_SERVER["argv"][2] : "test";

require_once(__DIR__ . '/database.php');
$mysqliconn = new Database();

// process csv file
$parser = new CSVProcessor($file, $mysqliconn, $testOrProd);

$csvProcessingResult = $parser->processCSV();
echo "\nNumber of sql queries is ". $csvProcessingResult['lineCount']."\n";
echo "\nQueries:\n";
echo "<pre>", print_r($csvProcessingResult['queries'], 1), "</pre>";

// save to db
if ($testOrProd == 'production') {
	$parser->saveCSVtoDB();
}

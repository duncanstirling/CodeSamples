<?php
namespace wrenkitchens;

spl_autoload_register(function ($class_name) {
    include('..\\'. $class_name . ".php");	
});

trait traitCSV {

	public function __construct(string $file, string $testOrProd)
	{
		$this->file = $file;
		$this->testOrProd = $testOrProd;
	}

	protected function validateFile() : object
	{
		if (!file_exists($this->file)) {
			return (object)['type' => 'error', 'message' => 'File does not exist.'];
		} else if (filesize($this->file) > 2000) {
			return (object)['type' => 'error', 'message' => 'File size too big.'];
		}
		return (object)['type' => 'success'];
	}

	public function validateFileContent() : object
	{
		// Open CSV file with read only mode
		$csvFile = fopen("$this->file", 'r');

		// Skip the first line
		fgetcsv($csvFile);
		$lineCount = 1;

		// Parse data from CSV file line by line
		$this->queries = "";
		$uniqueProductCodes = array();
		$rejected           = array();
		$reason             = '';
		$query              = new Query();
		
		while (($line = fgetcsv($csvFile)) !== false) {
			// validate line length
			$arraySize = count($line);
			if ($arraySize > 6 || $arraySize < 5) {
				$rejected["$strProductCode"] = "Line array size $arraySize invalid.";
				continue;
			}

			// validate line data
			$strProductCode = isset($line[0]) ? addslashes($line[0]) : null;
			$strProductName = isset($line[1]) ? addslashes($line[1]) : null;
			$strProductDesc = isset($line[2]) ? addslashes($line[2]) : null;
			$stock          = isset($line[3]) ? addslashes($line[3]) : null; // new database field
			$costGB         = isset($line[4]) ? addslashes($line[4]) : null; // new database field
			$discontinued   = isset($line[5]) ? addslashes($line[5]) : null;

			// check numbers are numerical or decimal
			if (!preg_match("/^\d+$/", $stock)) {
				$rejected["$strProductCode"] = "Stock $stock contains invalid characters.";
				continue;
			}

			if (!preg_match("/^[+\-]?[0-9]{1,10}\.[0-9]{2,}\z/", $costGB) && !preg_match("/^\d+$/", $costGB)) {
				$rejected["$strProductCode"] = "Cost $costGB contains invalid characters.";
				continue;
			}

			// validate line element types
			if (substr($strProductCode, 0, strlen('P')) !== 'P' || strlen($strProductCode) != 5) $reason .= 'Product code invalid.';
			if (gettype($strProductName) != 'string') $reason .= "Product name $strProductName invalid.";
			if (gettype($strProductDesc) != 'string') $reason .= "Product description $strProductDesc invalid.";

			if ($reason != '') {
				$rejected["$strProductCode"] = $reason;
				continue;
			}

			// Any stock item marked as discontinued will be imported, but
			// will have the discontinued date set as the current date.
			$dtmDiscontinued = ($discontinued == 'yes') ? "NOW()" : '';

			if (!in_array($strProductCode, $uniqueProductCodes)) {
				// Any stock item which costs less that £5 and has less than 10 stock will not be
				// imported. Any stock items which cost over £1000 will not be imported.
				if ($costGB < 5 && $stock < 10) {
					$rejected["$strProductCode"] = "Cost $costGB and stock $stock too low.";
					continue;
				}

				if ($costGB > 1000) {
					$rejected["$strProductCode"] = "Cost $costGB too high.";
					continue;
				}
			} else {
				$rejected["$strProductCode"] = "Product code not unique.";
				continue;
			}

			$query->strProductName  = $strProductName;
			$query->strProductDesc  = $strProductDesc;
			$query->strProductCode  = $strProductCode;
			$query->stock           = $stock;
			$query->costGB          = $costGB;
			$query->dtmDiscontinued = $dtmDiscontinued;
			
			// create multi query
			$query = $this->buildMultiQuery($query);

			$uniqueProductCodes[] = $strProductCode;
			$lineCount++;
		}

		// Close opened CSV file
		fclose($csvFile);

		$query->type = 'success';
		$query->lineCount = $lineCount;
		$query->rejected = $rejected;
		return $query;
	}

	protected function buildMultiQuery(Query $q) : object
	{
		$query = "INSERT INTO `tblproductdata`(`strProductName`, `strProductDesc`, `strProductCode`, `stock`, `costGB`, `dtmAdded`, `dtmDiscontinued`) VALUES ('" . $q->strProductName . "', '" . $q->strProductDesc . "', '" . $q->strProductCode . "', '" . $q->stock . "', '" . $q->costGB . "', NOW(), '" . $q->dtmDiscontinued . "');\n";

		// build multi query
		$q->queries .= $query;

		return $q;
	}
}

?>
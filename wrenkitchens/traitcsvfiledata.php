<?php
namespace wrenkitchens;

trait TraitCsvFileData
{
// each query
	public $strProductName;
	public $strProductDesc;
	public $strProductCode;
	public $stock;
	public $costGB;
	public $dtmDiscontinued;

// total result or file processing
	public $queries;
	public $type;
	public $message;
	public $lineCount;
	public $rejected;

/**
* Constructor
*/

	public function __construct() {}
}

?>

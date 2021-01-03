<?php
namespace ProgrammingTest;

trait TraitCsv
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

class Query
{
// use traits, assumes PHP7
	use TraitCsv;

	public function __construct() {}
}

?>

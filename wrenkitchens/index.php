<?php
declare (strict_types = 1);
require_once (__DIR__ . '/csvparser.php');
use ProgrammingTest as PT;

//====================================================
//           PROCESS CSV FILE AND IMPORT TO DB
//====================================================

// Add cost and stock columns to MySQL table
// ALTER TABLE `tblproductdata` ADD `stock` SMALLINT NULL AFTER `strProductCode`, ADD `costGB` DECIMAL(10,2) NULL AFTER `stock`;

// parameters passed at command line, defaults to stock.csv and test
$file = $_SERVER["argv"][1] ?? "stock.csv";
$testOrProd = $_SERVER["argv"][2] ?? "test";

// process csv file with instance of CSVProcessor in ProgrammingTest namespace
$parser = new PT\CSVProcessor($file, $testOrProd);

// parse file
$parseResult = $parser->validate();

if ($parseResult->type == 'success') {
// print csv file parsing result
	echo "\n1. Total Number of Queries:";
	echo "<pre>", print_r($parseResult->lineCount, true), "</pre>\n";
	echo "\n2. Queries:\n";
	echo "<pre>", print_r($parseResult->queries, true), "</pre>\n";
	echo "\n3. Queries Rejected:\n";
	echo "<pre>", print_r($parseResult->rejected, true), "</pre>\n";
} else {
	echo "Error: <pre>", print_r($parseResult->message, true), "</pre>";
	exit;
}

// save parsed data to db
if ($testOrProd == 'production') {
	$parser->saveFileData($parseResult);
}

?>
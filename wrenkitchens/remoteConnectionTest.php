<?php

// https://www.sitepoint.com/tutorial-introduction-to-unit-testing-in-php-with-phpunit/
require_once('csvparser.php');

class RemoteConnectTest extends PHPUnit_Framework_TestCase
{
  public function setUp(){ }
  public function tearDown(){ }

  public function testParsingIsValid()
  {	  
    // test to ensure that I can parse a file without returning an error
    $connObj = new CSVProcessor('stock.csv', 'test');

	// test 1
    $this->assertTrue($connObj->validate() !== false);	
  }
  
  public function testSaveParsedDataIsValid()
  {	  
    // test to ensure that I can parse a file without returning an error
    $connObj = new CSVProcessor('stock.csv', 'test');

	// test 2
	$connObj->queries = 
"INSERT INTO `tblproductdata`(`strProductName`, `strProductDesc`, `strProductCode`, `stock`, `costGB`, `dtmAdded`, `dtmDiscontinued`)
                VALUES ('TV', '32” Tv', 'P0001', '10', '399.99', NOW(), '');
INSERT INTO `tblproductdata`(`strProductName`, `strProductDesc`, `strProductCode`, `stock`, `costGB`, `dtmAdded`, `dtmDiscontinued`)
                VALUES ('Cd Player', 'Nice CD player', 'P0002', '11', '50.12', NOW(), 'NOW()');
INSERT INTO `tblproductdata`(`strProductName`, `strProductDesc`, `strProductCode`, `stock`, `costGB`, `dtmAdded`, `dtmDiscontinued`)
                VALUES ('VCR', 'Top notch VCR', 'P0003', '12', '39.33', NOW(), 'NOW()');
INSERT INTO `tblproductdata`(`strProductName`, `strProductDesc`, `strProductCode`, `stock`, `costGB`, `dtmAdded`, `dtmDiscontinued`)
                VALUES ('Bluray Player', 'Watch it in HD', 'P0004', '1', '24.55', NOW(), '');
INSERT INTO `tblproductdata`(`strProductName`, `strProductDesc`, `strProductCode`, `stock`, `costGB`, `dtmAdded`, `dtmDiscontinued`)
                VALUES ('XBOX360', 'Best.console.ever', 'P0005', '5', '30.44', NOW(), '');
INSERT INTO `tblproductdata`(`strProductName`, `strProductDesc`, `strProductCode`, `stock`, `costGB`, `dtmAdded`, `dtmDiscontinued`)
                VALUES ('PS3', 'Mind your details', 'P0006', '3', '24.99', NOW(), '');
INSERT INTO `tblproductdata`(`strProductName`, `strProductDesc`, `strProductCode`, `stock`, `costGB`, `dtmAdded`, `dtmDiscontinued`)
                VALUES ('CPU', 'Speedy', 'P0008', '12', '25.43', NOW(), '');
INSERT INTO `tblproductdata`(`strProductName`, `strProductDesc`, `strProductCode`, `stock`, `costGB`, `dtmAdded`, `dtmDiscontinued`)
                VALUES ('Harddisk', 'Great for storing data', 'P0009', '0', '99.99', NOW(), '');
INSERT INTO `tblproductdata`(`strProductName`, `strProductDesc`, `strProductCode`, `stock`, `costGB`, `dtmAdded`, `dtmDiscontinued`)
                VALUES ('CD Bundle', 'Lots of fun', 'P0010', '0', '10', NOW(), '');
INSERT INTO `tblproductdata`(`strProductName`, `strProductDesc`, `strProductCode`, `stock`, `costGB`, `dtmAdded`, `dtmDiscontinued`)
                VALUES ('TV', 'HD ready', 'P0012', '45', '50.55', NOW(), '');
INSERT INTO `tblproductdata`(`strProductName`, `strProductDesc`, `strProductCode`, `stock`, `costGB`, `dtmAdded`, `dtmDiscontinued`)
                VALUES ('Cd Player', 'Beats MP3', 'P0013', '34', '27.99', NOW(), '');
INSERT INTO `tblproductdata`(`strProductName`, `strProductDesc`, `strProductCode`, `stock`, `costGB`, `dtmAdded`, `dtmDiscontinued`)
                VALUES ('VCR', 'VHS rules', 'P0014', '3', '23', NOW(), 'NOW()');
INSERT INTO `tblproductdata`(`strProductName`, `strProductDesc`, `strProductCode`, `stock`, `costGB`, `dtmAdded`, `dtmDiscontinued`)
                VALUES ('Bluray Player', 'Excellent picture', 'P0015', '32', '4.33', NOW(), '');
INSERT INTO `tblproductdata`(`strProductName`, `strProductDesc`, `strProductCode`, `stock`, `costGB`, `dtmAdded`, `dtmDiscontinued`)
                VALUES ('24” Monitor', 'Visual candy', 'P0016', '3', '45', NOW(), '');
INSERT INTO `tblproductdata`(`strProductName`, `strProductDesc`, `strProductCode`, `stock`, `costGB`, `dtmAdded`, `dtmDiscontinued`)
                VALUES ('Harddisk', 'More storage options', 'P0018', '34', '50', NOW(), 'NOW()');
INSERT INTO `tblproductdata`(`strProductName`, `strProductDesc`, `strProductCode`, `stock`, `costGB`, `dtmAdded`, `dtmDiscontinued`)
                VALUES ('CD Bundle', 'Store all your data. Very convenient', 'P0019', '23', '3.44', NOW(), '');
INSERT INTO `tblproductdata`(`strProductName`, `strProductDesc`, `strProductCode`, `stock`, `costGB`, `dtmAdded`, `dtmDiscontinued`)
                VALUES ('Cd Player', 'Play CD\'s', 'P0020', '56', '30', NOW(), '');
INSERT INTO `tblproductdata`(`strProductName`, `strProductDesc`, `strProductCode`, `stock`, `costGB`, `dtmAdded`, `dtmDiscontinued`)
                VALUES ('VCR', 'Watch all those retro videos', 'P0021', '12', '3.55', NOW(), 'NOW()');
INSERT INTO `tblproductdata`(`strProductName`, `strProductDesc`, `strProductCode`, `stock`, `costGB`, `dtmAdded`, `dtmDiscontinued`)
                VALUES ('Bluray Player', 'The future of home entertainment!', 'P0022', '45', '3', NOW(), '');
INSERT INTO `tblproductdata`(`strProductName`, `strProductDesc`, `strProductCode`, `stock`, `costGB`, `dtmAdded`, `dtmDiscontinued`)
                VALUES ('XBOX360', 'Amazing', 'P0023', '23', '50', NOW(), '');
INSERT INTO `tblproductdata`(`strProductName`, `strProductDesc`, `strProductCode`, `stock`, `costGB`, `dtmAdded`, `dtmDiscontinued`)
                VALUES ('PS3', 'Just don\'t go online', 'P0024', '22', '24.33', NOW(), 'NOW()');
INSERT INTO `tblproductdata`(`strProductName`, `strProductDesc`, `strProductCode`, `stock`, `costGB`, `dtmAdded`, `dtmDiscontinued`)
                VALUES ('TV', 'Great for television', 'P0025', '21', '40', NOW(), '');
INSERT INTO `tblproductdata`(`strProductName`, `strProductDesc`, `strProductCode`, `stock`, `costGB`, `dtmAdded`, `dtmDiscontinued`)
                VALUES ('Cd Player', 'A personal favourite', 'P0026', '0', '34.55', NOW(), '');";
    $this->assertTrue($connObj->saveFileData() !== false);	
  }
}
?>
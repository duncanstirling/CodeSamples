############################################# 
#                  READ ME
#############################################

# This OO PHP code sample processes a CSV file and enters it into a database.

# This code sample displays the following: typed properties and type hinting, function return type
declarations, replacing the ternary operator with the null coalescing operator, traits, unit testing 
with PHPUnit and PDO for flexible database configuration because it supports a range of drivers.

# The script runs at the command line
It can be run in a production or test format
Test format: it will parse the file and display the result.
Production format: it will also enter the parsing result into a database.
You must also specify the name of the csv file.
For production format you must specificy 'production', the default parameter is test 

# Production format
php index.php stock.csv production

# Test format
php index.php stock.csv

# Database alterations
Add cost and stock columns to MySQL table
ALTER TABLE `tblproductdata` ADD `stock` SMALLINT NULL AFTER `strProductCode`, ADD `costGB` DECIMAL(10,2) NULL AFTER `stock`;
See tableAlterations.sql

# Unit testing
phpunit unitTests.php
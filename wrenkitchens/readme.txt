############################################# 
#                  READ ME
#############################################

# This code sample is a OO PHP programming test to processing CSV files and entering them into a database.

# The script runs at the command line
It can be run in a production or test format
In test format it will proces the files and display the result.
In production format it will also enter the result into the database.
You must also specify the name of the csv file

# Test format
php index.php stock.csv test

# Production format
php index.php stock.csv production

# Database alterations
Add cost and stock columns to MySQL table
ALTER TABLE `tblproductdata` ADD `stock` SMALLINT NULL AFTER `strProductCode`, ADD `costGB` DECIMAL(10,2) NULL AFTER `stock`;
See tableAlterations.sql

# Unit testing
phpunit unitTests.php



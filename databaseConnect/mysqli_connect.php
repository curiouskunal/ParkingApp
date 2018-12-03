<?php
// Opens a connection to the database
// Since it is a php file it won't open in a browser
// It should be saved outside of the main web documents folder
// and imported when needed

/*
Notes:
SELECT : Select rows in tables
INSERT : Insert new rows into tables
UPDATE : Change data in rows
DELETE : Delete existing rows (Remove privilege if not required)
*/

/*
GRANT INSERT, SELECT, DELETE, UPDATE ON parkingapp.*
TO 'web'@'localhost'
IDENTIFIED BY '4ww3';
*/

// Defined as constants so that they can't be changed
DEFINE ('DB_USER', 'web');
DEFINE ('DB_PASSWORD', '4ww3');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'parkingapp');

// $dbc will contain a resource link to the database
// @ keeps the error from showing in the browser

$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die('Could not connect to MySQL: ' .
mysqli_connect_error());
?>

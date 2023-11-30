<?php
/**
 * using mysqli_connect for database connection
 */

$databaseHost = 'localhost';
$databaseName = 'sipeka';
$databaseUsername = 'root';
$databasePassword = 'balittas*123#';

$koneksi = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 

?>

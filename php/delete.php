<?php
session_start();
if((strlen($_SESSION['user']) > 0) && ($_SESSION['permission'] == 'admin')) {
    $id = $_GET['id'];
    require( 'Constants.php' );

    $dbHost = Constants::$dbHost;
    $dbName = Constants::$dbName;
    $dbUsername = Constants::$dbUsername;
    $dbUserPassword = Constants::$dbUserPassword;

    mysql_connect($dbHost, $dbUsername, $dbUserPassword) or die(mysql_error()); //Connect to server
    mysql_select_db($dbName) or die("Cannot connect to database"); //connect to database
    mysql_query("DELETE FROM reactors Where id='$id'"); // SQL Query
}
header("location: ../../reactors.php");
<?php
session_start();
if((strlen($_SESSION['user']) > 0) && ($_SESSION['permission'] == 'admin')) {
    $id = $_GET['id'];
    $facility = $_POST['facility'];
    $location = $_POST['location'];
    $process = $_POST['process'];
    $capacity = $_POST['capacity'];
    $current_status = $_POST['current_status'];
    $start_year = $_POST['start_year'];
    $owner = $_POST['owner'];
    $img = $_POST['img'];
    require( 'Constants.php' );

    $dbHost = Constants::$dbHost;
    $dbName = Constants::$dbName;
    $dbUsername = Constants::$dbUsername;
    $dbUserPassword = Constants::$dbUserPassword;

    mysql_connect($dbHost, $dbUsername, $dbUserPassword) or die(mysql_error()); //Connect to server
    mysql_select_db($dbName) or die("Cannot connect to database"); //connect to database
    $result = mysql_query("UPDATE reactors SET facility='$facility', location='$location', process='$process',
 capacity='$capacity', current_status='$current_status', start_year='$start_year', owner='$owner', img='$img' WHERE id='$id'");
    echo $id, PHP_EOL;
    echo $facility, PHP_EOL;
    echo $location, PHP_EOL;
    echo $process, PHP_EOL;
    echo $capacity, PHP_EOL;
    echo $current_status, PHP_EOL;
    echo $start_year, PHP_EOL;
    echo $owner, PHP_EOL;
    echo $img, PHP_EOL;
    echo $result, PHP_EOL;
}
header("location: ../../show.php/?id=$id");
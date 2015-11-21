<?php
session_start();
if((strlen($_SESSION['user']) > 0) && ($_SERVER["REQUEST_METHOD"] == "POST")) {
    $id = $_GET['id'];
    $facility = $_POST['facility'];
    $location = $_POST['location'];
    $process = $_POST['process'];
    $capacity = $_POST['capacity'];
    $current_status = $_POST['current_status'];
    $start_year = $_POST['start_year'];
    $owner = $_POST['owner'];
    $img = $_POST['img'];
    mysql_connect("mysql.agh.edu.pl", "cephei", "3QaCHyZQ") or die(mysql_error()); //Connect to server
    mysql_select_db("cephei") or die("Cannot connect to database"); //connect to database
    $result = mysql_query("INSERT INTO reactors (facility, location, process, capacity, current_status, start_year, owner, img)
 VALUES ('$facility', '$location', '$process', '$capacity', '$current_status', '$start_year', '$owner', '$img')");
}
header("location: ../../show.php/?id=$id");
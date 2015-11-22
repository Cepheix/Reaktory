<?php
session_start();
if((strlen($_SESSION['user']) > 0) && ($_SERVER["REQUEST_METHOD"] == "POST")) {
    $facility = $_POST['facility'];
    $location = $_POST['location'];
    $process = $_POST['process'];
    $capacity = $_POST['capacity'];
    $current_status = $_POST['current_status'];
    $start_year = $_POST['start_year'];
    $owner = $_POST['owner'];
    $img = $_POST['img'];
    $author_id = $_SESSION['id'];
    $loops = $_POST['loops'];
    $type = $_POST['type'];
    $moderator = $_POST['moderator'];
    $coolant = $_POST['coolant'];
    $fuel = $_POST['fuel'];
    $enrichment = $_POST['enrichment'];
    mysql_connect("mysql.agh.edu.pl", "cephei", "3QaCHyZQ") or die(mysql_error()); //Connect to server
    mysql_select_db("cephei") or die("Cannot connect to database"); //connect to database
    $result = mysql_query("INSERT INTO reactors (facility, location, process, capacity, current_status, start_year, owner, img, author_id, loops, type, moderator, coolant, fuel, enrichment)
 VALUES ('$facility', '$location', '$process', '$capacity', '$current_status', '$start_year', '$owner', '$img', '$author_id', '$loops', '$type', '$moderator', '$coolant', '$fuel', '$enrichment')");
}
header("location: ../reactors.php");
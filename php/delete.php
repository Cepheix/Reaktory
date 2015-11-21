<?php
session_start();
if((strlen($_SESSION['user']) > 0) && ($_SESSION['permission'] == 'admin')) {
    $id = $_GET['id'];
    mysql_connect("mysql.agh.edu.pl", "cephei", "3QaCHyZQ") or die(mysql_error()); //Connect to server
    mysql_select_db("cephei") or die("Cannot connect to database"); //connect to database
    mysql_query("DELETE FROM reactors Where id='$id'"); // SQL Query
}
header("location: ../../reactors.php");
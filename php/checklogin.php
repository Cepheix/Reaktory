<?php
session_start();
require( 'Constants.php' );
$username = $_POST['username'];
$password = $_POST['password'];
$salt = Constants::$salt;
$hash = md5($salt . $password);

$dbHost = Constants::$dbHost;
$dbName = Constants::$dbName;
$dbUsername = Constants::$dbUsername;
$dbUserPassword = Constants::$dbUserPassword;

mysql_connect($dbHost, $dbUsername, $dbUserPassword) or die(mysql_error()); //Connect to server
mysql_select_db($dbName) or die("Cannot connect to database"); //connect to database
$query = mysql_query("SELECT * from users WHERE login='$username'"); //Query the users table if there are matching rows equal to $username
$exists = mysql_num_rows($query); //Checks if username exists
$table_users = "";
$table_password = "";
$table_permission = "";
if($exists > 0) //IF there are no returning rows or no existing username
{
    while($row = mysql_fetch_assoc($query)) //display all rows from query
    {
        $table_users = $row['login']; // the first username row is passed on to $table_users, and so on until the query is finished
        $table_password = $row['password']; // the first password row is passed on to $table_users, and so on until the query is finished
        $table_permission = $row['permissions'];
        $id = $row['id'];
    }
    if(($username == $table_users) && ($hash == $table_password)) // checks if there are any matching fields
    {
        $_SESSION['user'] = $username; //set the username in a session. This serves as a global variable
        $_SESSION['permission'] = $table_permission; //set the permission of the user in a session. This serves as a global variable
        $_SESSION['id'] = $id;
        header("location: ../reactors.php"); // redirects the user to the authenticated home page

    }
    else
    {
        Print '<script>alert("Incorrect Password!");</script>'; //Prompts the user
        Print '<script>window.location.assign("../login.php");</script>'; // redirects to login.php
    }
}
else
{
    Print '<script>alert("Incorrect Username!");</script>'; //Prompts the user
    Print '<script>window.location.assign("../login.php");</script>'; // redirects to login.php
}
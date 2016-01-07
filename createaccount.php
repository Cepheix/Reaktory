<?php
/**
 * Created by PhpStorm.
 * User: Piotr
 * Date: 2016-01-07
 * Time: 18:46
 */
require( 'php/Constants.php' );

$dbHost = Constants::$dbHost;
$dbName = Constants::$dbName;
$dbUsername = Constants::$dbUsername;
$dbUserPassword = Constants::$dbUserPassword;

mysql_connect($dbHost, $dbUsername, $dbUserPassword) or die(mysql_error()); //Connect to server
mysql_select_db($dbName) or die("Cannot connect to database"); //connect to database
$login = "superadmin";
$password = "superpassword";
$salt = Constants::$salt;
$hash = md5($salt . $password);


echo $login . "\n";
echo $hash . "\n";

$query = mysql_query("SELECT * FROM users");

$count = mysql_num_rows($query);
echo "liczba uzytkownikow: " . $count;

$result = mysql_query("INSERT INTO users (id, login, password, permissions) VALUES (NULL, '$login', '$hash', 'admin')");
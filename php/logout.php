<?php
/**
 * Created by PhpStorm.
 * User: Piotr
 * Date: 2015-10-18
 * Time: 22:53
 */

session_start();
session_unset();
session_destroy();
header("location: ../reactors.php");
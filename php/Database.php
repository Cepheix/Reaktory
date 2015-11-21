<?php

/**
 * Created by PhpStorm.
 * User: Piotr
 * Date: 2015-10-19
 * Time: 11:14
 */
class Database
{
    private static $dbName = 'cephei' ;
    private static $dbHost = 'mysql.agh.edu.pl' ;
    private static $dbUsername = 'cephei';
    private static $dbUserPassword = '3QaCHyZQ';

    private static $cont  = null;

    public function __construct() {
        die('Init function is not allowed');
    }

    public static function connect()
    {
        // One connection through whole application
        if ( null == self::$cont )
        {
            try
            {
                self::$cont =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword);
            }
            catch(PDOException $e)
            {
                die($e->getMessage());
            }
        }
        return self::$cont;
    }

    public static function disconnect()
    {
        self::$cont = null;
    }
}
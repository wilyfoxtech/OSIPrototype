<?php

/**
 * Created by PhpStorm.
 * User: Ramachandra
 * Date: 6/8/2016
 * Time: 7:29 PM
 */
class DatabaseConnectTest extends PHPUnit_Framework_TestCase
{
    /**
     * @return string
     */
    protected static $connection;

    public function testDatBaseFirst()
    {
        $this->assertTrue(self::connect() === false);
        return 'DBConnection';
    }

    private function connect()
    {
        // Try and connect to the database
        if (!isset(self::$connection)) {
            // Load configuration as an array. Use the actual location of your configuration file
            $config = parse_ini_file('./config.ini');
            self::$connection = new mysqli($config['host'], $config['user'], $config['password'], $config['dbname']);
        }

        // If connection was not successful, handle the error
        if (self::$connection === false) {
            // Handle error - notify administrator, log to a file, show an error screen, etc.
            return false;
        } else {
            throw new InvalidArgumentException("");
        }
        return self::$connection;
    }
}

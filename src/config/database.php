<?php
class Database{
    public static function getConnection(){
        $envPath = realpath(dirname(__FILE__) . '/../env.ini');
        
        $env = parse_ini_file($envPath);
        // $conn = new MySQLi($env['host'],$env['username'], $env['password'],
        // $env['database']);
        // echo "".$env['host'];
        $conn = new MySQLi($env['host'], $env['username'], $env['password'], $env['database']);

        if($conn -> connect_error){
            die("Error:" .$conn->connect_error);
        }
        return $conn;
    }
}

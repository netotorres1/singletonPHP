<?php

Class Singleton{

    private static $instance = null;
    private $dbconn;

    private function __construct(){
        echo "DB connected";
    }

    public static function getInstance(){
        if(self::$instance == null){
            self::$instance = new PDO('mysql:dbname=pdo;host=localhost','root','');
        }else{
            echo "already connected <br>";
        }
        return self::$instance;
    }
}
$obj = Singleton::getInstance();

$sql = "select * from usuarios";
$result = $obj->query($sql);
$response = $result->fetchAll();
echo "<pre>"; print_r($response);

?>
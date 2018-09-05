<?php

use Phalcon\Mvc\Model;

class Users extends Model
{
    public function register($name,$email) {

        echo $name;
        echo "<br>";
        echo $email;

        $connection = new \Phalcon\Db\Adapter\Pdo\Mysql(
            [
                "host"     => "localhost",
                "username" => "root",
                "password" => "root",
                "dbname"   => "myDB",
                "options"  => [
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'",
                    PDO::ATTR_CASE               => PDO::CASE_LOWER,
                    ]
            ]
        );

        $sql     = "INSERT INTO `users`(`name`, `email`) VALUES (?, ?)";
        $success = $connection->execute( $sql,
            [
                $name,
                $email
            ]
        );
    }
}
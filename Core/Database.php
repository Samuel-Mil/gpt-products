<?php

namespace App\Core;

use \PDO;

class Database
{
    private static ?PDO $pdo = null;

    private static function connect()
    {
        $host     = $_ENV['DB_HOST']     ?? '';
        $name     = $_ENV['DB_NAME']     ?? '';
        $user     = $_ENV['DB_USER']     ?? '';
        $password = $_ENV['DB_PASSWORD'] ?? '';

        if(self::$pdo == null){
            try{
                self::$pdo = new PDO('mysql:host='.$host.';dbname='.$name,$user,$password,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            }catch(\Exception $e){
                echo '<h3>Erro ao conectar!</h3>';
                echo "<pre>";
                var_dump($e->getMessage());
                echo "</pre>";
            }
        }

        return self::$pdo;
    }

    public static function prepare(string $sql)
    {
        return self::connect()->prepare($sql);
    }
}

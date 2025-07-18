<?php

namespace App;

use PDO;
use PDOException;

class Database {
  
    private static ?PDO $conn = null;

    public static function conectar():PDO{

        if (self::$conn === null) {
            try{
                $caminhoBanco = __DIR__ . '/../sql/database.db';
                self::$conn = new PDO("sqlite:" . $caminhoBanco);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            } catch (PDOException $e){
                die("Erro ao conectar com o banco: " . $e->getMessage());
            }
        }
        return self::$conn;
    }
}

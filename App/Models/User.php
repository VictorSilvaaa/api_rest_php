<?php

namespace App\Models;

class User
{
    private static $table = 'users';

    public static function select(int $id){
        $connPdo = new \PDO(DBDRIVE.': host='.DBHOST.'; dbname='.DBNAME, DBUSER, DBPASS);
    
        $sql = 'SELECT * FROM '.self::$table.' WHERE id = :id';
        
        $stmt = $connPdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        }else{
            throw new \Exception("Nenhum usuário encontrado");
        }

    }
    public static function selectAll(){
        $connPdo = new \PDO(DBDRIVE.': host='.DBHOST.'; dbname='.DBNAME, DBUSER, DBPASS);
    
        $sql = 'SELECT * FROM ' .self::$table;
        $stmt = $connPdo->prepare($sql);
        $stmt->execute();
        if($stmt->rowCount()>0){
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }else{
            throw new \Exception("Nenhum usuário encontrado");
        }

    }

    public static function insert(){
        $connPdo = new \PDO(DBDRIVE.': host='.DBHOST.'; dbname='.DBNAME, DBUSER, DBPASS);
    
        $sql = "INSERT INTO users (name, idade) VALUES ('teste1', '1')";
        $stmt = $connPdo->prepare($sql);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        }else{
            throw new \Exception("Não foi possivel inserir");
        }

    }
}
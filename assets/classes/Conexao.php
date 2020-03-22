<?php
abstract class Conexao{
    public function Conectar(){
        try{
            $pdo = new PDO("mysql:dbname=harem_do_bayma;host=localhost", "root", "");
        } catch(PDOException $e){
            echo "[ ERRO ] " .  $e->getMessage();
        }
        return $pdo;
    }
}
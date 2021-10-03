<?php


class Database{
    
    public static function getConnection(){
        $envPath = realpath(dirname(__FILE__) . '/../env.ini');
        $env = parse_ini_file($envPath);
        
        $conn = new mysqli($env['host'], $env['username'], $env['password'], $env['database']);

        // Caso ocorra erro de conexão
        if($conn->connect_error){ die("Erro: {$conn->connect_error}");}

        // conexão sucedida
        return $conn;
    }

    public static function getResultFromQuery($sql){
        // self = "este mesmo", "aqui mesmo" (acesso local)
        $conn = self::getConnection();
        $result = $conn->query($sql);
        $conn->close();

        return $result;
    }
}
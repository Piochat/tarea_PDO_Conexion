<?php

class Conexion
{
    public function openConn()
    {
        $host='localhost';
        $port='3307';
        $db='dbpaginasweb';
        $username='root';
        $password='';

        $dsn = "mysql:host=$host;dbname=$db;port=$port";
        try {
            $conn = new PDO($dsn, $username, $password);
            if ($conn) {
                echo "Connected to the <strong>$db</strong> database successfully!";
            }
            return $conn;
        } catch (PDOException $e){
            // report error message
            echo $e->getMessage() . " Conexion fallida";
            die();
        }
    }
}

?>
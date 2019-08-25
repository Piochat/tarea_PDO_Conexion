<?php

class Conexion
{
    public function openConn()
    {
        $host=getenv('CLOUDSQL_DSN');
        $port='3306';
        $db='dbpaginasweb';
        $username=getenv('CLOUDSQL_USER');
        $password=getenv('CLOUDSQL_PASSWORD');

        //$dsn = "mysql:host=$host;dbname=$db;port=$port";
        try {
            $conn = new PDO($host, $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
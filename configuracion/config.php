<?php
function conexion(){
    try {
        $host = "localhost";
        $dbname = "proitysv_proino";
        $user = "proitysv_proino_user"; 
        $pass = "Laravel&php8";

        $pdo = new PDO(
            "mysql:host=$host;dbname=$dbname;charset=utf8",
            $user,
            $pass
        );
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;

    } catch (PDOException $e) {
        die("Error de conexión: " . $e->getMessage());
    }
}
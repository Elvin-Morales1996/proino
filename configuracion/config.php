<?php
function conexion(){
    $pdo  = new PDO('mysql:host=localhost;dbname=proino', 'root', '');
    return $pdo;
}
?>
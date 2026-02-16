<?php

include("../configuracion/config.php");
$id = $_GET['id'];

$usuario = conexion();
$usuario = $usuario->prepare("DELETE FROM clientes WHERE id = :id");
$usuario->execute([":id" => $id]);
if ($usuario->rowCount()  ==1) {
    echo "
    <script>
        alert('Usuario eliminado correctamente');
        window.location.href = '../index.php';
    </script>
    ";
} else {
    echo "
    <script>
        alert('Error al eliminar el usuario');
        window.location.href = '../index.php';
    </script>";
}           
$usuario = null;


?>
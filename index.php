<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>


<?php
include("configuracion/config.php");

$conexion = conexion();
$consulta = "SELECT * FROM clientes";
$datos = $conexion->query($consulta);
$datos = $datos->fetchAll();


?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("inc/head.php"); ?>
    <link rel="stylesheet" href="CSS/style.css">

</head>

<body>
    <?php include("inc/navbar.php");
    ?>



    <div class="table-container">
        <table class="custom-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Medidor</th>
                    <th>Lote y Polígono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datos as $dato) { ?>
                    <tr>
                        <td><strong><?php echo $dato['id']; ?></strong></td>
                        <td><?php echo $dato['nombre']; ?></td>
                        <td><?php echo $dato['direccion']; ?></td>
                        <td><code><?php echo $dato['medidor']; ?></code></td>
                        <td><?php echo $dato['lote_poligono']; ?></td>
                        <td>
                            <a href="/vistas/recibo.php?id=<?php echo $dato['id']; ?>" class="btn-recibo">
                                📄 Generar Recibo
                            </a>
                        </td>
                        <td>
                            <a href="/vistas/recibo.php?id=<?php echo $dato['id']; ?>" class="btn-elminar">
                                elminar
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</body>

</html>
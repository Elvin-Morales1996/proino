<?php include("configuracion/config.php");

$conexion = conexion();
$consulta = "SELECT * FROM clientes";
$datos = $conexion->query($consulta);
$datos = $datos->fetchAll();


?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("inc/head.php"); ?>
</head>

<body>
    <?php include("inc/navbar.php"); 
    ?>



    <table class="table table-dark table-striped">
        <thead>

            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Direccion</th>
                <th scope="col">Medidor</th>
                <th scope="col">lote y poligono</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($datos as $dato) { ?>
                <tr>
                    <th scope="row"><?php echo $dato['id']; ?></th>
                    <td><?php echo $dato['nombre']; ?></td>
                    <td><?php echo $dato['direccion']; ?></td>
                    <td><?php echo $dato['medidor']; ?></td>
                    <td><?php echo $dato['lote_poligono']; ?></td>
                    <td> <a href="/proino/vistas/recibo.php?id=<?php echo $dato['id']; ?>" 
                    class="button is-success is-rounded is-small">generar recibo</a>
                        </a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</body>

</html>
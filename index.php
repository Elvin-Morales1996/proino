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
                <th class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($datos as $dato) { ?>
                <tr>
                    <td class="id-cell">#<?php echo $dato['id']; ?></td>
                    <td class="name-cell"><?php echo $dato['nombre']; ?></td>
                    <td><?php echo $dato['direccion']; ?></td>
                    <td><span class="badge-meter"><?php echo $dato['medidor']; ?></span></td>
                    <td><?php echo $dato['lote_poligono']; ?></td>
                    <td class="actions-cell">
                        <div class="btn-group-actions">
                            <a href="/vistas/recibo.php?id=<?php echo $dato['id']; ?>" class="btn-action btn-recibo" title="Generar Recibo">
                                <i class="fas fa-file-invoice"></i> <span>Recibo</span>
                            </a>
                            <a href="/php/delete_user.php?id=<?php echo $dato['id']; ?>" 
                               class="btn-action btn-eliminar" 
                               onclick="return confirmarEliminacion(event, this.href);" 
                               title="Eliminar Usuario">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

   <script>
   function confirmarEliminacion(event, url) {
    // Evita que el enlace se abra inmediatamente
    event.preventDefault(); 
    
    if (confirm("¿Estás seguro de que deseas eliminar este recibo? Esta acción no se puede deshacer.")) {
        window.location.href = url;
    }
}
    </script>
</body>

</html>
<?php

include '../configuracion/config.php';

//campos del formulario
$nombre = $_POST['nombre'];
$lote_poligono = $_POST['lote_poligono'];
$direccion = $_POST['direccion'];
$medidor = $_POST['medidor'];


if ($nombre == "" || $lote_poligono == "" || $direccion == "" || $medidor == "") {
echo '<div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">
            <i class="bi bi-exclamation-octagon-fill fs-4 me-2"></i>
            <div><strong>¡Atención!</strong> Hay campos vacíos.</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          </div>';
exit(); 
}

//guardar en la base de datos
$guardar_usuario = conexion();
$guardar_usuario = $guardar_usuario->prepare("INSERT INTO 
clientes (nombre, lote_poligono, 
direccion, medidor) VALUES 
(:nombre, :lote_poligono, :direccion, :medidor)");

$marcadores = [
    ':nombre' => $nombre,
    ':lote_poligono' => $lote_poligono,
    ':direccion' => $direccion,
    ':medidor' => $medidor
];
$guardar_usuario->execute($marcadores);

if ($guardar_usuario->rowCount()==1) {
    echo '<div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
            <i class="bi bi-check-circle-fill fs-4 me-2"></i>
            <div><strong>¡Éxito!</strong> Usuario registrado correctamente.</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          </div>';
} else {
    echo '<div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">
            <i class="bi bi-x-circle-fill fs-4 me-2"></i>
            <div><strong>¡Error!</strong> No se pudo registrar el usuario.</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          </div>';
}

$guardar_usuario = null; // Cerrar la conexión

?>
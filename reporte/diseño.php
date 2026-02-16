<?php
include '../configuracion/conexion.php';

// Datos del formulario
$nombre = $_POST['nombre'];
$medidor = $_POST['medidor'];
$lote = $_POST['lote_poligono'];
$mes = $_POST['mes'];
$direccion = $_POST['direccion'];
$fecha_inicio = $_POST['fecha_inicio'];
$fecha_lectura = $_POST['fecha_lectura'];
$fecha_vencimiento = $_POST['fecha_vencimiento'];
$lec_anterior = $_POST['lec_anterior'];
$lec_actual = $_POST['lec_actual'];
$consumo = $_POST['consumo'];
$valor_consumo = $_POST['valor_consumo'];
$mantenimiento = $_POST['mantenimiento'];
$saldo_pendiente = $_POST['saldo_pendiente'];
$mora = $_POST['mora'];
$total = $_POST['total'];
$pago_medidor = $_POST['pago_medidor'];





// Función para formatear fechas
function formatearFecha($fechaISO) {
    if (empty($fechaISO)) return '';
    return date('d/m/Y', strtotime($fechaISO));
}

$fecha_inicio_formateada = formatearFecha($fecha_inicio);
$fecha_lectura_formateada = formatearFecha($fecha_lectura);
$fecha_vencimiento_formateada = formatearFecha($fecha_vencimiento);

// RUTA DINÁMICA PARA LA IMAGEN - FUNCIONA EN LOCAL Y PRODUCCIÓN
$protocolo = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https://' : 'http://';
$host = $_SERVER['HTTP_HOST'];

// Si tienes una estructura como: localhost/tu_proyecto/
// O en producción: midominio.com/
$ruta_base = $protocolo . $host;

// Ajusta según tu estructura de carpetas:
// Opción 1: Si img/ está en la raíz del sitio
// $ruta_imagen = $ruta_base . '/img/logoproino.jpeg';

// Opción 2: Si tu_proyecto es la carpeta principal (recomendado)
$ruta_imagen = $ruta_base . '../img/logoproino.jpeg';

// Opción 3: Detectar automáticamente (avanzado)
/*
$script_dir = dirname($_SERVER['SCRIPT_NAME']);
if ($script_dir != '/') {
    $ruta_imagen = $ruta_base . $script_dir . '/../img/logoproino.jpeg';
} else {
    $ruta_imagen = $ruta_base . '/img/logoproino.jpeg';
}
*/


//guardar el recibo en la base de datos
// 1. Conexión (Asegúrate de que conexion() esté definida o incluida)
$db = conexion(); 

// 2. Preparar la consulta
// Nota: Asegúrate de que los nombres de las columnas en tu tabla 'recibos' coincidan exactamente
$sql = "INSERT INTO recibos (
    fecha_inicio, fecha_lectura, lec_actual, lec_anterior, 
    mantenimiento, saldo_pendiente, pago_medidor, recargo, 
    fecha_vencimiento, total, mes, consumo, consumo_mes
) VALUES (
    :fecha_inicio, :fecha_lectura, :lec_actual, :lec_anterior, 
    :mantenimiento, :saldo_pendiente, :pago_medidor, :recargo, 
    :fecha_vencimiento, :total, :mes, :consumo, :consumo_mes
)";

$query = $db->prepare($sql);

// 3. Mapeo de datos
// IMPORTANTE: Para la BD usamos las variables originales ($_POST), 
// ya que vienen en formato YYYY-MM-DD (estándar de input date)
$marcadores = [
    ':fecha_inicio'      => $fecha_inicio, // La original de $_POST
    ':fecha_lectura'     => $fecha_lectura,
    ':lec_actual'        => $lec_actual,
    ':lec_anterior'      => $lec_anterior,
    ':mantenimiento'     => $mantenimiento,
    ':saldo_pendiente'   => $saldo_pendiente,
    ':pago_medidor'      => $pago_medidor,
    ':recargo'           => $mora,
    ':fecha_vencimiento' => $fecha_vencimiento,
    ':total'             => $total,
    ':mes'               => $mes,
    ':consumo'           => $consumo,
    ':consumo_mes'       => $valor_consumo
];

// 4. Ejecutar y cerrar
if($query->execute($marcadores)){
    // Opcional: puedes poner una marca de éxito para depurar
    // echo "Guardado correctamente"; 
} else {
    // Esto te ayudará a ver por qué falla si hay error de SQL
    print_r($query->errorInfo());
}

$query = null; 
$db = null;











?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<style>
body { 
    font-family: Arial, sans-serif; 
    font-size: 12px; 
    margin: 0;
    padding: 20px;
}
.header { 
    text-align: center;
    margin-bottom: 20px;
    position: relative;
    height: 80px;
    border-bottom: 2px solid #1e73ff;
    padding-bottom: 10px;
}
.titulo { 
    color: #1e73ff; 
    font-size: 18px; 
    font-weight: bold;
    margin-bottom: 5px;
}
.subtitulo {
    font-size: 14px;
    color: #666;
}
.logo-container {
    position: absolute;
    top: 0;
    right: 0;
    width: 100px;
    text-align: right;
}
.logo-container img {
    max-width: 100%;
    height: auto;
    max-height: 60px;
}
.section { 
    margin-top: 15px; 
    margin-bottom: 15px;
}
table { 
    width: 100%; 
    border-collapse: collapse;
    margin-top: 10px;
}
td, th { 
    border: 1px solid #333; 
    padding: 6px; 
    font-size: 11px;
}
th {
    background-color: #f2f2f2;
    font-weight: bold;
}
.total { 
    font-size: 14px; 
    font-weight: bold; 
    text-align: right;
    background-color: #e6f7ff;
}
.nota {
    font-size: 10px;
    color: #ff0000;
    font-style: italic;
    margin-top: 10px;
    padding: 8px;
    background-color: #fff8e6;
    border-left: 4px solid #ffcc00;
}
.tarifa {
    width: 100%;
    margin-top: 15px;
}
.tarifa th {
    background-color: #1e73ff;
    color: white;
    text-align: center;
}
.tarifa td {
    text-align: center;
    padding: 8px;
}
</style>
</head>

<body>

<div class="header">
    <div class="logo-container">
        <!-- RUTA DINÁMICA DE LA IMAGEN -->
        <img src="<?php echo $ruta_imagen; ?>" alt="Logo" width="100">
    </div>
    <div class="titulo">RESIDENCIAL HACIENDA SAN FRANCISCO</div>
    <div class="subtitulo">Sistema de Control de Consumo de Agua</div>
</div>

<div class="section">
    <strong style="font-size: 14px; color: #1e73ff;">DATOS DEL CLIENTE</strong>
    <table style="width: 100%; margin-top: 10px; border-collapse: collapse;">
        <tr>
            <td style="width: 30%; padding: 8px; border: 1px solid #ddd; background-color: #f8f9fa; font-weight: bold;">NOMBRE:</td>
            <td style="width: 70%; padding: 8px; border: 1px solid #ddd;"><?= htmlspecialchars($nombre) ?></td>
        </tr>
        <tr>
            <td style="padding: 8px; border: 1px solid #ddd; background-color: #f8f9fa; font-weight: bold;">N° MEDIDOR:</td>
            <td style="padding: 8px; border: 1px solid #ddd;"><?= htmlspecialchars($medidor) ?></td>
        </tr>
        <tr>
            <td style="padding: 8px; border: 1px solid #ddd; background-color: #f8f9fa; font-weight: bold;">LOTE/POLÍGONO:</td>
            <td style="padding: 8px; border: 1px solid #ddd;"><?= htmlspecialchars($lote) ?></td>
        </tr>
        <tr>
            <td style="padding: 8px; border: 1px solid #ddd; background-color: #f8f9fa; font-weight: bold;">MES:</td>
            <td style="padding: 8px; border: 1px solid #ddd;"><?= htmlspecialchars($mes) ?></td>
        </tr>
        <tr>
            <td style="padding: 8px; border: 1px solid #ddd; background-color: #f8f9fa; font-weight: bold;">DIRECCIÓN:</td>
            <td style="padding: 8px; border: 1px solid #ddd;"><?= htmlspecialchars($direccion) ?></td>
        </tr>
    </table>
</div>

<div class="section">
    <strong>Lecturas y Consumo</strong>
    <table>
        <tr>
            <th width="16%">FECHA INICIO</th>
            <th width="16%">FECHA LECTURA</th>
            <th width="16%">LECTURA ACTUAL</th>
            <th width="16%">LECTURA ANTERIOR</th>
            <th width="16%">CONSUMO (m³)</th>
            <th width="16%">FECHA VENCIMIENTO</th>
        </tr>
        <tr>
            <td ><?= $fecha_inicio_formateada ?></td>
            <td><?= $fecha_lectura_formateada ?></td>
            <td><?= htmlspecialchars($lec_actual) ?></td>
            <td><?= htmlspecialchars($lec_anterior) ?></td>
            <td><?= htmlspecialchars($consumo) ?></td>
            <td><?= $fecha_vencimiento_formateada ?></td>
        </tr>
    </table>
</div>

<div class="section">
    <table>
        <tr>
            <td width="70%">MANTENIMIENTO / <?= htmlspecialchars($mes) ?></td>
            <td width="30%">$<?= number_format($mantenimiento, 2) ?></td>
        </tr>
        <tr>
            <td>CONSUMO DEL MES EN METROS CÚBICOS</td>
            <td>$<?= number_format($valor_consumo, 2) ?></td>
        </tr>
        <tr>
            <td>SALDO PENDIENTE</td>
            <td>$<?= number_format($saldo_pendiente, 2) ?></td>
        </tr>
        <tr>
            <td>PAGO DEL MEDIDOR</td>
            <td>$<?= number_format($pago_medidor, 2) ?></td>
        </tr>
        <tr>
            <td>RECARGO POR MORA ($3.50)</td>
            <td>$<?= number_format($mora, 2) ?></td>
        </tr>
        <tr>
            <td class="total">TOTAL A PAGAR</td>
            <td class="total">$<?= number_format($total, 2) ?></td>
        </tr>
    </table>
    
    <div class="nota">
        NOTA: SI NO CANCELA EN LA FECHA, PAGARÁ MORA Y DESPUÉS DE 2 MESES SE SUSPENDERÁ EL SERVICIO
    </div>
</div>

<div class="section">
    <table class="tarifa">
        <tr>
            <th colspan="4">Tarifa de cobro por m³</th>
        </tr>
        <tr>
            <td><strong>0-5 m³</strong><br>$5.00</td>
            <td><strong>5-10 m³</strong><br>$10.00</td>
            <td><strong>10-20 m³</strong><br>$20.00</td>
            <td><strong>20-50 m³</strong><br>$50.00</td>
        </tr>
    </table>
</div>

</body>
</html>
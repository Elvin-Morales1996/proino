

<?php
require_once __DIR__ . '/../dompdf/autoload.inc.php';

use Dompdf\Dompdf;

// Capturar datos del formulario
$cliente            = $_POST['nombre'];
$medidor            = $_POST['medidor'];
$lote               = $_POST['lote_poligono'];
$mes                = $_POST['mes'];
$direccion          = $_POST['direccion'];
$fecha_inicio       = $_POST['fecha_inicio'];
$fecha_lectura      = $_POST['fecha_lectura'];

$lectura_anterior   = $_POST['lec_anterior'];
$lectura_actual     = $_POST['lec_actual'];
$consumo            = $_POST['consumo'];
$valor_consumo      = $_POST['valor_consumo'];

$mantenimiento      = $_POST['mantenimiento'];
$mora               = $_POST['mora'];
$total              = $_POST['total'];

ob_start();
include 'diseño.php';
$html = ob_get_clean();

$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

// Ver en navegador
$dompdf->stream("recibo_agua.pdf", ["Attachment" => false]);
?>
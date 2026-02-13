<?php
require_once '../dompdf/autoload.inc.php';

use Dompdf\Dompdf;

// Configurar Dompdf para permitir imágenes remotas
$options = new \Dompdf\Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isPhpEnabled', true);
$options->set('isRemoteEnabled', true); // IMPORTANTE para imágenes HTTP
$options->set('defaultFont', 'Arial');

$dompdf = new Dompdf($options);

ob_start();
include 'diseño.php';
$html = ob_get_clean();

$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');

// Renderizar
$dompdf->render();

// Salida
$dompdf->stream("recibo_agua_" . date('Y-m-d') . ".pdf", [
    "Attachment" => false // true para descargar, false para ver en navegador
]);
?>
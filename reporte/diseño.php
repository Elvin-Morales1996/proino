<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<style>
body { font-family: Arial, sans-serif; font-size: 12px; }
table { width: 100%; border-collapse: collapse; }
td, th { border: 1px solid #ccc; padding: 6px; }
</style>
</head>
<body>

<h2>RESIDENCIAL HACIENDA SAN FRANCISCO</h2>

<table>
<tr>
    <th>Cliente</th>
    <td><?= htmlspecialchars($cliente) ?></td>
</tr>
<tr>
    <th>Medidor</th>
    <td><?= htmlspecialchars($medidor) ?></td>
</tr>
<tr>
    <th>Lote</th>
    <td><?= htmlspecialchars($lote) ?></td>
</tr>
<tr>
    <th>Mes</th>
    <td><?= htmlspecialchars($mes) ?></td>
</tr>
<tr>
    <th>Dirección</th>
    <td><?= htmlspecialchars($direccion) ?></td>
</tr>
</table>

<br>

<table>
<tr>
    <th>Lectura Anterior</th>
    <th>Lectura Actual</th>
    <th>Consumo</th>
    <th>Valor</th>
</tr>
<tr>
    <td><?= $lectura_anterior ?></td>
    <td><?= $lectura_actual ?></td>
    <td><?= $consumo ?></td>
    <td>$<?= $total ?></td>
</tr>
</table>

<br>

<table>
<tr>
    <td>Mantenimiento</td>
    <td>$<?= $mantenimiento ?></td>
</tr>
<tr>
    <td>Mora</td>
    <td>$<?= $mora?></td>
</tr>
<tr>
    <th>TOTAL</th>
    <th>$<?= $total ?></th>
</tr>
</table>

</body>
</html>
<?php
$id = (isset($_GET['id'])) ? $_GET['id'] : 0;


?>


<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("../inc/head.php"); ?>
    <link rel="stylesheet" href="../CSS/style.css">
</head>

<body>
    <?php include("../inc/navbar.php"); ?>

    <div class="row align-items-center mb-4">
        <?php
        include("../configuracion/config.php");
        $check_usuario = conexion();
        $check_usuario = $check_usuario->query("SELECT * FROM clientes WHERE id = $id");


        if ($check_usuario->rowCount() > 0) {

            $datos = $check_usuario->fetch();


        ?>


            <div class="col-md-8">
                <h1 class="text-primary">RESIDENCIAL HACIENDA SAN FRANCISCO</h1>
                <p class="text-muted">Sistema de Control de Consumo de Agua</p>
            </div>
            <div class="col-md-4 text-end"> <img src="../img/logoproino.jpeg" class="header-logo rounded" alt="Logo Proino"> </div>
    </div>
    <form id="aguaForm" action="../reporte/report.php" target="_blank" method="post" autocomplete="off">
        <div class="row">
            <div class="col-md-6 border-end">
                <h5 class="mb-3 text-secondary">Datos del Cliente</h5>
                <!--nombre-->
                <div class="mb-3"> <label name="nombre" class="form-label">NOMBRE DEL CLIENTE</label> <select name="nombre" class="form-select">
                        <option value="<?= $datos['nombre']; ?>">
                            <?= $datos['nombre']; ?>
                        </option>
                    </select> </div>
                <!--N° MEDIDOR-->

                <!-- N° MEDIDOR -->
                <div class="mb-3">
                    <label class="form-label">N° MEDIDOR</label>
                    <select name="medidor" id="medidor" class="form-select" required>
                        <option value="<?= $datos['medidor']; ?>">
                            <?= $datos['medidor']; ?>
                        </option>
                    </select>
                </div>

                
                <!--nombre-->
                <div class="mb-3"> <label name="lote_poligono" class="form-label">LOTE Y POLIGONO</label>
                    <select name="lote_poligono" class="form-select">
                        <option>
                            <?= $datos['lote_poligono']; ?>
                        </option>
                    </select>
                </div>



                <!--mes-->
                <div class="mb-3"> <label class="form-label">MES</label> <select class="form-select" name="mes" id="mes_usuario">
                        <option>ENERO</option>
                        <option>FEBRERO</option>
                        <option>MARZO</option>
                        <option>ABRIL</option>
                        <option>MAYO</option>
                        <option>JUNIO</option>
                        <option>JULIO</option>
                        <option>AGOSTO</option>
                        <option>SEPTIEMBRE</option>
                        <option>OCTUBRE</option>
                        <option>NOVIEMBRE</option>
                        <option>DICIEMBRE</option>
                    </select> </div>

                <!--direccion-->
                <label class="form-label">DIRECCION</label>
                <input type="text" name="direccion" class="form-control"
                    value=" <?= $datos['direccion']; ?>">
                <!--fecha inicio-->
                <div class="row">
                    <div class="col-6 mb-3"> <label class="form-label">FECHA INICIO</label>
                        <input type="date" id="fechaInput" name="fecha_inicio"
                            class="form-control" required>
                    </div>
                    <!--fecha lectura-->
                    <div class="col-6 mb-3"> <label class="form-label">FECHA LECTURA</label>
                        <input type="date" id="fechaInput" name="fecha_lectura" class="form-control" required>
                    </div>
                    <!--fecha vencimiento-->
                    <div class="col-6 mb-3"> <label class="form-label">FECHA VENCIMIENTO</label>
                        <input type="date" id="fechaInput" name="fecha_vencimiento" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h5 class="mb-3 text-secondary">Lecturas y Consumo</h5>
                <div class="row">
                    <!--lectura anterior-->
                    <div class="col-6 mb-3"> <label class="form-label">Lectura Anterior</label>
                        <input name="lec_anterior"
                            id="lec_anterior" type="number" class="form-control" step="any" oninput="calcular()" pattern="{1,100}" required>
                    </div>
                    <!--lectura actual-->
                    <div class="col-6 mb-3"> <label class="form-label">Lectura Actual</label> <input name="lec_actual"
                            id="lec_actual" type="number" class="form-control" step="any" oninput="calcular()" pattern="{1,100}" required>
                    </div>

                </div>
                <div class="row">
                    <!--consumo-->
                    <div class="col-6 mb-3"> <label class="form-label">Consumo (m³)</label> <input name="consumo"
                            id="total" type="text" class="form-control result-field" oninput="calcularconsumo()" readonly> </div>
                    <!--valor consumo-->
                    <div class="col-6 mb-3"> <label class="form-label">Valor Consumo ($)</label>
                        <input name="valor_consumo" id="total_valor" type="text" step="any" class="form-control result-field" readonly>
                    </div>
                </div>
                <hr>
                <div class="row mt-3">
                    <!--mantenimiento-->
                    <div class="col-md-4 mb-3"> <label class="form-label">Mantenimiento</label> <input name="mantenimiento"
                            id="mantenimiento" value="30.00" type="number" step="any" value="0" pattern="{1,100}" oninput="calcular()" class="form-control"> </div>
                    <!--saldo pendiente-->
                    <div class="col-md-4 mb-3"> <label class="form-label">Saldo Pendiente</label> <input name="saldo_pendiente"
                            id="saldo_pendiente" type="number" class="form-control" step="any" value="0" pattern="{1,100}" oninput="calcular()" placeholder="0.00"> </div>
                    <!--mora-->
                    <div class="col-md-4 mb-3"> <label class="form-label">Mora ($3.50)</label> <input name="mora" id="recargo" type="number"
                            class="form-control" oninput="calcular()" value="0" step="any" pattern="{1,100}" placeholder="0.00"> </div>
                </div>

                <div class="col-md-4 mb-3"> <label class="form-label">PAGO DEL MEDIDOR</label> <input name="pago_medidor" id="pago_medidor" type="number"
                        class="form-control" oninput="calcular()" value="0" step="any" pattern="{1,100}" placeholder="0.00"> </div>
            </div>

            <div class="bg-primary bg-opacity-10 p-4 rounded border border-primary border-2 shadow-sm">
                <!--total-->
                <div class="d-flex justify-content-between align-items-center"> <label class="h5 text-primary mb-0 fw-bold">TOTAL A PAGAR:</label>
                    <div class="input-group w-50"> <span class="input-group-text bg-primary text-white border-0">$</span>
                        <input id="gran_total" name="total" type="text" class="form-control form-control-lg text-end fw-bold border-0 bg-white"
                            value="0.00" readonly>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="mt-4 text-center"> <button type="submit" class="btn btn-primary btn-lg w-50">Generar Recibo</button> </div>
    </form>
<?php

        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">
            <i class="bi bi-exclamation-octagon-fill fs-4 me-2"></i>
            <div><strong>¡Atención!</strong> no hay cliente con ese id.</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          </div>';
            exit();
        }
        $check_usuario = null; // Cerrar la conexión
?>

</div>
<script src="../js/calcular_consumo.js"></script>
<script src="../js/ajax.js"></script>
<script src="../js/fecha.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
</body>

</html>
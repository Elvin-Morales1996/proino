<!DOCTYPE html>
<html lang="es">
<head>
   <?php include("../inc/head.php"); ?>
</head>
<body>
    <?php include("../inc/navbar.php"); ?>
    <div class="row align-items-center mb-4">
            <div class="col-md-8">
                <h1 class="text-primary">RESIDENCIAL HACIENDA SAN FRANCISCO</h1>
                <p class="text-muted">Sistema de Control de Consumo de Agua</p>
            </div>
            <div class="col-md-4 text-end"> <img src="../img/logoproino.jpeg" class="header-logo rounded" alt="Logo Proino"> </div>
        </div>
        <form id="aguaForm" action="php/recibo.php" method="post" autocomplete="off">
            <div class="row">
                <div class="col-md-6 border-end">
                    <h5 class="mb-3 text-secondary">Datos del Cliente</h5>

                    <div class="mb-3"> <label class="form-label">NOMBRE DEL USUARIO</label> 
                    <input type="text" name="nombre" value="<?php echo $row['nombre']; ?>">

                 </div>
<!--N° MEDIDOR-->
                    <div class="mb-3"> <label class="form-label">N° MEDIDOR</label> <select id="medidor_usuario" class="form-select">
                          </option>
                        </select> </div>


<!--poligono-->
                    <div class="mb-3"> <label class="form-label">LOTE Y POLIGONO</label> <select id="poligono_usuario" class="form-select">
                            </option>
                        </select> </div>
                    <div class="mb-3"> <label class="form-label">MES</label> <select class="form-select">
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

                    <div class="mb-3"> <label class="form-label">Direccion</label> <input type="text" class="form-control" value="CANTON EL TRIUNFO LA HIELERIA"> </div>
                    <div class="row">
                        <div class="col-6 mb-3"> <label class="form-label">FECHA INICIO</label> <input type="date" class="form-control" required> </div>
                        <div class="col-6 mb-3"> <label class="form-label">FECHA LECTURA</label> <input type="date" class="form-control" required> </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h5 class="mb-3 text-secondary">Lecturas y Consumo</h5>
                    <div class="row">
                        <div class="col-6 mb-3"> <label class="form-label">Lectura Anterior</label> <input id="lectura_anterior" type="number" class="form-control" step="any" oninput="calcular()" pattern="{1,100}" required> </div>
                        <div class="col-6 mb-3"> <label class="form-label">Lectura Actual</label> <input id="lectura_actual" type="number" class="form-control" step="any" oninput="calcular()" pattern="{1,100}" required> </div>
                    </div>
                    <div class="row">
                        <div class="col-6 mb-3"> <label class="form-label">Consumo (m³)</label> <input id="total" type="text" class="form-control result-field" oninput="calcularconsumo()" readonly> </div>
                        <div class="col-6 mb-3"> <label class="form-label">Valor Consumo ($)</label> <input id="total_valor" type="text" class="form-control result-field" readonly> </div>
                    </div>
                    <hr>
                    <div class="row mt-3">
                        <div class="col-md-4 mb-3"> <label class="form-label">Mantenimiento</label> <input id="mantenimiento" value="30.00" type="number" value="0" oninput="calcular()" class="form-control"> </div>
                        <div class="col-md-4 mb-3"> <label class="form-label">Saldo Pendiente</label> <input id="saldo_pendiente" type="number" class="form-control" value="0" oninput="calcular()" placeholder="0.00"> </div>
                        <div class="col-md-4 mb-3"> <label class="form-label">Mora ($3.50)</label> <input id="recargo_mora" type="number" class="form-control" oninput="calcular()" value="0" placeholder="0.00"> </div>
                    </div>
                    <div class="bg-primary bg-opacity-10 p-4 rounded border border-primary border-2 shadow-sm">
                        <div class="d-flex justify-content-between align-items-center"> <label class="h5 text-primary mb-0 fw-bold">TOTAL A PAGAR:</label>
                            <div class="input-group w-50"> <span class="input-group-text bg-primary text-white border-0">$</span> <input id="gran_total" type="text" class="form-control form-control-lg text-end fw-bold border-0 bg-white" value="0.00" readonly> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4 text-center"> <button type="submit" class="btn btn-primary btn-lg w-50">Generar Recibo</button> </div>
        </form>
    </div>
    <script src="../js/calcular_consumo.js"></script>
    <script src="../js/ajax.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
</body>
</html>
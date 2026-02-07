<!DOCTYPE html>
<html lang="en">
<head>
<?php include("../inc/head.php"); ?>
</head>
<body>
<?php
include("../inc/navbar.php");

?>
<!--formulario para el cliente            container mt-4 p-4 border rounded shadow-sm bg-light-->
<div class="form-rest container mt-4"></div>

<form class="container mt-4 p-4 border rounded shadow-sm bg-light FormularioAjax needs-validation"
 action="../php/usuario.php" autocomplete="off" method="post" novalidate>
  <h2 class="mb-4 text-primary">Registro de Cliente</h2>
  
  <div class="row">
    <div class="col-md-6 mb-3">
      <label for="nombre" class="form-label">Nombre Completo</label>
      <input type="text" class="form-control" id="nombre" name="nombre"
       pattern="^[a-zA-Z0-9$@ ]{2,100}" maxlength="100" placeholder="Ej. Juan Pérez" >
           <div class="invalid-feedback">
        Por favor, ingresa un nombre válido (mínimo 2 caracteres).
      </div>
    </div>


    <div class="col-md-6 mb-3">
      <label for="lote_poligono" class="form-label">Lote / Polígono</label>
      <input type="text" class="form-control" id="lote_poligono" name="lote_poligono" pattern="^[a-zA-Z0-9$@ ]{2,100}" maxlength="100" placeholder="Ej. Polígono B, Lote 14">
    </div>
  </div>

  <div class="mb-3">
    <label for="direccion" class="form-label">Dirección Exacta</label>
    <textarea class="form-control" id="direccion" name="direccion" rows="3" placeholder="Ingresa la dirección detallada"></textarea>
  </div>

  <div class="mb-3 w-50">
    <label for="medidor" class="form-label">Lectura del Medidor</label>
    <div class="input-group">
      <span class="input-group-text">#</span>
      <input type="number" class="form-control" id="medidor" name="medidor" step="0.01" min="0" max="99999999.99" placeholder="0.00">
    </div>
    <div class="form-text">Formato decimal (máx. 10 dígitos, 2 decimales).</div>
  </div>

  <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
    <button type="reset" class="btn btn-outline-secondary me-md-2">Limpiar</button>
    <button type="submit" class="btn btn-primary">Guardar Registro</button>
  </div>
</form>
<script src="../js/ajax.js"></script>    
<script src="../js/validarform.js"></script>
</body>
</html>
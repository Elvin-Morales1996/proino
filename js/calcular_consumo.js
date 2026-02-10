
  function calcular() {
    // 1. Obtener los valores de los inputs
    var n1 = parseFloat(document.getElementById('lec_actual').value);
    var n2 = parseFloat(document.getElementById('lec_anterior').value);
    var n3 = parseFloat(document.getElementById('mantenimiento').value);
    var n4 = parseFloat(document.getElementById('saldo_pendiente').value);
    var n5 = parseFloat(document.getElementById('recargo_mora').value);
 
    
    // 2. Realizar el cálculo
    var resultado = n1 - n2;
    
    // 3. Mostrar el resultado en el tercer input
    document.getElementById('total').value = resultado;
        // 1. Obtener los valores de los inputs
 

    if (resultado <=5) {
        document.getElementById('total_valor').value = 5;
        var total = n3 + n4 + n5+5;
document.getElementById('gran_total').value = total;
        
    } else if (resultado > 5 && resultado <= 10) {
        document.getElementById('total_valor').value = 10;
        var total = n3 + n4 + n5+10;
document.getElementById('gran_total').value = total;
    }else if (resultado > 10 && resultado <= 20) {
 document.getElementById('total_valor').value = 20;
  var total = n3 + n4 + n5+20;
document.getElementById('gran_total').value = total;

  }else if (resultado > 20 && resultado <= 50) {
 document.getElementById('total_valor').value = 50;
 var total = n3 + n4 + n5+50;
document.getElementById('gran_total').value = total;
  
  }






  }

 
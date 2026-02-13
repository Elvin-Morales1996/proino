


document.getElementById('fechaInput').addEventListener('change', function() {
  const fecha = new Date(this.value);
  const formatoLegible = fecha.toLocaleDateString('es-ES', {
    day: '2-digit',
    month: '2-digit',
    year: 'numeric'
  }).replace(/\//g, '/');
  
 
  document.getElementById('fechas').value = formatoLegible;
});

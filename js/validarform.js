document.querySelector('form').addEventListener('submit', function(e) {
    let nombre = document.getElementById('nombre').value;
    let lote_poligono = document.getElementById('lote_poligono').value;
    let direccion = document.getElementById('direccion').value;
    let medidor = document.getElementById('medidor').value;
    if (nombre.trim() === '' || lote_poligono.trim() === '' || direccion.trim() === '' || medidor.trim() === '') {
        alert('hay campos vacios');
        e.preventDefault();
    }
});

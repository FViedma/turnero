var interval;
var filaActual = 2; 

var numRows = document.getElementById("miTabla").rows.length;
function ocultarTabla() {
    
    var tableRows = document.getElementById("miTabla");

    
    tableRows.style.display = "none";
}
    function mostrarSiguienteFila() {
        var tableRows = document.getElementById("miTabla").rows;

        for (var i = 2; i < numRows; i++) {
            tableRows[i].style.display = "none";
        }

        if (filaActual >= numRows) {
            filaActual = 2; 
			
        }

        tableRows[filaActual].style.display = "table-row";
        filaActual++;
    }
    
interval = setInterval(mostrarSiguienteFila, 15000); 
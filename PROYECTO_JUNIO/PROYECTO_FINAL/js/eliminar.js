$(document).ready(function() {

    $(".bEliminar").on('click', function(event) {

        var idjuego = $(this).data("idjuego") ;
        var nombrejuego = $(this).data("nombre") ;

        $("#myModal .modal-title").html(nombrejuego);
        
        $("#myModal").modal('show') ;

        const confirm = $("#myModal .modal-body").html("Se ha eliminado el juego " + nombrejuego + " correctamente de tu lista de favoritos.");
        
        

        if(confirm){
            //solicitud ajax
            httpRequest("http://localhost/PROYECTO_JUNIO/PROYECTO_FINAL/juego/elifav/" + idjuego, function(){
                console.log(this.responseText);

                const tbody = document.querySelector("#tbody-juego");
                const fila = document.querySelector("#fila-" + idjuego);

                tbody.removeChild(fila);
            });
        }
        
    }) ;

}) ;

function httpRequest(url, callback){
    const http = new XMLHttpRequest();
    http.open("GET", url);
    http.send();

    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            //le mandamos la respuesta a cada boton
            callback.apply(http);
        }
    }
}
$(document).ready(function() {

    $(".pulsame").on('click', function(event) {

        var nombre = $(this).data("nombre") ;

        $("#myModal .modal-title").html(nombre);
        $("#myModal .modal-body").html("¿Deseas añadir " + nombre + " a favoritos?");
        $("#formulario-favoritos").attr('action','<?php echo constant("URL"). "juego/favoritos/" ?>' + nombre) ;
        $("#myModal").modal('show') ;
        
    }) ;

}) ;
<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <title>JUEGOS</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <link href="<?php echo constant("URL"); ?>/css/default.scss" rel="stylesheet">
    </head>

    <body>
        
        <?php 
            require "views/header/headerestilojuegos.php";    
        ?>

        <div id="tour" class="bg-1">
            <?php
                if (isset($_GET["fracasoFavoritos"])):
                    echo "<p style=\"color: red\">Este juego ya esta añadido a favoritos.</p>" ;
                endif ;

                if (isset($_GET["exitoFavoritos"])):
                    echo "<p style=\"color: green\">Juego añadido a tu lista de favoritos.</p>" ;
                endif ;

                if (isset($_GET["exitoAniadirJuego"])):
                    echo "<p style=\"color: green\">Juego creado exitosamente</p>" ;
                endif ;


            ?>

            
        

            
            <div class="containerJuegos" id="textoJuegos">

                <h1 id="h1novedades" class="text-center">ULTIMAS NOVEDADES</h1>
                <p id="textonovedades" class="text-center">¿Has visto los próximos lanzamientos? <br/> Echa un ojo al la conferencia del E3 2019.</p>
                
                <div id="video1">
                    <iframe class="ytb-embed" width="560" height="315" src="https://www.youtube.com/embed/73kSvsQ_kkA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                
                <h3 class="text-center">LOS MAS DESTACADOS</h3>
                <p class="text-center">En AllGames te mostramos todas las novedades del momento.<br> ¿Te lo vas a perder? </p>
            </div>
        </div>
        

        <div id="tour" class="bg-1">
            <div class="containerJuegos">
             
                <?php 
                    include_once "models/objetojuegos.php";
                    include_once "controllers/session.php";
                    $total_paginas = $this->numpagtotal;
                ?>

                <div id="paginacion" class="text-center">
                <?php
                    if ($total_paginas > 1) {
                        for ($i=1;$i<=$total_paginas;$i++) {
                            echo '<ul class="pagination pagination-sm"><li ><a  style="color: black" style:"text-decoration:none" href="'. constant("URL").'juego/render/?pagina='.$i.'">'.$i.'</a></li></ul>  ';
                        }
                    }
                    ?>
                </div>

                <?php

                    foreach($this->juego as $row){
                        $juego = new Juego();
                        $juego = $row; 
                        
                ?>
                <div class="row-text-center">
                    <div class="col-sm-4">
                        <div class="thumbnail">
                            <img id="caratula" src="<?= $juego->imagen; ?>">
                            <p><strong><?php echo $juego->nombre; ?></strong></p>
                            <a  href="<?php echo constant("URL"). "juegodetalle/verJuego/" . $juego->nombre ?>">
                                <button class="btn"  >VER MAS</button>
                            </a>
                            
                            <div class="valoracion" > 
                                <button class="pulsame" data-nombre="<?= $juego->nombre ?>">
                                    <i id="estrella" class="fas fa-star"></i>
                                </button>
                            </div>

                            
                        </div>
                    </div>

                    <?php
                        }
                    ?>
                    
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        
                       
                    <form id="formulario-favoritos" action="" method="get">
                        <button type="submit" class="btn btn-default">Aceptar</button>
                    </form>
                      
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {

                $(".pulsame").on('click', function(event) {

                    var nombre = $(this).data("nombre") ;

                    $("#myModal .modal-title").html(nombre);
                    $("#myModal .modal-body").html("¿Deseas añadir " + nombre + " a favoritos?");
                    $("#formulario-favoritos").attr('action','<?php echo constant("URL"). "juego/favoritos/" ?>' + nombre) ;
                    $("#myModal").modal('show') ;
                    
                }) ;

            }) ;
        </script>
    </body>
</html>
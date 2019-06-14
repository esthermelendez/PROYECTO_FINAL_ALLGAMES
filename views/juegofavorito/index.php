<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <title>JUEGOS FAVORITOS</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <link href="<?php echo constant("URL"); ?>/css/default.scss" rel="stylesheet">
        
    </head>

    <body id="bodyFavoritos">
        <?php 
            require "views/header/headerestilojuegos.php";
        ?>

       
        <div class="containerFav" id="tbody-juego">

            <?php 

                include_once "models/objetojuegos.php";

                $total_paginas = $this->numpagtotal;
            ?>

            <div id="paginacion" class="text-center">
                <?php

                    if ($total_paginas > 1) {
                        for ($i=1;$i<=$total_paginas;$i++) {
                            echo '<ul class="pagination pagination-sm"><li ><a  style="color: black" style:"text-decoration:none" href="'. constant("URL").'juegosfavoritos/render/?pagina='.$i.'">'.$i.'</a></li></ul>  ';                                }
                    }
            
                ?>
            </div>

                <?php


                if($total_paginas==0){
                    ?>

                    <h1 id="h1nohayfav"  class="text-center">AUN NO HAS AÑADIDO NINGÚN JUEGO A FAVORITOS</h1>

                <?php
                } else{
                    
                

                foreach($this->juegofav as $row){
                    $juegofav = new Juegosfavoritos();
                    $juegofav = $row;
                    
                
            ?>

            <div class="row-text-center" id="fila-<?php echo $juegofav->idJuego; ?>">
                <div class="col-sm-4">
                    <div class="thumbnail" >

                        <img style="width:200px; height:300px;" src="<?= $juegofav->imagen; ?>">

                        <p><strong><?php echo $juegofav->nombre; ?></strong></p>

                        <a href="<?php echo constant("URL"). "juegodetalle/verJuego/" . $juegofav->nombre ?>">
                            <button class="btn" >VER MAS</button>
                        </a>

                        <div class="papelera">
                            <button class="bEliminar" data-nombre="<?php echo $juegofav->nombre?>" data-idjuego="<?php echo $juegofav->idJuego?>">
                                <i id="papelera" class="fas fa-trash"></i>
                            </button>
                        </div>
                
                    </div>
                </div>
            </div>

            <?php
                }
            }

            ?>
            
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
                        
                       
                    <form id="formulario-eliminar" action="" method="get">
                        <button type="submit" class="btn btn-default">Aceptar</button>
                    </form>
                      
                    </div>
                </div>
            </div>
        </div>

        <script src="<?php echo constant("URL"); ?>/js/eliminar.js"></script>

    </body>
</html>
<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <title>JUEGOS NINTENDO</title>
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
            <div class="containerJuegos" id="textoJuegos">
                <h3 class="text-center">LOS MAS DESTACADOS</h3>
                <p class="text-center">En AllGames te mostramos todas las novedades del momento.<br> ¿Te lo vas a perder? </p>
            </div>
        </div>

        <div id="tour" class="bg-1">
            <div class="containerJuegos">

                <?php 

                    include_once "models/Objetojuegos.php";

                    $total_paginas = $this->numpagtotal;
                ?>

                <div id="paginacion" class="text-center">
                    <?php

                        if ($total_paginas > 1) {
                            for ($i=1;$i<=$total_paginas;$i++) {
                                echo '<ul class="pagination pagination-sm"><li ><a  style="color: black" style:"text-decoration:none" href="'. constant("URL").'juegonintendo/render/?pagina='.$i.'">'.$i.'</a></li></ul>  ';
                            }
                        }
                
                    ?>
                </div>

                <?php

                    foreach($this->juegonintendo as $row){
                        $juegonintendo = new JuegoNintendo();
                        $juegonintendo = $row; 
                    
                ?>


                <div class="row-text-center">
                    <div class="col-sm-4">
                        <div class="thumbnail">
                            <img style="width:200px; height:300px;" src="<?= $juegonintendo->imagen; ?>">
                            <p><strong><?php echo $juegonintendo->nombre; ?></strong></p>

                            <a href="<?php echo constant("URL"). "juegodetalle/verJuego/" . $juegonintendo->nombre ?>">
                                <button class="btn" data-toggle="modal" data-target="#myModal">VER MAS</button>
                            </a>

                            <div class="valoracion" > 
                                <button data-toggle="modal" data-target="#myModal" >
                                    <i id="estrella" class="fas fa-star"></i>
                                </button>
                            </div>
                            
                                    
                            <!-- Modal -->
                            <div id="myModal" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title"><?php echo $juegoxbox->nombre; ?></h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Some text in the modal.</p>
                                        </div>
                                        <div class="modal-footer">
                                            <a  href="<?php echo constant("URL"). "juego/favoritos/" . $juegoxbox->nombre ?>">
                                                <button type="button" class="btn btn-default">Aceptar</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                        }

                    ?>
                    
                </div>
            </div>
        </div>
    </body>
</html>
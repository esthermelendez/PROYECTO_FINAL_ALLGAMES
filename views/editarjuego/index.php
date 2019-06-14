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
                if (isset($_GET["fracasoeditarJuego"])):
                    echo "<p style=\"color: red\">Error al modificar juego.</p>" ;
                endif ;

                if (isset($_GET["exitoeditarJuego"])):
                    echo "<p style=\"color: green\">Juego modificado correctamente.</p>" ;
                endif ;


            ?>
            
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
                            echo '<ul class="pagination pagination-sm"><li ><a  style="color: black" style:"text-decoration:none" href="'. constant("URL").'editarjuegos/render/?pagina='.$i.'">'.$i.'</a></li></ul>  ';
                        }
                    }
                    ?>
                </div>

                <?php

                    foreach($this->juego as $row){
                        $juego = new editarJuegos();
                        $juego = $row; 
                        
                ?>
                <div class="row-text-center">
                    <div class="col-sm-4">
                        <div class="thumbnail">
                            <img id="caratula" src="<?= $juego->imagen; ?>">
                            <p><strong><?php echo $juego->nombre; ?></strong></p>
                            <a  href="<?php echo constant("URL"). "editarjuegos/editarJuego/" . $juego->nombre ?>">
                                <button class="btn">EDITAR</button>
                            </a>
                            

                            
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
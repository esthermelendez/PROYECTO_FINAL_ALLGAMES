<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <title>AGREGAR JUEGO</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <link href="<?php echo constant("URL"); ?>/css/default.scss" rel="stylesheet">
        
    </head>



    <body id="bodyRegistro">

        <?php 
            require "views/header/headerestilojuegos.php";    
        ?>

        
        
        <div class="container">
            <h1 class="center" id="registrate">AGREGAR JUEGO</h1>
                <form class="form-horizontal" action="<?php echo constant("URL"); ?>aniadirjuegos/nuevoJuego" method="POST">
                    <input type="hidden" id="flag" name="flag" value="false" />

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="nombre">Nombre</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nombre" placeholder="Introduce el nombre del juego" id="" >

                        </div>
                    </div>


               
                  
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="descripcion">Descripcion</label>
                        <div class="col-sm-10">
                            <textarea type="text" class="form-control" name="descripcion" rows="10"  placeholder="Introduce la descripción del juego" ></textarea>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-sm-2" for="imagen">Imagen</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="imagen" value="https://statics.vrutal.com/m/12c5/12c587c9ed3b9edc910316b5954e12c5.jpg" placeholder="Introduce la url de la imagen" id="" >
                        </div>
                    </div>

                  

                    <div class="form-group">
	                    <label class="control-label col-sm-2" >Plataforma</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="plataforma" >
                                <?php

                                    $this->db = new Database();
                                    $query = "SELECT * FROM plataforma";
                                    $consulta = $this->db->connect()->prepare($query);
                                    $consulta->execute();

                                    while ($row=$consulta->fetch()){
                                      
                                        $selected = ($row["idPlataforma"]==$plataforma)?"selected":"";

                                        echo '<option  value="'.$row["idPlataforma"].'" $selected>' ;
                                        echo $row["nombre"] ;
                                        echo "</option>" ;
                                    }
                                ?>
                            </select>
		                </div>
	                 </div> 


                    <p>
                        <input type="submit" class="btn btn-default" value="Aceptar">
 
                    </p>

                    <?php
                        
                        if (isset($_GET["fracasoAniadirJuegoNombreVacio"])):
                            echo "<br/><p style=\"color: red\">El campo nombre debe estar completado.</p>" ;
                        endif ;
                        
                        if (isset($_GET["exitoAgregarJuego"])):
                            echo "<br/><p style=\"color: green\">El juego ha sido agregado correctamente.</p>" ;
                        endif ;


                        if (isset($_GET["fracasoAgregarJuego"])):
                            echo "<br/><p style=\"color: red\">Ha ocurrido un error al realizar la operación.</p>
                                  <p style=\"color: red\">Ten en cuenta que el nombre del juego debe ser único y la plataforma debe estar indicada.</p>" ;
                        endif ;
                    ?>

                </form>
            </div>
        </div>
    </body>
</html>
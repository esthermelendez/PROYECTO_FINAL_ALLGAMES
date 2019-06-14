<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <title>EDITAR JUEGO</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <link href="<?php echo constant("URL"); ?>/css/default.scss" rel="stylesheet">
        
    </head>

    <body id="bodyModificarJuego">
        <?php 
            require "views/header/headermodificar.php"; 
        ?>

        <div class="container">

            <h1 class="center" id="registrate">MODIFICAR JUEGO <?php echo $this->juego->nombre ?></h1>

            <form  class="form-horizontal" action="<?php echo constant("URL"); ?>editarjuegos/actualizarJuego" method="POST">
           
                <div class="form-group">
                    <label class="control-label col-sm-2" for="nombre">Nombre</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="nombre" value="<?php echo $this->juego->nombre ?>" >
                        <input class="form-control" type="hidden" name="nombreSM" value="<?php echo $this->juego->nombre ?>" >
                    </div>
                </div>

              

                <div class="form-group">
                    <label class="control-label col-sm-2" for="descripcion">Descripcion</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="descripcion" value="<?php echo $this->juego->descripcion ?>">
                    </div>
                </div>


                <div class="form-group">
                    <label class="control-label col-sm-2" for="imagen">Imagen</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="imagen" value="<?php echo $this->juego->imagen ?>">
                    </div>
                </div>


                <p>
                    <input type="submit" class="btn btn-default" value="Aceptar">
                </p>

            </form>
        </div>
    </body>
</html>
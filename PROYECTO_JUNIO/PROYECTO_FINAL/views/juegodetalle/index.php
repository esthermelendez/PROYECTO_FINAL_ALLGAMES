<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <title>DETALLE</title>
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
            require "views/header/headerdetalle.php";
        ?>

      
        <div id="tarjeta" class="card mb-3" style="max-width: 1000px;">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img id="caratulaDetalle" src="<?php echo $this->juegodetalle->imagen?>" class="card-img" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h1 class="card-title">Detalle de <?php echo $this->juegodetalle->nombre ?> </h1>
                        <br/>
                        <p class="card-text"><?php echo $this->juegodetalle->descripcion ?></p>
                    </div>
                </div>
            </div>
        </div>

      
    </body>
</html>
<!DOCTYPE html>
    <head>
        <title>PERFIL</title>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <link href="<?php echo constant("URL"); ?>/css/default.scss" rel="stylesheet">
        
    </head>

    <body id="bodyPerfil">
        <?php 
            require "views/header/headerperfil.php";
        ?>


            <?php
                if (isset($_GET["exitoActualizar"])):
                    echo "<p style=\"color: green\">Tu perfil se ha actualizado correctamente</p>" ;
                endif ;
            ?>

            <?php 

                include_once "models/usuario.php";
                foreach($this->perfil as $row){
                    $usuario = new Usuario();
                    $usuario = $row; 
                
            ?>

            <div class="containerPerfil">
                <h1 class="center" id="registrate">TU PERFIL <svg>
                        <circle cx="40%" cy="70" r="15"></circle>
                        <circle cx="40%" cy="41" r="5"></circle>
                    </svg></h1>

                

                <div class="form-horizontal">

                    <div class="form-group">
                        <label class="control-label col-sm-2" >Nombre</label>
                        <div class="col-sm-5"> <?php echo $usuario->nombre; ?></div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" >Apellidos</label>
                        <div class="col-sm-5"> <?php echo $usuario->apellidos; ?></div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" >Usuario</label>
                        <div class="col-sm-5"> <?php echo $usuario->usuario; ?></div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" >Email</label>
                        <div class="col-sm-5"> <?php echo $usuario->email; ?></div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" >Nacimiento</label>
                        <div class="col-sm-5"> <?php echo $usuario->fecnac; ?></div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" >Descripcion</label>
                        <div class="col-sm-8"> <?php echo $usuario->descripcion; ?></div>
                    </div>

                
    
                    <a href="<?php echo constant("URL") . "perfil/verUsuario/" . $usuario->usuario ?>">
                        <button class="btn"> MODIFICAR</button>
                    </a> 

                    

                    <?php
                        if (isset($_GET["exitoAcualizar"])):
                            echo "<p style=\"color: green\">El perfil se ha modificado correctamente</p>" ;
                        endif ;
                    ?>
                </div>
            </div>
            
            

        <?php
            }
        ?>
               
    </body>
</html>
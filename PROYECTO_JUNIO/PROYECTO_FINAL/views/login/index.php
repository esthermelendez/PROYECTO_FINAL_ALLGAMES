<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <title>NUEVO USUARIO</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <link href="<?php echo constant("URL"); ?>/css/default.scss" rel="stylesheet">
        
    </head>



    <body id="bodyLogin">

    
        <nav class="navbar navbar-default ">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                    <a class="navbar-brand" href="<?php echo constant("URL"); ?>index">ALLGAMES</a>
                    
                    <canvas height="39px" width="34px" style="margin-top:5.5px;" id="micanvas" ></canvas> 
                    <script src="<?php echo constant("URL"); ?>js/canvas.js" language="javascript" type="text/javascript"></script>
                    
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                </div>
            </div>
        </nav>

        
        
        <div class="container" id="contenedorLogin">
            <h1  id="iniciaSesion">Inicia Sesión</h1>
                <form class="form-horizontal" action="<?php echo constant("URL"); ?>login/inicioLogin" method="POST">
                    <input type="hidden" id="flag" name="flag" value="false" />
                    


                    <div class="form-group">
                        <label class="control-label col-sm-2" for="usr">Usuario</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="usr" id="" placeholder="Introduce tu usuario" required>
                            
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Contraseña</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" placeholder="Introduce tu contraseña" name="pwd" id="" required>
                        </div>
                    </div>

                    <p> ¿No tienes cuenta aun? Registrate <a href="<?php echo constant("URL"); ?>nuevo"> aquí </a>. </p>

                    <p id="boton">
                        <input type="submit" class="btn btn-default" value="Aceptar">
                    </p>

                    <?php
                        if (isset($_GET["exito"])):
                            echo "<p style=\"color: green\">El registro se ha producido correctamente</p>" ;
                        endif ;

                        if (isset($_GET["fracasoLogin"])):
                            echo "<p style=\"color: red\">Nombre de usuario o contraseña incorrectos.</p>" ;
                        endif ;
                    ?>

                    

                </form>
            </div>
        </div>
    </body>
</html>
<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <title>NUEVO USUARIO</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <link href="<?php echo constant("URL"); ?>/css/default.scss" rel="stylesheet">
        
    </head>



    <body id="bodyRegistro">
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
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?php echo constant("URL"); ?>login">Volver al login</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        
        
        <div class="container">
            <h1 class="center" id="registrate">REGISTRATE</h1>
                <form class="form-horizontal" action="<?php echo constant("URL"); ?>nuevo/registrarUsuario" method="POST">
                    <input type="hidden" id="flag" name="flag" value="false" />

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="nom">Nombre</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nom" placeholder="Introduce tu nombre" id="" >

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-10">
                            <?php
                                if (isset($_GET["fracasoRegistroNombre"])):
                                    echo "<p style=\"color: red\">El nombre debe comenzar por mayúsculas y no puede contener números ni espacios.</p>" ;
                                endif ;

                                if (isset($_GET["fracasoRegistroNombreVacio"])):
                                    echo "<p style=\"color: red\">El campo nombre no puede estar vacío.</p>" ;
                                endif ;
                            ?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="ape">Apellidos</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="ape" id="" placeholder="Introduce tus apellidos" >
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-10">
                            <?php
                                if (isset($_GET["fracasoRegistroApellidos"])):
                                    echo "<p style=\"color: red\">Los apellidos deben comenzar por mayúsculas y no puede contener números.</p>" ;
                                endif ;

                                if (isset($_GET["fracasoRegistroApellidosVacio"])):
                                    echo "<p style=\"color: red\">El campo apellidos no puede estar vacío.</p>" ;
                                endif ;
                            ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="fecnac">Edad</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="fecnac" placeholder="Introduce tu fecha de nacimiento" id="" >
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-10">
                            <?php
                                if (isset($_GET["fracasoRegistroFecnac"])):
                                    echo "<p style=\"color: red\">La fecha es superior o igual a la actual.</p>" ;
                                endif ;

                                if (isset($_GET["fracasoRegistro2Fecnac"])):
                                    echo "<p style=\"color: red\">El año de nacimiento no puede ser menor a 1930.</p>" ;
                                endif ;

                                if (isset($_GET["fracasoRegistroFecnacVacio"])):
                                    echo "<p style=\"color: red\">El campo fecha no puede estar vacío.</p>" ;
                                endif ;
                            ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="ema">Email</label>
                        <div class="col-sm-10">
                            <input  class="form-control" name="ema" id="" placeholder="Introduce tu email">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-10">
                            <?php
                                if (isset($_GET["fracasoRegistroEmail"])):
                                    echo "<p style=\"color: red\">El formato del correo electrónico es nombre@dominio.extension</p>" ;
                                endif ;

                                if (isset($_GET["fracasoRegistroEmailVacio"])):
                                    echo "<p style=\"color: red\">El campo email no puede estar vacío.</p>" ;
                                endif ;
                            ?>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-sm-2" for="usr">Usuario</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="usr" id="" placeholder="Introduce tu usuario" >
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-10">
                            <?php
                                if (isset($_GET["fracasoRegistroUsuario"])):
                                    echo "<p style=\"color: red\">El formato del usuario no puede ir en mayusculas</p>" ;
                                endif ;

                                if (isset($_GET["fracasoRegistroUsuarioVacio"])):
                                    echo "<p style=\"color: red\">El campo usuario no puede estar vacío.</p>" ;
                                endif ;
                            ?>
                        </div>
                    </div>

                    

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Contraseña</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" placeholder="Introduce tu contraseña" name="pwd" id="" >
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-10">
                            <?php
                                if (isset($_GET["fracasoRegistroContrasenia"])):
                                    echo "<p style=\"color: red\">La contraseña no puede contener menos de 8 caracteres</p>" ;
                                endif ;

                                if (isset($_GET["fracasoRegistroContraseniaVacio"])):
                                    echo "<p style=\"color: red\">El campo contraseña no puede estar vacío.</p>" ;
                                endif ;
                            ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-10">
                            <?php
                                if (isset($_GET["fracasoRegistro"])):
                                    echo "<p style=\"color: red\">Nombre de usuario o email ya en uso</p>" ;
                                endif ;

                                if (isset($_GET["usuarioDuplicado"])):
                                    echo "<p style=\"color: red\">Nombre de usuario o email en uso.</p>" ;
                                endif ;
                            ?>
                        </div>
                    </div>

                    <p>
                        <input type="submit" class="btn btn-default" value="Aceptar">
 
                    </p>


                 

                </form>
            </div>
        </div>
    </body>
</html>
<!DOCTYPE html>
    <head>
        <title>MODIFICAR PERFIL</title>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <link href="<?php echo constant("URL"); ?>/css/default.scss" rel="stylesheet">
        
    </head>

    <body id="bodyModificarPerfil">
        <?php 
            require "views/header/headermodificar.php"; 
        ?>

        <div class="container">

            <h1 class="center" id="registrate">MODIFICAR PERFIL</h1>

            <form  class="form-horizontal" action="<?php echo constant("URL"); ?>perfil/actualizarUsuario" method="POST">
           
                <div class="form-group">
                    <label class="control-label col-sm-2" for="nombre">Nombre</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="nombre" value="<?php echo $this->usuario->nombre ?>" >
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-10">
                        <?php
                            if (isset($_GET["fracasoModificarNombre"])):
                                echo "<p style=\"color: red\">El nombre debe comenzar por mayúsculas y no puede contener números.</p>" ;
                            endif ;

                            if (isset($_GET["fracasoModificarNombreVacio"])):
                                echo "<p style=\"color: red\">El campo nombre no puede estar vacío.</p>" ;
                            endif ;
                        ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="apellidos">Apellidos</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="apellidos" value="<?php echo $this->usuario->apellidos ?>">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-10">
                        <?php
                            if (isset($_GET["fracasoModificarApellidos"])):
                                echo "<p style=\"color: red\">Los apellidos deben comenzar por mayúsculas y no puede contener números.</p>" ;
                            endif ;

                            if (isset($_GET["fracasoModificarApellidosVacio"])):
                                echo "<p style=\"color: red\">El campo apellidos no puede estar vacío.</p>" ;
                            endif ;
                        ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Email</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="email" value="<?php echo $this->usuario->email ?>">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-10">
                        <?php
                            if (isset($_GET["fracasoModificarEmail"])):
                                echo "<p style=\"color: red\">El formato del correo electrónico es nombre@dominio.extension</p>" ;
                            endif ;

                            if (isset($_GET["fracasoModificarEmailVacio"])):
                                echo "<p style=\"color: red\">El campo email no puede estar vacío.</p>" ;
                            endif ;
                        ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="fecnac">Edad</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="date" name="fecnac" value="<?php echo $this->usuario->fecnac ?>" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-10">
                        <?php
                            if (isset($_GET["fracasoModificarFecnac"])):
                                echo "<p style=\"color: red\">La fecha es superior o igual a la actual.</p>" ;
                            endif ;

                            if (isset($_GET["fracasoModificarFecnacVacio"])):
                                echo "<p style=\"color: red\">El campo fecha no puede estar vacío.</p>" ;
                            endif ;

                            if (isset($_GET["fracasoModificar2Fecnac"])):
                                echo "<p style=\"color: red\">El año de nacimiento no puede ser menor a 1930.</p>" ;
                            endif ;
                        ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="descripcion">Descripcion</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" rows="10" type="text" name="descripcion"><?php echo $this->usuario->descripcion ?></textarea>
                    </div>
                </div>

                <p>
                    <input type="submit" class="btn btn-default" value="Aceptar">
                </p>

            </form>
        </div>
    </body>
</html>
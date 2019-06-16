<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <title>DETALLES DE USUARIOS</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <link href="<?php echo constant("URL"); ?>/css/default.scss" rel="stylesheet">

        
    </head>

    <body id="bodyUsuarios">
        <?php 
            require "views/header/headerestilojuegos.php";
        ?>

        <div id="mainUsuarios">
            <h1 class="center">Sección de consulta</h1>
        

            <table id="tablaUsuarios">
                <thead> 
                    <tr>
                        <th>Usuario</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Email</th>
                        <th>Fecha de Nacimiento</th>
                    </tr>
                </thead>
                <tbody id="tbody-usuarios">
                    <?php 

                        include_once "models/usuario.php";
                        include_once "controllers/session.php";
                        
                        foreach($this->usuarios as $row){
                            $usuario = new Usuario();
                            $usuario = $row; 

                            if($usuario->usuario == "hola99"){
                                
                            }else{
                                echo '<tr id="fila-' . $usuario->usuario . '">
                                        <td> '.$usuario->usuario.'</td>
                                        <td> '.$usuario->nombre.' </td>
                                        <td> '.$usuario->apellidos.'</td>
                                        <td> '.$usuario->email.'</td>
                                        <td> '.$usuario->fecnac.'</td>

                                        
                                        
                                       
                                    </tr>';
                            }
                        }
                    ?>

                   
                </tbody>
            </table>
        </div>
    </body>
</html>
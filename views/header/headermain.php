<!DOCTYPE html>
    <head>
        <title>INICIO</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        
        
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo constant('URL'); ?>css/default.scss">
    </head>

    <body >
        <div id="fondo">
            <nav class="navbar navbar-default ">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>                        
                            </button>
                            
                            <canvas height="39px" width="34px" style="margin-top:5.5px;" id="micanvas" ></canvas> 
                            <script src="<?php echo constant("URL");?>js/canvas.js" language="javascript" type="text/javascript"></script>

                            <a class="navbar-brand" href="<?php echo constant('URL'); ?>index">ALLGAMES</a>
                        </div>
                        <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="<?php echo constant("URL"); ?>login">LOGIN</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </body>
</html>
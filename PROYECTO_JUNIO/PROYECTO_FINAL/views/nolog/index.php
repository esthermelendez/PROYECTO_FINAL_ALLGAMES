<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <title>Documento vista main</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <link href="<?php echo constant("URL"); ?>/css/default.scss" rel="stylesheet">
        
        
    </head>

    <body id="bodyError">

        <div class="container" id="mainError">
            <h1>Lo sentimos :(</h1> 
            <br/>
            <p>No puede acceder a la página deseada debido a que no encontramos ninguna sesión iniciada.</h3>
            <p>Si desea iniciar sesión, haga click <a href="<?php echo constant("URL"); ?>login" id="enlaceAquiError">aquí.</a></h3>
        </div>
        
      
    </body>
</html>
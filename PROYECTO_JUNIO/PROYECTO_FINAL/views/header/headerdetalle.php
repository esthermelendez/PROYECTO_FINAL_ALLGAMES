<?php 
    include_once "controllers/session.php";
    $session = new Session();

    $usuarioIniciado = $session->get(":usr");

    if($usuarioIniciado == "admin"){
        echo    '<nav class="navbar navbar-default ">
                        <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>                        
                            </button>
                            <a class="navbar-brand" href="'. constant("URL") .'juego">ALLGAMES</a>
                            
                            <canvas height="39px" width="34px" style="margin-top:5.5px;" id="micanvas" ></canvas> 
                            <script src="'.constant("URL").'js/canvas.js" language="javascript" type="text/javascript"></script>

                            </div>
                            <div class="collapse navbar-collapse" id="myNavbar">
                            <ul class="nav navbar-nav navbar-right">
                                
                                <li><a href="' . constant("URL") . 'juegosfavoritos">FAVORITOS</a></li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="'. constant("URL") . 'juego">PLATAFORMAS</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="'. constant("URL") .'juegops">PLAY STATION</a>
                                        <br/>   
                                        <a class="dropdown-item" href="' .constant("URL") .'juegonintendo">NINTENDO</a>
                                        <br/>   
                                        <a class="dropdown-item" href="'. constant("URL") .'juegoxbox">XBOX ONE</a>
                                        <br/>   
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                
                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="" >' . $session->get(":usr") . '</a>
                                    <div class="dropdown-menu">
                                        
                                        <a class="dropdown-item" value = "' . $session->get(":usr").'" href="' .constant("URL") .'perfil">MI PERFIL</a>
                                        <br/> 
                                        <a class="dropdown-item" href="' . constant("URL") . 'consulta">USUARIOS</a>
                                        <br/>
                                        <a class="dropdown-item" href="' . constant("URL") . 'aniadirjuegos">AÑADIR JUEGOS</a>
                                        <br/>
                                        <a class="dropdown-item" href="' . constant("URL") . 'editarjuegos">EDITAR JUEGOS</a>
                                        <br/>
                                        <a class="dropdown-item" href="' . constant("URL"). 'login/cerrarsesion">CERRAR SESIÓN</a>
                                        
                                    </div>   
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>';
    }
    else{
        echo    '<nav class="navbar navbar-default ">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>                        
                            </button>
                            <a class="navbar-brand" href="'.constant("URL"). 'juego">ALLGAMES</a>

                            <canvas height="39px" width="34px" style="margin-top:5.5px;" id="micanvas" ></canvas> 
                            <script src="'.constant("URL").'js/canvas.js" language="javascript" type="text/javascript"></script>
            
                        </div>
                        <div class="collapse navbar-collapse" id="myNavbar">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="' .constant("URL") . 'juegosfavoritos">FAVORITOS</a></li>
                                
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="' .constant("URL") . 'juego">PLATAFORMAS</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="' .constant("URL") . 'juegops">PLAY STATION</a>
                                        <br/>   
                                        <a class="dropdown-item" href="' . constant("URL") . 'juegonintendo">NINTENDO</a>
                                        <br/>   
                                        <a class="dropdown-item" href="' . constant("URL") . 'juegoxbox">XBOX ONE</a>
                                        <br/>   
                                    </div>
                                </li>

                                <li class="nav-item dropdown">
                
                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="" > ' . $session->get(":usr") .'</a>
                                    <div class="dropdown-menu">
                                        
                                        <a class="dropdown-item" value = "' . $session->get(":usr") . '" href="' . constant("URL") . 'perfil">MI PERFIL</a>
                                        <br/> 
                                        <a class="dropdown-item" href="' . constant("URL") . 'login/cerrarsesion">CERRAR SESIÓN</a>
                                        
                                    </div>   
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>';
    }
    
?>
        

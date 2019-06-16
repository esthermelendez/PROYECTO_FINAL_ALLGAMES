<?php

    require_once "controllers/error.php";

    class App{

        function __construct() {
            
            //Si hay alguna url seteada, $url sera ese url, si no, sera null.
            $url= isset($_GET["url"]) ? $_GET["url"]: null;

            //el parametro "url" lo obtenemos del .htaccess
            $url = $_GET["url"];

            //hacemos que la / no se integre en la url. Si la imprimimos, no apareceran
            $url = rtrim($url, "/");

            //dividimos la url cuando aparezca un /
            //la imprimimos por var_dump($url); ya que es un array.
            $url = explode("/", $url);


            //si no mandamos ningun controlador en la barra de url, cargara el controlador main.
            if(empty($url[0])){

                $archivoController = "controllers/index.php";
                require_once $archivoController;

                $controller = new Index();
                $controller->loadModel("index");
                $controller->render();
                return false;

            }   

            //url[0] es el nombre del conrolador 0, es decir, el primer registro tras una / en la url.
            $archivoController = "controllers/" . $url[0] . ".php";


            
            
            if(file_exists($archivoController)){

                require_once $archivoController;
                $controller = new $url[0];
                $controller->loadModel($url[0]);
                
                //obtenemos el tamaño del array
                $nparam = sizeof($url);

                if($nparam > 1){

                    if($nparam>2){

                        $param = [];

                        for($i=2; $i<$nparam; $i++ ){
                            array_push($param, $url[$i]);
                        }

                        $controller->{$url[1]}($param);

                    }else{
                        $controller->{$url[1]}(); 
                    }
                } else{
                    $controller->render();
                }

            } else {

                $controller = new Errores();
            }  
        }
    }
?>
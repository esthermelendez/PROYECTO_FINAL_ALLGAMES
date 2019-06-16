<?php

    include_once "models/Objetojuegos.php";
    include_once "controllers/session.php";
    
    session_start();

    class Juego extends Controller{

        private $session;

        function __construct(){
            parent::__construct();

            $this->view->juegos = [];

            
            $session = new Session();
            
            // $session->init();
            // echo $session->get(":usr");

            $usuarioActivo = $session->get(":usr");

            

            if(!isset($usuarioActivo))
            { 
                header('location: http://localhost/PROYECTO_JUNIO/PROYECTO_FINAL/nolog');

            }
    
        }

        

        function favoritos($param = null){
            
            //obtenemos el nombre del juego que pasamos por la url
            $nombreJuego = $param[0];

            //obtenemos el nombre del usuario que esta logueado
            $session = new Session();
            $usuarioActivo = $session->get(":usr");

            //paso las variables obtenidas anteriormente a la funcion insertarFavoritos
            $favorito = $this->model->insertarFavoritos($nombreJuego, $usuarioActivo);

        }

        function eliFav($id){
            //obtenemos el nombre del juego que pasamos por la url
            $idJuego = $id;

            //obtenemos el nombre del usuario que esta logueado
            $session = new Session();
            $usuarioActivo = $session->get(":usr");


            //paso las variables obtenidas anteriormente a la funcion insertarFavoritos

            if($this->model->eliminarFav($idJuego, $usuarioActivo)){
                echo "Usuario eliminado correctamente";
            } else{
                
                
               echo "Error al eliminar usuario";
            }
            
        }


        function render($param = null){
            
            $pagina = $param[0];

            $numpagtotal = $this->model->contarPaginas();
            $this->view->numpagtotal = $numpagtotal;

            $juego = $this->model->getJuegos($pagina);
            $this->view->juego = $juego;
            $this->view->render("consultaJuego/index");
        }
    }
?>
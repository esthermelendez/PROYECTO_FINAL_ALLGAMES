<?php

    include_once "controllers/session.php";

    session_start();

    class JuegosFavoritos extends Controller{

        private $session;
        
        function __construct(){
            parent::__construct();

            $this->view->datos = [];
            
            $session = new Session();

            $usuarioActivo = $session->get(":usr");

            

            if(!isset($usuarioActivo))
            { 
                header('location: http://localhost/PROYECTO_JUNIO/PROYECTO_FINAL/nolog');

            }

        }

        

        function render($param = null){


            $session = new Session();
            $usuarioActivo = $session->get(":usr");

            $pagina = $param[0];

            $numpagtotal = $this->model->contarPaginas($usuarioActivo);
            $this->view->numpagtotal = $numpagtotal;

            $juegofav = $this->model->juegosFavs($usuarioActivo, $pagina);
            $this->view->juegofav = $juegofav;
            $this->view->render("juegofavorito/index");
        }
    }
?>
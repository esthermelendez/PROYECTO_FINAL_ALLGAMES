<?php

    include_once "controllers/session.php";

    session_start();

    class JuegoPs extends Controller{

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
            
            $pagina = $param[0];

            $numpagtotal = $this->model->contarPaginas();
            $this->view->numpagtotal = $numpagtotal;

            $juegops = $this->model->getPs($pagina);
            $this->view->juegops = $juegops;
            $this->view->render("consultajuegoPs/index");
        }
    }
?>
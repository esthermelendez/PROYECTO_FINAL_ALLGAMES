<?php

    include_once "controllers/session.php";

    session_start();

    class JuegoNintendo extends Controller{

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

            $juegonintendo = $this->model->getNintendo($pagina);
            $this->view->juegonintendo = $juegonintendo;
            $this->view->render("consultajuegoNintendo/index");
        }
    }
?>
<?php

    include_once "controllers/session.php";

    session_start();

    class JuegoXbox extends Controller{

        private $session;
        
        function __construct(){
            parent::__construct();

            $this->view->datos = [];
            
            $session = new Session();

            $usuarioActivo = $session->get(":usr");

            

            if(!isset($usuarioActivo))
            { 
                header('location: http://allgame.epizy.com/nolog');

            }

        }

        function render($param = null){
            
            $pagina = $param[0];

            $numpagtotal = $this->model->contarPaginas();
            $this->view->numpagtotal = $numpagtotal;

            $juegoxbox = $this->model->getXbox($pagina);
            $this->view->juegoxbox = $juegoxbox;
            $this->view->render("consultajuegoXbox/index");
        }
    }
?>
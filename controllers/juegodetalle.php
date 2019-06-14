<?php

    include_once "controllers/session.php";
    
    session_start();

    class JuegoDetalle extends Controller{

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


        function verJuego($param = null){

            $nombreJuego = $param[0];
            $juegodetalle = $this->model->getByName($nombreJuego);


            $this->view->juegodetalle = $juegodetalle;
            $this->view->render("juegodetalle/index");

            
        }

    }
?>
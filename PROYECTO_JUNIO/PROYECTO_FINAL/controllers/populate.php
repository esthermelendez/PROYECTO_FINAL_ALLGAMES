<?php

    include_once "models/Objetojuegos.php";
    include_once "controllers/session.php";
    
    session_start();

    class Populate extends Controller{

        private $session;

        function __construct(){
            parent::__construct();
            
            $session = new Session();
            $usuarioActivo = $session->get(":usr");

            if(!isset($usuarioActivo))
            { 
                header('location: http://localhost/PROYECTO_JUNIO/PROYECTO_FINAL/nolog');

            }
        }

        function ejecutarPopulate(){
            $populate = $this->model->datosPopulate();
        }
    }
?>

<?php

    include_once "controllers/session.php";
    session_start();

    class Consulta extends Controller{

        function __construct(){

            parent::__construct();

            $this->view->usuarios = [];

            $session = new Session();
            

            $usuarioActivo = $session->get(":usr");

            

            if(!isset($usuarioActivo))
            { 
                header('location: http://localhost/PROYECTO_JUNIO/PROYECTO_FINAL/nolog');

            }else if($usuarioActivo != "admin"){
                header('location: http://localhost/PROYECTO_JUNIO/PROYECTO_FINAL/nolog');
            }
    
        }


        function render(){
            $usuarios = $this->model->get();
            $this->view->usuarios = $usuarios;
            $this->view->render("consulta/index");
        }


    }
?>
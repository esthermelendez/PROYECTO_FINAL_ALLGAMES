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
                header('location: http://allgame.epizy.com/nolog');

            }else if($usuarioActivo != "admin"){
                header('location: http://allgame.epizy.com/nolog');
            }
    
        }


        function render(){
            $usuarios = $this->model->get();
            $this->view->usuarios = $usuarios;
            $this->view->render("consulta/index");
        }


    }
?>
<?php

    include_once "models/objetojuegos.php";
    include_once "controllers/session.php";
    
    session_start();

    class aniadirJuegos extends Controller{

        private $session;

        function __construct(){
            parent::__construct();

            $this->view->juegos = [];

            
            $session = new Session();
            

            $usuarioActivo = $session->get(":usr");

            

            if(!isset($usuarioActivo))
            { 
                header('location:http://allgame.epizy.com/nolog');

            }else if($usuarioActivo != "admin"){
                header('location: http://allgame.epizy.com/nolog');
            }
    
        }

        



        function nuevoJuego(){

            $nombre = $_POST["nombre"];

            $descripcion = $_POST["descripcion"];

            $imagen = $_POST["imagen"];

            $plataforma = $_POST["plataforma"];


            

            if($this->model->insert(["nombre" => $nombre, "descripcion" => $descripcion, "imagen" => $imagen, "plataforma" => $plataforma])){
                header("location:http://allgame.epizy.com/aniadirjuegos/?exitoAgregarJuego");

            }else{
                header("location:http://allgame.epizy.com/aniadirjuegos/?fracasoAgregarJuego");
            }
        }



        function render($param = null){
            
            $this->view->render("aniadirJuego/index");
        }
    }
?>
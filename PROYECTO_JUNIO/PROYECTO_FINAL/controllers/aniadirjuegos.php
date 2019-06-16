<?php

    include_once "models/Objetojuegos.php";
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
                header('location: http://localhost/PROYECTO_JUNIO/PROYECTO_FINAL/nolog');

            }else if($usuarioActivo != "admin"){
                header('location: http://localhost/PROYECTO_JUNIO/PROYECTO_FINAL/nolog');
            }
    
        }

        



        function nuevoJuego(){

            $nombre = $_POST["nombre"];

            $descripcion = $_POST["descripcion"];

            $imagen = $_POST["imagen"];

            $plataforma = $_POST["plataforma"];


            

            if($this->model->insert(["nombre" => $nombre, "descripcion" => $descripcion, "imagen" => $imagen, "plataforma" => $plataforma])){
                header("location:http://localhost/PROYECTO_JUNIO/PROYECTO_FINAL/aniadirjuegos/?exitoAgregarJuego");

            }else{
                header("location:http://localhost/PROYECTO_JUNIO/PROYECTO_FINAL/aniadirjuegos/?fracasoAgregarJuego");
            }
        }



        function render($param = null){
            
            // $pagina = $param[0];

            // $numpagtotal = $this->model->contarPaginas();
            // $this->view->numpagtotal = $numpagtotal;

            // $juego = $this->model->getJuegos($pagina);
            // $this->view->juego = $juego;
            $this->view->render("aniadirJuego/index");
        }
    }
?>
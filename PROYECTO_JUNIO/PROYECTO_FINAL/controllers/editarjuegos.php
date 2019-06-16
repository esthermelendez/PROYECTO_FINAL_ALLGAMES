<?php

    include_once "models/Objetojuegos.php";
    include_once "controllers/session.php";
    
    session_start();

    class editarJuegos extends Controller{

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

        function editarJuego($param = null){
            $juegoNombre = $param[0];
            $juego = $this->model->getByNombre($juegoNombre);


            $this->view->juego = $juego;
            $this->view->render("editarJuego/modificar");
        }

        function actualizarJuego(){

            $nombre = $_POST["nombre"];
            $descripcion = $_POST["descripcion"];
            $imagen = $_POST["imagen"];
            $nombreSM = $_POST["nombreSM"];

    


            if($this->model->update(["nombre" => $nombre, "descripcion" => $descripcion, "imagen" => $imagen, "nombreSM" => $nombreSM])){
                
                header("location:http://localhost/PROYECTO_JUNIO/PROYECTO_FINAL/editarjuegos/?exitoeditarJuego") ;

            }else{
                header("location:http://localhost/PROYECTO_JUNIO/PROYECTO_FINAL/editarjuegos/?fracasoeditarJuego") ;
            }

        }
 

        function render($param = null){
            
            $pagina = $param[0];

            $numpagtotal = $this->model->contarPaginas();
            $this->view->numpagtotal = $numpagtotal;

            $juego = $this->model->getJuegos($pagina);
            $this->view->juego = $juego;
            $this->view->render("editarjuego/index");
        }
    }
?>
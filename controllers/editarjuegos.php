<?php

    include_once "models/objetojuegos.php";
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
                header('location: http://allgame.epizy.com/nolog');

            }else if($usuarioActivo != "admin"){
                header('location: http://allgame.epizy.com/nolog');
            }
    
        }

        function editarJuego($param = null){
            $juegoNombre = $param[0];
           
            $juego = $this->model->getByNombre($juegoNombre);

            // echo "hola";
            //  var_dump($juego);
            $this->view->juego = $juego;
            $this->view->render("editarjuego/modificar");
        }

        function actualizarJuego(){

            $nombre = $_POST["nombre"];
            $descripcion = $_POST["descripcion"];
            $imagen = $_POST["imagen"];
            $nombreSM = $_POST["nombreSM"];

    


            if($this->model->update(["nombre" => $nombre, "descripcion" => $descripcion, "imagen" => $imagen, "nombreSM" => $nombreSM])){
                
                header("location: http://allgame.epizy.com/editarjuegos/?exitoeditarJuego") ;

            }else{
                header("location: http://allgame.epizy.com/editarjuegos/?fracasoeditarJuego") ;
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
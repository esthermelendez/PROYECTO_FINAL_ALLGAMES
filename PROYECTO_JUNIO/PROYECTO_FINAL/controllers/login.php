<?php

    include_once "controllers/session.php";
    
    class Login extends Controller{

        private $session;

        function __construct(){

            parent::__construct();
            
            $this->view->usuarios = [];

             $this->session = new Session();

            

        }

        function render(){
            $this->view->render("login/index");
            $this->model->estado();
        }

        public function inicioLogin(){


            $usr = $_POST["usr"];

            $pwd = md5($_POST["pwd"]);
            

            $this->model->buscar(["usuario" => $usr, "pass" => $pwd]);
            $this->model->estado();


        }

        public function cerrarsesion()
        {
            $this->session = new Session();

            $this->session->init();
            
            $this->model->logout();

            header('location: http://localhost/PROYECTO_JUNIO/PROYECTO_FINAL/index');
        }
    }
?>
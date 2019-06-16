<?php
    class Nuevo extends Controller{

        function __construct(){
            //con parent::__construct(); llamamos al constructor del extends
            parent::__construct();
            $this->view->mensaje = "";
            
        }

        function render(){
            $this->view->render("viewnuevousuario/index");
        }
        

        function registrarUsuario(){

            $usr = $_POST["usr"];
            
            $pwd = md5($_POST["pwd"]);
           
            $nom = $_POST["nom"];
    
            $ape = $_POST["ape"];
  
            $ema = $_POST["ema"];
   
            $fecnac = $_POST["fecnac"];
         
            $mensaje = "";


            if($this->model->insert(["usuario" => $usr, "pass" => $pwd, "nombre" => $nom, "apellidos" => $ape, "email" => $ema, "fecnac" => $fecnac])){
                
                header("location:http://localhost/PROYECTO_JUNIO/PROYECTO_FINAL/login/?exito") ;

            }else{
            }

            $this->view->mensaje = $mensaje;
            $this->render();

        }

    }
?>
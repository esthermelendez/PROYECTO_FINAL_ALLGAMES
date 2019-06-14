<?php


    class Session extends Controller {

        function __construct(){
            //con parent::__construct(); llamamos al constructor del extends
            parent::__construct();
        }

        //INICIALIZA LA SESIÓN
        public function init(){
            session_start();
        }

        //AGREGA UN ELEMENTO A LA SESIÓN (KEY ES LA LLAVE DEL ARRAY Y VALUE EL ELEMENTO DE LA SESIÓN)
        public function add($key, $value){
            $_SESSION[$key] = $value;  
        }

        //retorna un elemento a la sesion 
        public function get($key){
            return !empty($_SESSION[$key]) ? $_SESSION[$key] : null;
        }

        //retorna todos los elementos del array de sesion
        public function getAll(){
            return $_SESSION;
        }
        

        //remueve el elemento de la sesión
        public function remove($key){
            if(!empty($_SESSION[$key]))
                unset($_SESSION[$key]);
        }

        //cierra la sesión
        public function close(){
            session_unset();
            session_destroy();
            
        }


        //retorna el estatus de la sesión
        public function getStatus(){
            return session_status();
        }
    }
?>
<?php
    //me aparecia error, asi que tuve que introducir el include
    include "libs/controller.php";

    class Errores extends Controller{

        function __construct(){

            parent::__construct();
            $this->view->render("error/index");
            
        }
        
    }
?>
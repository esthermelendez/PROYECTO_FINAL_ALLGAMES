<?php
    class Nolog extends Controller{

        function __construct(){
            parent::__construct();
            
        }

        function render(){
            $this->view->render("nolog/index");
        }
        
    }
?>
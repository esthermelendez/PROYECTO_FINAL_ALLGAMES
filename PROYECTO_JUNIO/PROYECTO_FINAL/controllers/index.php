<?php
    class Index extends Controller{

        function __construct(){
            //con parent::__construct(); llamamos al constructor del extends
            parent::__construct();
            
        }

        //el render hace que se vea la vista de lo que se desee
        function render(){
            $this->view->render("index/index");
        }
    }
?>
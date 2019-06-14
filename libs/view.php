<?php

    class View{
        function __construct(){
        }

        function render($nombre){
            require "views/" . $nombre . ".php";
        }
    }
?>
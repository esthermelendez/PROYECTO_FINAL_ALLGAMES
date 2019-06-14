<?php

    include_once "models/usuario.php";

    class ConsultaModel extends Model{

        public function __construct(){

            parent::__construct();
        }

        public function get(){
            $items = [];

            try{

                $query = $this->db->connect()->query("SELECT * FROM usuario");

           

                while($row = $query->fetch()){
                    $item = new Usuario();
                    $item->usuario = $row["usuario"];
                    $item->nombre = $row["nombre"];
                    $item->apellidos = $row["apellidos"];
                    $item->email = $row["email"];
                    $item->fecnac = $row["fecnac"];
                    
                    array_push($items, $item);  
                }

                return $items;  

            }catch(PDOException $e){
                return [];
            }
        }

    }
?>
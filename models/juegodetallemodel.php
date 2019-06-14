<?php

    include_once "models/objetojuegos.php";

    class JuegoDetalleModel extends Model{

        public function __construct(){

            parent::__construct();

        }

        public function detalle(){
        }

        public function  getByName($nombre){

            $item = new Objetojuegos();
            

            $query = $this->db->connect()->prepare("SELECT * FROM juego WHERE nombre = :nombre");

           
            try{
                $query->execute(["nombre" => $nombre]);

                while($row = $query->fetch()){
                    

                    $item->nombre = $row["nombre"];
                    $item->descripcion = $row["descripcion"];
                    $item->imagen = $row["imagen"];

                }

                return $item;     

            }catch(PDOException $e){
                return null;

            }
        }
    }
?>
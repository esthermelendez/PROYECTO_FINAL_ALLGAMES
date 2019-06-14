<?php

    include_once "models/objetojuegos.php";
    include_once "models/juegomodel.php";
    include_once "models/usuario.php";

    class AniadirJuegosModel extends Model{

        public function __construct(){
            parent::__construct();
        }


        public function insert($datos){

            $falloNombre = true;

            // nombre
            if (empty($datos['nombre'])) {
                header("location: http://allgame.epizy.com/aniadirjuegos/?fracasoAniadirJuegoNombreVacio");
                die();

            }else {
                $falloNombre = false;
            }
            

            if($falloNombre==false){
                try{

                    $item = new Objetojuegos();
    
                    $query = 'INSERT INTO juego (nombre, descripcion, imagen) VALUES (:nombre, :descripcion, :imagen)';
                    $consulta = $this->db->connect()->prepare($query);
                    $consulta->bindValue(':nombre', $datos["nombre"]);
                    $consulta->bindValue(':descripcion',$datos["descripcion"]);
                    $consulta->bindValue(':imagen',$datos["imagen"]);
                    $consulta->execute();
    
                    $query2 = "SELECT idJuego FROM juego WHERE nombre = :nombre";
                    $consulta2 = $this->db->connect()->prepare($query2);
                    $consulta2->bindValue(':nombre', $datos['nombre']);
                    $consulta2->execute();
    
                    while($row = $consulta2->fetch()){
                        $item->idJuego = $row["idJuego"];
                    }
    
                    $idJuegos = $item->idJuego;
    
                   
    
                    $query3 = 'INSERT INTO plataforma_juego (idPlataforma, idJuego) VALUES (:plataforma, :idJuegos)';
                    $consulta3 = $this->db->connect()->prepare($query3);
                    $consulta3->bindValue(':plataforma', $datos['plataforma']);
                    $consulta3->bindValue(':idJuegos', $idJuegos);
                    $consulta3->execute();
    
                    
    
    
                    //insertamos datos en la base de datos
                    return true;
    
                  
                }catch(PDOException $e){
                    return false;
                }
            }

            
        }
    }
?>